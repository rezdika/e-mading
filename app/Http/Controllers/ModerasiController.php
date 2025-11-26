<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Helpers\NotificationHelper;
use Illuminate\Support\Facades\Auth;

class ModerasiController extends Controller
{
    public function index()
    {
        // Hanya ambil artikel yang statusnya pending untuk moderasi
        $pendingArticles = Article::with(['user', 'category'])
            ->where('status', 'pending')
            ->latest()
            ->get();
            
        $canModerate = in_array(Auth::user()->role, ['admin', 'guru']);
        
        return view('moderasi.index', compact('pendingArticles', 'canModerate'));
    }
    
    public function approve($id)
    {
        // Validasi role
        if (!in_array(Auth::user()->role, ['admin', 'guru'])) {
            return redirect()->route('moderasi.index')->with('error', 'Anda tidak memiliki izin untuk menyetujui artikel!');
        }
        
        $article = Article::findOrFail($id);
        
        // Validasi status artikel
        if ($article->status !== 'pending') {
            return redirect()->route('moderasi.index')->with('error', 'Hanya artikel pending yang bisa disetujui!');
        }
        
        $article->update(['status' => 'published']);
        
        // Create notification
        NotificationHelper::createApprovalNotification($article, 'approved');
        
        return redirect()->route('moderasi.index')->with('success', '✅ Artikel "' . $article->judul . '" berhasil disetujui dan dipublikasikan!');
    }
    
    public function reject($id)
    {
        // Validasi role
        if (!in_array(Auth::user()->role, ['admin', 'guru'])) {
            return redirect()->route('moderasi.index')->with('error', 'Anda tidak memiliki izin untuk menolak artikel!');
        }
        
        $article = Article::findOrFail($id);
        
        // Validasi status artikel
        if ($article->status !== 'pending') {
            return redirect()->route('moderasi.index')->with('error', 'Hanya artikel pending yang bisa ditolak!');
        }
        
        $article->update(['status' => 'rejected']);
        
        // Create notification
        NotificationHelper::createApprovalNotification($article, 'rejected');
        
        return redirect()->route('moderasi.index')->with('success', '❌ Artikel "' . $article->judul . '" ditolak. Penulis dapat memperbaiki dan mengirim ulang.');
    }
}