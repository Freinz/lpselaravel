<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Inputuser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name', 'email', 'password', 'role_id', 'address_user', 'phone_user', 'nip', 'no_ktp', 'tempat_lahir', 'tanggal_lahir', 'status'
    ];

    // Set password hashing
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    
}
