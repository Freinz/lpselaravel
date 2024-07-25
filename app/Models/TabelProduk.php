<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TabelProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'sub_kategori_id',
        'kota_id',
        'nama_barang',
        'satuan',
        'merk',
        'harga',
        'status',
        'form_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
