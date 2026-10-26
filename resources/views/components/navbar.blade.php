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
            <ul class="navbar-nav me-auto">
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

            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('login') ? 'active' : '' }}"
                           href="{{ route('login') }}">Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 {{ request()->routeIs('register') ? 'active' : '' }}"
                           href="{{ route('register') }}">Daftar</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link px-3 dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">{{ auth()->user()->level?->nama_level ?? 'Masyarakat' }}</h6></li>
                            <li><hr class="dropdown-divider"></li>
                            @can('lihat-tabel-data')
                                <li><a class="dropdown-item" href="{{ route('data.index') }}"><i class="bi bi-table me-2"></i>Tabel Data</a></li>
                            @endcan
                            <li><a class="dropdown-item" href="{{ route('profil.keamanan') }}"><i class="bi bi-shield-lock me-2"></i>Keamanan Akun</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
