<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Buku</title>
</head>
<body>
    

<div class="container">
    <h4 class="text-center">Tambah Buku</h4>
    
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul') }}">
        </div>
        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" name="penulis" id="penulis" value="{{ old('penulis') }}">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" name="harga" id="harga" value="{{ old('harga') }}">
        </div>
        <div class="form-group">
            <label for="tgl_terbit">Tgl. terbit</label>
            <input type="text" class="form-control" name="tgl_terbit" id="tgl_terbit" value="{{ old('tgl_terbit') }}">
        </div>
        <div class="form-group">
            <label for="thumbnail">Upload Gambar</label>
            <input type="file" class="form-control-file" name="thumbnail" id="thumbnail">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/buku" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

</body>