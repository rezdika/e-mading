@extends('layouts.app')

@section('title', 'Moderasi Konten - Mading Arga')

@push('styles')
<style>
body {
    background: linear-gradient(135deg, #f9f8f6 0%, #f1ede8 50%, #ebe5df 100%);
    min-height: 100vh;
    position: relative;
}

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 80%, rgba(201, 181, 156, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(217, 207, 199, 0.1) 0%, transparent 50%);
    pointer-events: none;
    z-index: 0;
}

.container {
    position: relative;
    z-index: 1;
}

.moderasi-hero {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.25) 0%, rgba(255, 255, 255, 0.1) 100%);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 3rem 0;
    margin: 2rem 0;
    box-shadow: 0 20px 40px rgba(201, 181, 156, 0.15);
    position: relative;
    overflow: hidden;
}

.moderasi-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    opacity: 0.8;
    z-index: -1;
}

.article-card {
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.9) 0%, rgba(255, 255, 255, 0.7) 100%);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(201, 181, 156, 0.1);
    margin-bottom: 2rem;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
    animation: slideInUp 0.6s ease-out;
}

.article-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(201, 181, 156, 0.1), transparent);
    transition: left 0.6s;
}

.article-card:hover::before {
    left: 100%;
}

.article-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px rgba(201, 181, 156, 0.2);
    border-color: rgba(201, 181, 156, 0.4);
}

