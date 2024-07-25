<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('kotas')->insert([
            ['nama_kota' => 'Banjarmasin'],
            ['nama_kota' => 'Banjarbaru'],
            ['nama_kota' => 'Banjar'],
            ['nama_kota' => 'Barito Kuala'],
            ['nama_kota' => 'Tapin'],
            ['nama_kota' => 'Hulu Sungai Selatan'],
            ['nama_kota' => 'Hulu Sungai Tengah'],
            ['nama_kota' => 'Hulu Sungai Utara'],
            ['nama_kota' => 'Balangan'],
            ['nama_kota' => 'Tabalong'],
            ['nama_kota' => 'Tanah Laut'],
            ['nama_kota' => 'Tanah Bumbu'],
            ['nama_kota' => 'Kotabaru'],
        ]);
    }
}
