<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama_kategori' => 'Berita Sekolah'],
            ['nama_kategori' => 'Olahraga'],
            ['nama_kategori' => 'Seni & Budaya'],
            ['nama_kategori' => 'Teknologi'],
            ['nama_kategori' => 'Opini'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}