@keyframes slideInUp {
    0% {
        transform: translateY(30px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

.article-header {
    padding: 2rem;
    border-bottom: 1px solid rgba(201, 181, 156, 0.2);
    background: linear-gradient(145deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
}

.article-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 0.75rem;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.article-meta {
    color: #4a5568;
    font-size: 0.9rem;
    font-weight: 500;
}

.article-meta i {
    color: #c9b59c;
    margin-right: 0.25rem;
}

.article-content {
    padding: 1.5rem 2rem;
    color: #2d3748;
    line-height: 1.7;
    font-size: 1rem;
}

.article-content p {
    color: #2d3748;
    margin-bottom: 1rem;
}

.article-actions {
    padding: 1.5rem 2rem;
    background: linear-gradient(145deg, rgba(201, 181, 156, 0.05) 0%, rgba(201, 181, 156, 0.1) 100%);
    backdrop-filter: blur(10px);
    border-top: 1px solid rgba(201, 181, 156, 0.2);
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    align-items: center;
}

.btn-approve {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
    color: white !important;
    border: none;
    padding: 10px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
}

.btn-approve:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
    background: linear-gradient(135deg, #218838 0%, #1e7e34 100%) !important;
    color: white !important;
}

.btn-reject {
    background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%) !important;
    color: white !important;
    border: none;
    padding: 10px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
}

.btn-reject:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
    background: linear-gradient(135deg, #c82333 0%, #bd2130 100%) !important;
    color: white !important;
}

.btn-view {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    color: white !important;
    border: none;
    padding: 10px 24px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.4s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn-view:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #5568d3 0%, #6c5ce7 100%) !important;
    color: white !important;
}

.btn-approve i,
.btn-approve:hover i,
.btn-reject i,
.btn-reject:hover i,
.btn-view i,
.btn-view:hover i {
    color: white !important;
}

/* FORCE ALL TEXT IN MODERASI PAGE TO BE VISIBLE */
.moderasi-hero h1,
.moderasi-hero p,
.moderasi-hero .lead {
    color: white !important;
    -webkit-text-fill-color: white !important;
}

.status-badge {
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
}

.status-draft {
    background: #ffc107;
    color: #856404;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #666;
}

/* FORCE TEXT VISIBILITY - OVERRIDE ALL OTHER CSS */
.container h1,
.container h2,
.container h3,
.container h4,
.container h5,
.container h6,
.article-card h1,
.article-card h2,
.article-card h3,
.article-card h4,
.article-card h5,
.article-card h6,
.article-title,
.article-header h4,
.article-meta,
.article-meta span,
.article-meta i,
.article-content,
.article-content p,
.article-content small {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
    background: none !important;
    background-image: none !important;
    -webkit-background-clip: unset !important;
    background-clip: unset !important;
}

.text-muted,
.article-meta {
    color: #495057 !important;
    -webkit-text-fill-color: #495057 !important;
}

.empty-state h4,
.empty-state p {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
}

.container > div > div > div h3 {
    color: #000000 !important;
    -webkit-text-fill-color: #000000 !important;
}

.container > div > div > div p {
    color: #495057 !important;
    -webkit-text-fill-color: #495057 !important;
}

/* FORCE BUTTON TEXT TO BE VISIBLE */
.btn-approve,
.btn-approve:hover,
.btn-approve:focus,
.btn-approve:active {
    color: white !important;
    -webkit-text-fill-color: white !important;
}

.btn-reject,
.btn-reject:hover,
.btn-reject:focus,
.btn-reject:active {
    color: white !important;
    -webkit-text-fill-color: white !important;
}

.btn-view,
.btn-view:hover,
.btn-view:focus,
.btn-view:active {
    color: white !important;
    -webkit-text-fill-color: white !important;
}
</style>
@endpush

@section('content')
<section class="moderasi-hero">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-3" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important; text-shadow: 2px 2px 4px rgba(255,255,255,0.3);">🛡️ Moderasi Konten</h1>
        <p class="lead" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important; text-shadow: 1px 1px 2px rgba(255,255,255,0.3);">Tinjau dan setujui artikel sebelum dipublikasikan</p>
        @if(!$canModerate)
        <div class="alert alert-warning d-inline-block mt-2">
            <i class="bi bi-info-circle"></i> Anda login sebagai {{ ucfirst(Auth::user()->role) }}. Hanya Admin dan Guru yang dapat melakukan moderasi.
        </div>
        @endif
    </div>
</section>

<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 style="color: #212529;">📝 Artikel Perlu Verifikasi</h3>
            <p class="mb-0" style="color: #6c757d;">Review dan setujui artikel sebelum dipublikasikan</p>
        </div>
        <div>
            <span class="badge bg-warning text-dark me-2" style="font-size: 1rem; padding: 8px 15px;">
                <i class="bi bi-clock-history"></i> {{ $pendingArticles->count() }} Menunggu Verifikasi
            </span>
            <span class="badge bg-success me-2" style="font-size: 1rem; padding: 8px 15px;">
                <i class="bi bi-check-circle"></i> {{ \App\Models\Article::where('status', 'published')->count() }} Dipublikasi
            </span>
        </div>
    </div>
    
    @if($pendingArticles->count() == 0)
    <div class="alert alert-success text-center py-5">
        <i class="bi bi-check-circle" style="font-size: 3rem; color: #28a745;"></i>
        <h4 class="mt-3" style="color: #155724;">Semua Artikel Sudah Diverifikasi!</h4>
        <p style="color: #155724;">Tidak ada artikel yang menunggu verifikasi saat ini.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-2">
            <i class="bi bi-house"></i> Kembali ke Dashboard
        </a>
    </div>
    @else
    <div class="alert alert-info mb-4">
        <i class="bi bi-info-circle"></i> <strong>Info:</strong> Artikel yang disetujui akan langsung muncul di mading publik. Artikel yang ditolak akan dikembalikan ke penulis untuk diperbaiki.
    </div>
    @endif

    @forelse($pendingArticles as $article)
    <div class="article-card">
        <div class="article-header">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h4 class="article-title">{{ $article->judul }}</h4>
                    <div class="article-meta">
                        <span><i class="bi bi-person"></i> {{ $article->user->name }}</span>
                        <span class="mx-2">•</span>
                        <span><i class="bi bi-folder"></i> {{ $article->category->nama ?? 'Umum' }}</span>
                        <span class="mx-2">•</span>
                        <span><i class="bi bi-calendar"></i> {{ $article->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
                <span class="status-badge {{ $article->status == 'published' ? 'bg-success text-white' : ($article->status == 'draft' ? 'status-draft' : 'bg-warning text-dark') }}">
                    {{ ucfirst($article->status) }}
                </span>
            </div>
        </div>
        
        <div class="article-content">
            <p>{{ Str::limit(strip_tags($article->isi), 200) }}</p>
            @if($article->foto)
            <div class="mt-2">
                <small class="text-muted"><i class="bi bi-image"></i> Artikel memiliki gambar</small>
            </div>
            @endif
        </div>
        
        <div class="article-actions">
            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-view btn-sm" target="_blank">
                <i class="bi bi-eye"></i> Lihat Detail
            </a>
            
            @if(in_array(Auth::user()->role, ['admin', 'guru']))
                @if($article->status == 'pending')
                    <form method="POST" action="{{ route('moderasi.approve', $article->id) }}" class="d-inline" onsubmit="return confirm('✅ Setujui dan publikasikan artikel ini?\n\nArtikel akan langsung muncul di mading publik.')">
                        @csrf
                        <button type="submit" class="btn btn-approve btn-sm">
                            <i class="bi bi-check-circle"></i> Setujui & Publikasikan
                        </button>
                    </form>
                    <form method="POST" action="{{ route('moderasi.reject', $article->id) }}" class="d-inline" onsubmit="return confirm('❌ Tolak artikel ini?\n\nArtikel akan dikembalikan ke penulis untuk diperbaiki.')">
                        @csrf
                        <button type="submit" class="btn btn-reject btn-sm">
                            <i class="bi bi-x-circle"></i> Tolak
                        </button>
                    </form>
                @else
                    <span class="badge bg-success"><i class="bi bi-check-circle"></i> Sudah Diproses</span>
                @endif
            @else
                <span class="badge bg-warning text-dark"><i class="bi bi-info-circle"></i> Hanya Admin/Guru yang dapat moderasi</span>
            @endif
        </div>
    </div>
    @empty
    <div class="empty-state">
        <div style="font-size: 4rem; margin-bottom: 1rem;">📝</div>
        <h4 style="color: #212529;">Halaman Moderasi Konten</h4>
        <p style="color: #495057;">Di sini Anda dapat meninjau, menyetujui, atau menolak artikel yang dikirim oleh penulis.</p>
        <div class="mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-house"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
    @endforelse


</div>

<div class="container mb-5">
    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg rounded-pill px-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
        <a href="{{ route('articles.index') }}" class="btn btn-outline-primary btn-lg rounded-pill px-4 ms-2">
            <i class="bi bi-list"></i> Kelola Artikel
        </a>
    </div>
</div>
@endsection