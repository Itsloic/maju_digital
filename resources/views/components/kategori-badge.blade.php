@props(['kategori'])

@php
    $warna = match (strtolower($kategori)) {
        'pemerintahan' => 'bg-primary',
        'pendidikan' => 'bg-info text-dark',
        'pelayanan publik' => 'bg-warning text-dark',
        'kesehatan' => 'bg-success',
        'infrastruktur' => 'bg-danger',
        default => 'bg-secondary'
    };
@endphp

<span {{ $attributes->merge(['class' => 'badge ' . $warna]) }}>
    {{ $kategori }}
</span>