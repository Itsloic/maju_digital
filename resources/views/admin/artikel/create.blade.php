
<x-layout title="Tambah Artikel">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold mb-1">Tambah Artikel</h1>
            </div>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>Kembali
            </a>
        </div>

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
            <div class="card-body">
                <form
                    action="{{ route('admin.artikel.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    @include('admin.artikel._form', [
                        'article' => null,
                        'submitLabel' => 'Simpan Artikel'
                    ])
                </form>
            </div>
        </div>
    </div>
</x-layout>
