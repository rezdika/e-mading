<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount(['articles' => function($query) {
            $query->where('status', 'published');
        }])->get();
        
        return view('category', compact('categories'));
    }
    
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $articles = Article::where('id_kategori', $id)
                          ->where('status', 'published')
                          ->orderBy('tanggal', 'desc')
                          ->paginate(12);
        
        return view('category-articles', compact('category', 'articles'));
    }
}