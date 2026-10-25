
<x-layout title="Kelola Artikel">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <h1 class="fw-bold mb-1">Daftar Artikel</h1>
                <p class="text-muted mb-0">Kelola, perbarui, dan pantau berita yang ditampilkan di website.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('beranda') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-box-arrow-up-right me-1"></i>Lihat Website
                </a>
                <a href="{{ route('admin.artikel.create') }}" class="btn" style="background-color: var(--biru-utama); color: white;">
                    <i class="bi bi-plus me-1"></i>Tambah Artikel
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Periksa kembali data berikut:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header" style="background-color: var(--navy); color: white;">
                <h5 class="mb-0 fw-semibold">Semua Artikel</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background-color: var(--biru-muda);">
                            <tr>
                                <th scope="col" style="width: 60px;">No.</th>
                                <th scope="col">Judul Artikel</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col" style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                @php
                                    $statusClass = match ($article->status) {
                                        'published' => 'bg-success',
                                        'draft' => 'bg-warning text-dark',
                                        default => 'bg-secondary',
                                    };
                                    $statusLabel = match ($article->status) {
                                        'published' => 'Terbit',
                                        'draft' => 'Draf',
                                        default => ucfirst($article->status),
                                    };
                                @endphp
                                <tr>
                                    <td class="text-muted">{{ $articles->firstItem() + $loop->index }}</td>
                                    <td class="fw-medium">{{ $article->title }}</td>
                                    <td>
                                        <x-kategori-badge :kategori="$article->category?->name ?? '-'" />
                                    </td>
                                    <td>
                                        <span class="badge px-3 py-2 {{ $statusClass }}">{{ $statusLabel }}</span>
                                    </td>
                                    <td>{{ $article->created_at?->format('d M Y') ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            @if ($article->status === 'published')
                                                <a
                                                    class="btn btn-sm btn-outline-primary"
                                                    href="{{ route('berita.show', ['slug' => $article->slug]) }}"
                                                    title="Lihat artikel"
                                                >
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            @endif
                                            <a
                                                class="btn btn-sm btn-outline-secondary"
                                                href="{{ route('admin.artikel.edit', ['artikel' => $article->id_artikel]) }}"
                                                title="Edit artikel"
                                            >
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form
                                                action="{{ route('admin.artikel.destroy', ['artikel' => $article->id_artikel]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="btn btn-sm btn-outline-danger"
                                                    type="submit"
                                                    title="Hapus artikel"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="bi bi-newspaper" style="font-size: 2rem;"></i>
                                        <p class="mt-2">Belum ada artikel</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($articles->hasPages())
                <div class="card-footer bg-light">
                    <nav aria-label="Pagination">
                        <div class="d-flex justify-content-center">
                            {{ $articles->links() }}
                        </div>
                    </nav>
                </div>
            @endif
        </div>
    </div>
</x-layout>
