<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Form;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('superadmins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kota')->nullable();
            $table->string('kategori')->nullable();
            $table->string('sub_kategori')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('satuan')->nullable();
            $table->string('merk')->nullable();
            $table->string('harga')->nullable();
            $table->string('status')->default('ditunda');
            $table->foreignID('form_id')->constrained()->onDelete('cascade');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superadmins');
    }
};
