@extends('layouts.app')

@section('title', 'Mading Arga - Portal Berita Sekolah')
@section('body-class', 'mading-home')

@push('styles')
<style>
.mading-hero {
    background: #f9f8f6 !important;
    min-height: 80vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.mading-hero::before {
    display: none !important;
}

.hero-content {
    position: relative;
    z-index: 2;
}

.mading-title {
    font-size: 4rem;
    font-weight: 800;
    color: #c9b59c !important;
    margin-bottom: 1rem;
}

.mading-subtitle {
    font-size: 1.5rem;
    color: #5a5a5a !important;
    margin-bottom: 2rem;
}

.article-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin: 3rem 0;
}

.article-card {
    background: #efe9e3 !important;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(201, 181, 156, 0.2) !important;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    position: relative;
    cursor: pointer;
    border: 1px solid #d9cfc7 !important;
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
    z-index: 1;
}

.article-card:hover::before {
    left: 100%;
}

.article-card:hover {
    transform: translateY(-15px) scale(1.03) !important;
    box-shadow: 0 25px 50px rgba(201, 181, 156, 0.4) !important;
    border-color: #c9b59c !important;
}

.article-image {
    height: 200px;
    background: #d9cfc7 !important;
    position: relative;
    overflow: hidden;
}

.article-image img {
    transition: transform 0.4s ease;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category-badge {
    position: absolute;
    top: 15px;
    left: 15px;
    background: rgba(255,255,255,0.9);
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #333;
}

.article-content {
    padding: 1.5rem;
    position: relative;
    z-index: 2;
    transition: transform 0.3s ease;
}

.article-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 0.5rem;
    line-height: 1.4;
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.article-excerpt {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.85rem;
    color: #888;
}

.read-more-btn {
    background: #c9b59c !important;
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease !important;
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.read-more-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.read-more-btn:hover::before {
    left: 100%;
}

.read-more-btn:hover {
    transform: translateX(10px) !important;
    color: white;
    background: #b8a082 !important;
    box-shadow: 0 5px 15px rgba(201, 181, 156, 0.4);
}

.section-title {
    text-align: center;
    margin: 4rem 0 2rem;
}

.section-title h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #c9b59c !important;
    margin-bottom: 0.5rem;
}

.section-title p {
    color: #666;
    font-size: 1.1rem;
}

.featured-article {
    background: #efe9e3 !important;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(201, 181, 156, 0.2) !important;
    margin-bottom: 3rem;
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
    border: 1px solid #d9cfc7 !important;
}

.featured-article:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 20px 40px rgba(201, 181, 156, 0.3) !important;
    border-color: #c9b59c !important;
}

.featured-image {
    height: 300px;
    background: #d9cfc7 !important;
    position: relative;
    overflow: hidden;
}

.featured-image img {
    transition: transform 0.4s ease;
}

.featured-content {
    padding: 2rem;
}

.featured-title {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
}

.stats-bar {
    background: #efe9e3 !important;
    padding: 2rem;
    border-radius: 20px;
    margin: 3rem 0;
    border: 1px solid #d9cfc7 !important;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: #c9b59c !important;
}

.stat-label {
    color: #666;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.mading-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
}
</style>
@endpush

@section('content')
<!-- Notification Examples -->
<script>
// Example notifications for demonstration
function showExampleNotifications() {
    setTimeout(() => notifications.success('Artikel Dipublikasi', 'Artikel Anda telah berhasil dipublikasi'), 2000);
    setTimeout(() => notifications.info('Komentar Baru', 'Ada komentar baru di artikel Anda'), 4000);
    setTimeout(() => notifications.warning('Moderasi', 'Artikel menunggu persetujuan admin'), 6000);
}

// Show examples after page load
document.addEventListener('DOMContentLoaded', function() {
    // Uncomment to show example notifications
    // showExampleNotifications();
});
</script>

<!-- Particle Background -->
<div class="particles-bg" id="particles-bg"></div>

