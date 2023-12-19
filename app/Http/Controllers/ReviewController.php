<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Buku;

class ReviewController extends Controller
{
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string',
        ]);

        $userId = auth()->id();

        // Membuat review baru
        $review = Review::create([
            'book_id' => $id,
            'review' => $request->review,
        ]);

       
        return redirect()->route('galeri.buku', $id)->with('success', 'Review berhasil ditambahkan');
    }
}


