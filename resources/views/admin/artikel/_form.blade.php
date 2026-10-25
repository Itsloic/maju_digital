
<div class="mb-3">
    <label for="title" class="form-label fw-medium">Judul artikel <span class="text-danger">*</span></label>
    <input
        id="title"
        type="text"
        name="title"
        value="{{ old('title', $article?->title ?? '') }}"
        maxlength="255"
        required
        class="form-control"
    >
</div>

<div class="mb-3">
    <label for="category_id" class="form-label fw-medium">Kategori berita</label>
    <select id="category_id" name="category_id" class="form-select">
        <option value="">Pilih kategori</option>

        @foreach ($categories as $category)
            <option
                value="{{ $category->id }}"
                @selected(
                    (string) old('category_id', $article?->category_id ?? '')
                    === (string) $category->id
                )
            >
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="excerpt" class="form-label fw-medium">Ringkasan artikel</label>
    <textarea
        id="excerpt"
        name="excerpt"
        rows="3"
        class="form-control"
    >{{ old('excerpt', $article?->excerpt ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="content" class="form-label fw-medium">Isi artikel <span class="text-danger">*</span></label>
    <textarea
        id="content"
        name="content"
        rows="12"
        required
        class="form-control"
    >{{ old('content', $article?->content ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="image" class="form-label fw-medium">Gambar artikel</label>
    <input
        id="image"
        type="file"
        name="image"
        accept="image/*"
        class="form-control"
    >
    <div class="form-text">Opsional. Ukuran maksimal 5 MB.</div>

    @if ($article?->image)
        <div class="mt-2">
            <p class="fw-medium mb-1">Gambar saat ini:</p>
            <img
                src="{{ asset('storage/' . $article->image) }}"
                alt="Gambar artikel"
                style="max-width:220px; height: auto; border-radius: 8px;"
            >
        </div>
    @endif
</div>

<div class="mb-3">
    <label for="status" class="form-label fw-medium">Status artikel <span class="text-danger">*</span></label>
    <select id="status" name="status" required class="form-select">
        <option
            value="draft"
            @selected(old('status', $article?->status ?? 'draft') === 'draft')
        >
            Draf
        </option>
        <option
            value="published"
            @selected(old('status', $article?->status ?? 'draft') === 'published')
        >
            Terbitkan
        </option>
    </select>
</div>

<div class="mb-3">
    <div class="form-check">
        <input
            type="checkbox"
            name="is_featured"
            value="1"
            id="is_featured"
            class="form-check-input"
            @checked(old('is_featured', $article?->is_featured ?? false))
        >
        <label class="form-check-label" for="is_featured">Jadikan berita unggulan</label>
    </div>
</div>

<div class="d-flex gap-2">
    <button type="submit" class="btn" style="background-color: var(--biru-utama); color: white;">
        {{ $submitLabel }}
    </button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.artikel.index') }}">
        Kembali
    </a>
</div>
