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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(); // Kolom untuk nama
            $table->string('tgl_survey')->nullable(); // Kolom untuk tanggal survey
            $table->string('periode')->nullable(); // Kolom untuk periode
            $table->string('keterangan')->nullable(); // Kolom untuk keterangan
            $table->foreignId('kota_id')->nullable()->constrained('kotas')->onDelete('set null'); // Kolom untuk kota
            $table->foreignId('kategori_id')->nullable()->constrained('kategoris')->onDelete('set null'); // Kolom untuk kategori
            $table->foreignId('sub_kategori_id')->nullable()->constrained('sub_kategoris')->onDelete('set null'); // Kolom untuk subkategori
            $table->string('status')->default('ditunda'); // Kolom untuk status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};


