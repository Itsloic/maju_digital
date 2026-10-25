<x-layout title="Daftar Artikel">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">Daftar Artikel</h2>
            <span class="text-muted">Total: {{ $artikels->total() }} artikel</span>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($artikels as $artikel)
                <div class="col">
                    <x-artikel-card :artikel="$artikel" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-newspaper" style="font-size: 3rem; color: var(--biru-utama);"></i>
                    <h4 class="mt-3">Belum ada artikel</h4>
                    <p class="text-muted">Artikel akan muncul di sini setelah ditambahkan.</p>
                </div>
            @endforelse
        </div>
        
        @if ($artikels->hasPages())
            <nav class="mt-5" aria-label="Pagination">
                <div class="d-flex justify-content-center">
                    {{ $artikels->links() }}
                </div>
            </nav>
        @endif
    </div>
</x-layout>
