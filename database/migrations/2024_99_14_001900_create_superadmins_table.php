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
            $table->string('kategori')->nullable();
            $table->string('sub_kategori')->nullable();
            $table->string('nama_barang', 500)->nullable();
            $table->string('satuan')->nullable();
            $table->string('merk')->nullable();
            $table->string('status')->default('ditunda');
            $table->foreignID('form_id')->constrained()->onDelete('cascade');

            $table->string('banjarmasin')->nullable();
            $table->string('banjarbaru')->nullable();
            $table->string('banjar')->nullable();
            $table->string('batola')->nullable();
            $table->string('tapin')->nullable();
            $table->string('hss')->nullable();
            $table->string('hst')->nullable();
            $table->string('hsu')->nullable();
            $table->string('balangan')->nullable();
            $table->string('tabalong')->nullable();
            $table->string('tanah_laut')->nullable();
            $table->string('tanah_bumbu')->nullable();
            $table->string('kotabaru')->nullable();

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
