<x-layout :title="$artikel->judul">
    <div class="container py-5">
        <a href="{{ route('artikel.index') }}" class="btn btn-sm mb-4" style="background-color: var(--biru-muda); color: var(--biru-utama); border: none;">
            <i class="bi bi-arrow-left me-1"></i>Kembali ke daftar artikel
        </a>
        
        <x-artikel-header :artikel="$artikel" />

        @if ($artikel->gambar && file_exists(public_path('storage/' . $artikel->gambar)))
            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded-4 mb-4 w-100" alt="{{ $artikel->judul }}" style="max-height: 500px; object-fit: cover;">
        @else
            <div class="img-placeholder rounded-4 mb-4">
                <i class="bi bi-image"></i>
            </div>
        @endif

        <article style="max-width: 720px; line-height: 1.8; font-size: 1.1rem;">
            {!! nl2br(e($artikel->isi)) !!}
        </article>
        
        <hr class="my-5">
        <a href="{{ route('artikel.index') }}" class="btn" style="background-color: var(--biru-utama); color: white;">
            <i class="bi bi-arrow-left me-1"></i>Kembali
        </a>
    </div>
</x-layout>
