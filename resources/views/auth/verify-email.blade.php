<x-layout title="Verifikasi E-mail">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h1 class="fw-bold mb-4">Verifikasi E-mail Anda</h1>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success" role="alert">
                                Tautan verifikasi baru telah dikirim ke alamat e-mail Anda.
                            </div>
                        @endif

                        <p class="text-muted mb-4">
                            Sebelum melanjutkan, silakan periksa e-mail Anda untuk tautan verifikasi. Jika Anda tidak menerima e-mail tersebut, kami dengan senang hati akan mengirimkan yang baru.
                        </p>

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn w-100 py-2 mb-3" style="background-color: var(--biru-utama); color: white;">
                                Kirim Ulang E-mail Verifikasi
                            </button>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary w-100 py-2">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>