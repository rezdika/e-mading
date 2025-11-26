<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Like;

class StatistikController extends Controller
{
    public function index()
    {
        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'draft')->count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        $totalLikes = Like::count();
        
        $articlesByMonth = Article::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month');
            
        return view('statistik.index', compact(
            'totalArticles', 'publishedArticles', 'draftArticles', 
            'totalCategories', 'totalUsers', 'totalLikes',
            'articlesByMonth'
        ));
    }
}