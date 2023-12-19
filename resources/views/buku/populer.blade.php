<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Populer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style tambahan -->
    <style>
        body {
            padding: 50px;
        }
        .book-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4">Buku Populer</h1>
    @if(count($books) > 0)
        @foreach($books as $book)
            <div class="card book-card">
                <div class="card-body">
                    <h5 class="card-title">{{ $book['judul'] }}</h5>
                    <p class="card-text">Penulis: {{ $book['penulis'] }}</p>
                    <p class="card-text">Rating: {{ $book['rating'] }}</p> <!-- Menampilkan rating -->
                </div>
            </div>
        @endforeach
    @else
        <p>Tidak ada buku yang tersedia.</p>
    @endif
</div>


</body>
</html>
