<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'nama' => 'Admin Arga',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['username' => 'guru'],
            [
                'nama' => 'Guru Music',
                'password' => Hash::make('guru123'),
                'role' => 'guru',
            ]
        );

        User::firstOrCreate(
            ['username' => 'siswa'],
            [
                'nama' => 'Siswa Band',
                'password' => Hash::make('siswa123'),
                'role' => 'siswa',
            ]
        );
    }
}