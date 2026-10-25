<x-layout title="Beranda">
    <!-- Hero Section -->
    <section class="container-fluid py-5 mb-5" style="background: linear-gradient(135deg, var(--navy), var(--biru-utama));">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold text-white mb-3">Portal Maju Digital</h1>
                    <p class="lead text-white-75 mb-4" style="max-width: 600px;">Informasi Publik yang Transparan dan Terpercaya</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('artikel.index') }}" class="btn btn-lg px-4" style="background-color: white; color: var(--biru-utama);">
                            <i class="bi bi-newspaper me-2"></i>Baca Artikel
                        </a>
                        <a href="{{ route('data.index') }}" class="btn btn-lg px-4 btn-outline-light">
                            <i class="bi bi-table me-2"></i>Lihat Data
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <img src="{{ asset('img/logo.svg') }}" alt="Maju Digital" width="180" height="180" class="opacity-75">
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Terbaru -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Berita Terbaru</h2>
            <a href="{{ route('artikel.index') }}" class="btn btn-sm" style="background-color: var(--biru-utama); color: white;">
                Lihat semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($artikels as $artikel)
                <div class="col">
                    <x-artikel-card :artikel="$artikel" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada artikel.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Kategori -->
    <section class="container mb-5">
        <h2 class="fw-bold mb-4">Kategori</h2>
        <div class="d-flex flex-wrap gap-3">
            @foreach ($kategoris as $kategori)
                <a href="{{ route('artikel.index', ['kategori' => $kategori->slug]) }}" class="text-decoration-none">
                    <div class="d-flex align-items-center gap-2 px-4 py-2 rounded-pill"
                         style="background-color: {{ $kategori->warna_bg ?? '#f3f4f6' }}; color: {{ $kategori->warna_teks ?? '#374151' }};">
                        <i class="bi {{ $kategori->ikon ?? 'bi-tag' }}"></i>
                        <span class="fw-medium">{{ $kategori->name }}</span>
                        <span class="badge rounded-pill" style="background-color: {{ $kategori->warna_teks ?? '#374151' }}; color: {{ $kategori->warna_bg ?? '#f3f4f6' }};">
                            {{ $kategori->artikel_count ?? 0 }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-layout>
