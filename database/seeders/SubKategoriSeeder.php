<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKategoriSeeder extends Seeder
{
    public function run()
    {
        // Dapatkan ID dari kategori
        $dekorasiId = DB::table('kategoris')->where('nama_kategori', 'Dekorasi')->value('id');
        $jasaEventId = DB::table('kategoris')->where('nama_kategori', 'Jasa Event Organizer')->value('id');
        $sewaPeralatanId = DB::table('kategoris')->where('nama_kategori', 'Sewa Peralatan Perlengkapan')->value('id');

        DB::table('sub_kategoris')->insert([
            // SubKategori untuk Dekorasi
            ['nama_subkategori' => 'Dekorasi Backdrop/Panggung', 'kategori_id' => $dekorasiId],
            ['nama_subkategori' => 'Dekorasi Lainnya', 'kategori_id' => $dekorasiId],
            ['nama_subkategori' => 'Dekorasi Ruangan', 'kategori_id' => $dekorasiId],
            ['nama_subkategori' => 'Dekorasi Stand', 'kategori_id' => $dekorasiId],
            
            // SubKategori untuk Jasa Event Organizer
            ['nama_subkategori' => 'Jasa Event Organizer Lainnya', 'kategori_id' => $jasaEventId],
            ['nama_subkategori' => 'Olahraga', 'kategori_id' => $jasaEventId],
            ['nama_subkategori' => 'Pameran', 'kategori_id' => $jasaEventId],
            ['nama_subkategori' => 'Perkantoran', 'kategori_id' => $jasaEventId],
            ['nama_subkategori' => 'Seni', 'kategori_id' => $jasaEventId],
            ['nama_subkategori' => 'Topik Bicara', 'kategori_id' => $jasaEventId],
            
            // SubKategori untuk Sewa Peralatan Perlengkapan
            ['nama_subkategori' => 'Sewa Alat Pendingin', 'kategori_id' => $sewaPeralatanId],
            ['nama_subkategori' => 'Sewa Baleho', 'kategori_id' => $sewaPeralatanId],
            ['nama_subkategori' => 'Sewa Genset', 'kategori_id' => $sewaPeralatanId],
            ['nama_subkategori' => 'Sewa Kursi Meja', 'kategori_id' => $sewaPeralatanId],
            ['nama_subkategori' => 'Sewa Lighting', 'kategori_id' => $sewaPeralatanId],
            ['nama_subkategori' => 'Sewa Peralatan Perlengkapan Lainnya', 'kategori_id' => $sewaPeralatanId],
            ['nama_subkategori' => 'Sewa Stand', 'kategori_id' => $sewaPeralatanId],
        ]);
    }
}
