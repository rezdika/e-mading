@extends('layouts.app')

@section('title', 'Profil ' . $user->nama . ' - Mading Arga')
@section('body-class', 'profile-page')

@push('styles')
<style>
body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #f9f8f6 0%, #f1ede8 50%, #ebe5df 100%);
    min-height: 100vh;
}

.profile-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
    color: white;
}

.profile-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect x="10" y="10" width="15" height="20" fill="%23ffffff" opacity="0.1" rx="2"/><rect x="70" y="15" width="12" height="18" fill="%23ffffff" opacity="0.08" rx="2"/></svg>') repeat;
    animation: float 20s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.profile-content {
    background: white;
    margin-top: -50px;
    position: relative;
    z-index: 3;
    border-radius: 30px 30px 0 0;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
    padding: 3rem 2rem;
}

.profile-avatar {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(45deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 3rem;
    color: white;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.stat-card {
    background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
    border-radius: 20px;
    padding: 2rem;
    text-align: center;
    margin-bottom: 1rem;
    box-shadow: 0 8px 20px rgba(201, 181, 156, 0.15);
    border: 1px solid rgba(217, 207, 199, 0.8);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(201, 181, 156, 0.2);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: #c9b59c;
    margin-bottom: 0.5rem;
}

.stat-label {
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.article-card {
    background: linear-gradient(145deg, #ffffff 0%, #f8f6f3 50%, #f0ebe5 100%);
    border-radius: 20px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 8px 20px rgba(201, 181, 156, 0.1);
    border: 1px solid rgba(217, 207, 199, 0.3);
    transition: all 0.3s ease;
}

.article-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(201, 181, 156, 0.15);
}

.btn-primary {
    background: linear-gradient(45deg, #c9b59c, #b8a082) !important;
    border: none;
    border-radius: 25px;
    padding: 12px 24px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(201, 181, 156, 0.3);
}

.breadcrumb-custom {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    padding: 0.5rem 1rem;
    margin-bottom: 2rem;
}

.breadcrumb-custom a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
}

.breadcrumb-custom .active {
    color: white;
}
</style>
@endpush

@section('content')
<!-- Profile Hero -->
<section class="profile-hero">
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('home') }}">🏠 Home</a> 
            <span class="mx-2">/</span> 
            <a href="{{ route('dashboard') }}">📊 Dashboard</a>
            <span class="mx-2">/</span>
            <span class="active">👤 Profil</span>
        </nav>
        
        <div class="text-center">
            <div class="profile-avatar">
                @if($user->role == 'admin')
                    👑
                @elseif($user->role == 'guru')
                    ✏️
                @else
                    📚
                @endif
            </div>
            <h1 class="mb-2" style="font-size: 2.5rem; font-weight: 800;">{{ $user->nama }}</h1>
            <p class="mb-3" style="font-size: 1.2rem; opacity: 0.9;">@{{ $user->username }}</p>
            @if($user->role == 'admin')
                <span class="badge" style="background: rgba(220, 53, 69, 0.2); color: #dc3545; font-size: 1rem; padding: 8px 16px; border-radius: 20px;">👑 Administrator</span>
            @elseif($user->role == 'guru')
                <span class="badge" style="background: rgba(25, 135, 84, 0.2); color: #198754; font-size: 1rem; padding: 8px 16px; border-radius: 20px;">✏️ Guru</span>
            @else
                <span class="badge" style="background: rgba(13, 202, 240, 0.2); color: #0dcaf0; font-size: 1rem; padding: 8px 16px; border-radius: 20px;">📚 Siswa</span>
            @endif
        </div>
    </div>
</section>

<!-- Profile Content -->
<section class="profile-content">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" style="border-radius: 15px; margin-bottom: 2rem;">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        <div class="text-center mb-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Edit Profil
            </a>
        </div>
        
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">{{ $articles->count() }}</div>
                    <div class="stat-label">📰 Total Artikel</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">{{ $articles->where('status', 'published')->count() }}</div>
                    <div class="stat-label">✅ Dipublikasikan</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-number">{{ $articles->sum('likes_count') }}</div>
                    <div class="stat-label">❤️ Total Likes</div>
                </div>
            </div>
        </div>
        
        <div class="text-center mb-4">
            <h3 style="color: #c9b59c; font-weight: 700;">📝 Artikel Saya</h3>
            <p class="text-muted">Koleksi karya tulis yang telah dibuat</p>
        </div>
        @forelse($articles as $article)
            <div class="article-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="flex-grow-1">
                        <h5 class="mb-2" style="color: #333; font-weight: 600;">{{ $article->judul }}</h5>
                        <p class="text-muted mb-2">{{ Str::limit(strip_tags($article->isi), 120) }}</p>
                        <div class="d-flex gap-3 align-items-center">
                            @if($article->status == 'published')
                                <span class="badge" style="background: #d4edda; color: #155724; border-radius: 15px;">✅ Dipublikasikan</span>
                            @elseif($article->status == 'pending')
                                <span class="badge" style="background: #fff3cd; color: #856404; border-radius: 15px;">⏳ Menunggu Persetujuan</span>
                            @elseif($article->status == 'rejected')
                                <span class="badge" style="background: #f8d7da; color: #721c24; border-radius: 15px;">❌ Ditolak</span>
                            @else
                                <span class="badge" style="background: #e2e3e5; color: #383d41; border-radius: 15px;">📝 Draft</span>
                            @endif
                            <small class="text-muted">
                                <i class="bi bi-heart-fill" style="color: #e74c3c;"></i> {{ $article->likes_count }}
                            </small>
                            <small class="text-muted">
                                <i class="bi bi-calendar3"></i> {{ $article->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="ms-3">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm" style="background: #c9b59c; color: white; border-radius: 15px; margin-right: 5px;">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm" style="background: #f39c12; color: white; border-radius: 15px;">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <div style="font-size: 5rem; opacity: 0.3; margin-bottom: 1rem;">📝</div>
                <h4 style="color: #666; margin-bottom: 1rem;">Belum ada artikel</h4>
                <p class="text-muted mb-3">Mulai menulis dan bagikan karya Anda!</p>
                <a href="{{ route('articles.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tulis Artikel Pertama
                </a>
            </div>
        @endforelse
        
        <div class="text-center mt-5">
            <a href="{{ route('dashboard') }}" class="btn" style="background: #6c757d; color: white; border-radius: 25px; padding: 12px 24px;">
                <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>
</section>
@endsection