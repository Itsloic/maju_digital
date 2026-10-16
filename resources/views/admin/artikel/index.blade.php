
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Artikel | Maju Digital</title>

    <style>
        :root {
            --navy: #153752;
            --navy-dark: #102b40;
            --gold: #c7a45e;
            --bg: #f3f6f9;
            --white: #ffffff;
            --text: #243746;
            --muted: #73818d;
            --line: #e3e9ee;
            --blue: #287ca8;
            --green: #16794b;
            --red: #b83232;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        a {
            color: inherit;
        }

        .topbar {
            background: linear-gradient(120deg, var(--navy-dark), var(--navy));
            border-bottom: 4px solid var(--gold);
            color: white;
        }

        .topbar-inner {
            width: 94%;
            max-width: 1440px;
            min-height: 70px;
            margin: auto;
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            border: 1px solid rgba(199, 164, 94, .8);
            border-radius: 12px;
            background: rgba(255, 255, 255, .08);
            color: #f3d99d;
        }

        .brand-icon svg {
            width: 23px;
            height: 23px;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .6px;
        }

        .brand-subtitle {
            margin-top: 4px;
            color: #c8d5df;
            font-size: 12px;
        }

        main {
            width: 94%;
            max-width: 1440px;
            margin: 30px auto 48px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .eyebrow {
            margin-bottom: 8px;
            color: #9a7b3e;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            color: var(--navy);
            font-size: 30px;
            line-height: 1.2;
        }

        .page-description {
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .heading-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            min-height: 42px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 9px;
            padding: 11px 15px;
            border: 1px solid transparent;
            border-radius: 7px;
            background: var(--navy);
            color: white;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background .18s ease, transform .18s ease;
        }

        .button:hover {
            background: var(--navy-dark);
            transform: translateY(-1px);
        }

        .button svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        .button-outline {
            background: white;
            color: var(--navy);
            border-color: #d6e0e7;
        }

        .button-outline:hover {
            background: #edf3f7;
            color: var(--navy-dark);
        }

        .button-add {
            background: var(--navy);
        }

        .button-add:hover {
            background: #204d6d;
        }

        .summary-card {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
            padding: 19px 22px;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(28, 52, 70, .035);
        }

        .summary-icon {
            width: 45px;
            height: 45px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #edf3f8;
            color: var(--navy);
        }

        .summary-icon svg {
            width: 23px;
            height: 23px;
        }

        .summary-label {
            color: var(--muted);
            font-size: 12px;
        }

        .summary-value {
            margin-top: 5px;
            color: var(--navy);
            font-size: 23px;
            font-weight: 800;
        }

        .summary-note {
            margin-left: auto;
            color: var(--muted);
            font-size: 12px;
        }

        .panel {
            overflow: hidden;
            background: var(--white);
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(28, 52, 70, .04);
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 20px 22px;
            border-bottom: 1px solid var(--line);
        }

        .panel-title {
            margin: 0;
            color: var(--navy);
            font-size: 16px;
            font-weight: 800;
        }

        .panel-caption {
            margin-top: 5px;
            color: var(--muted);
            font-size: 12px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th {
            padding: 15px 16px;
            background: #f7f9fb;
            color: #6c7b87;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
            text-align: left;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            border-top: 1px solid #edf0f3;
            color: var(--text);
            font-size: 12px;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .15s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .number-cell {
            width: 60px;
            color: #8995a0;
            font-size: 12px;
            font-weight: 700;
        }

        .article-title {
            min-width: 250px;
            color: var(--navy);
            font-size: 13px;
            font-weight: 700;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .category-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #536675;
            white-space: nowrap;
        }

        .category-dot {
            width: 7px;
            height: 7px;
            display: inline-block;
            border-radius: 50%;
            background: var(--gold);
        }

        .status-badge {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            padding: 6px 9px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-badge::before {
            width: 6px;
            height: 6px;
            content: "";
            display: inline-block;
            border-radius: 50%;
            background: currentColor;
        }

        .status-published {
            background: #e7f5ec;
            color: #18794e;
        }

        .status-draft {
            background: #fff4da;
            color: #966a17;
        }

        .status-other {
            background: #edf1f4;
            color: #667682;
        }

        .date-cell {
            color: #73818d;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form {
            display: flex;
            margin: 0;
        }

        .action-button {
            width: 35px;
            height: 35px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            border: 1px solid #e0e7ed;
            border-radius: 7px;
            background: white;
            color: var(--navy);
            text-decoration: none;
            cursor: pointer;
            transition: background .16s ease, border-color .16s ease;
        }

        .action-button svg {
            width: 16px;
            height: 16px;
        }

        .action-view:hover {
            background: #eaf2f8;
            border-color: #bfd1df;
        }

        .action-edit {
            background: #edf6fc;
            border-color: #d7e9f5;
            color: #176895;
        }

        .action-edit:hover {
            background: #dceef9;
            border-color: #b9d8eb;
        }

        .action-delete {
            background: #fff1f0;
            border-color: #f4d6d3;
            color: #b42318;
        }

        .action-delete:hover {
            background: #ffe1df;
            border-color: #efbbb6;
        }

        .empty-state {
            padding: 48px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            margin: 0 auto 15px;
            border-radius: 15px;
            background: #edf3f8;
            color: var(--navy);
        }

        .empty-icon svg {
            width: 26px;
            height: 26px;
        }

        .empty-title {
            margin: 0;
            color: var(--navy);
            font-size: 16px;
            font-weight: 800;
        }

        .empty-description {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 12px;
        }

        .notice {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 18px;
            padding: 14px 16px;
            border: 1px solid #cce9d5;
            border-radius: 8px;
            background: #effaf2;
            color: #17653a;
            font-size: 12px;
            line-height: 1.6;
        }

        .notice svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .error {
            margin-bottom: 18px;
            padding: 14px 18px;
            border: 1px solid #f1ceca;
            border-radius: 8px;
            background: #fff3f2;
            color: #a83232;
            font-size: 12px;
        }

        .error ul {
            margin: 0;
            padding-left: 18px;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            padding: 18px 22px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 12px;
        }

        .pagination nav {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .pagination nav a,
        .pagination nav span[aria-current="page"] span,
        .pagination nav span[aria-label] {
            display: inline-flex;
            min-width: 32px;
            min-height: 32px;
            justify-content: center;
            align-items: center;
            padding: 6px 9px;
            border: 1px solid var(--line);
            border-radius: 6px;
            background: white;
            color: var(--navy);
            font-size: 12px;
            text-decoration: none;
        }

        .pagination nav span[aria-current="page"] span {
            border-color: var(--navy);
            background: var(--navy);
            color: white;
        }

        .pagination nav a:hover {
            background: #edf3f8;
        }

        .pagination nav svg {
            width: 15px;
            height: 15px;
        }

        .pagination .hidden {
            display: none;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #e2c67f;
            outline-offset: 3px;
        }

        @media (max-width: 700px) {
            main {
                width: 94%;
                margin-top: 22px;
            }

            .topbar-inner {
                min-height: 64px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 26px;
            }

            .heading-actions {
                width: 100%;
            }

            .heading-actions .button {
                flex: 1;
            }

            .summary-card {
                padding: 15px;
            }

            .summary-note {
                display: none;
            }

            .panel-heading {
                padding: 17px;
            }

            .pagination {
                padding: 16px;
            }
        }

        @media (max-width: 420px) {
            .brand-name {
                font-size: 14px;
            }

            .brand-subtitle {
                font-size: 11px;
            }

            .heading-actions .button {
                font-size: 11px;
                padding: 10px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition-duration: .01ms !important;
            }
        }
        /* STATISTIK DASHBOARD */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 24px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    min-width: 0;
    padding: 22px;
    background: #fff;
    border: 1px solid #e3e9ee;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(28, 52, 70, .035);
    transition: transform .2s ease, box-shadow .2s ease;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 7px 20px rgba(28, 52, 70, .07);
}

.stat-icon {
    width: 48px;
    height: 48px;
    display: grid;
    place-items: center;
    flex-shrink: 0;
    border-radius: 12px;
}

.stat-icon svg {
    width: 24px;
    height: 24px;
}

.stat-icon.total {
    background: #eaf1f8;
    color: #153752;
}

.stat-icon.draft {
    background: #fff3da;
    color: #966a17;
}

.stat-icon.published {
    background: #e6f5eb;
    color: #18794e;
}

.stat-label {
    color: #73818d;
    font-size: 12px;
}

.stat-value {
    margin-top: 6px;
    color: #153752;
    font-size: 27px;
    font-weight: 800;
}

.stat-description {
    margin-top: 4px;
    color: #8995a0;
    font-size: 11px;
}

/* TOMBOL HEADER */
.heading-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}

.heading-actions .button {
    min-height: 44px;
    padding: 12px 17px;
    border-radius: 8px;
}

@media (max-width: 800px) {
    .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .stat-card {
        padding: 16px;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .heading-actions {
        width: 100%;
    }

    .heading-actions .button {
        flex: 1;
        padding: 11px;
        font-size: 11px;
    }
}
    </style>
</head>
<body>

<header class="topbar">
    <div class="topbar-inner">
        <div class="brand-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 3.5h10l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 5 20z"/>
                <path d="M15 3.5V8h4"/>
                <path d="M8 12h8M8 15.5h8M8 19h5"/>
            </svg>
        </div>

        <div>
            <div class="brand-name">MAJU DIGITAL</div>
            <div class="brand-subtitle">Pusat Pengelolaan Artikel</div>
        </div>
    </div>
</header>

<main>
    <div class="page-heading">
        <div>
            <div class="eyebrow">Ruang kerja admin</div>
            <h1>Daftar Artikel</h1>
            <p class="page-description">
                Kelola, perbarui, dan pantau berita yang ditampilkan di website.
            </p>
        </div>

        <div class="heading-actions">
            <a class="button button-outline" href="{{ route('berita.index') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="m12 19-7-7 7-7"/>
                    <path d="M5 12h14"/>
                </svg>
                Lihat Website
            </a>

            <a class="button button-add" href="{{ route('admin.artikel.create') }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     aria-hidden="true">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
                Tambah Artikel
            </a>
        </div>
    </div>

    <section class="stats-grid">
    <!-- TOTAL ARTIKEL -->
    <div class="stat-card">
        <div class="stat-icon total">
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 3h14v18H5z"/>
                <path d="M8 7h8M8 11h8M8 15h5"/>
            </svg>
        </div>
        <div>
            <div class="stat-label">Total Artikel</div>
            <div class="stat-value">{{ $totalArticles }}</div>
            <div class="stat-description">Semua artikel</div>
        </div>
    </div>

    <!-- ARTIKEL DRAF -->
    <div class="stat-card">
        <div class="stat-icon draft">
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <path d="M14 2v6h6M8 13h8M8 17h5"/>
            </svg>
        </div>
        <div>
            <div class="stat-label">Artikel Draf</div>
            <div class="stat-value">{{ $draftArticles }}</div>
            <div class="stat-description">Belum diterbitkan</div>
        </div>
    </div>

    <!-- ARTIKEL TERBIT -->
    <div class="stat-card">
        <div class="stat-icon published">
            <svg viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="1.8"
                 stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="m8 12 2.5 2.5L16 9"/>
            </svg>
        </div>
        <div>
            <div class="stat-label">Artikel Terbit</div>
            <div class="stat-value">{{ $publishedArticles }}</div>
            <div class="stat-description">Tampil di website</div>
        </div>
    </div>
</section>
    @if (session('success'))
        <div class="notice" role="status">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 aria-hidden="true">
                <circle cx="12" cy="12" r="9"/>
                <path d="m8 12 2.5 2.5L16 9"/>
            </svg>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="error" role="alert">
            <strong>Periksa kembali data berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="panel">
        <div class="panel-heading">
            <div>
                <h2 class="panel-title">Semua Artikel</h2>
                <div class="panel-caption">
                    Daftar berita yang dapat dikelola melalui panel admin.
                </div>
            </div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($articles as $article)
                        @php
                            $statusClass = match ($article->status) {
                                'published' => 'status-published',
                                'draft' => 'status-draft',
                                default => 'status-other',
                            };
                        @endphp

                        <tr>
                            <td class="number-cell">
                                {{ $articles->firstItem() + $loop->index }}
                            </td>

                            <td>
                                <div class="article-title">
                                    {{ $article->title }}
                                </div>
                            </td>

                            <td>
                                <span class="category-label">
                                    <span class="category-dot"></span>
                                    {{ $article->category?->name ?? '-' }}
                                </span>
                            </td>

                            <td>
                                <span class="status-badge {{ $statusClass }}">
                                    {{ $article->status === 'published'
                                        ? 'Terbit'
                                        : ($article->status === 'draft'
                                            ? 'Draf'
                                            : ucfirst($article->status)) }}
                                </span>
                            </td>

                            <td class="date-cell">
                                {{ $article->created_at?->format('d M Y') ?? '-' }}
                            </td>

                            <td>
                                <div class="actions">
                                    @if ($article->status === 'published')
                                        <a
                                            class="action-button action-view"
                                            href="{{ route('berita.show', ['slug' => $article->slug]) }}"
                                            title="Lihat artikel"
                                            aria-label="Lihat artikel: {{ $article->title }}"
                                        >
                                            <svg viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="1.8"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 aria-hidden="true">
                                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </a>
                                    @endif

                                    <a
                                        class="action-button action-edit"
                                        href="{{ route('admin.artikel.edit', ['artikel' => $article->id_artikel]) }}"
                                        title="Edit artikel"
                                        aria-label="Edit artikel: {{ $article->title }}"
                                    >
                                        <svg viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="1.8"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             aria-hidden="true">
                                            <path d="m14 5 5 5"/>
                                            <path d="M4 20l4-.8L19 8a2.12 2.12 0 0 0-3-3L5 16z"/>
                                            <path d="M4 20h16"/>
                                        </svg>
                                    </a>

                                    <form
                                        action="{{ route('admin.artikel.destroy', ['artikel' => $article->id_artikel]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="action-button action-delete"
                                            type="submit"
                                            title="Hapus artikel"
                                            aria-label="Hapus artikel: {{ $article->title }}"
                                        >
                                            <svg viewBox="0 0 24 24" fill="none"
                                                 stroke="currentColor" stroke-width="1.8"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 aria-hidden="true">
                                                <path d="M3 6h18M9 6V4h6v2M6 6l1 14h10l1-14"/>
                                                <path d="M10 10v6M14 10v6"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="1.8"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 3.5h10l4 4V20a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 5 20z"/>
                                            <path d="M15 3.5V8h4"/>
                                            <path d="M8 12h8M8 16h5"/>
                                        </svg>
                                    </div>

                                    <h3 class="empty-title">Belum ada artikel</h3>

                                    <p class="empty-description">
                                        Tambahkan artikel pertama untuk mulai mengisi website.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($articles->hasPages())
            <div class="pagination">
                <div>
                    Menampilkan {{ $articles->firstItem() }}–{{ $articles->lastItem() }}
                    dari {{ $articles->total() }} artikel
                </div>

                <div>
                    {{ $articles->links() }}
                </div>
            </div>
        @endif
    </section>
</main>

</body>
</html>
