<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Halaman Produk</h1>
        <h2>Parameter yang dikirim: {{ $nilai }}</h2>

        {{-- Panggil komponen alert --}}
        <x-alert type="{{ $alertType }}">
            {{ $pesan }}
        </x-alert>
    </div>
</body>
</html>