<x-layout title="Tambah Pengguna">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: var(--navy); color: white;">
                        <h2 class="mb-0 fw-semibold">Tambah Pengguna Baru</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('admin.users.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Minimal 12 karakter, huruf besar, kecil, angka, dan simbol.</div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                            </div>

                            <div class="mb-3">
                                <label for="level_id" class="form-label">Level</label>
                                <select id="level_id" name="level_id" class="form-select @error('level_id') is-invalid @enderror" required>
                                    <option value="">Pilih Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id_level }}">{{ $level->nama_level }}</option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn flex-grow-1" style="background-color: var(--biru-utama); color: white;">
                                    <i class="bi bi-person-plus me-1"></i>Simpan
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary flex-grow-1">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>