@props(['kategori'])

@php
    $kelas = match (strtolower($kategori)) {
        'pemerintahan' => 'badge-pemerintahan',
        'pendidikan' => 'badge-pendidikan',
        'pelayanan publik' => 'badge-pelayanan',
        'kesehatan' => 'badge-kesehatan',
        'infrastruktur' => 'badge-infrastruktur',
        default => 'badge-default'
    };
@endphp

<span {{ $attributes->merge(['class' => 'badge px-3 py-2 ' . $kelas]) }}>
    {{ $kategori }}
</span>