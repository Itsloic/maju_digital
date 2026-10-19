<x-layout title="Beranda">
    <div class="container my-5">
        <h2 class="mb-4">Berita Terbaru</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($artikels as $artikel)
                <div class="col">
                    <x-artikel-card :artikel="$artikel" />
                </div>
            @empty
                <p>Belum ada artikel.</p>
            @endforelse
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('artikel.index') }}" class="btn btn-primary">Lihat semua artikel</a>
        </div>
    </div>
</x-layout>
