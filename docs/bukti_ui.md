# Bukti Percantikan UI - Portal Maju Digital

## Branch: `ui-bagus`
## Commit: `Percantik tampilan UI portal Maju Digital` (9549fd8)

---

## File yang Dibuat / Diubah

### File Baru:
- `public/css/maju.css` — CSS custom dengan variabel warna, komponen kartu, badge, hero, tabel, placeholder gambar
- `public/img/logo.svg` — Emblem perisai biru dengan huruf M

### File Diubah:
- `resources/views/components/layout.blade.php` — Tambah Google Fonts Inter, Bootstrap Icons, load `maju.css`
- `resources/views/components/navbar.blade.php` — Navy background, logo SVG + nama, menu Beranda/Artikel/Data/Portal, active indicator, sticky
- `resources/views/components/footer.blade.php` — Navy, identitas lengkap, link menu, email, media sosial, copyright
- `resources/views/components/kategori-badge.blade.php` — Warna per kategori: Pemerintahan biru, Pendidikan hijau, Pelayanan Publik teal, Kesehatan merah, Infrastruktur oranye, fallback abu-abu
- `resources/views/components/artikel-card.blade.php` — Gambar, badge kategori, judul, ringkasan 2-3 baris, penulis, tanggal, tombol "Baca selengkapnya", hover naik
- `resources/views/components/artikel-header.blade.php` — Breadcrumb, badge, judul besar, info penulis/tanggal
- `resources/views/beranda.blade.php` — Hero gradien biru, judul, tagline, 2 tombol; "Berita Terbaru" 6 artikel; strip kategori 5 chip berwarna dengan jumlah artikel
- `resources/views/artikel/index.blade.php` — Grid 3 kolom, pagination tengah
- `resources/views/artikel/show.blade.php` — Breadcrumb, badge, judul, meta, gambar lebar, isi lebar 720px, line-height lega, tombol kembali
- `resources/views/data/index.blade.php` — 2 tabel dalam kartu, header navy/biru, zebra stripe, badge kategori & status, label total
- `resources/views/portal.blade.php` — Percantik kartu layanan dengan Bootstrap Icons, pertahankan isi
- `resources/views/admin/artikel/index.blade.php` — Selaraskan gaya (card, table, badge, button) tanpa ubah fungsi
- `resources/views/admin/artikel/create.blade.php` — Selaraskan gaya
- `resources/views/admin/artikel/edit.blade.php` — Selaraskan gaya
- `resources/views/admin/artikel/_form.blade.php` — Selaraskan gaya (form-control, btn)
- `app/Http/Controllers/ArtikelController.php` — Tambah query kategori untuk beranda (HANYA baca data)

---

## Uji Coba

### Server: `php -S 127.0.0.1:8080 -t public`

| URL | Status Code | Keterangan |
|-----|-------------|------------|
| `/` | 200 | Beranda dengan hero, berita terbaru, kategori |
| `/artikel` | 200 | Daftar artikel grid 3 kolom, pagination |
| `/artikel/{slug}` | 200 | Detail artikel dengan breadcrumb, gambar, isi nyaman dibaca |
| `/data` | 200 | 2 tabel dalam kartu, **25 artikel**, **5 kategori**, badge warna, label total |
| `/portal` | 200 | Hero, layanan publik dengan ikon, informasi publik, aduan rakyat, profil, berita terbaru |

### Verifikasi Data `/data`:
- **Tabel Artikel**: 25 baris (No 1-25) ✓
- **Tabel Kategori**: 5 baris (Pemerintahan, Pendidikan, Pelayanan Publik, Kesehatan, Infrastruktur) ✓
- **Badge Kategori**: Semua 5 kategori muncul dengan warna masing-masing ✓
- **Status Badge**: Semua "Aktif" dengan badge hijau ✓
- **Label Total**: "Total: 25 artikel" dan "Total: 5 kategori" ✓
- **Tidak ada error Blade** ✓

### `php artisan view:clear` lalu ulang uji:
- Semua URL tetap 200 ✓
- Tampilan konsisten ✓

---

## Gaya Visual yang Diterapkan

### Warna (CSS Variables):
- `--biru-utama: #1D4ED8` — Tombol, link, status aktif
- `--navy: #0F2A5C` — Navbar, footer, header tabel
- `--biru-muda: #EFF6FF` — Latar bagian, header tabel
- `--teks: #1F2937` — Teks utama
- `--latar: #F8FAFC` — Latar halaman

### Font & Ikon:
- **Font**: Inter (Google Fonts) — 400, 500, 600, 700
- **Ikon**: Bootstrap Icons 1.11.3 (CDN)

### Komponen:
- **Kartu**: Putih, rounded-12, shadow-sm, hover `translateY(-4px)`
- **Badge Kategori**: Soft background + dark text same hue
  - Pemerintahan: biru (`#dbeafe` / `#1e40af`)
  - Pendidikan: hijau (`#dcfce7` / `#166534`)
  - Pelayanan Publik: teal (`#ccfbf1` / `#115e59`)
  - Kesehatan: merah (`#fee2e2` / `#991b1b`)
  - Infrastruktur: oranye (`#ffedd5` / `#9a3412`)
- **Placeholder Gambar**: Blok gradien biru + ikon Bootstrap Icons
- **Semua teks UI**: Bahasa Indonesia

---

## URL yang Bisa Dibuka (Setelah `php artisan serve` atau `php -S 127.0.0.1:8080 -t public`):

- `http://127.0.0.1:8000/` atau `http://127.0.0.1:8080/` — Beranda
- `http://127.0.0.1:8000/artikel` atau `http://127.0.0.1:8080/artikel` — Daftar Artikel
- `http://127.0.0.1:8000/artikel/{slug}` — Detail Artikel
- `http://127.0.0.1:8000/data` atau `http://127.0.0.1:8080/data` — Data Artikel & Kategori
- `http://127.0.0.1:8000/portal` atau `http://127.0.0.1:8080/portal` — Portal
- `http://127.0.0.1:8000/admin/artikel` — Admin Artikel (login required)

---

## Catatan:
- `.env` dan `opencode.json` **tidak ter-commit** (sudah di-ignore Git)
- Branch `ui-bagus` siap untuk review, **BELUM di-push** menunggu konfirmasi