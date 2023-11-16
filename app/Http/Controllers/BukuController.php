<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use Intervention\Image\Facades\Image;
use App\Models\Gallery;

class BukuController extends Controller
{
    public function _construct(){
        $this->middleware("auth");
    }
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
            'tgl_terbit'=> 'required|date',
            'thumbnail' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'gallery.*' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $buku = Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
        ]);

        // Simpan thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnailFileName = time() . '_' . $request->thumbnail->getClientOriginalName();
            $thumbnailFilePath = $request->thumbnail->storeAs('uploads', $thumbnailFileName, 'public');
            
            Image::make(storage_path() . '/app/public/uploads/' . $thumbnailFileName)->fit(240, 320)->save();

            $buku->update([
                'filename' => $thumbnailFileName,
                'filepath' => '/storage/' . $thumbnailFilePath 
            ]);
        }

        // Simpan galeri
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $key => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePathGallery = $file->storeAs('uploads', $fileName, 'public');

                $gallery = Gallery::create([
                    'nama_galeri' => $fileName,
                    'path' => '/storage/' . $filePathGallery,
                    'foto' => $fileName,
                    'buku_id' => $buku->id,
                ]);
            }
        }
        
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
    public function update(Request $request, string $id){
    // Find the book by ID
        $buku = Buku::find($id);

        // Validate the request
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Initialize variables
        $fileName = $buku->filename;  // Use the existing filename initially
        $filePath = $buku->filepath;  // Use the existing filepath initially

        // Process Thumbnail if exists
        if ($request->hasFile('thumbnail')) {
            $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
        }

        if ($fileName !== null) {
            Image::make(storage_path().'/app/public/uploads/'.$fileName)
                ->fit(240, 320)
                ->save();
        }

        // Process Gallery if exists
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $galleryFileName = time() . '_' . $file->getClientOriginalName();
                $filePathGallery = $file->storeAs('uploads', $galleryFileName, 'public');

                // Create Gallery entry
                Gallery::create([
                    'nama_galeri' => $galleryFileName,
                    'path' => '/storage/' . $filePathGallery,
                    'foto' => $galleryFileName,
                    'buku_id' => $id,
                ]);
            }
        }

        // Update the rest of the book details
        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit,
            'filename' => $fileName,  // Only update if thumbnail is updated
            'filepath' => '/storage/' . $filePath,  // Only update if thumbnail is updated
        ]);

        // Redirect with success message
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

    public function deleteGallery($id)
    {
        $gallery = Gallery::findorFail($id);
        $gallery->delete();

        return redirect()->back();
    }

     public function galBuku($id)
    {
        $buku = Buku::find($id);
        return view('buku.detail', compact('buku'));
    }
}
