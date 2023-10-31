<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data_buku = Buku::all()->sortByDesc('id');
        $no = 0;
        $jumlah = $data_buku->count();
        $total_harga = $data_buku->sum('harga');
        return view('dashboard', compact('data_buku', 'no', 'jumlah', 'total_harga'));
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul','LIKE', '%'.$cari.'%')->orwhere('penulis','LIKE', '%'.$cari.'%')
            -> paginate($batas);
        $jumlah = $data_buku->count();
        $no = $batas * ($data_buku->currentPage()-1);
        $total_harga = $data_buku->sum('harga');
        return view('buku.search', compact('jumlah','data_buku','no','cari','total_harga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'     => 'required|string',
            'penulis'   => 'required|string',
            'harga'     => 'required|numeric',
            'tgl_terbit'=> 'required|date  '
        ]);
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
        ]);
        
        return redirect('/buku')->with('pesan_simpan', 'Data buku berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan_update', 'Data buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan_hapus', 'Data buku berhasil dihapus');
    }
}
