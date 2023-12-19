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
        /* Hide the radio buttons */
        .rating input[type="radio"] {
            display: none;
        }

        /* Style the stars */
        .rating label {
            font-size: 30px;
            color: grey; /* default star color */
            cursor: pointer;
        }

        /* Color the stars based on checked state */
        .rating input[type="radio"]:checked ~ label {
            color: gold; /* change star color when checked */
        }
        .rating {
            direction: rtl;
        }

        .rating label {
            float: right;
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
     
            
            <div class="mb-4">
                <label for="judul" class="text-gray-900">Judul</label>
                <label for="judul" class="custom-label">{{ $buku->judul }}</label>

                @if($averageRating !== null)
                    <!-- Tampilkan rata-rata rating jika tersedia -->
                    <p>Rating: {{ $averageRating }}</p>
                @else
                    <!-- Tampilkan pesan bahwa rating tidak tersedia -->
                    <p>Rating is not available</p>
                @endif
            
            @if(Auth::check() && Auth::user()->level == 'user')
            <form action="{{ route('updateRating', $buku->id) }}" method="POST" class="flex items-center">
                @csrf
                <div class="flex space-x-1 rating">
                    <input type="radio" id="star1" class="rating" name = "rating" value="1">
                    <label for="star1">&#9733;</label>
                    <input type="radio" id="star2" class="rating" name = "rating" value="2">
                    <label for="star2">&#9733;</label>
                    <input type="radio" id="star3" class="rating" name = "rating" value="3">
                    <label for="star3">&#9733;</label>
                    <input type="radio" id="star4" class="rating" name = "rating" value="4">
                    <label for="star4">&#9733;</label>
                    <input type="radio" id="star5" class="rating" name = "rating" value="5">
                    <label for="star5">&#9733;</label>
                </div>

                <!-- Tombol untuk menyimpan rating -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">
                    Simpan Rating
                </button>
            </form>
            @endif

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
            @if(Auth::check() && Auth::user()->level == 'user')
            <div class="mb-4">
                <form action="/buku/{{ $buku->id }}/add-to-favorites" method="post">
                    @csrf <!-- Token CSRF untuk keamanan Laravel -->

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan ke Daftar Favorit
                    </button>
                </form>
            </div>
            @endif
            <div class="mb-4">
                <h4 class="text-2xl font-bold mb-2">Kategori</h4>
                @foreach($categories as $kategori)
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $kategori->nama_kategori }}</span>
                @endforeach
            </div>
            <div class="mb-4">
                <form action="{{ route('addReview', $buku->id) }}" method="POST">
                    @csrf
                    <label for="review" class="text-gray-900">Review</label>
                    <textarea class="w-full mt-1 px-2 py-2 rounded-lg border" name="review" id="review"></textarea>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Tambah Review</button>
                </form>
            </div>
            <div class="mb-4">
                <h4 class="text-2xl font-bold mb-2">Review Pengguna</h4>
                @if($reviews->isNotEmpty())
                    @foreach($reviews as $review)
                        <div class="bg-gray-100 p-3 rounded-lg mb-2">
                            <p>{{ $review->review }}</p>
                        </div>
                    @endforeach
                @else
                    <p>Belum ada review untuk buku ini.</p>
                @endif
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.rating input[type="radio"]').on('click', function() {
            let rating = $(this).val(); // Mendapatkan nilai rating dari elemen yang diklik
            let bookId = '{{ $buku->id }}'; // Mendapatkan ID buku dari data yang diberikan di controller

            // Lakukan AJAX request ke endpoint untuk memperbarui rating
            $.ajax({
                type: 'POST',
                url: '/buku/detail-buku/' + bookId + '/update-rating',
                data: {
                    rating: rating,
                    _token: '{{ csrf_token() }}' // Token CSRF untuk keamanan Laravel
                },
                success: function(response) {
                    console.log('Rating berhasil diperbarui');
                    // Lakukan sesuatu jika rating berhasil diperbarui
                },
                error: function(err) {
                    console.error('Gagal memperbarui rating');
                    // Tangani kesalahan jika gagal memperbarui rating
                }
            });
        });
    });
</script>



            
</body>
</html>


