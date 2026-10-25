<div class="mb-4">
    <nav aria-label="Breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0" style="background: transparent; padding: 0;">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}" class="text-decoration-none">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
        </ol>
    </nav>
    
    <x-kategori-badge :kategori="$artikel->kategori" class="mb-2" />
    
    <h1 class="fw-bold" style="font-size: 2.5rem; line-height: 1.2;">{{ $artikel->judul }}</h1>
    
    <div class="d-flex flex-wrap gap-3 mt-3 text-muted">
        <span><i class="bi bi-person me-1"></i> <strong>{{ $artikel->penulis }}</strong></span>
        <span><i class="bi bi-calendar me-1"></i> {{ $artikel->tanggal_publikasi->format('d F Y') }}</span>
    </div>
</div>
