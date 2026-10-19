<div class="card h-100 shadow-sm">
    <div class="card-body">
        <x-kategori-badge :kategori="$artikel->kategori" />

        <h5 class="card-title mt-2">{{ $artikel->judul }}</h5>

        <p class="card-text">
            {{ \Illuminate\Support\Str::limit($artikel->ringkasan, 120) }}
        </p>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">{{ $artikel->tanggal_publikasi->format('d M Y') }}</small>
        <a href="{{ route('artikel.show', $artikel) }}"
            class="btn btn-sm btn-primary">Baca selengkapnya</a>
    </div>
</div>
