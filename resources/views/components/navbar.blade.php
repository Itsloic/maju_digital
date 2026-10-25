<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: var(--navy);">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('beranda') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo Maju Digital" width="36" height="36">
            <span class="fw-bold">Pemerintah Kabupaten Maju Digital</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuUtama"
                aria-controls="menuUtama" aria-expanded="false"
                aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuUtama">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('beranda') ? 'active' : '' }}"
                       href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('artikel.*') ? 'active' : '' }}"
                       href="{{ route('artikel.index') }}">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('data.index') ? 'active' : '' }}"
                       href="{{ route('data.index') }}">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('portal') ? 'active' : '' }}"
                       href="{{ route('portal') }}">Portal</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
