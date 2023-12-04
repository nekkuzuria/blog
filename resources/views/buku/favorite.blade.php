<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Buku Favorit</title>
</head>
<body>

<div class="container mt-4">
    <h1>Daftar Buku Favorit</h1>
    @if($favoriteBooks->isEmpty())
        <p>Anda belum menambahkan buku ke daftar favorit Anda.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Judul Buku</th>
                <th scope="col">Pengarang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($favoriteBooks as $book)
                <tr>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>


</body>
</html>
