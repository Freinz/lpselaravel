<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Superadmin extends Model
{
    public function form() {

        return $this->belongsTo(Form::class);

    }

    use HasFactory, Searchable;

    protected $fillable = [
        'nama_kota',
        'kategori',
        'sub_kategori',
        'nama_barang',
        'satuan',
        'merk',
        'harga',
        'status',
        'form_id',
    ];


    public function toSearchableArray()
{
    return [
        'nama_kota' => $this->nama_kota,
        'kategori' => $this->kategori,
        'sub_kategori' => $this->sub_kategori,
        'nama_barang' => $this->nama_barang,
    ];
}

}
