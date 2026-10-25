<div class="card h-100 shadow-sm">
    @if ($artikel->gambar && file_exists(public_path('storage/' . $artikel->gambar)))
        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 200px; object-fit: cover;">
    @else
        <div class="img-placeholder">
            <i class="bi bi-file-earmark-text"></i>
        </div>
    @endif
    
    <div class="card-body d-flex flex-column">
        <x-kategori-badge :kategori="$artikel->kategori" class="mb-2" style="width: fit-content;" />
        
        <h5 class="card-title">{{ $artikel->judul }}</h5>
        
        <p class="card-text flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
            {{ \Illuminate\Support\Str::limit($artikel->ringkasan, 150) }}
        </p>
        
        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
            <small class="text-muted">{{ $artikel->tanggal_publikasi->format('d M Y') }}</small>
            <a href="{{ route('artikel.show', $artikel) }}" class="btn btn-sm" style="background-color: var(--biru-utama); color: white;">
                Baca selengkapnya
            </a>
        </div>
    </div>
</div>
