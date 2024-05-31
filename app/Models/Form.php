<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function superadmin(){
        return $this->belongsTo(Superadmin::class);
    }

    protected $fillable = [
        'nama',
        'tgl_survey',
        'periode',
        'status',
       
    ];

    // public function superadmin() {

    //     return $this->hasOne('App]\Models\Superadmin', 'id', 'table_id'); // table_id hrs ada pada database form

    // }
}
