<x-layout title="Daftar Artikel">
    <div class="container my-5">
        <h2 class="mb-4">Daftar Artikel</h2>
        <p>Total artikel: {{ $artikels->total() }}</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse ($artikels as $artikel)
                <div class="col">
                    <x-artikel-card :artikel="$artikel" />
                </div>
            @empty
                <p>Belum ada artikel.</p>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $artikels->links() }}
        </div>
    </div>
</x-layout>
