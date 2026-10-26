<?php

namespace Tests\Feature;

use App\Models\Artikel;
use App\Models\Category;
use App\Models\Level;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\LevelSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ApiAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(LevelSeeder::class);
        $this->seed(CategorySeeder::class);
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
            'name' => 'API User '.$levelId,
            'email' => 'apiuser'.$levelId.'_'.uniqid().'@example.com',
            'password' => Hash::make('Password123!#'),
            'level_id' => $levelId,
            'role' => $roleMap[$levelId] ?? 'masyarakat',
            'email_verified_at' => now(),
        ]);
    }

    public function test_api_without_token_returns_401(): void
    {
        $this->getJson('/api/artikel')->assertStatus(401);
    }

    public function test_api_login_returns_token(): void
    {
        $user = $this->createUser(Level::PENULIS);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'Password123!#',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
                'user' => ['id', 'name', 'email', 'level', 'role'],
            ]);
    }

    public function test_api_login_invalid_credentials(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('email');
    }

    public function test_api_logout_revokes_token(): void
    {
        $user = $this->createUser(Level::PENULIS);

        $loginResponse = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'Password123!#',
        ]);

        $token = $loginResponse->json('access_token');

        // Verify token exists before logout
        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $user->id,
        ]);

        $this->withHeaders(['Authorization' => 'Bearer '.$token])
            ->postJson('/api/logout')
            ->assertStatus(200);

        // Verify token is deleted from database
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $user->id,
        ]);

        // Manually verify the hashed token is not in database
        $hashedToken = hash('sha256', $token);
        $this->assertDatabaseMissing('personal_access_tokens', [
            'token' => $hashedToken,
        ]);

        // Verify the token is actually gone by checking the table directly
        $remainingTokens = \DB::table('personal_access_tokens')
            ->where('token', $hashedToken)
            ->count();
        $this->assertEquals(0, $remainingTokens);

        // Debug: check which guard is being used
        $request = Request::create('/api/artikel', 'GET', [], [], [], ['HTTP_AUTHORIZATION' => 'Bearer '.$token]);
        $guard = app('auth')->guard('sanctum');
        $guard->setRequest($request);
        $authUser = $guard->user();
        \Log::info('Sanctum guard user', ['user' => $authUser ? $authUser->id : null, 'guard' => get_class($guard)]);

        // Also check web guard
        $webGuard = app('auth')->guard('web');
        $webGuard->setRequest($request);
        $webUser = $webGuard->user();
        \Log::info('Web guard user', ['user' => $webUser ? $webUser->id : null, 'guard' => get_class($webGuard)]);

        // Token should be revoked
        $this->withHeaders(['Authorization' => 'Bearer '.$token])
            ->getJson('/api/artikel')
            ->assertStatus(401);
    }

    public function test_api_penulis_cannot_delete_article(): void
    {
        $penulis = $this->createUser(Level::PENULIS);
        $admin = $this->createUser(Level::ADMINISTRATOR);

        $category = Category::first();

        $artikel = Artikel::create([
            'judul' => 'Artikel Test API',
            'slug' => 'artikel-test-api',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'kategori' => $category->name,
            'penulis' => $penulis->name,
            'kategori_id' => $category->id,
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => now(),
        ]);

        // Penulis token
        $penulisToken = $penulis->createToken('test', ['penulis'])->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$penulisToken])
            ->deleteJson("/api/artikel/{$artikel->id_artikel}");

        $response->assertStatus(403);
    }

    public function test_api_admin_can_delete_article(): void
    {
        $admin = $this->createUser(Level::ADMINISTRATOR);
        $penulis = $this->createUser(Level::PENULIS);

        $category = Category::first();

        $artikel = Artikel::create([
            'judul' => 'Artikel Test API Delete',
            'slug' => 'artikel-test-api-delete',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'kategori' => $category->name,
            'penulis' => $penulis->name,
            'kategori_id' => $category->id,
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => now(),
        ]);

        // Admin token
        $adminToken = $admin->createToken('test', ['admin'])->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$adminToken])
            ->deleteJson("/api/artikel/{$artikel->id_artikel}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('artikel', ['id_artikel' => $artikel->id_artikel]);
    }

    public function test_api_get_artikel_with_token(): void
    {
        $penulis = $this->createUser(Level::PENULIS);
        $category = Category::first();

        Artikel::create([
            'judul' => 'Artikel API List',
            'slug' => 'artikel-api-list',
            'ringkasan' => 'Ringkasan',
            'isi' => 'Isi',
            'kategori' => $category->name,
            'penulis' => $penulis->name,
            'kategori_id' => $category->id,
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => now(),
        ]);

        $token = $penulis->createToken('test', ['penulis'])->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer '.$token])
            ->getJson('/api/artikel');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'judul', 'slug', 'ringkasan', 'kategori', 'penulis', 'tanggal_publikasi', 'gambar'],
                ],
                'pagination' => ['current_page', 'last_page', 'per_page', 'total'],
            ]);
    }
}
