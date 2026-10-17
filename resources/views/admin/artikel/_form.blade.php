
<div class="field">
    <label for="title">Judul artikel *</label>
    <input
        id="title"
        type="text"
        name="title"
        value="{{ old('title', $article?->title ?? '') }}"
        maxlength="255"
        required
    >
</div>

<div class="field">
    <label for="category_id">Kategori berita</label>
    <select id="category_id" name="category_id">
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

<div class="field">
    <label for="excerpt">Ringkasan artikel</label>
    <textarea
        id="excerpt"
        name="excerpt"
        rows="3"
    >{{ old('excerpt', $article?->excerpt ?? '') }}</textarea>
</div>

<div class="field">
    <label for="content">Isi artikel *</label>
    <textarea
        id="content"
        name="content"
        rows="12"
        required
    >{{ old('content', $article?->content ?? '') }}</textarea>
</div>

<div class="field">
    <label for="image">Gambar artikel</label>
    <input
        id="image"
        type="file"
        name="image"
        accept="image/*"
    >
    <small>Opsional. Ukuran maksimal 5 MB.</small>

    @if ($article?->image)
        <p>Gambar saat ini:</p>
        <img
            src="{{ asset('storage/' . $article->image) }}"
            alt="Gambar artikel"
            style="max-width:220px;height:auto"
        >
    @endif
</div>

<div class="field">
    <label for="status">Status artikel *</label>
    <select id="status" name="status" required>
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

<div class="field">
    <label>
        <input
            type="checkbox"
            name="is_featured"
            value="1"
            @checked(old('is_featured', $article?->is_featured ?? false))
        >
        Jadikan berita unggulan
    </label>
</div>

<button type="submit">{{ $submitLabel }}</button>

<a
    class="button secondary"
    href="{{ route('admin.artikel.index') }}"
>
    Kembali
</a>
