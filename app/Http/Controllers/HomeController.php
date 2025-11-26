<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');
        
        // Clear cache untuk memastikan data fresh
        \Cache::forget('featured_articles');
        \Cache::forget('latest_articles');
        \Cache::forget('popular_articles');
        
        $featuredArticles = Article::with(['user', 'category'])
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        // Query untuk latest articles dengan search
        $latestArticlesQuery = Article::with(['user', 'category'])
            ->where('status', 'published');
        
        if ($search) {
            $latestArticlesQuery->where(function($query) use ($search) {
                $query->where('judul', 'like', '%' . $search . '%')
                      ->orWhere('isi', 'like', '%' . $search . '%')
                      ->orWhereHas('category', function($q) use ($search) {
                          $q->where('nama', 'like', '%' . $search . '%');
                      })
                      ->orWhereHas('user', function($q) use ($search) {
                          $q->where('nama', 'like', '%' . $search . '%');
                      });
            });
        }
        
        $latestArticles = $latestArticlesQuery->orderBy('created_at', 'desc')->paginate(18);
            
        $popularArticles = Article::with(['user', 'category', 'likes'])
            ->where('status', 'published')
            ->withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(4)
            ->get();
            
        // Debug info
        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $pendingArticles = Article::where('status', 'pending')->count();
        
        return view('home', compact('featuredArticles', 'latestArticles', 'popularArticles', 'totalArticles', 'publishedArticles', 'pendingArticles', 'search'));
    }
}