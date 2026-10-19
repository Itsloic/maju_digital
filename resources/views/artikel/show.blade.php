<x-layout :title="$artikel->judul">
    <div class="container my-5">
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary mb-3">Kembali ke daftar artikel</a>
        
        <x-artikel-header :artikel="$artikel" />

        @if ($artikel->gambar)
            <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $artikel->judul }}">
        @endif

        <article class="fs-5">
            {!! nl2br(e($artikel->isi)) !!}
        </article>
    </div>
</x-layout>
