<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Dekorasi'],
            ['nama_kategori' => 'Jasa Event Organizer'],
            ['nama_kategori' => 'Sewa Peralatan Perlengkapan'],
        ]);
    }
}
