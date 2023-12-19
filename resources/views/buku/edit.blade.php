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
        @if(session('pesan_delete'))
            <div class="alert alert-success">
                {{ session('pesan_delete') }}
            </div>
        @endif

        <div class="container mx-auto p-4">
            <h4 class="text-center text-2xl font-bold mb-4">Edit Buku</h4>
            @if(count($errors) > 0)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Terjadi kesalahan!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            

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
                <form action="{{ route('buku.update', $buku->id) }}" method="POST" id="kategoriForm" class="p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori 1</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="kategori[]" placeholder="Kategori 1">
                    </div>

                    <!-- Bagian ini akan diulang saat menambah kategori baru -->
                    <div class="mb-4" id="kategoriContainer"></div>

                    <div class="flex items-center">
                        <button type="button" id="tambahKategori" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-4">Tambah Kategori</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                    </div>
                </form>
                <div class="mb-4">
                    <label for="thumbnail" class="text-gray-900">Thumbnail</label>
                    <input type="file" class="w-full mt-1 px-2 py-2 rounded-lg border" name="thumbnail" id="thumbnail">
                </div>
                
                <div class="mb-4">
                    <label for="file_upload" class="text-gray-900">Gallery</label>
                    <div class="mt-2" id="fileinput_wrapper"></div>
                    <button class="bg-blue-500 text-white rounded-md py-2 px-4 mx-3 my-2 hover:opacity-70" 
                    type="button" onclick="addFileInput()">Tambah</button>
                </div>

                <div class="flex flex-row space-x-4">
                    @foreach($buku->galleries()->get() as $gallery)
                        <div class="relative group">
                            <img class="rounded-sm object-cover object-center" src="{{ asset($gallery->path) }}" alt="" width="200"/>
                            <button class="bg-red-500 text-white rounded-md px-2 my-2 hover:opacity-70"><a href="{{ route('galeri.delete', $gallery->id) }}">Delete</a>
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
            $(document).ready(function() {
                let counter = 2; // Counter untuk nama kategori

                $('#tambahKategori').click(function() {
                    let newInput = `<div class="mb-4">
                                        <label for="kategori" class="block text-gray-700 text-sm font-bold mb-2">Kategori ${counter}</label>
                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="kategori[]" placeholder="Kategori ${counter}">
                                    </div>`;
                    $('#kategoriContainer').append(newInput);
                    counter++;
                });
            });
        </script>



    </body>
</html>
