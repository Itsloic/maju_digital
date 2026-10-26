<?php

namespace Tests\Feature;

use App\Models\Artikel;
use App\Models\Category;
use App\Models\Level;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\LevelSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthAuthzFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(LevelSeeder::class);
        $this->seed(CategorySeeder::class);

        // Register rate limiters for tests (FortifyServiceProvider boot may not run in test)
        $this->app->booted(function () {
            \Illuminate\Support\Facades\RateLimiter::for('login', function ($request) {
                $throttleKey = \Illuminate\Support\Str::transliterate(\Illuminate\Support\Str::lower($request->input('email').'|'.$request->ip()));
                return \Illuminate\Cache\RateLimiting\Limit::perMinute(5)->by($throttleKey);
            });
            \Illuminate\Support\Facades\RateLimiter::for('two-factor', function ($request) {
                return \Illuminate\Cache\RateLimiting\Limit::perMinute(5)->by($request->session()->get('login.id'));
            });
        });
    }

    private function createUser(int $levelId): User
    {
        $roleMap = [
            Level::ADMINISTRATOR => 'administrator',
            Level::EDITOR => 'editor',
            Level::PENULIS => 'penulis',
            Level::MASYARAKAT => 'masyarakat',
        ];

        return User::create([
            'name' => 'Test User '.$levelId,
            'email' => 'user'.$levelId.'_'.uniqid().'@example.com',
            'password' => Hash::make('Password123!#'),
            'level_id' => $levelId,
            'role' => $roleMap[$levelId] ?? 'masyarakat',
            'email_verified_at' => now(),
        ]);
    }

    public function test_guest_redirected_from_data(): void
    {
        $response = $this->get('/data');
        $response->assertRedirect('/login');
    }

    public function test_level_1_and_2_can_access_data(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $editor = $this->createUser(Level::EDITOR);

        $this->actingAs($admin)->get('/data')->assertStatus(200);
        $this->actingAs($editor)->get('/data')->assertStatus(200);
    }

    public function test_level_3_and_4_cannot_access_data(): void
    {
        $penulis = $this->createUser(Level::PENULIS);
        $masyarakat = $this->createUser(Level::MASYARAKAT);

        $this->actingAs($penulis)->get('/data')->assertStatus(403);
        $this->actingAs($masyarakat)->get('/data')->assertStatus(403);
    }

    public function test_add_article_permissions(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $editor = $this->createUser(Level::EDITOR);
        $penulis = $this->createUser(Level::PENULIS);
        $masyarakat = $this->createUser(Level::MASYARAKAT);

        $category = Category::first();

        $articleData = [
            'judul' => 'Judul Artikel Test Baru',
            'ringkasan' => 'Ringkasan artikel test baru.',
            'isi' => 'Isi lengkap artikel test baru.',
            'kategori_id' => $category->id,
            'tanggal_publikasi' => now()->toDateTimeString(),
        ];

        $this->get('/kelola/artikel/create')->assertRedirect('/login');

        $this->actingAs($admin)->post('/kelola/artikel', $articleData)->assertRedirect('/kelola/artikel');
        $this->actingAs($editor)->post('/kelola/artikel', $articleData)->assertRedirect('/kelola/artikel');
        $this->actingAs($penulis)->post('/kelola/artikel', $articleData)->assertRedirect('/kelola/artikel');

        $this->actingAs($masyarakat)->post('/kelola/artikel', $articleData)->assertStatus(403);
    }

    public function test_edit_article_permissions(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $editor = $this->createUser(Level::EDITOR);
        $penulis = $this->createUser(Level::PENULIS);
        $otherPenulis = $this->createUser(Level::PENULIS);
        $masyarakat = $this->createUser(Level::MASYARAKAT);

        $category = Category::first();

        $artikel = Artikel::create([
            'judul' => 'Artikel Milik Penulis',
            'slug' => 'artikel-milik-penulis',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'kategori' => $category->name,
            'penulis' => $penulis->name,
            'kategori_id' => $category->id,
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => now(),
        ]);

        $updateData = [
            'judul' => 'Judul Artikel Diperbarui',
            'ringkasan' => 'Ringkasan baru',
            'isi' => 'Isi baru',
            'kategori_id' => $category->id,
            'tanggal_publikasi' => now()->toDateTimeString(),
        ];

        // Penulis edit artikel sendiri -> Boleh
        $response = $this->actingAs($penulis)->put("/kelola/artikel/{$artikel->slug}", $updateData);
        $this->assertEquals(302, $response->getStatusCode(), 'Redirect: '.$response->headers->get('Location'));

        // Re-fetch artikel because slug may have changed
        $artikel->refresh();

        // Penulis lain edit artikel orang lain -> 403
        $response = $this->actingAs($otherPenulis)->put("/kelola/artikel/{$artikel->slug}", $updateData);
        $this->assertEquals(403, $response->getStatusCode(), 'Status: '.$response->getStatusCode().' Redirect: '.$response->headers->get('Location'));

        // Editor & Admin edit -> Boleh
        $this->actingAs($editor)->put("/kelola/artikel/{$artikel->slug}", $updateData)->assertRedirect('/kelola/artikel');
        $this->actingAs($admin)->put("/kelola/artikel/{$artikel->slug}", $updateData)->assertRedirect('/kelola/artikel');

        // Masyarakat edit -> 403
        $this->actingAs($masyarakat)->put("/kelola/artikel/{$artikel->slug}", $updateData)->assertStatus(403);
    }

    public function test_delete_article_permissions(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $editor = $this->createUser(Level::EDITOR);
        $penulis = $this->createUser(Level::PENULIS);
        $category = Category::first();

        $artikel = Artikel::create([
            'judul' => 'Artikel Hapus',
            'slug' => 'artikel-hapus',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'kategori' => $category->name,
            'penulis' => $penulis->name,
            'kategori_id' => $category->id,
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => now(),
        ]);

        $this->actingAs($penulis)->delete("/kelola/artikel/{$artikel->slug}")->assertStatus(403);
        $this->actingAs($editor)->delete("/kelola/artikel/{$artikel->slug}")->assertStatus(403);

        // Admin hapus dengan konfirmasi password di session
        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => time()])
            ->delete("/kelola/artikel/{$artikel->slug}")
            ->assertRedirect('/kelola/artikel');
    }

    public function test_manage_user_permissions(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $editor = $this->createUser(Level::EDITOR);

        // Editor -> 403
        $this->actingAs($editor)->get('/admin/users')->assertStatus(403);

        // Admin tanpa 2FA aktif -> Redirect ke profil.keamanan
        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => time()])
            ->get('/admin/users')
            ->assertRedirect(route('profil.keamanan'));

        // Admin dengan 2FA aktif -> 200
        $admin->forceFill(['two_factor_confirmed_at' => now()])->save();
        $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => time()])
            ->get('/admin/users')
            ->assertStatus(200);
    }

    public function test_failed_login_and_throttling(): void
    {
        // 6 kali login gagal beruntun
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/login', [
                'email' => 'wrong@example.com',
                'password' => 'wrongpassword',
            ]);
            $response->assertSessionHasErrors('email');
        }

        // Percobaan ke-6 kena throttle (429 atau error session)
        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);
        $response->assertStatus(429);
    }

    public function test_public_registration_default_level(): void
    {
        $response = $this->post('/register', [
            'name' => 'User Baru Publik',
            'email' => 'userbaru@example.com',
            'password' => 'MajuDigital#2026',
            'password_confirmation' => 'MajuDigital#2026',
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('users', [
            'email' => 'userbaru@example.com',
            'level_id' => Level::MASYARAKAT,
            'role' => 'masyarakat',
        ]);
    }

    public function test_password_hidden_in_json(): void
    {
        $user = $this->createUser(Level::MASYARAKAT);
        $json = $user->toJson();

        $this->assertStringNotContainsString('password', $json);
        $this->assertStringNotContainsString('two_factor_secret', $json);
    }

    public function test_deleting_user_with_articles_fails(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $admin->forceFill(['two_factor_confirmed_at' => now()])->save();

        $penulis = $this->createUser(Level::PENULIS);
        $category = Category::first();

        Artikel::create([
            'judul' => 'Artikel Penulis Hapus',
            'slug' => 'artikel-penulis-hapus',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'kategori' => $category->name,
            'penulis' => $penulis->name,
            'kategori_id' => $category->id,
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => now(),
        ]);

        $response = $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => time()])
            ->delete("/admin/users/{$penulis->id}");

        $response->assertSessionHas('error', 'User masih memiliki artikel dan tidak dapat dihapus.');
        $this->assertDatabaseHas('users', ['id' => $penulis->id]);
    }

    public function test_update_user_level_syncs_role(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $admin->forceFill(['two_factor_confirmed_at' => now()])->save();

        $penulis = $this->createUser(Level::PENULIS);
        $this->assertEquals('penulis', $penulis->role);

        $response = $this->actingAs($admin)
            ->withSession(['auth.password_confirmed_at' => time()])
            ->put("/admin/users/{$penulis->id}", [
                'name' => $penulis->name,
                'email' => $penulis->email,
                'level_id' => Level::EDITOR,
            ]);

        $response->assertRedirect(route('admin.users.index'));

        $penulis->refresh();
        $this->assertEquals('editor', $penulis->role);
        $this->assertEquals(Level::EDITOR, $penulis->level_id);
    }
}
