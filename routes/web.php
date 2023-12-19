<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        "name" => "lala",
        "email" => "lala@gmail.com"
    ]);
});


Route::get('/boom', [PostController::class, 'boomesport']);
Route::post('/buku/{id}/add-review', [ReviewController::class, 'addReview'])->name('addReview');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/dashboard', function () {return redirect()->route('buku.index');})->name('dashboard');
    Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
    Route::get('/buku/detail-buku/{id}', [BukuController::class, 'galBuku'])->name('galeri.buku');
    Route::post('/buku/detail-buku/{id}/update-rating', [BukuController::class, 'updateRating'])->name('updateRating');
    Route::get('/buku/myfavourite', [BukuController::class, 'showFavoriteBooks'])->name('favorite');
    Route::post('/buku/{id}/add-to-favorites', [BukuController::class, 'addToFavorites'])->name('addToFavorites');
    Route::get('/buku-populer', [BukuController::class, 'bukuPopuler'])->name('bukuPopuler');
    
    Route::get('/kategori/{kategori}', [BukuController::class, 'bukuByCategory'])->name('bukuByCategory');




    Route::middleware([Admin::class])->group(function () {
        Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/buku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
        Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::post('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::get('/delete-gallery/{id}', [BukuController::class, 'deleteGallery'])->name('galeri.delete');
        Route::resource('kategori', KategoriController::class);

    });
});

require __DIR__.'/auth.php';
