<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_user',
        'alamat',
        'no_hp',
        'nip',
        'no_ktp',
        'tempat_lahir',
        'tanggal_lahir',
    ];
}

