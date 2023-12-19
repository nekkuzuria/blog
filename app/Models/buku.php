<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = ['judul','penulis', 'harga', 'tgl_terbit', 'filename', 'filepath'];
    protected $dates = ['tgl_terbit'];

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

    public function photos(){
        return $this->hasMany('App\Buku', 'id_buku', 'id');    
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'book_id', 'user_id');
    }

    public function category() {
        return $this->belongsToMany(Category::class, 'categories', 'book_id', 'category_id');
    }
}
