<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managementdata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kota',
        'kategori',
        'sub_kategori',
        'nama_barang',
        'satuan',
        'merk',
        'harga',
        'status',
    ];

      

}