<!-- Hero Section -->
<section class="mading-hero animated-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <div class="mading-icon floating">
                        <img src="{{ asset('assets/icons/book-icon.svg') }}" alt="Book Icon" style="width: 80px; height: 80px; margin-bottom: 1rem;">
                    </div>
                    <h1 class="mading-title text-glow">Mading 666</h1>
                    <p class="mading-subtitle">Karya Siswa-Siswi Berbakat</p>
                    <p class="text-white-50 mb-4">Wadah kreativitas siswa-siswi untuk berbagi cerita, pengalaman, dan karya tulis. Mari bersama membangun tradisi literasi dan jurnalistik sekolah yang inspiratif.</p>
                    <!-- Search Form -->
                    <div class="mb-4">
                        <form action="{{ route('home') }}" method="GET" class="d-flex gap-2" style="max-width: 500px;">
                            <input type="text" name="q" class="form-control form-control-lg" placeholder="🔍 Cari artikel, berita, atau topik..." value="{{ request('q') }}" style="border-radius: 25px; background: rgba(255,255,255,0.9); border: none;">
                            <button type="submit" class="btn btn-light btn-lg rounded-pill px-4">
                                <i class="bi bi-search"></i> Cari
                            </button>
                        </form>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <a href="#articles" class="btn btn-enhanced btn-light btn-lg px-4">
                            📖 Baca Artikel
                        </a>
                        @auth
                        <a href="{{ route('articles.create') }}" class="btn btn-enhanced btn-outline-light btn-lg px-4">
                            ✍️ Tulis Artikel
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <div style="font-size: 15rem; opacity: 0.3;">📋</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="container">
    <div class="stats-bar glass-card">
        <div class="row">
            <div class="col-md-3">
                <div class="stat-item hover-lift">
                    <div class="stat-number">{{ \App\Models\Article::where('status', 'published')->count() }}</div>
                    <div class="stat-label">Artikel Dipublikasi</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item hover-lift">
                    <div class="stat-number">{{ \App\Models\Category::count() }}</div>
                    <div class="stat-label">Kategori</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item hover-lift">
                    <div class="stat-number">{{ \App\Models\User::count() }}</div>
                    <div class="stat-label">Kontributor</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-item hover-lift">
                    <div class="stat-number">{{ \App\Models\Like::count() }}</div>
                    <div class="stat-label">Total Likes</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Article -->
@if($featuredArticles->isNotEmpty())
<section class="container" id="articles">
    <div class="section-title">
        <h2>🌟 Karya Pilihan</h2>
        <p>Tulisan terbaik dari siswa-siswi berbakat sekolah kita</p>
    </div>
    
    <div class="featured-article" onclick="window.location.href='{{ route('blog-details', $featuredArticles->first()->id) }}'">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="featured-image">
                    @if($featuredArticles->first()->foto)
                    <img src="{{ asset('storage/' . $featuredArticles->first()->foto) }}" alt="{{ $featuredArticles->first()->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @endif
                    <div class="category-badge">{{ $featuredArticles->first()->category->nama ?? 'Umum' }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="featured-content">
                    <h3 class="featured-title">{{ $featuredArticles->first()->judul }}</h3>
                    <p class="article-excerpt">{{ Str::limit(strip_tags($featuredArticles->first()->isi), 200) }}</p>
                    <div class="article-meta">
                        <span>👤 {{ $featuredArticles->first()->user->nama }}</span>
                        <span>📅 {{ $featuredArticles->first()->tanggal->format('d M Y') }}</span>
                        <span>❤️ {{ $featuredArticles->first()->likesCount() }}</span>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('blog-details', $featuredArticles->first()->id) }}" class="read-more-btn">
                            Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Popular Articles -->
