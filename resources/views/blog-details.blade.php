@extends('layouts.app')

@section('title', $article->judul . ' - Mading Arga')
@section('body-class', 'blog-details-page')

@push('styles')
<style>
/* CSS Reset untuk halaman blog-details */
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

.main {
    width: 100%;
    overflow-x: hidden;
}

/* Pastikan semua container tidak overflow */
.container,
.container-fluid {
    max-width: 100%;
    overflow-x: hidden;
}
.article-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
    width: 100%;
    min-height: 400px;
}

.article-hero::before {
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

.article-header {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.article-category {
    display: inline-block;
    background: rgba(255,255,255,0.2);
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1rem;
    backdrop-filter: blur(10px);
}

.article-main-title {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.article-meta-hero {
    display: flex;
    justify-content: center;
    gap: 2rem;
    margin-top: 1.5rem;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: rgba(255,255,255,0.9);
    font-size: 0.95rem;
}

.article-content-wrapper {
    background: white;
    margin-top: -50px;
    position: relative;
    z-index: 3;
    border-radius: 30px 30px 0 0;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
}

.article-image-container {
    padding: 2rem 2rem 0;
}

.article-main-image {
    width: 400px;
    height: 300px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    float: left;
    margin: 0 2rem 1rem 0;
}

@media (max-width: 768px) {
    .article-main-image {
        float: none;
        width: 100%;
        margin: 0 0 1rem 0;
    }
}

.article-body {
    padding: 2rem;
    max-width: 800px;
    margin: 0 auto;
    overflow: auto;
}

.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
    margin-bottom: 2rem;
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-tags {
    display: flex;
    gap: 0.5rem;
    margin: 2rem 0;
    flex-wrap: wrap;
}

.tag-item {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white !important;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.tag-item:hover {
    transform: scale(1.05);
    color: white !important;
}

.article-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin: 2rem 0;
    padding: 2rem;
    background: rgba(102, 126, 234, 0.05);
    border-radius: 20px;
}

.action-btn {
    padding: 12px 24px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-like {
    background: linear-gradient(45deg, #ff6b6b, #ee5a52);
    color: white !important;
}

.btn-share {
    background: linear-gradient(45deg, #4ecdc4, #44a08d);
    color: white !important;
}

.btn-back {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white !important;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    color: white !important;
}

.action-btn * {
    color: white !important;
}

.related-articles {
    background: linear-gradient(135deg, #fdfcfb 0%, #f7f4f1 50%, #fdfcfb 100%);
    padding: 5rem 0;
    margin-top: 3rem;
    position: relative;
}

.related-articles::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 15% 25%, rgba(201, 181, 156, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 85% 75%, rgba(201, 181, 156, 0.02) 0%, transparent 50%),
        linear-gradient(45deg, transparent 48%, rgba(255,255,255,0.5) 50%, transparent 52%);
    pointer-events: none;
}

.related-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 600;
    color: #8b7355;
    margin-bottom: 3.5rem;
    position: relative;
    z-index: 2;
    letter-spacing: -0.5px;
}

.related-title::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 2px;
    background: linear-gradient(90deg, transparent, #c9b59c, transparent);
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    position: relative;
    z-index: 2;
    max-width: 1200px;
    margin: 0 auto;
}

.related-card {
    background: rgba(255, 255, 255, 0.8);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 
        0 4px 20px rgba(201, 181, 156, 0.08),
        0 1px 3px rgba(0, 0, 0, 0.05);
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    cursor: pointer;
    border: 1px solid rgba(201, 181, 156, 0.08);
    backdrop-filter: blur(20px);
    position: relative;
}

.related-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 100%);
    pointer-events: none;
    z-index: 1;
}

.related-card:hover {
    transform: translateY(-6px);
    box-shadow: 
        0 12px 40px rgba(201, 181, 156, 0.12),
        0 4px 12px rgba(0, 0, 0, 0.08);
}

.related-image {
    height: 180px;
    background: linear-gradient(135deg, #f5f1eb 0%, #ede7dd 100%);
    position: relative;
    overflow: hidden;
}

.related-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.02) 100%);
    z-index: 2;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
    filter: brightness(1.02) saturate(0.95);
}

.related-card:hover .related-image img {
    transform: scale(1.03);
    filter: brightness(1.05) saturate(1);
}

.related-content {
    padding: 1.8rem;
    background: rgba(255, 255, 255, 0.95);
    position: relative;
    z-index: 2;
}

.related-card-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #5a4a3a;
    margin-bottom: 0.8rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    letter-spacing: -0.2px;
}

