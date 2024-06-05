<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Superadmin extends Model
{
    public function form() {

        return $this->belongsTo(Form::class);

    }

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
        'form_id',
    ];
}
