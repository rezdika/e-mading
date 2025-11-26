<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;

class ArsipController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['user', 'category'])
            ->where('status', 'published');
            
        // Filter by year
        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }
        
        // Filter by month
        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }
        
        // Filter by category
        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }
        
        $articles = $query->orderBy('created_at', 'desc')->paginate(12);
        
        // Get available years from articles
        $years = Article::selectRaw('YEAR(created_at) as year')
            ->where('status', 'published')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year')
            ->filter();
            
        $categories = Category::all();
        
        // Get months array
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        
        return view('arsip.index', compact('articles', 'years', 'categories', 'months'));
    }
}