<section class="container">
    <div class="section-title">
        <h2>🔥 Karya Terpopuler</h2>
        <p>Artikel yang paling disukai pembaca</p>
    </div>
    
    @if($popularArticles->isNotEmpty())
    <div class="row">
        @foreach($popularArticles as $article)
        <div class="col-md-6 mb-3">
            <div class="card h-100" style="border-radius: 15px; cursor: pointer;" onclick="window.location.href='{{ route('blog-details', $article->id) }}'">
                <div class="row g-0 h-100">
                    <div class="col-4">
                        <div style="height: 120px; background: #d9cfc7; border-radius: 15px 0 0 15px;">
                            @if($article->foto)
                            <img src="{{ asset('storage/' . $article->foto) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px 0 0 15px;">
                            @endif
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card-body p-3">
                            <h6 class="card-title mb-2">{{ Str::limit($article->judul, 50) }}</h6>
                            <small class="text-muted d-block mb-2">
                                <i class="bi bi-heart-fill text-danger"></i> {{ $article->likes_count }} likes
                                <span class="mx-1">•</span>
                                <i class="bi bi-person"></i> {{ $article->user->nama }}
                            </small>
                            <span class="badge" style="background: #c9b59c; color: white; font-size: 0.7rem;">
                                {{ $article->category->nama ?? 'Umum' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</section>

<!-- Latest Articles -->
<section class="container">
    <div class="section-title">
        <h2>📚 Karya Terbaru</h2>
        @if(request('q'))
            <p>Hasil pencarian untuk: <strong>"{{ request('q') }}"</strong></p>
            <small class="text-muted">Ditemukan {{ $latestArticles->total() }} artikel</small>
        @else
            <p>Tulisan fresh dari para penulis muda berbakat</p>
            <small class="text-muted">Menampilkan {{ $latestArticles->count() }} dari {{ $latestArticles->total() }} artikel</small>
        @endif
    </div>
    
    @if($latestArticles->count() > 0)
    <div class="article-grid">
        @foreach($latestArticles as $article)
        <div class="article-card card-enhanced hover-lift" onclick="window.location.href='{{ route('blog-details', $article->id) }}'">
            <div class="article-image">
                @if($article->foto)
                <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                @endif
                <div class="category-badge">{{ $article->category->nama ?? 'Umum' }}</div>
            </div>
            <div class="article-content">
                <h4 class="article-title">{{ $article->judul }}</h4>
                <p class="article-excerpt">{{ Str::limit(strip_tags($article->isi), 120) }}</p>
                <div class="article-meta">
                    <span><i class="bi bi-person"></i> {{ $article->user->nama }}</span>
                    <span><i class="bi bi-calendar"></i> {{ $article->tanggal->format('d M') }}</span>
                </div>
                <div class="mt-3">
                    <a href="{{ route('blog-details', $article->id) }}" class="read-more-btn">
                        Baca ➡️
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Pagination -->
    @if($latestArticles->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $latestArticles->links() }}
    </div>
    @endif
    
    <!-- View All Articles Button -->
    <div class="text-center mt-4">
        <a href="{{ route('arsip.index') }}" class="btn btn-outline-primary btn-lg rounded-pill px-5">
            📂 Lihat Semua Artikel
        </a>
    </div>
    
    @else
    <div class="text-center py-5">
        <div style="font-size: 5rem; opacity: 0.3;">📝</div>
        <h3 class="mt-3">Belum Ada Karya Published</h3>
        <p class="text-muted">Total artikel di database: {{ \App\Models\Article::count() }}</p>
        <p class="text-muted">Artikel published: {{ \App\Models\Article::where('status', 'published')->count() }}</p>
        <p class="text-muted">Artikel pending: {{ \App\Models\Article::where('status', 'pending')->count() }}</p>
        @auth
        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg rounded-pill">
            <i class="bi bi-plus-circle"></i> Tulis Karya Pertama
        </a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill">
            <i class="bi bi-box-arrow-in-right"></i> Login untuk Menulis
        </a>
        @endauth
    </div>
    @endif
</section>

<!-- Call to Action -->
<section class="container mb-5">
    <div class="text-center py-5" style="background: #efe9e3; border-radius: 25px; border: 1px solid #d9cfc7;">
        <div style="font-size: 4rem; margin-bottom: 1rem;">✍️</div>
        <h3>Punya Bakat Menulis?</h3>
        <p class="text-muted mb-4">Wujudkan kreativitasmu! Bagikan cerita, pengalaman, atau opini dengan teman-teman sekolah</p>
        @auth
        <a href="{{ route('articles.create') }}" class="btn btn-primary btn-lg rounded-pill px-5">
            <i class="bi bi-pencil-square"></i> Mulai Menulis
        </a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill px-5">
            <i class="bi bi-box-arrow-in-right"></i> Login Dulu
        </a>
        @endauth
    </div>
</section>

@endsection

@push('scripts')
<script>
// Particle Background Animation
function createParticles() {
    const particlesContainer = document.getElementById('particles-bg');
    if (!particlesContainer) return;
    
    for (let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 20 + 's';
        particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
        particlesContainer.appendChild(particle);
    }
}

// Enhanced Card Interactions
function enhanceCards() {
    const cards = document.querySelectorAll('.hover-lift');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Article Card Hover Effects
    const articleCards = document.querySelectorAll('.article-card');
    articleCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const title = this.querySelector('.article-title');
            const readBtn = this.querySelector('.read-more-btn');
            const image = this.querySelector('.article-image img');
            const content = this.querySelector('.article-content');
            
            if (title) title.style.color = '#c9b59c';
            if (readBtn) readBtn.style.transform = 'translateX(10px)';
            if (image) image.style.transform = 'scale(1.1)';
            if (content) content.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            const title = this.querySelector('.article-title');
            const readBtn = this.querySelector('.read-more-btn');
            const image = this.querySelector('.article-image img');
            const content = this.querySelector('.article-content');
            
            if (title) title.style.color = '#333';
            if (readBtn) readBtn.style.transform = 'translateX(0)';
            if (image) image.style.transform = 'scale(1)';
            if (content) content.style.transform = 'translateY(0)';
        });
    });
    
    // Featured Article Hover
    const featuredArticle = document.querySelector('.featured-article');
    if (featuredArticle) {
        featuredArticle.addEventListener('mouseenter', function() {
            const title = this.querySelector('.featured-title');
            const image = this.querySelector('.featured-image img');
            
            if (title) title.style.color = '#c9b59c';
            if (image) image.style.transform = 'scale(1.05)';
        });
        
        featuredArticle.addEventListener('mouseleave', function() {
            const title = this.querySelector('.featured-title');
            const image = this.querySelector('.featured-image img');
            
            if (title) title.style.color = '#333';
            if (image) image.style.transform = 'scale(1)';
        });
    }
    
    // Popular Article Cards Hover
    const popularCards = document.querySelectorAll('.card');
    popularCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(201, 181, 156, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
}

