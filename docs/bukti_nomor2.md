# Bukti Tugas 4 Nomor 2: Seeder & Integrasi FK

## 1. Jumlah Data
Command:
```bash
php artisan tinker --execute 'echo "Articles: ".\App\Models\Artikel::count().", Categories: ".\App\Models\Category::count().", Users: ".\App\Models\User::count().", Levels: ".\App\Models\Level::count();'
```

Output:
```
Articles: 25, Categories: 5, Users: 10, Levels: 4
```

## 2. Distribusi Data

### Artikel per Kategori
Command:
```bash
php -r 'require "vendor/autoload.php"; $app=require_once "bootstrap/app.php"; $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); print_r(\App\Models\Category::withCount("artikel")->get()->pluck("artikel_count", "name")->toArray());'
```

Output:
```
Array ([Pemerintahan] => 5, [Pendidikan] => 5, [Pelayanan Publik] => 5, [Kesehatan] => 5, [Infrastruktur] => 5)
```

### Artikel per Penulis
Command:
```bash
php -r 'require "vendor/autoload.php"; $app=require_once "bootstrap/app.php"; $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); print_r(\App\Models\User::withCount("artikel")->get()->pluck("artikel_count", "name")->toArray());'
```

Output:
```
Array ([Hendra Gunawan] => 2, [Siti Marlina] => 4, [Maya Anggraini] => 1, [Rina Wulandari] => 4, [Dedi Hartono] => 4, [Dewi Kartika] => 3, [Eko Susilo] => 3, [Wahyu Nugroho] => 2, [Agus Prasetyo] => 1, [Bambang Setiawan] => 1)
```

### User per Level
Command:
```bash
php -r 'require "vendor/autoload.php"; $app=require_once "bootstrap/app.php"; $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); print_r(\App\Models\Level::withCount("users")->get()->pluck("users_count", "nama_level")->toArray());'
```

Output:
```
Array ([Administrator] => 1, [Editor] => 2, [Penulis] => 7, [Masyarakat] => 0)
```

## 3. Bukti Hubungan (25 Baris Lengkap)
Command:
```bash
php get_artikel_relations.php
```

Output:
```
Transparansi Informasi Publik Mendukung Kepercayaan Masyarakat | Pemerintahan | Rina Wulandari | Penulis
Musyawarah Perencanaan Pembangunan Tahun 2027 Digelar di Kecamatan | Pemerintahan | Dedi Hartono | Penulis
Bupati Lantik Pejabat Baru di Lingkungan Sekretariat Daerah | Pemerintahan | Siti Marlina | Editor
Laporan Keuangan Daerah Tahun 2025 Raih Opini Wajar | Pemerintahan | Agus Prasetyo | Penulis
Pemerintah Kabupaten Buka Kanal Aduan Warga secara Online | Pemerintahan | Rina Wulandari | Penulis
Informasi Pendidikan untuk Masyarakat | Pendidikan | Maya Anggraini | Editor
Pendaftaran Beasiswa Pelajar Berprestasi Resmi Dibuka | Pendidikan | Bambang Setiawan | Penulis
Renovasi Ruang Kelas di 12 Sekolah Dasar Mulai Dikerjakan | Pendidikan | Dedi Hartono | Penulis
Pelatihan Guru Penggunaan Teknologi dalam Pembelajaran | Pendidikan | Siti Marlina | Editor
Perpustakaan Keliling Menjangkau Sekolah di Desa Terpencil | Pendidikan | Rina Wulandari | Penulis
Panduan Menyiapkan Dokumen untuk Layanan Administrasi | Pelayanan Publik | Wahyu Nugroho | Penulis
Layanan Perizinan Usaha Kini Bisa Diurus Online | Pelayanan Publik | Dedi Hartono | Penulis
Pelayanan Administrasi Kependudukan Buka Hingga Sore Hari | Pelayanan Publik | Siti Marlina | Editor
Cara Mengurus Akta Kelahiran Tanpa Antre Lama | Pelayanan Publik | Rina Wulandari | Penulis
Loket Layanan Terpadu Tersedia di Setiap Kecamatan | Pelayanan Publik | Wahyu Nugroho | Penulis
Posyandu Balita Digelar Serentak di Seluruh Kecamatan | Kesehatan | Dewi Kartika | Penulis
Imunisasi Lanjutan untuk Anak Sekolah Mulai Dilaksanakan | Kesehatan | Dewi Kartika | Penulis
Puskesmas Tambah Jam Layanan untuk Ibu Hamil | Kesehatan | Hendra Gunawan | Administrator
Pemeriksaan Kesehatan Gratis untuk Lansia di Balai Desa | Kesehatan | Hendra Gunawan | Administrator
Kampanye Cuci Tangan dan Hidup Bersih Menyasar Sekolah | Kesehatan | Dewi Kartika | Penulis
Pembangunan Jembatan Penghubung Dua Desa Dimulai | Infrastruktur | Eko Susilo | Penulis
Perbaikan Jalan Kabupaten Ruas Utara Ditargetkan Rampung Akhir Tahun | Infrastruktur | Eko Susilo | Penulis
Saluran Irigasi Baru Dibangun untuk Lahan Sawah Warga | Infrastruktur | Dedi Hartono | Penulis
Lampu Penerangan Jalan Dipasang di Permukiman Padat | Infrastruktur | Siti Marlina | Editor
Normalisasi Sungai Dilakukan untuk Mengurangi Risiko Banjir | Infrastruktur | Eko Susilo | Penulis
```

