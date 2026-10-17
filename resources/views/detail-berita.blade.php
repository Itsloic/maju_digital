
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} | Maju Digital</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: #202e39;
            background: #f3f5f6;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.8;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .header {
            padding: 24px 5%;
            background: #153752;
            color: white;
            border-bottom: 4px solid #c7a45e;
        }

        .brand {
            font: bold 28px Georgia, serif;
        }

        .brand small {
            display: block;
            margin-top: 4px;
            color: #e3cf9b;
            font: 10px Arial, sans-serif;
            letter-spacing: 1.5px;
        }

        .container {
            width: min(1100px, 92%);
            margin: 32px auto 60px;
        }

        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #347da8;
            font-size: 13px;
            font-weight: bold;
        }

        .article {
            padding: clamp(22px, 5vw, 55px);
            background: white;
            border: 1px solid #dce2e6;
        }

        .category {
            color: #98763c;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        h1 {
            margin: 12px 0;
            color: #153752;
            font: bold clamp(30px, 5vw, 46px)/1.25 Georgia, serif;
        }

        .excerpt {
            color: #657582;
            font-size: 17px;
        }

        .meta {
            margin: 20px 0;
            padding-bottom: 20px;
            border-bottom: 1px solid #dce2e6;
            color: #71808b;
            font-size: 12px;
        }

        .cover {
            display: block;
            width: 100%;
            max-height: 520px;
            aspect-ratio: 16 / 9;
            object-fit: cover;
            background: #e8ecef;
        }

        .content {
            max-width: 760px;
            margin: 30px auto;
            font-size: 16px;
            overflow-wrap: anywhere;
        }

        .related {
            margin-top: 45px;
            padding-top: 25px;
            border-top: 2px solid #153752;
        }

        .related h2 {
            color: #153752;
            font: bold 26px Georgia, serif;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .related-card {
            padding: 18px;
            border: 1px solid #dce2e6;
            background: white;
        }

        .related-card small {
            color: #98763c;
            font-weight: bold;
        }

        .related-card h3 {
            color: #153752;
            font: bold 18px/1.5 Georgia, serif;
        }

        footer {
            padding: 24px 5%;
            background: #102a3e;
            color: white;
            font-size: 12px;
        }

        @media (max-width: 650px) {
            .related-grid {
                grid-template-columns: 1fr;
            }

            .article {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="{{ route('berita.index') }}" class="brand">
            MAJU DIGITAL
            <small>INFORMASI TERBUKA, PELAYANAN TERPERCAYA</small>
        </a>
    </header>

    <main class="container">
        <a href="{{ route('berita.index') }}" class="back">
            ← Kembali ke daftar berita
        </a>

        <article class="article">
            <div class="category">
                {{ $article->category?->name ?? 'Informasi Publik' }}
            </div>

            <h1>{{ $article->title }}</h1>

            @if ($article->excerpt)
                <p class="excerpt">{{ $article->excerpt }}</p>
            @endif

            <div class="meta">
                {{ $article->published_at
                    ? $article->published_at->format('d F Y')
                    : 'Tanggal belum tersedia' }}
                &nbsp; • &nbsp;
                {{ $article->author?->name ?? 'Redaksi Maju Digital' }}
            </div>

            @if ($article->image)
                <img
                    class="cover"
                    src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->title }}"
                >
            @else
                <img
                    class="cover"
                    src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1400&q=85"
                    alt="Ilustrasi berita Maju Digital"
                >
            @endif

            <div class="content">
                {!! nl2br(e($article->content)) !!}
            </div>

            @if ($relatedArticles->isNotEmpty())
                <section class="related">
                    <h2>Berita Lainnya</h2>

                    <div class="related-grid">
                        @foreach ($relatedArticles as $related)
                            <a
                                class="related-card"
                                href="{{ route('berita.show', ['slug' => $related->slug]) }}"
                            >
                                <small>
                                    {{ $related->category?->name ?? 'Berita' }}
                                </small>

                                <h3>{{ $related->title }}</h3>

                                <span>Baca selengkapnya →</span>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </article>
    </main>

    <footer>
        © 2026 Maju Digital — Portal Informasi Publik
    </footer>
</body>
</html>
