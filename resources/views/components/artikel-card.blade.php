<div class="card h-100 shadow-sm">
    <div class="card-body">
        <x-kategori-badge :kategori="$artikel->category?->name ?? 'Umum'" />

        <h5 class="card-title mt-2">{{ $artikel->title }}</h5>

        <p class="card-text">
            {{ \Illuminate\Support\Str::limit($artikel->excerpt, 120) }}
        </p>
    </div>

    <div class="card-footer d-flex justify-content-between align-items-center">
        <small class="text-muted">{{ $artikel->published_at?->format('d M Y') }}</small>
        <a href="{{ route('berita.show', ['slug' => $artikel->slug]) }}"
           class="btn btn-sm btn-primary">Baca selengkapnya</a>
    </div>
</div>