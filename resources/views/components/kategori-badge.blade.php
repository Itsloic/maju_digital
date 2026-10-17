@props(['kategori'])

@php
    $warna = match (strtolower($kategori)) {
        'berita'     => 'bg-primary',
        'pengumuman' => 'bg-warning text-dark',
        'kegiatan'   => 'bg-success',
        default      => 'bg-secondary',
    };
@endphp

<span {{ $attributes->merge(['class' => 'badge ' . $warna]) }}>
    {{ $kategori }}
</span>