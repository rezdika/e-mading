<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;

class ArticleStatusSeeder extends Seeder
{
    public function run(): void
    {
        $guru = User::where('role', 'guru')->first();
        $siswa = User::where('role', 'siswa')->first();
        $category = Category::first();

        if ($guru && $siswa && $category) {
            // Artikel dari guru dengan status pending
            Article::create([
                'judul' => 'Artikel Guru Menunggu Persetujuan',
                'isi' => 'Ini adalah artikel dari guru yang menunggu persetujuan admin.',
                'tanggal' => now()->toDateString(),
                'id_user' => $guru->id,
                'id_kategori' => $category->id,
                'status' => 'pending'
            ]);

            // Artikel dari siswa dengan status pending
            Article::create([
                'judul' => 'Artikel Siswa Menunggu Persetujuan',
                'isi' => 'Ini adalah artikel dari siswa yang menunggu persetujuan admin.',
                'tanggal' => now()->toDateString(),
                'id_user' => $siswa->id,
                'id_kategori' => $category->id,
                'status' => 'pending'
            ]);

            // Artikel draft dari siswa
            Article::create([
                'judul' => 'Draft Artikel Siswa',
                'isi' => 'Ini adalah draft artikel dari siswa.',
                'tanggal' => now()->toDateString(),
                'id_user' => $siswa->id,
                'id_kategori' => $category->id,
                'status' => 'draft'
            ]);
        }
    }
}