// Loading Animation for Buttons
function enhanceButtons() {
    const buttons = document.querySelectorAll('.btn-enhanced');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!this.classList.contains('loading')) {
                this.classList.add('loading');
                const originalText = this.innerHTML;
                this.innerHTML = '<span class="pulse-dot"></span><span class="pulse-dot"></span><span class="pulse-dot"></span>';
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('loading');
                }, 1000);
            }
        });
    });
}

// Initialize Enhancements
document.addEventListener('DOMContentLoaded', function() {
    createParticles();
    enhanceCards();
    enhanceButtons();
    
    // Add hover sound effect (optional)
    const cards = document.querySelectorAll('.article-card, .featured-article, .card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Add subtle scale animation
            this.style.transition = 'all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1)';
        });
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add loading animation when clicking article cards
    document.querySelectorAll('.article-card, .featured-article').forEach(card => {
        card.addEventListener('click', function(e) {
            // Add loading overlay
            const overlay = document.createElement('div');
            overlay.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(201, 181, 156, 0.8);
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-weight: bold;
                z-index: 10;
                border-radius: 20px;
            `;
            overlay.innerHTML = '<div class="pulse-dot"></div><div class="pulse-dot"></div><div class="pulse-dot"></div>';
            
            this.style.position = 'relative';
            this.appendChild(overlay);
            
            // Remove overlay after navigation
            setTimeout(() => {
                if (overlay.parentNode) {
                    overlay.parentNode.removeChild(overlay);
                }
            }, 1000);
        });
    });
});
</script>
@endpush