<x-layout title="Edit Artikel">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: var(--navy); color: white;">
                        <h2 class="mb-0 fw-semibold">Edit Artikel</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('kelola.artikel.update', $artikel) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                                <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $artikel->judul) }}" required maxlength="255" autofocus>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ringkasan" class="form-label">Ringkasan <span class="text-danger">*</span></label>
                                <textarea id="ringkasan" name="ringkasan" class="form-control @error('ringkasan') is-invalid @enderror" rows="3" required>{{ old('ringkasan', $artikel->ringkasan) }}</textarea>
                                @error('ringkasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                                <textarea id="isi" name="isi" class="form-control @error('isi') is-invalid @enderror" rows="10" required>{{ old('isi', $artikel->isi) }}</textarea>
                                @error('isi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                    <select id="kategori_id" name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ old('kategori_id', $artikel->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi <span class="text-danger">*</span></label>
                                    <input type="datetime-local" id="tanggal_publikasi" name="tanggal_publikasi" class="form-control @error('tanggal_publikasi') is-invalid @enderror" value="{{ old('tanggal_publikasi', $artikel->tanggal_publikasi?->format('Y-m-d\TH:i')) }}" required>
                                    @error('tanggal_publikasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar (Opsional)</label>
                                @if ($artikel->gambar)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar saat ini" class="img-thumbnail" style="max-height: 150px;">
                                        <p class="form-text">Gambar saat ini</p>
                                    </div>
                                @endif
                                <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah.</div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn flex-grow-1" style="background-color: var(--biru-utama); color: white;">
                                    <i class="bi bi-save me-1"></i>Perbarui Artikel
                                </button>
                                <a href="{{ route('kelola.artikel.index') }}" class="btn btn-outline-secondary flex-grow-1">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>