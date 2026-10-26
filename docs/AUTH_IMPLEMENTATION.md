# Autentikasi dan Otorisasi Implementation

## File yang Dibuat/Diubah

### Konfigurasi
- `config/fortify.php`: Konfigurasi fitur Fortify.
- `config/auth.php`: Menambahkan sanctum guard.
- `config/sanctum.php`: Konfigurasi ekspresi token API.
- `bootstrap/providers.php`: Registrasi FortifyServiceProvider.
- `bootstrap/app.php`: Registrasi middleware `2fa.admin`.
- `.env`: Penyesuaian lokal dan konfigurasi locale `id`.

### Model
- `app/Models/User.php`: Menambahkan `TwoFactorAuthenticatable`, `MustVerifyEmail`, `HasApiTokens`.

### Actions (Fortify)
- `app/Actions/Fortify/CreateNewUser.php`: Registrasi dengan level 4 (Masyarakat).
- `app/Actions/Fortify/PasswordValidationRules.php`: Aturan password kuat (min 12, mix case, number, symbol).
- `app/Actions/Fortify/ResetUserPassword.php`: Menggunakan Hash password.
- `app/Actions/Fortify/UpdateUserPassword.php`: Logout dari semua perangkat lain.
- `app/Actions/Fortify/UpdateUserProfileInformation.php`: Update profil.

### Controllers
- `app/Http/Controllers/ArtikelManageController.php`: Manajemen CRUD artikel dengan Gate.
- `app/Http/Controllers/AdminUserController.php`: Manajemen pengguna khusus Admin.
- `app/Http/Controllers/Api/AuthController.php`: API Auth.
- `app/Http/Controllers/Api/ArtikelController.php`: API Artikel.

### Middleware
- `app/Http/Middleware/EnsureTwoFactorForAdministrator.php`: Proteksi Admin dengan 2FA.

### Views
- `resources/views/auth/*.blade.php`: Views autentikasi.
- `resources/views/profil/keamanan.blade.php`: Halaman 2FA & ganti password.
- `resources/views/admin/users/*.blade.php`: CRUD user.
- `resources/views/kelola/artikel/*.blade.php`: CRUD artikel.
- `resources/views/components/navbar.blade.php`: Perubahan navbar auth.

### Testing
- `tests/Feature/AuthAuthzFeatureTest.php`: Tes autentikasi & otorisasi.
- `tests/Feature/ApiAuthTest.php`: Tes API Sanctum.

## Matriks Akses

| Fitur | Admin (1) | Editor (2) | Penulis (3) | Masyarakat (4) |
| :--- | :---: | :---: | :---: | :---: |
| Lihat Tabel Data | V | V | | |
| Tambah Artikel | V | V | V | |
| Ubah Artikel (Milik) | V | V | V | |
| Ubah Artikel (Semua) | V | V | | |
| Hapus Artikel | V | | | |
| Kelola User | V | | | |

## Demo Langkah demi Langkah

1. **Akses Tabel (Admin/Editor)**:
    - Akun: `hendra.gunawan@majudigital.go.id` (Admin), `siti.marlina@majudigital.go.id` (Editor).
    - Password: `MajuDigital#2026`.
2. **Akses Tabel (Penulis/Masyarakat)**:
    - Akun: `rina.wulandari@majudigital.go.id` (Penulis), `masyarakat@test.com` (Masyarakat).
    - Status: 403 Forbidden.
3. **Admin 2FA**:
    - Login sebagai Admin.
    - Akses `/admin/users`.
    - Redirect ke `/profil/keamanan`.
    - Aktifkan 2FA dengan aplikasi Authenticator.
4. **API**:
    - `POST /api/login` -> dapatkan `access_token`.
    - Gunakan token di Header `Authorization: Bearer <token>` untuk request `/api/artikel`.

## Keterbatasan
- **Password**: Password default seeder adalah `MajuDigital#2026` (bisa diubah via `SEED_DEFAULT_PASSWORD` di `.env`).
- **HTTPS**: Wajib diaktifkan di lingkungan produksi (`SESSION_SECURE_COOKIE=true` di `.env`).
- **API**: Laravel Sanctum tidak menyediakan *refresh token*.
- **Login Web**: Menggunakan sistem autentikasi `Fortify` yang memanggil `attempt()` untuk verifikasi kredensial.
- **Route**: Route tabel data diakses melalui `/data` (bukan `/tabel/artikel` atau `/tabel/kategori`).

## Daftar Route Utama
| URI | Nama Route | Middleware |
| :--- | :--- | :--- |
| `/data` | `data.index` | `auth`, `verified`, `can:lihat-tabel-data` |
| `/kelola/artikel` | `kelola.artikel.index` | `auth`, `verified` |
| `/admin/users` | `admin.users.index` | `auth`, `verified`, `can:kelola-user`, `2fa.admin`, `password.confirm` |
| `/profil/keamanan` | `profil.keamanan` | `auth`, `verified` |
| `/api/artikel` | - | `auth:sanctum` |
