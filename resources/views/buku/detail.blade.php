<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
    <title>Buku</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .custom-label {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 8px;
            display: inline-block;
            width: fit-content;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h4 class="text-center text-2xl font-bold mb-4">Detail Buku</h4>
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
        <form>
            @csrf
            <div class="mb-4">
                <label for="judul" class="text-gray-900">Judul</label>
                <label for="judul" class="custom-label">{{ $buku->judul }}</label>
            </div>
            <div class="mb-4">
                <label for="penulis" class="text-gray-900">Penulis</label>
                <label for="penulis" class="custom-label">{{ $buku->penulis }}</label>
            </div>
            <div class="mb-4">
                <label for="harga" class="text-gray-900">Harga</label>
                <label for="harga" class="custom-label">{{ $buku->harga }}</label>
            </div>
            <div class="mb-4">
                <label for="tgl_terbit" class="text-gray-900">Tgl. terbit</label>
                <label for="tgl_terbit" class="custom-label">{{ $buku->tgl_terbit }}</label>
            </div>
            <div class="mb-4">
                <label for="thumbnail" class="text-gray-900">Thumbnail</label>
                <!-- You might display thumbnail here -->
                 <div class="flex flex-row space-x-4">
                    <div class="relative group">
                        <a href="{{ asset($buku->filepath) }}" data-lightbox="image-1">
                            <img class="rounded-sm object-cover object-center" src="{{ asset($buku->filepath) }}" alt="" width="200"/>
                        </a>                        
                    </div>
            </div>
            <div class="mb-4">
                <label for="file_upload" class="text-gray-900">Gallery</label>
                <div class="mt-2" id="fileinput_wrapper"></div>
            </div>
            <div class="flex flex-row space-x-4">
                @foreach($buku->galleries()->get() as $gallery)
                    <div class="relative group">
                        <a href="{{ asset($gallery->path) }}" data-lightbox="image-1">
                            <img class="rounded-sm object-cover object-center" src="{{ asset($gallery->path) }}" alt="" width="200"/>
                        </a>                        
                    </div>
                @endforeach
            </div>
        </form>
    </div>
    <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>
