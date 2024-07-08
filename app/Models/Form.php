<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    public function superadmin(){
        return $this->hasMany(Superadmin::class, 'form_id');
    }

    protected $fillable = [
        'nama',
        'tgl_survey',
        'periode',
        'status',
        'ket_salah',

    ];

    // public function superadmin() {

    //     return $this->hasOne('App]\Models\Superadmin', 'id', 'table_id'); // table_id hrs ada pada database form

    // }
}
