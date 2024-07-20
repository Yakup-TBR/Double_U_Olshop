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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('harga');
            $table->string('deskripsi_pendek');
            $table->string('deskripsi_panjang');
            $table->enum('tipe',['kalung','liontin', 'gelang', 'cincin','anting', 'jam_fashion', 'gelang_fashion', 'kuku'])->default('kalung');
            $table->string('gambar_1');
            $table->string('gambar_2')->nullable();
            $table->string('gambar_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
