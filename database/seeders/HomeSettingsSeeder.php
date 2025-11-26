<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSettingsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('home_settings')->insert([
            'hero_title' => 'Selamat Datang di Arga Mading',
            'hero_subtitle' => 'Platform digital untuk berbagi artikel dan informasi sekolah',
            'about_title' => 'Tentang Arga Mading',
            'about_description' => 'Arga Mading adalah platform digital yang memungkinkan siswa dan guru untuk berbagi artikel, berita, dan informasi penting sekolah.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}