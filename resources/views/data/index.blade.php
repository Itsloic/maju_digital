<x-layout title="Data Artikel & Kategori">
    <div class="container my-5">
        <h1 class="mb-4">Data Artikel & Kategori</h1>

        <section class="mb-5">
            <h2 class="mb-3">Tabel Artikel</h2>
            <p class="text-muted mb-3">Total: {{ $artikel->count() }} artikel</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-light">
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
                                <td>{{ $item->kategoriRelasi?->name ?? '-' }}</td>
                                <td>{{ $item->penulisAkun?->name ?? '-' }}</td>
                                <td>{{ $item->penulisAkun?->level?->nama_level ?? '-' }}</td>
                                <td>{{ $item->tanggal_publikasi?->format('d-m-Y') ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data artikel</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <h2 class="mb-3">Tabel Kategori</h2>
            <p class="text-muted mb-3">Total: {{ $kategori->count() }} kategori</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-light">
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
                                    <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                </td>
                                <td>{{ $item->artikel_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data kategori</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layout>