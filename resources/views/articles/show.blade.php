@extends('layouts.app')

@section('title', $article->judul . ' - Mading Arga')
@section('body-class', 'article-show-page')

@push('styles')
<style>
.article-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
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
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.article-body {
    padding: 2rem;
    max-width: 800px;
    margin: 0 auto;
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
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    text-decoration: none;
    transition: all 0.3s ease;
}

.tag-item:hover {
    transform: scale(1.05);
    color: white;
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
    border: none;
}

.btn-edit {
    background: linear-gradient(45deg, #f093fb, #f5576c);
    color: white;
}

.btn-back {
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    color: white;
}

.related-articles {
    background: linear-gradient(135deg, #fdfcfb 0%, #f7f4f1 50%, #fdfcfb 100%);
    padding: 3rem 0;
    margin-top: 2rem;
}

.related-title {
    text-align: center;
    font-size: 2rem;
    font-weight: 600;
    color: #8b7355;
    margin-bottom: 2rem;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    max-width: 1000px;
    margin: 0 auto;
}

.related-card {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.related-image {
    height: 150px;
    background: #f0f0f0;
    position: relative;
    overflow: hidden;
}

.related-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.related-card:hover .related-image img {
    transform: scale(1.05);
}

.related-content {
    padding: 1.5rem;
}

.related-card-title {
    font-size: 1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.related-meta {
    font-size: 0.8rem;
    color: #666;
    display: flex;
    justify-content: space-between;
    align-items: center;
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
    
    .related-grid {
        grid-template-columns: 1fr;
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
            <a href="{{ route('articles.index') }}">📰 Articles</a>
            <span class="mx-2">/</span>
            <span class="active">{{ Str::limit($article->judul, 30) }}</span>
        </nav>
        
        <div class="article-header">
            <div class="article-category">
                📂 {{ $article->category->nama_kategori ?? 'Umum' }}
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
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content-wrapper">
    @if($article->foto)
    <div class="article-image-container">
        <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" class="article-main-image" 
             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
        <div style="display:none; text-align:center; padding:2rem; background:#f8f9fa; border-radius:15px; color:#666;">
            <i class="bi bi-image" style="font-size:3rem;"></i>
            <p class="mt-2">Gambar tidak dapat dimuat</p>
            <small>Path: {{ $article->foto }}</small>
        </div>
    </div>
    @endif
    
    <div class="article-body">
        <div class="article-content">
            {!! nl2br(e($article->isi)) !!}
        </div>
        
        <div class="article-tags">
            <span class="tag-item">📂 {{ $article->category->nama_kategori ?? 'Umum' }}</span>
            <span class="tag-item">📰 Mading</span>
            <span class="tag-item">🏫 Sekolah</span>
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
            @can('update', $article)
            <a href="{{ route('articles.edit', $article->id) }}" class="action-btn btn-edit">
                <i class="bi bi-pencil"></i> Edit Artikel
            </a>
            @endcan
            <a href="{{ route('articles.index') }}" class="action-btn btn-back">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if(isset($relatedArticles) && $relatedArticles->count() > 0)
<section class="related-articles">
    <div class="container">
        <h3 class="related-title">📚 Artikel Terkait</h3>
        <div class="related-grid">
            @foreach($relatedArticles as $related)
            <div class="related-card" onclick="window.location.href='{{ route('articles.show', $related->id) }}'">
                <div class="related-image">
                    @if($related->foto)
                    <img src="{{ asset('storage/' . $related->foto) }}" alt="{{ $related->judul }}" 
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="d-flex align-items-center justify-content-center h-100" style="display:none; background: linear-gradient(135deg, #f5f1eb 0%, #ede7dd 100%); color: #c9b59c; font-size: 2rem;">
                        📰
                    </div>
                    @else
                    <div class="d-flex align-items-center justify-content-center h-100" style="background: linear-gradient(135deg, #f5f1eb 0%, #ede7dd 100%); color: #c9b59c; font-size: 2rem;">
                        📰
                    </div>
                    @endif
                </div>
                <div class="related-content">
                    <h4 class="related-card-title">{{ $related->judul }}</h4>
                    <div class="related-meta">
                        <span><i class="bi bi-person"></i> {{ $related->user->nama }}</span>
                        <span><i class="bi bi-calendar3"></i> {{ $related->tanggal->format('d M Y') }}</span>
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