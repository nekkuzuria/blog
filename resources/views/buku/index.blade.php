<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
</head>
<style>
    th, td {
        padding: 15px;
    }
</style>
<body>
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


    <p align="right"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>
    
</body>
</html>