<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Buku</title>
</head>
<style>
    th, td {
        padding: 15px;
    }
</style>
<body>
    @if(Session::has('pesan_simpan'))
        <div class="alert alert-success">{{Session::get('pesan')}}</div>
    @elseif(Session::has('pesan_hapus'))
        <div class="alert alert-success">{{Session::get('pesan_hapus')}}</div>
    @elseif(Session::has('pesan_update'))
        <div class="alert alert-success">{{Session::get('pesan_update')}}</div>
    @endif

    

    <form action="{{ route('buku.search') }}" method="get">
        @csrf
        <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%;
            display: inline; margin: top 10px; margin: bottom 10px; float: right;">
    </form>

    @if(count($data_buku))
        <div class="alert alert-success">Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan
        kata: <strong>{{ $cari }}</strong></div>


    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d/M/Y')}}</td>
                <td><form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                    @csrf
                    <button onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                </form></td>
                <td><form action="{{ route('buku.edit', $buku->id) }}" method="get">
                    @csrf
                    <button>Edit</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    

    <p>{{ "jumlah data : ".$jumlah }}</p>
    <p>{{ "total harga : "."Rp ".number_format($total_harga, 2, ',', '.')}}</p>

    @else
        <div></div>< class="alert alert-warning"><h4>Data {{ $cari }} tidak ditemukan</h4>
        <a href="/buku" class="btn btn-warning">Kembali</a></div>
    @endif

    <p align="right"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>
    
</body>
</html>