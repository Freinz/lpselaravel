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
        'kategori',
        'sub_kategori',
        'nama_barang',
        'satuan',
        'merk',
        'status',
        'form_id',
        'banjarmasin',
        'banjarbaru',
        'banjar',
        'batola',
        'tapin',
        'hss',
        'hst',
        'hsu',
        'balangan',
        'tabalong',
        'tanah_laut',
        'tanah_bumbu',
        'kotabaru',
    ];
    


    public function toSearchableArray()
{
    return [
        'kategori' => $this->kategori,
        'sub_kategori' => $this->sub_kategori,
        'nama_barang' => $this->nama_barang,
    ];
}

}
