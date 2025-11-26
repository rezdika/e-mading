<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function details($id)
    {
        $article = Article::with(['user', 'category', 'likes', 'comments.user'])
            ->where('status', 'published')
            ->findOrFail($id);
            
        // Kirim notifikasi ke siswa jika admin/guru melihat artikel mereka
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'guru'])) {
            // Cek apakah artikel milik siswa
            if ($article->user->role === 'siswa') {
                // Cek apakah sudah ada notifikasi view dalam 24 jam terakhir
                $recentView = \App\Models\Notification::where('user_id', $article->id_user)
                    ->where('article_id', $article->id)
                    ->where('type', 'viewed')
                    ->where('created_at', '>=', now()->subDay())
                    ->first();
                
                if (!$recentView) {
                    \App\Models\Notification::create([
                        'user_id' => $article->id_user,
                        'article_id' => $article->id,
                        'type' => 'viewed',
                        'title' => 'Artikel Anda Dilihat! 👀',
                        'message' => Auth::user()->nama . ' (' . ucfirst(Auth::user()->role) . ') telah melihat artikel "' . $article->judul . '"',
                        'is_read' => false
                    ]);
                }
            }
        }
            
        $relatedArticles = Article::with(['user', 'category'])
            ->where('status', 'published')
            ->where('id_kategori', $article->id_kategori)
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();
            
        return view('blog-details', compact('article', 'relatedArticles'));
    }

    public function toggleLike($id)
    {
        $article = Article::findOrFail($id);
        $userId = Auth::id();
        
        $like = Like::where('id_artikel', $id)->where('id_user', $userId)->first();
        
        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            Like::create(['id_artikel' => $id, 'id_user' => $userId]);
            $liked = true;
        }
        
        return response()->json([
            'liked' => $liked,
            'count' => $article->likesCount()
        ]);
    }
    
    public function downloadPdf($id)
    {
        $article = Article::with(['user', 'category'])
            ->where('status', 'published')
            ->findOrFail($id);
        
        $html = view('articles.pdf', compact('article'))->render();
        
        $filename = 'artikel_' . str_replace(' ', '_', $article->judul) . '.html';
        
        return response($html)
            ->header('Content-Type', 'text/html')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}