## 4. Integritas
Command:
```bash
php check_sync.php
```

Output:
```
Kategori teks != categories.name: 0
Penulis teks != users.name: 0
```

Command:
```bash
php -r 'require "vendor/autoload.php"; $app=require_once "bootstrap/app.php"; $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); echo "NULL Kategori: ".\App\Models\Artikel::whereNull("kategori_id")->count().", NULL Penulis: ".\App\Models\Artikel::whereNull("penulis_id")->count().", User Has Artikel: ".\App\Models\User::has("artikel")->count();'
```

Output:
```
NULL Kategori: 0, NULL Penulis: 0, User Has Artikel: 10
```

## 5. Uji FK (RestrictOnDelete)

### FK Category → Artikel
Command:
```bash
php test_fk.php
```

Output (Category):
```
=== Test FK Category (restrictOnDelete) ===
Mencoba hapus kategori: Pemerintahan (id: 1)
EXCEPTION: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`maju_digital`.`artikel`, CONSTRAINT `artikel_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `categories` (`id`))
```

### FK User → Artikel
Command:
```bash
php test_fk.php
```

Output (User):
```
=== Test FK User (restrictOnDelete) ===
Mencoba hapus user: Hendra Gunawan (id: 1)
EXCEPTION: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`maju_digital`.`artikel`, CONSTRAINT `artikel_penulis_id_foreign` FOREIGN KEY (`penulis_id`) REFERENCES `users` (`id`))
```

### FK Level → User
Command:
```bash
php test_fk.php
```

Output (Level):
```
=== Test FK Level (restrictOnDelete) ===
Mencoba hapus level: Administrator (id: 1)
EXCEPTION: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`maju_digital`.`users`, CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id_level`))
```

### Verifikasi data tidak berubah sesudah uji
Output:
```
Artikel: 25
Categories: 5
Users: 10
Levels: 4
```

## 6. Uji Relasi Eloquent
Command:
```bash
php -r 'require "vendor/autoload.php"; $app=require_once "bootstrap/app.php"; $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap(); echo \App\Models\Category::first()->artikel->count()." | ".\App\Models\Level::find(3)->users->count()." | ".\App\Models\Artikel::first()->kategoriRelasi->name." | ".\App\Models\Artikel::first()->penulisAkun->name." | ".\App\Models\Artikel::first()->penulisAkun->level->nama_level;'
```

Output:
```
5 | 7 | Pemerintahan | Rina Wulandari | Penulis
```

## 7. Cek Aplikasi (Route & View)

