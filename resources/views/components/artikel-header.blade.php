<div class="mb-4">
    <x-kategori-badge :kategori="$artikel->kategori" />
    <h1 class="fw-bold mt-2">{{ $artikel->judul }}</h1>
    <p class="text-muted">
        Oleh <strong>{{ $artikel->penulis }}</strong> pada {{ $artikel->tanggal_publikasi->format('d F Y') }}
    </p>
</div>
