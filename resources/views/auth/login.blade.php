<x-layout title="Masuk">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="fw-bold mb-4 text-center">Masuk</h1>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Ingat saya</label>
                            </div>

                            <button type="submit" class="btn w-100 py-2" style="background-color: var(--biru-utama); color: white;">
                                Masuk
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <a href="{{ route('password.request') }}" class="text-decoration-none small">Lupa kata sandi?</a>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted">Belum punya akun? </span>
                            <a href="{{ route('register') }}" class="text-decoration-none">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>