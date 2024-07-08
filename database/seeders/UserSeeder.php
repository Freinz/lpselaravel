<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat DetailUser
        $superadmin = User::create([
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        // membuat model_has_roles
        $superadmin ->assignRole('superadmin');
      
        $operator = User::create([
            'email'=>'operator@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $operator ->assignRole('operator');
        
        $pimpinan = User::create([
            'email'=>'pimpinan@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $pimpinan ->assignRole('pimpinan');
      
        
      
    }
}
