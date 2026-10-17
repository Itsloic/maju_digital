<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Pemerintah Kabupaten Maju Digital</title>

    {{-- Bootstrap 5.3.3 via CDN --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <x-navbar />

    <main class="flex-grow-1 py-4">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    <x-footer />

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>