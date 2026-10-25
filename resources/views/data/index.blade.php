<x-layout title="Data Artikel & Kategori">
    <div class="container py-5">
        <h1 class="fw-bold mb-4">Data Artikel dan Kategori</h1>

        <!-- Tabel Artikel -->
        <section class="mb-5">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: var(--navy); color: white;">
                    <h2 class="mb-0 fw-semibold">Tabel Artikel</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: var(--biru-muda);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Level Penulis</th>
                                    <th scope="col">Tanggal Publikasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($artikel as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->id_artikel }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>
                                            <x-kategori-badge :kategori="$item->kategoriRelasi?->name ?? '-'" />
                                        </td>
                                        <td>{{ $item->penulisAkun?->name ?? '-' }}</td>
                                        <td>{{ $item->penulisAkun?->level?->nama_level ?? '-' }}</td>
                                        <td>{{ $item->tanggal_publikasi?->format('d-m-Y') ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5 text-muted">Tidak ada data artikel</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <span class="fw-medium">Total: {{ $artikel->count() }} artikel</span>
                </div>
            </div>
        </section>

        <!-- Tabel Kategori -->
        <section>
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: var(--navy); color: white;">
                    <h2 class="mb-0 fw-semibold">Tabel Kategori</h2>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: var(--biru-muda);">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Jumlah Artikel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td>
                                            @php
                                                $status = $item->status_aktif ? 'Aktif' : 'Nonaktif';
                                                $badgeClass = $item->status_aktif ? 'bg-success' : 'bg-secondary';
                                            @endphp
                                            <span class="badge px-3 py-2 {{ $badgeClass }}">{{ $status }}</span>
                                        </td>
                                        <td>{{ $item->artikel_count }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">Tidak ada data kategori</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-light">
                    <span class="fw-medium">Total: {{ $kategori->count() }} kategori</span>
                </div>
            </div>
        </section>
    </div>
</x-layout>