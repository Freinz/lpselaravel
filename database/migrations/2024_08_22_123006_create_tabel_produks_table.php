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
        Schema::create('tabel_produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
            $table->foreignId('sub_kategori_id')->constrained('sub_kategoris')->onDelete('cascade');
            $table->foreignId('kota_id')->constrained('kotas')->onDelete('cascade');
            $table->string('nama_barang', 500)->nullable();
            $table->string('satuan')->nullable();
            $table->string('merk')->nullable();
            $table->string('harga')->nullable();
            $table->string('status')->default('ditunda');
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_produks');
    }
};
