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
            $table->foreignID('kota_id')->constrained()->onDelete('cascade');
            $table->foreignID('kategori_id')->constrained()->onDelete('cascade');
            $table->foreignID('sub_kategori_id')->constrained()->onDelete('cascade');
            $table->foreignID('barang_id')->constrained()->onDelete('cascade');
            $table->foreignID('form_id')->constrained()->onDelete('cascade');
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
