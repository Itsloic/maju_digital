<x-layout title="Edit Pengguna">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: var(--navy); color: white;">
                        <h2 class="mb-0 fw-semibold">Edit Pengguna</h2>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="level_id" class="form-label">Level</label>
                                <select id="level_id" name="level_id" class="form-select @error('level_id') is-invalid @enderror" required>
                                    <option value="">Pilih Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id_level }}" {{ old('level_id', $user->level_id) == $level->id_level ? 'selected' : '' }}>
                                            {{ $level->nama_level }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('level_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-1"></i>
                                Kata sandi tidak ditampilkan. Kosongkan jika tidak ingin mengubah.
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn flex-grow-1" style="background-color: var(--biru-utama); color: white;">
                                    <i class="bi bi-save me-1"></i>Perbarui
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