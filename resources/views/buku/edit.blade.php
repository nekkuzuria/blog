<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Buku</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4">
    <h4 class="text-center text-2xl font-bold mb-4">Edit Buku</h4>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
        @csrf
        <div class="mb-4">
            <label for="judul" class="text-gray-900">Judul</label>
            <input type="text" class="w-full mt-1 px-2 py-2 rounded-lg border" name="judul" id="judul" value="{{ $buku->judul }}">
        </div>
        <div class="mb-4">
            <label for="penulis" class="text-gray-900">Penulis</label>
            <input type="text" class="w-full mt-1 px-2 py-2 rounded-lg border" name="penulis" id="penulis" value="{{ $buku->penulis }}">
        </div>
        <div class="mb-4">
            <label for="harga" class="text-gray-900">Harga</label>
            <input type="text" class="w-full mt-1 px-2 py-2 rounded-lg border" name="harga" id="harga" value="{{ $buku->harga }}">
        </div>
        <div class="mb-4">
            <label for="tgl_terbit" class="text-gray-900">Tgl. terbit</label>
            <input type="text" class="w-full mt-1 px-2 py-2 rounded-lg border" name="tgl_terbit" id="tgl_terbit" value="{{ $buku->tgl_terbit }}">
        </div>
        <div class="mb-4">
            <label for="thumbnail" class="text-gray-900">Thumbnail</label>
            <input type="file" class="w-full mt-1 px-2 py-2 rounded-lg border" name="thumbnail" id="thumbnail">
        </div>
        
        <div class="mb-4">
            <label for="file_upload" class="text-gray-900">Gallery</label>
            <div class="mt-2" id="fileinput_wrapper"></div>
            <button class="bg-blue-500 text-white rounded-md py-2 px-4 mx-3 my-2 hover:opacity-70" type="button" onclick="addFileInput()">Tambah</button>
        </div>

        <div class="flex flex-row space-x-4">
            @foreach($buku->galleries()->get() as $gallery)
                <div class="relative group">
                    <img class="rounded-sm object-cover object-center" src="{{ asset($gallery->path) }}" alt="" width="200"/>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="bg-green-500 text-white rounded-md py-2 px-4 hover:opacity-70">Simpan</button>
            <a href="/buku" class="bg-gray-500 text-white rounded-md py-2 px-4 hover:opacity-70 ml-2">Batal</a>
        </div>
    </form>
</div>

<script type="text/javascript">
    function addFileInput() {
        var div = document.getElementById('fileinput_wrapper');
        div.innerHTML += '<input class="w-full mt-1 px-2 py-2 rounded-lg border" type="file" name="gallery[]">';
    }
</script>

</body>
</html>
