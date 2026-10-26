<x-layout title="Konfirmasi Kata Sandi">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="fw-bold mb-4 text-center">Konfirmasi Kata Sandi</h1>

                        <p class="text-muted mb-4">
                            Ini adalah area terproteksi aplikasi. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.
                        </p>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn w-100 py-2" style="background-color: var(--biru-utama); color: white;">
                                Konfirmasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>