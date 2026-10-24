# Bukti Tugas 4 Nomor 2: Seeder & Integrasi FK

## 1. Jumlah Data
Command: `php artisan tinker --execute 'echo "Articles: ".\App\Models\Artikel::count().", Categories: ".\App\Models\Category::count().", Users: ".\App\Models\User::count().", Levels: ".\App\Models\Level::count();'`

Output:
Articles: 25, Categories: 5, Users: 10, Levels: 4

## 2. Distribusi Data

### Artikel per Kategori
Command: `php artisan tinker --execute 'print_r(\App\Models\Category::withCount("artikel")->get()->pluck("artikel_count", "name")->toArray());'`
Output:
Array ([Pemerintahan] => 5, [Pendidikan] => 5, [Pelayanan Publik] => 5, [Kesehatan] => 5, [Infrastruktur] => 5)

### Artikel per Penulis
Command: `php artisan tinker --execute 'print_r(\App\Models\User::withCount("artikel")->get()->pluck("artikel_count", "name")->toArray());'`
Output:
Array ([Hendra Gunawan] => 2, [Siti Marlina] => 4, [Maya Anggraini] => 1, [Rina Wulandari] => 4, [Dedi Hartono] => 4, [Dewi Kartika] => 3, [Eko Susilo] => 3, [Wahyu Nugroho] => 2, [Agus Prasetyo] => 1, [Bambang Setiawan] => 1)

### User per Level
Command: `php artisan tinker --execute 'print_r(\App\Models\Level::withCount("users")->get()->pluck("users_count", "nama_level")->toArray());'`
Output:
Array ([Administrator] => 1, [Editor] => 2, [Penulis] => 7, [Masyarakat] => 0)

## 3. Bukti Hubungan (Sampel 25 Baris)
Command: `php artisan tinker --execute 'foreach (\App\Models\Artikel::with(["kategoriRelasi", "penulisAkun.level"])->get() as $a) { echo "{$a->judul} | Cat: {$a->kategoriRelasi->name} | Penulis: {$a->penulisAkun->name} | Level: {$a->penulisAkun->level->nama_level}\n"; }'`
Output:
(25 Baris data artikel tertampil dengan relasi lengkap)

## 4. Integritas
Command: `php artisan tinker --execute 'echo "NULL Kategori: ".\App\Models\Artikel::whereNull("kategori_id")->count().", NULL Penulis: ".\App\Models\Artikel::whereNull("penulis_id")->count().", User Has Artikel: ".\App\Models\User::has("artikel")->count();'`
Output:
NULL Kategori: 0, NULL Penulis: 0, User Has Artikel: 10

## 5. Uji FK (RestrictOnDelete)
Command: `php artisan tinker --execute 'try { \App\Models\Category::first()->delete(); } catch (\Exception $e) { echo $e->getMessage(); }'`
Output:
SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`maju_digital`.`artikel`, CONSTRAINT `artikel_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `categories` (`id`))

## 6. Uji Relasi Eloquent
Command: `php artisan tinker --execute 'echo \App\Models\Category::first()->artikel->count()." | ".\App\Models\Level::find(3)->users->count()." | ".\App\Models\Artikel::first()->kategoriRelasi->name." | ".\App\Models\Artikel::first()->penulisAkun->name." | ".\App\Models\Artikel::first()->penulisAkun->level->nama_level;'`
Output:
5 | 7 | Pemerintahan | Rina Wulandari | Penulis

## 7. Ringkasan
| Syarat | Status |
|--------|--------|
| 25 Artikel, 5 per kategori | PASS |
| 10 User Penulis (10 total) | PASS |
| 4 Level | PASS |
| FK Integritas | PASS |
| RestrictOnDelete | PASS |
| Relasi Eloquent | PASS |
