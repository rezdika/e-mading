<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Helpers\NotificationHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['user', 'category']);
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function($cat) use ($search) {
                      $cat->where('nama_kategori', 'like', '%' . $search . '%');
                  })
                  ->orWhere('tanggal', 'like', '%' . $search . '%');
            });
        }
        
        $articles = $query->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'id_kategori' => 'required|exists:categories,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        $data['id_user'] = Auth::id();
        $data['tanggal'] = now()->toDateString();
        
        // Sistem persetujuan berdasarkan role:
        // - Siswa: perlu persetujuan guru/admin
        // - Guru: bisa langsung publish atau kirim ke admin untuk verifikasi
        // - Admin: bisa langsung publish
        if (Auth::user()->role === 'siswa') {
            if ($request->has('submit_for_approval')) {
                $data['status'] = 'pending'; // Kirim untuk persetujuan guru/admin
                $message = 'Artikel berhasil dikirim untuk persetujuan guru!';
            } else {
                $data['status'] = 'draft';
                $message = 'Artikel berhasil disimpan sebagai draft!';
            }
        } elseif (Auth::user()->role === 'guru') {
            // Guru bisa langsung publish atau kirim ke admin untuk verifikasi
            $data['status'] = $request->has('publish') ? 'published' : 'draft';
            $message = 'Artikel berhasil dibuat!';
        } else {
            // Admin bisa langsung publish
            $data['status'] = $request->has('publish') ? 'published' : 'draft';
            $message = 'Artikel berhasil dibuat!';
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        $article = Article::create($data);
        
        // Buat notifikasi untuk guru/admin jika siswa mengirim artikel untuk persetujuan
        if (Auth::user()->role === 'siswa' && $request->has('submit_for_approval')) {
            NotificationHelper::createModerationNotification($article);
        }
        
        return redirect()->route('articles.index')->with('success', $message);
    }

    public function show(Article $article)
    {
        $relatedArticles = Article::with(['user', 'category'])
            ->where('id_kategori', $article->id_kategori)
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();
            
        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'id_kategori' => 'required|exists:categories,id',
            'foto' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        
        $oldStatus = $article->status;
        
        // Sistem persetujuan untuk update artikel
        if (Auth::user()->role === 'siswa') {
            if ($request->has('submit_for_approval')) {
                $data['status'] = 'pending';
                $message = 'Artikel berhasil dikirim untuk persetujuan guru!';
            } else {
                $data['status'] = 'draft';
                $message = 'Artikel berhasil diupdate sebagai draft!';
            }
        } elseif (Auth::user()->role === 'guru') {
            // Guru bisa langsung publish
            $data['status'] = $request->has('publish') ? 'published' : 'draft';
            $message = 'Artikel berhasil diupdate!';
        } else {
            // Admin bisa langsung publish
            $data['status'] = $request->has('publish') ? 'published' : 'draft';
            $message = 'Artikel berhasil diupdate!';
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('articles', 'public');
        }

        $article->update($data);
        
        // Buat notifikasi untuk guru/admin jika siswa mengirim artikel yang sudah diupdate untuk persetujuan
        if (Auth::user()->role === 'siswa' && $request->has('submit_for_approval') && $oldStatus !== 'pending') {
            NotificationHelper::createModerationNotification($article);
        }
        
        return redirect()->route('articles.index')->with('success', $message);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function submitForApproval(Article $article)
    {
        // Hanya siswa yang perlu mengirim untuk persetujuan guru
        if (Auth::user()->role !== 'siswa') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk melakukan aksi ini!');
        }

        // Hanya artikel draft yang bisa dikirim untuk persetujuan
        if ($article->status !== 'draft') {
            return redirect()->back()->with('error', 'Hanya artikel draft yang bisa dikirim untuk persetujuan!');
        }

        $article->update(['status' => 'pending']);
        
        // Buat notifikasi untuk guru/admin
        NotificationHelper::createModerationNotification($article);
        
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dikirim untuk persetujuan guru!');
    }
}