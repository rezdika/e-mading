<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Article::with(['user', 'category'])
            ->where('status', 'published')
            ->whereHas('category', function($query) {
                $query->where('nama_kategori', 'LIKE', '%pengumuman%')
                      ->orWhere('nama_kategori', 'LIKE', '%informasi%')
                      ->orWhere('nama_kategori', 'LIKE', '%berita%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('pengumuman.index', compact('pengumuman'));
    }
}