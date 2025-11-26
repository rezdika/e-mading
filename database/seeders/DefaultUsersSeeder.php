<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);

        // Guru
        User::create([
            'nama' => 'Pak Budi Guru',
            'username' => 'guru',
            'password' => Hash::make('guru123'),
            'role' => 'guru'
        ]);

        // Siswa
        User::create([
            'nama' => 'Andi Siswa',
            'username' => 'siswa',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa'
        ]);

        // Siswa tambahan
        User::create([
            'nama' => 'Siti Siswa',
            'username' => 'siswa2',
            'password' => Hash::make('siswa123'),
            'role' => 'siswa'
        ]);
    }
}