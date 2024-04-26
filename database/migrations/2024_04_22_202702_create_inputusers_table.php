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
        Schema::create('inputusers', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('address_user')->nullable();
            $table->string('phone_user')->nullable();
            $table->string('email')->nullable();
            $table->string('nip')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
   
            $table->foreignID('role_id')->constrained()->onDelete('cascade');
   
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputusers');
    }
};