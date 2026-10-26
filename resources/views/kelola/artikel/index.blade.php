<x-layout title="Kelola Artikel">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold mb-0">Kelola Artikel</h1>
            @can('tambah-artikel')
                <a href="{{ route('kelola.artikel.create') }}" class="btn" style="background-color: var(--biru-utama); color: white;">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Artikel
                </a>
            @endcan
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background-color: var(--biru-muda);">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Tanggal Publikasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($artikels as $artikel)
                                <tr>
                                    <td>{{ $artikel->id_artikel }}</td>
                                    <td>{{ Str::limit($artikel->judul, 50) }}</td>
                                    <td>
                                        <x-kategori-badge :kategori="$artikel->kategoriRelasi?->name ?? '-'" />
                                    </td>
                                    <td>{{ $artikel->penulisAkun?->name ?? '-' }}</td>
                                    <td>{{ $artikel->tanggal_publikasi?->format('d-m-Y') ?? '-' }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            @can('ubah-artikel', $artikel)
                                                <a href="{{ route('kelola.artikel.edit', $artikel) }}" class="btn btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            @endcan
                                            @can('hapus-artikel', $artikel)
                                                <form method="POST" action="{{ route('kelola.artikel.destroy', $artikel) }}" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Tidak ada data artikel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light">
                {{ $artikels->links() }}
            </div>
        </div>
    </div>
</x-layout>