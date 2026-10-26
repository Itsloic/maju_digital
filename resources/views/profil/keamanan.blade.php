<x-layout title="Keamanan Akun">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header" style="background-color: var(--navy); color: white;">
                        <h2 class="mb-0 fw-semibold">Autentikasi Dua Faktor (2FA)</h2>
                    </div>
                    <div class="card-body">
                        @if (auth()->user()->two_factor_secret)
                            <div class="alert alert-success d-flex align-items-center justify-content-between">
                                <div>
                                    <strong>2FA Aktif</strong>
                                    <p class="mb-0 small">Autentikasi dua faktor sudah diaktifkan untuk akun Anda.</p>
                                </div>
                                <form method="POST" action="{{ route('two-factor.disable') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menonaktifkan 2FA?')">
                                        <i class="bi bi-shield-lock me-1"></i>Nonaktifkan
                                    </button>
                                </form>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h6>Kode Pemulihan (Recovery Codes)</h6>
                                    <p class="text-muted small">Simpan kode-kode ini di tempat yang aman. Setiap kode hanya bisa digunakan sekali.</p>
                                    <div class="border p-3 rounded" style="background-color: #f8f9fa;">
                                        @if (session('recovery-codes'))
                                            <ul class="list-unstyled mb-0 small">
                                                @foreach (session('recovery-codes') as $code)
                                                    <li class="font-monospace">{{ $code }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted small mb-0">Kode pemulihan tidak ditampilkan lagi. Klik tombol di bawah untuk membuat kode baru.</p>
                                        @endif
                                    </div>
                                    <div class="mt-2">
                                        <form method="POST" action="{{ route('two-factor.recovery-codes') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                <i class="bi bi-arrow-clockwise me-1"></i>Buat Kode Pemulihan Baru
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6>QR Code & Setup Key</h6>
                                    <p class="text-muted small">Gunakan aplikasi autentikator (Google Authenticator, Authy, dll) untuk memindai QR code atau memasukkan setup key.</p>
                                    <a href="{{ route('two-factor.qr-code') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-qr-code me-1"></i>Lihat QR Code
                                    </a>
                                    <a href="{{ route('two-factor.secret-key') }}" target="_blank" class="btn btn-sm btn-outline-secondary ms-2">
                                        <i class="bi bi-key me-1"></i>Lihat Setup Key
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-warning d-flex align-items-center justify-content-between">
                                <div>
                                    <strong>2FA Belum Aktif</strong>
                                    <p class="mb-0 small">Aktifkan autentikasi dua faktor untuk keamanan tambahan.</p>
                                </div>
                                <form method="POST" action="{{ route('two-factor.enable') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-shield-check me-1"></i>Aktifkan 2FA
                                    </button>
                                </form>
                            </div>

                            @if (session('two_factor_secret'))
                                <div class="alert alert-info">
                                    <h6>Setup Key (masukkan manual ke aplikasi autentikator):</h6>
                                    <code class="d-block p-2" style="background-color: #f8f9fa;">{{ session('two_factor_secret') }}</code>
                                    <p class="mb-0 mt-2 small">Atau pindai QR code di bawah:</p>
                                    <img src="{{ $user->twoFactorQrCodeSvg() }}" alt="QR Code 2FA" class="mt-2" style="max-width: 200px;">
                                </div>

                                <form method="POST" action="{{ route('two-factor.confirm') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Masukkan Kode 6 Digit dari Aplikasi Authenticator</label>
                                        <input type="text" id="code" name="code" class="form-control" required autocomplete="one-time-code" autofocus maxlength="6" pattern="\d{6}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Konfirmasi & Aktifkan</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header" style="background-color: var(--navy); color: white;">
                        <h2 class="mb-0 fw-semibold">Ganti Kata Sandi</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                                <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required autocomplete="current-password">
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi Baru</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn" style="background-color: var(--biru-utama); color: white;">
                                <i class="bi bi-key me-1"></i>Perbarui Kata Sandi
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: var(--navy); color: white;">
                        <h2 class="mb-0 fw-semibold">Sesi Aktif</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Kelola sesi login Anda di perangkat lain.</p>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-box-arrow-right me-1"></i>Keluar dari Semua Perangkat
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>