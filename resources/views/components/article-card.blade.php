<article
    class="article-card"
    data-category="{{ $article->category?->slug ?? 'informasi' }}"
    data-title="{{ $article->title }}"
    data-excerpt="{{ $article->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 180) }}"
    data-label="{{ $article->category?->name ?? 'Informasi Publik' }}"
>
    <a
        href="{{ route('berita.show', ['slug' => $article->slug]) }}"
        class="article-image"
    >
        @if ($article->image)
            <img
                src="{{ asset('storage/' . $article->image) }}"
                alt="{{ $article->title }}"
                loading="lazy"
            >
        @else
            <div class="article-image-placeholder">
                Gambar belum tersedia
            </div>
        @endif
    </a>

    <div class="article-copy">
        <span class="article-category">
            {{ mb_strtoupper($article->category?->name ?? 'Informasi Publik') }}
        </span>

        <h3 class="article-title">
            <a href="{{ route('berita.show', ['slug' => $article->slug]) }}">
                {{ $article->title }}
            </a>
        </h3>

        <p class="article-description">
            {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}
        </p>

        <div class="article-meta">
            <span>{{ $article->published_at?->format('d M Y') ?? 'BELUM TERBIT' }}</span>
            <span class="sep">•</span>
            <span>BERITA MAJU DIGITAL</span>
        </div>
    </div>
</article>