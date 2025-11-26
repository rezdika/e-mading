<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = [
            [
                'title' => 'Cara Login ke Sistem E-Mading',
                'description' => 'Panduan lengkap untuk masuk ke sistem',
                'icon' => 'bi-box-arrow-in-right',
                'steps' => [
                    'Buka halaman login',
                    'Masukkan username dan password',
                    'Klik tombol Login',
                    'Anda akan diarahkan ke dashboard'
                ]
            ],
            [
                'title' => 'Cara Menulis Artikel',
                'description' => 'Tutorial membuat dan mempublikasikan artikel',
                'icon' => 'bi-pencil-square',
                'steps' => [
                    'Login ke sistem',
                    'Klik menu "Artikel" > "Buat Artikel"',
                    'Isi judul, konten, dan pilih kategori',
                    'Upload gambar jika diperlukan',
                    'Klik "Simpan" atau "Publikasikan"'
                ]
            ],
            [
                'title' => 'Cara Upload Gambar',
                'description' => 'Panduan mengunggah dan mengelola gambar',
                'icon' => 'bi-image',
                'steps' => [
                    'Buka halaman upload',
                    'Pilih file gambar (JPG, PNG, GIF)',
                    'Pastikan ukuran tidak lebih dari 2MB',
                    'Klik "Upload"',
                    'Gambar siap digunakan'
                ]
            ],
            [
                'title' => 'Cara Mencari Artikel',
                'description' => 'Tutorial menggunakan fitur pencarian',
                'icon' => 'bi-search',
                'steps' => [
                    'Gunakan kotak pencarian di navbar',
                    'Ketik kata kunci artikel',
                    'Tekan Enter atau klik tombol Cari',
                    'Lihat hasil pencarian',
                    'Klik artikel untuk membaca'
                ]
            ]
        ];
        
        return view('tutorial.index', compact('tutorials'));
    }
}