<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managementdata extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'jenis_barang',
        'nama_barang',
        'harga_satuan',
        'kuartal',
        'tahun',
    ];

      

}