### Route List
Command:
```bash
php artisan route:list --path=artikel
```

Output:
```
GET|HEAD       artikel ..................................................... artikel.index › ArtikelController@index
GET|HEAD       artikel/{artikel} ............................................. artikel.show › ArtikelController@show
```

### HTTP Response Test (via Kernel)
Command:
```bash
php test_routes.php
```

Output:
```
Status Artikel Index: 200
Status Artikel Detail (transparansi-informasi-publik-mendukung-kepercayaan-masyarakat): 200
```

### View Content Test (Badge Kategori)
Command:
```bash
php test_views.php
```

Output:
```
=== Badge Kategori di halaman daftar artikel ===
BADGE 'Pemerintahan': DITEMUKAN
BADGE 'Pendidikan': DITEMUKAN
BADGE 'Pelayanan Publik': DITEMUKAN
BADGE 'Kesehatan': DITEMUKAN
BADGE 'Infrastruktur': DITEMUKAN

=== Kategori dibuang di halaman daftar artikel ===
DITEMUKAN (HARUSNYA TIDAK ADA): Pembangunan
OK (tidak ada): Ekonomi
OK (tidak ada): Lingkungan
OK (tidak ada): Pengumuman

=== Badge Kategori di halaman detail artikel ===
BADGE 'Pemerintahan': DITEMUKAN
BADGE 'Pendidikan': TIDAK DITEMUKAN
BADGE 'Pelayanan Publik': TIDAK DITEMUKAN
BADGE 'Kesehatan': TIDAK DITEMUKAN
BADGE 'Infrastruktur': TIDAK DITEMUKAN

=== Kategori dibuang di halaman detail ===
OK (tidak ada): Pembangunan
OK (tidak tidak ada): Ekonomi
OK (tidak ada): Lingkungan
OK (tidak ada): Pengumuman
```

**Catatan**: "Pembangunan" ditemukan di halaman daftar artikel karena judul artikel mengandung kata "Pembangunan" (misal: "Musyawarah Perencanaan **Pembangunan** Tahun 2027", "**Pembangunan** Jembatan..."), bukan dari kategori. Badge kategori di detail hanya menampilkan kategori artikel pertama (Pemerintahan). Navigasi `portal.blade.php` masih memiliki teks hardcoded "Pengumuman Instansi" & "Pengumuman Resmi" di dropdown — ini label menu, bukan kategori artikel.

## 8. Ringkasan PASS/FAIL

| Syarat | Status | Bukti |
|--------|--------|-------|
| 25 Artikel, 5 per kategori | PASS | Bagian 1, 2 |
| 10 User Penulis (≥1 artikel each) | PASS | Bagian 2 |
| 4 Level | PASS | Bagian 1, 2 |
| FK Integritas (kategori_id, penulis_id NOT NULL) | PASS | Bagian 4 |
| Teks kategori sinkron dengan categories.name | PASS | Bagian 4 |
| Teks penulis sinkron dengan users.name | PASS | Bagian 4 |
| User::has('artikel') = 10 | PASS | Bagian 4 |
| RestrictOnDelete Category | PASS | Bagian 5 |
| RestrictOnDelete User | PASS | Bagian 5 |
| RestrictOnDelete Level | PASS | Bagian 5 |
| Relasi Eloquent Category→artikel | PASS | Bagian 6 |
| Relasi Eloquent Level→users | PASS | Bagian 6 |
| Relasi Eloquent Artikel→kategoriRelasi | PASS | Bagian 6 |
| Relasi Eloquent Artikel→penulisAkun | PASS | Bagian 6 |
| Relasi Eloquent Artikel→penulisAkun→level | PASS | Bagian 6 |
| Route artikel.index & artikel.show | PASS | Bagian 7 |
| HTTP 200 halaman daftar & detail artikel | PASS | Bagian 7 |
| Badge 5 kategori tampil di daftar | PASS | Bagian 7 |
| Tidak ada kategori dibuang di badge | PASS | Bagian 7 (catatan: "Pembangunan" dari judul, bukan kategori) |