.related-excerpt {
    font-size: 0.85rem;
    color: #8a7968;
    line-height: 1.6;
    margin-bottom: 1.2rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    opacity: 0.9;
}

.related-meta {
    font-size: 0.75rem;
    color: #a69688;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid rgba(201, 181, 156, 0.08);
}

.related-author {
    display: flex;
    align-items: center;
    gap: 0.4rem;
    font-weight: 500;
    color: #9b8774;
}

.related-date {
    color: #b5a394;
    font-weight: 400;
    opacity: 0.8;
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

.author-info {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    margin: 2rem 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    border-left: 4px solid;
    border-image: linear-gradient(45deg, #667eea, #764ba2) 1;
}

.author-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(45deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    font-weight: bold;
}

/* Fix untuk konten yang berantakan */
.article-content * {
    max-width: 100%;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 1rem 0;
}

.article-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 1rem 0;
}

.article-content table td,
.article-content table th {
    padding: 0.5rem;
    border: 1px solid #ddd;
}

/* Reset untuk elemen yang mungkin rusak */
.article-content-wrapper * {
    box-sizing: border-box;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Comment Section Styles */
.comments-section {
    background: #f8f9fa;
    border-radius: 20px;
    padding: 2rem;
    margin-top: 3rem;
}

.comment-form {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.comment-item {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.comment-item:hover {
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.comment-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(45deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    font-weight: bold;
    flex-shrink: 0;
}

.comment-content {
    margin: 0;
    color: #555;
    line-height: 1.6;
    word-wrap: break-word;
}

.comment-meta {
    color: #666;
    font-size: 0.85rem;
}

.comment-author {
    margin: 0;
    color: #333;
    font-weight: 600;
}

.btn-delete-comment {
    border-radius: 20px;
    transition: all 0.3s ease;
}

.btn-delete-comment:hover {
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .article-main-title {
        font-size: 2rem;
    }
    
    .article-meta-hero {
        gap: 1rem;
    }
    
    .article-actions {
        flex-direction: column;
    }
    
    .container {
        padding: 0 10px;
    }
    
    .comments-section {
        padding: 1rem;
        margin-top: 2rem;
    }
    
    .comment-form {
        padding: 1rem;
    }
    
    .comment-item {
        padding: 1rem;
    }
    
    .comment-avatar {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
}
</style>
@endpush

@section('content')
<!-- Article Hero -->
<section class="article-hero">
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('home') }}">🏠 Home</a> 
            <span class="mx-2">/</span> 
            <a href="{{ route('home') }}">📰 Karya Siswa</a>
            <span class="mx-2">/</span>
            <span class="active">{{ Str::limit($article->judul, 30) }}</span>
        </nav>
        
        <div class="article-header">
            <div class="article-category">
                📂 {{ $article->category->nama ?? 'Umum' }}
            </div>
            <h1 class="article-main-title">{{ $article->judul }}</h1>
            <div class="article-meta-hero">
                <div class="meta-item">
                    <i class="bi bi-person-circle"></i>
                    <span>{{ $article->user->nama }}</span>
                </div>
                <div class="meta-item">
                    <i class="bi bi-calendar3"></i>
                    <span>{{ $article->tanggal->format('d F Y') }}</span>
                </div>
                <div class="meta-item">
                    <i class="bi bi-clock"></i>
                    <span>{{ ceil(str_word_count(strip_tags($article->isi)) / 200) }} menit baca</span>
                </div>
                <div class="meta-item">
                    <i class="bi bi-heart-fill"></i>
                    <span>{{ $article->likesCount() }} likes</span>
                </div>
                <div class="meta-item">
                    <i class="bi bi-chat-dots"></i>
                    <a href="#comments-section" class="scroll-to-comments" style="color: rgba(255,255,255,0.9); text-decoration: none;">{{ $article->commentsCount() }} komentar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content-wrapper">
    @if($article->foto)
    <div class="article-image-container">
        <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" class="article-main-image">
    </div>
    @endif
    
    <div class="article-body">
        <div class="article-content">
            {!! nl2br(e($article->isi)) !!}
        </div>
        
        <div class="article-tags">
            <span class="tag-item" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">📂 {{ $article->category->nama ?? 'Umum' }}</span>
            <span class="tag-item" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">📰 Mading</span>
            <span class="tag-item" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">🏫 Sekolah</span>
        </div>
        
        <!-- Author Info -->
        <div class="author-info">
            <div class="d-flex align-items-center gap-3">
                <div class="author-avatar">
                    {{ strtoupper(substr($article->user->nama, 0, 1)) }}
                </div>
                <div>
                    <h5 class="mb-1">{{ $article->user->nama }}</h5>
                    <p class="text-muted mb-0">{{ $article->user->role == 'siswa' ? 'Penulis Muda' : (ucfirst($article->user->role)) }} • Bergabung {{ $article->user->created_at->format('M Y') }}</p>
                </div>
            </div>
        </div>
        
        <!-- Article Actions -->
        <div class="article-actions">
            @auth
            <button type="button" class="action-btn btn-like" id="likeBtn" data-article-id="{{ $article->id }}" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">
                <i class="bi bi-heart{{ Auth::user() && $article->isLikedBy(Auth::id()) ? '-fill' : '' }}" style="color: #000000 !important;"></i> 
                <span id="likeText" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">{{ Auth::user() && $article->isLikedBy(Auth::id()) ? 'Disukai' : 'Suka' }}</span> 
                (<span id="likeCount" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">{{ $article->likesCount() }}</span>)
            </button>
            @else
            <a href="{{ route('login') }}" class="action-btn btn-like" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">
                <i class="bi bi-heart" style="color: #000000 !important;"></i> Suka ({{ $article->likesCount() }})
            </a>
            @endauth
            <a href="{{ route('blog-details.download-pdf', $article->id) }}" class="action-btn" style="background: linear-gradient(45deg, #f093fb, #f5576c); color: #000000 !important; -webkit-text-fill-color: #000000 !important;">
                <i class="bi bi-download" style="color: #000000 !important;"></i> Download PDF
            </a>
            <a href="javascript:void(0)" class="action-btn btn-share" onclick="navigator.share({title: '{{ $article->judul }}', url: window.location.href.split('#')[0]}).catch(() => {})" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">
                <i class="bi bi-share" style="color: #000000 !important;"></i> Bagikan
            </a>
            <a href="{{ route('home') }}" class="action-btn btn-back" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important;">
                <i class="bi bi-arrow-left" style="color: #000000 !important;"></i> Kembali
            </a>
        </div>
        
        <!-- Comments Section -->
        <div id="comments-section" class="comments-section" style="margin-top: 3rem; padding: 2rem; background: #f8f9fa; border-radius: 20px;">
            <h4 style="margin-bottom: 2rem; color: #333; font-weight: 700;">
                <i class="bi bi-chat-dots"></i> Komentar ({{ $article->commentsCount() }})
            </h4>
            
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" style="border-radius: 15px; margin-bottom: 2rem;">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 15px; margin-bottom: 2rem;">
                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            
            @auth
            <!-- Comment Form -->
            <div class="comment-form" style="margin-bottom: 2rem; padding: 1.5rem; background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <div id="comment-alert" style="display: none;"></div>
                <form id="comment-form" data-article-id="{{ $article->id }}">
                    @csrf
                    <div class="mb-3">
                        <label for="komentar" class="form-label" style="font-weight: 600; color: #333;">Tulis Komentar</label>
                        <textarea name="komentar" id="komentar" class="form-control" rows="3" placeholder="Bagikan pendapat Anda tentang artikel ini..." required style="border-radius: 10px; border: 2px solid #e9ecef; resize: vertical; min-height: 80px;"></textarea>
                        <div class="form-text" style="font-size: 0.8rem; color: #666; margin-top: 0.5rem;">
                            <span id="char-count">0</span>/1000 karakter
                        </div>
                        <div id="comment-error" class="invalid-feedback" style="display: none;"></div>
                    </div>
                    <button type="submit" id="submit-comment" class="btn btn-primary" style="background: linear-gradient(45deg, #667eea, #764ba2) !important; color: white !important; border: none; border-radius: 25px; padding: 12px 30px; font-weight: 600; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(102, 126, 234, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(102, 126, 234, 0.3)'">
                        <i class="bi bi-send-fill"></i> <span id="submit-text">Kirim Komentar</span>
                    </button>
                </form>
            </div>
            @else
            <div class="text-center" style="margin-bottom: 2rem; padding: 1.5rem; background: white; border-radius: 15px;">
                <p class="mb-2">Silakan login untuk memberikan komentar</p>
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
            </div>
            @endauth
            
            <!-- Comments List -->
            <div class="comments-list" id="comments-list">
                @forelse($article->comments()->orderBy('created_at', 'desc')->get() as $comment)
                <div class="comment-item">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="comment-avatar">
                                {{ strtoupper(substr($comment->user->nama, 0, 1)) }}
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="comment-author">{{ $comment->user->nama }}</h6>
                                <small class="comment-meta">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @auth
                        @if(Auth::id() == $comment->id_user || in_array(Auth::user()->role, ['admin', 'guru']))
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete-comment delete-comment-btn" data-comment-id="{{ $comment->id }}" title="Hapus komentar">
                            <i class="bi bi-trash"></i>
                        </button>
                        @endif
                        @endauth
                    </div>
                    <p class="comment-content">{{ $comment->komentar }}</p>
                </div>
                @empty
                <div class="text-center no-comments" style="padding: 3rem 2rem; color: #666; background: white; border-radius: 15px; box-shadow: 0 3px 10px rgba(0,0,0,0.05);">
                    <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.3;">💬</div>
                    <h5 style="color: #333; margin-bottom: 0.5rem;">Belum ada komentar</h5>
                    <p style="margin: 0; font-size: 0.9rem;">Jadilah yang pertama memberikan komentar pada artikel ini!</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($relatedArticles->isNotEmpty())
<section class="related-articles">
    <div class="container">
        <h3 class="related-title">📚 Karya Serupa</h3>
        <div class="related-grid">
            @foreach($relatedArticles as $related)
            <div class="related-card" onclick="window.location.href='{{ route('blog-details', $related->id) }}'">
                <div class="related-image">
                    @if($related->foto)
                    <img src="{{ asset('storage/' . $related->foto) }}" alt="{{ $related->judul }}">
                    @else
                    <div class="d-flex align-items-center justify-content-center h-100" style="background: linear-gradient(135deg, #f5f1eb 0%, #ede7dd 100%); color: #c9b59c; font-size: 2.5rem; opacity: 0.7;">
                        📰
                    </div>
                    @endif
                </div>
                <div class="related-content">
                    <h4 class="related-card-title">{{ $related->judul }}</h4>
                    <p class="related-excerpt">{{ Str::limit(strip_tags($related->isi), 120) }}</p>
                    <div class="related-meta">
                        <div class="related-author">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ $related->user->nama }}</span>
                        </div>
                        <div class="related-date">
                            <i class="bi bi-calendar3"></i>
                            <span>{{ $related->tanggal->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="container mb-5">
    <div class="text-center py-4" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(240, 147, 251, 0.1)); border-radius: 25px;">
        <div style="font-size: 3rem; margin-bottom: 1rem;">✍️</div>
        <h4>Suka dengan artikel ini?</h4>
        <p class="text-muted mb-3">Bagikan pengalaman atau cerita menarik Anda juga!</p>
        @auth
        <a href="{{ route('articles.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-circle"></i> Tulis Artikel
        </a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-box-arrow-in-right"></i> Login untuk Menulis
        </a>
        @endauth
    </div>
</section>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Like button functionality
    $('#likeBtn').click(function() {
        const articleId = $(this).data('article-id');
        const btn = $(this);
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.post(`/articles/${articleId}/like`)
        .done(function(response) {
            const icon = btn.find('i');
            const text = btn.find('#likeText');
            const count = btn.find('#likeCount');
            
            if (response.liked) {
                icon.removeClass('bi-heart').addClass('bi-heart-fill');
                text.text('Disukai');
            } else {
                icon.removeClass('bi-heart-fill').addClass('bi-heart');
                text.text('Suka');
            }
            
            count.text(response.count);
        })
        .fail(function() {
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    });
    

    

    
    // Auto scroll to comments section if hash is present
    if (window.location.hash === '#comments-section' || window.location.hash === '#comments') {
        setTimeout(function() {
            const target = $('#comments-section');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        }, 500);
    }
    
    // Handle success/error messages scroll
    if ($('.alert-success, .alert-danger').length > 0) {
        setTimeout(function() {
            const target = $('#comments-section');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 100
                }, 800);
            }
        }, 300);
    }
    
    // Scroll to comments when clicking comment count in meta
    $('.scroll-to-comments').click(function(e) {
        e.preventDefault();
        const target = $('#comments-section');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 800);
        }
    });
    

    
    // Auto-resize textarea
    $('#komentar').on('input', function() {
        this.style.height = 'auto';
        this.style.height = Math.max(80, this.scrollHeight) + 'px';
    });
    
    // Character counter
    $('#komentar').on('input', function() {
        const length = $(this).val().length;
        $('#char-count').text(length);
        $(this).removeClass('is-invalid');
        $('#comment-error').hide();
    });
    
    // AJAX Comment Form
    $('#comment-form').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const articleId = form.data('article-id');
        const komentar = $('#komentar').val().trim();
        const submitBtn = $('#submit-comment');
        const submitText = $('#submit-text');
        
        if (!komentar) {
            $('#comment-error').text('Komentar tidak boleh kosong').show();
            $('#komentar').addClass('is-invalid');
            return;
        }
        
        // Disable submit button
        submitBtn.prop('disabled', true);
        submitText.text('Mengirim...');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.post(`/articles/${articleId}/comments`, {
            komentar: komentar
        })
        .done(function(response) {
            // Clear form
            $('#komentar').val('');
            $('#char-count').text('0');
            
            // Show success message
            $('#comment-alert').html(`
                <div class="alert alert-success alert-dismissible fade show" style="border-radius: 15px;">
                    <i class="bi bi-check-circle"></i> Komentar berhasil ditambahkan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `).show();
            
            // Add new comment to list
            const newComment = `
                <div class="comment-item">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="d-flex align-items-center gap-3">
                            <div class="comment-avatar">
                                ${response.user_initial}
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="comment-author">${response.user_name}</h6>
                                <small class="comment-meta">baru saja</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete-comment delete-comment-btn" data-comment-id="${response.comment_id}" title="Hapus komentar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    <p class="comment-content">${response.comment}</p>
                </div>
            `;
            
            // Remove "no comments" message if exists
            $('.no-comments').remove();
            
            // Add new comment at the top
            $('#comments-list').prepend(newComment);
            
            // Update comment count in header
            const currentCount = parseInt($('.scroll-to-comments').text().match(/\d+/)[0]);
            $('.scroll-to-comments').text(`${currentCount + 1} komentar`);
            
            // Update section title
            $('#comments-section h4').html(`<i class="bi bi-chat-dots"></i> Komentar (${currentCount + 1})`);
            
            // Auto-hide success message after 5 seconds
            setTimeout(function() {
                $('#comment-alert .alert-success').fadeOut();
            }, 5000);
        })
        .fail(function(xhr) {
            let errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
            
            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                if (xhr.responseJSON.errors.komentar) {
                    errorMessage = xhr.responseJSON.errors.komentar[0];
                }
            } else if (xhr.status === 401) {
                errorMessage = 'Silakan login terlebih dahulu.';
                setTimeout(function() {
                    window.location.href = '/login';
                }, 2000);
            }
            
            $('#comment-alert').html(`
                <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 15px;">
                    <i class="bi bi-exclamation-circle"></i> ${errorMessage}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `).show();
            
            $('#comment-error').text(errorMessage).show();
            $('#komentar').addClass('is-invalid');
        })
        .always(function() {
            // Re-enable submit button
            submitBtn.prop('disabled', false);
            submitText.text('Kirim Komentar');
        });
    });
    
    // AJAX Delete Comment
    $(document).on('click', '.delete-comment-btn', function(e) {
        e.preventDefault();
        
        if (!confirm('Yakin ingin menghapus komentar ini?')) {
            return;
        }
        
        const btn = $(this);
        const commentId = btn.data('comment-id');
        const commentItem = btn.closest('.comment-item');
        
        btn.prop('disabled', true);
        btn.html('<i class="bi bi-hourglass-split"></i>');
        
        $.ajax({
            url: `/comments/${commentId}`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                commentItem.fadeOut(300, function() {
                    $(this).remove();
                    
                    const currentCount = parseInt($('.scroll-to-comments').text().match(/\d+/)[0]);
                    const newCount = Math.max(0, currentCount - 1);
                    $('.scroll-to-comments').text(`${newCount} komentar`);
                    $('#comments-section h4').html(`<i class="bi bi-chat-dots"></i> Komentar (${newCount})`);
                    
                    if (newCount === 0 && $('.comment-item').length === 0) {
                        $('#comments-list').html(`
                            <div class="text-center no-comments" style="padding: 3rem 2rem; color: #666; background: white; border-radius: 15px; box-shadow: 0 3px 10px rgba(0,0,0,0.05);">
                                <div style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.3;">💬</div>
                                <h5 style="color: #333; margin-bottom: 0.5rem;">Belum ada komentar</h5>
                                <p style="margin: 0; font-size: 0.9rem;">Jadilah yang pertama memberikan komentar pada artikel ini!</p>
                            </div>
                        `);
                    }
                });
                
                $('#comment-alert').html(`
                    <div class="alert alert-success alert-dismissible fade show" style="border-radius: 15px;">
                        <i class="bi bi-check-circle"></i> Komentar berhasil dihapus!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `).show();
                
                setTimeout(function() {
                    $('#comment-alert .alert-success').fadeOut();
                }, 3000);
            },
            error: function(xhr) {
                btn.prop('disabled', false);
                btn.html('<i class="bi bi-trash"></i>');
                
                let errorMessage = 'Gagal menghapus komentar. Silakan coba lagi.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                $('#comment-alert').html(`
                    <div class="alert alert-danger alert-dismissible fade show" style="border-radius: 15px;">
                        <i class="bi bi-exclamation-circle"></i> ${errorMessage}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `).show();
            }
        });
    });
});
</script>
@endpush