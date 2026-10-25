<footer class="footer py-5 mt-auto" style="background-color: var(--navy);">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4">
                <h5 class="fw-bold mb-2">Pemerintah Kabupaten Maju Digital</h5>
                <p class="small mb-2">
                    Portal Maju Digital — Informasi Publik yang Transparan dan Terpercaya
                </p>
                <p class="small mb-0">
                    Jl. Merdeka No. 1, Kabupaten Maju Digital
                </p>
            </div>
            <div class="col-lg-2 col-md-4">
                <h6 class="fw-bold mb-3">Menu</h6>
                <ul class="list-unstyled small">
                    <li class="mb-1"><a href="{{ route('beranda') }}" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="mb-1"><a href="{{ route('artikel.index') }}" class="text-white text-decoration-none">Artikel</a></li>
                    <li class="mb-1"><a href="{{ route('data.index') }}" class="text-white text-decoration-none">Data</a></li>
                    <li class="mb-1"><a href="{{ route('portal') }}" class="text-white text-decoration-none">Portal</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h6 class="fw-bold mb-3">Kontak</h6>
                <ul class="list-unstyled small">
                    <li class="mb-1"><i class="bi bi-envelope me-1"></i> info@majudigital.go.id</li>
                    <li class="mb-1"><i class="bi bi-telephone me-1"></i> (021) 1234 5678</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h6 class="fw-bold mb-3">Media Sosial</h6>
                <ul class="list-unstyled small">
                    <li class="mb-1"><a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook me-1"></i> Facebook</a></li>
                    <li class="mb-1"><a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter-x me-1"></i> X (Twitter)</a></li>
                    <li class="mb-1"><a href="#" class="text-white text-decoration-none"><i class="bi bi-instagram me-1"></i> Instagram</a></li>
                    <li class="mb-1"><a href="#" class="text-white text-decoration-none"><i class="bi bi-youtube me-1"></i> YouTube</a></li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary my-4">
        <p class="small text-center text-white-50 mb-0">
            &copy; {{ date('Y') }} Pemerintah Kabupaten Maju Digital. Seluruh hak cipta dilindungi.
        </p>
    </div>
</footer>