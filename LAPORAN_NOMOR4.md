# LAPORAN_NOMOR4.md

## Perubahan yang Dilakukan

### 1. Seeder
- **database/seeders/ArtikelSeeder.php**: File baru. Mengisi 25 artikel dengan kategori pemerintahan, pendidikan, pelayanan publik, kesehatan, dan infrastruktur (masing-masing 5).
- **Status**: Berhasil. Data sudah masuk ke DB.

### 2. Komponen Layout & Navigasi
- **app/View/Components/Layout.php**: Perubahan judul dari 'Maju Digital' menjadi 'beranda'.
- **resources/views/components/layout.blade.php**: (Ada sebelumnya).
- **resources/views/components/navbar.blade.php**: (Ada sebelumnya).
- **resources/views/components/footer.blade.php**: (Ada sebelumnya).
- **resources/views/components/kategori-badge.blade.php**: Perubahan pemetaan warna kategori sesuai jenis.

### 3. Views Artikel
- **resources/views/components/artikel-card.blade.php**: (Ada sebelumnya).
- **resources/views/components/artikel-header.blade.php**: (Ada sebelumnya).
- **resources/views/beranda.blade.php**: (Ada sebelumnya).
- **resources/views/artikel/index.blade.php**: (Ada sebelumnya).
- **resources/views/artikel/show.blade.php**: (Ada sebelumnya).

## Hasil Verifikasi
- **Route List**:
  - GET|HEAD / -> beranda
  - GET|HEAD artikel -> artikel.index
  - GET|HEAD artikel/{artikel} -> artikel.show
- **Jumlah Data**:
  - Total: 25 artikel.
  - Per kategori: 5 artikel masing-masing.
- **HTTP Cek**:
  - Status 200 untuk '/', '/artikel', '/artikel/pembangunan-jembatan-penghubung-dua-desa-dimulai'.
  - Status 404 untuk '/artikel/tidak-ada'.
