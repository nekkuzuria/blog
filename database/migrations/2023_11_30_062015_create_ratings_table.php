<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel user
            $table->unsignedBigInteger('book_id'); // Foreign key ke tabel buku
            $table->unsignedTinyInteger('rating'); // Kolom rating, misalnya dari 1-5
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('buku')->onDelete('cascade');
            
            // Jika ingin memastikan bahwa tiap user hanya bisa memberi satu rating pada satu buku
            $table->unique(['user_id', 'book_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
