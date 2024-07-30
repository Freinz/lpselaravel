<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat DetailUser untuk Superadmin
        $superadminDetail = DetailUser::create([
            'email' => 'superadmin@gmail.com',
            'name' => 'Super Admin',
            'alamat' => 'Alamat Super Admin',
            'no_hp' => '081234567890',
            'nip' => '1234567890',
            'no_ktp' => '1234567890123456',
            'tempat_lahir' => 'Tempat Lahir Super Admin',
            'tanggal_lahir' => '1980-01-01',
        ]);

        // Membuat User Superadmin dengan detail_user_id
        $superadmin = User::create([
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678'),
            'detail_user_id' => $superadminDetail->id,
        ]);
        // Assign role to Superadmin
        $superadmin->assignRole('superadmin');

        // Membuat DetailUser untuk Operator
        $operatorDetail = DetailUser::create([
            'email' => 'operator@gmail.com',
            'name' => 'Operator',
            'alamat' => 'Alamat Operator',
            'no_hp' => '081234567891',
            'nip' => '1234567891',
            'no_ktp' => '1234567890123457',
            'tempat_lahir' => 'Tempat Lahir Operator',
            'tanggal_lahir' => '1985-02-02',
        ]);

        // Membuat User Operator dengan detail_user_id
        $operator = User::create([
            'email' => 'operator@gmail.com',
            'password' => bcrypt('12345678'),
            'detail_user_id' => $operatorDetail->id,
        ]);
        // Assign role to Operator
        $operator->assignRole('operator');

        // Membuat DetailUser untuk Pimpinan
        $pimpinanDetail = DetailUser::create([
            'email' => 'pimpinan@gmail.com',
            'name' => 'Pimpinan',
            'alamat' => 'Alamat Pimpinan',
            'no_hp' => '081234567892',
            'nip' => '1234567892',
            'no_ktp' => '1234567890123458',
            'tempat_lahir' => 'Tempat Lahir Pimpinan',
            'tanggal_lahir' => '1975-03-03',
        ]);

        // Membuat User Pimpinan dengan detail_user_id
        $pimpinan = User::create([
            'email' => 'pimpinan@gmail.com',
            'password' => bcrypt('12345678'),
            'detail_user_id' => $pimpinanDetail->id,
        ]);
        // Assign role to Pimpinan
        $pimpinan->assignRole('pimpinan');
    }
}
