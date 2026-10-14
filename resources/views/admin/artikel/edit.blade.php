
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Artikel | Maju Digital</title>
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
        header a { color: white; text-decoration: none; }
        main {
            width: 92%;
            max-width: 900px;
            margin: 32px auto;
        }
        .panel {
            padding: 26px;
            background: white;
            border: 1px solid #dce2e6;
        }
        h1 { color: #153752; margin-top: 0; }
        .field { margin-bottom: 18px; }
        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: bold;
        }
        input:not([type=checkbox]):not([type=file]),
        select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5dc;
            background: white;
            font: inherit;
        }
        .field small {
            display: block;
            margin-top: 6px;
            color: #71808b;
        }
        button, .button {
            display: inline-block;
            padding: 11px 15px;
            border: 0;
            background: #153752;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }
        .secondary { background: #71808b; }
        .errors { color: #a83232; margin-bottom: 16px; }
    </style>
</head>
<body>
<header>
    <a href="{{ route('admin.artikel.index') }}">
        MAJU DIGITAL — Admin Artikel
    </a>
</header>

<main>
    <section class="panel">
        <h1>Edit Artikel</h1>

        @if ($errors->any())
            <div class="errors">
                <strong>Periksa kembali data berikut:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('admin.artikel.update', ['artikel' => $article->id_artikel]) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            @include('admin.artikel._form', [
                'article' => $article,
                'submitLabel' => 'Simpan Perubahan'
            ])
        </form>
    </section>
</main>
</body>
</html>
