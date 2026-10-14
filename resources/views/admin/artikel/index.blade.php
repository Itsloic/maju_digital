
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Artikel | Maju Digital</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f3f5f6;
            color: #202e39;
            font-family: Arial, sans-serif;
        }

        header {
            padding: 22px 5%;
            background: #153752;
            color: white;
            border-bottom: 4px solid #c7a45e;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        main {
            width: 92%;
            max-width: 1200px;
            margin: 32px auto;
        }

        .panel {
            padding: 24px;
            background: white;
            border: 1px solid #dce2e6;
            overflow-x: auto;
        }

        .heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        h1 { margin: 0; color: #153752; }

        .button, button {
            display: inline-block;
            padding: 10px 14px;
            border: 0;
            background: #153752;
            color: white;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit { background: #347da8; }
        .delete { background: #a83232; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 13px 10px;
            border-bottom: 1px solid #dce2e6;
            text-align: left;
            font-size: 13px;
        }

        th { background: #f3f5f6; }

        .actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .actions form { margin: 0; }

        .notice {
            padding: 12px;
            margin-bottom: 16px;
            background: #e4f4e8;
        }

        .error { color: #a83232; }
        .pagination { margin-top: 20px; }
    </style>
</head>
<body>

<header>
    <a href="{{ route('berita.index') }}">
        <strong>MAJU DIGITAL</strong> — Pengelolaan Artikel
    </a>
</header>

<main>
    <section class="panel">
       <div class="heading">
    <h1>Daftar Artikel</h1>

    <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <a class="button" href="{{ route('berita.index') }}">
            ← Lihat Website
        </a>

        <a class="button" href="{{ route('admin.artikel.create') }}">
            + Tambah Artikel
        </a>
    </div>
</div>

        @if (session('success'))
            <div class="notice">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                    <tr>
                        <td>{{ $articles->firstItem() + $loop->index }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->category?->name ?? '-' }}</td>
                        <td>{{ $article->status }}</td>
                        <td>
                            {{ $article->created_at?->format('d-m-Y') ?? '-' }}
                        </td>
                        <td>
                            <div class="actions">
                                @if ($article->status === 'published')
                                    <a
                                        class="button"
                                        href="{{ route('berita.show', ['slug' => $article->slug]) }}"
                                    >Lihat</a>
                                @endif

                                <a
                                    class="button edit"
                                    href="{{ route('admin.artikel.edit', ['artikel' => $article->id_artikel]) }}"
                                >Edit</a>

                                <form
                                    action="{{ route('admin.artikel.destroy', ['artikel' => $article->id_artikel]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete" type="submit">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Belum ada artikel di database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </section>
</main>

</body>
</html>
