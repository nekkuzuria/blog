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
        Schema::create('favorites', function (Blueprint $table) {
            $table->increments('favorite_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
     
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('buku')->onDelete('cascade');

            $table->unique(['user_id', 'book_id']); // Pastikan hubungan unik antara user dan buku favoritnya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
