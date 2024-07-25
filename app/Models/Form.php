<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    // Field yang dapat diisi dengan mass assignment
    protected $fillable = [
        'nama', 'tgl_survey', 'periode', 'kota_id', 'kategori_id', 'sub_kategori_id'
    ];

    // Relasi dengan model Kota
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    // Relasi dengan model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Relasi dengan model SubKategori
    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class);
    }
}
