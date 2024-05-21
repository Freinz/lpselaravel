<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat user
        $superadmin = User::create([
            'name'=>'superadmin',
            'email'=>'superadmin@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        // membuat model_has_roles
        $superadmin ->assignRole('superadmin');
      
        $operator = User::create([
            'name'=>'operator',
            'email'=>'operator@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $operator ->assignRole('operator');
        
        $pimpinan = User::create([
            'name'=>'pimpinan',
            'email'=>'pimpinan@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $pimpinan ->assignRole('pimpinan');
      
    }
}
