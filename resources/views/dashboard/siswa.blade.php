<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard Siswa - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color-hunt-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dashboard-animations.css') }}" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
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
        
        .dashboard-container {
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .welcome-card {
            background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
            border-radius: 25px;
            padding: 35px;
            margin-bottom: 35px;
            box-shadow: 
                0 20px 40px rgba(201, 181, 156, 0.15),
                0 8px 16px rgba(201, 181, 156, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(217, 207, 199, 0.8);
            backdrop-filter: blur(10px);
            position: relative;
        }
        
        .welcome-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 25px;
            background: linear-gradient(145deg, rgba(255,255,255,0.1) 0%, transparent 100%);
            pointer-events: none;
        }
        
        .activity-card {
            background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
            border-radius: 15px;
            padding: 1.25rem;
            margin-bottom: 0.75rem;
            box-shadow: 
                0 8px 20px rgba(201, 181, 156, 0.12),
                0 3px 6px rgba(201, 181, 156, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
            border: 1px solid rgba(217, 207, 199, 0.6);
            height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .activity-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, transparent 100%);
            pointer-events: none;
        }
        
        .activity-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 15px 35px rgba(201, 181, 156, 0.2),
                0 5px 15px rgba(201, 181, 156, 0.12),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
        }
        
        .stat-mini-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8f6f3 50%, #f0ebe5 100%);
            border-radius: 16px;
            padding: 1.25rem;
            color: #2d3748;
            box-shadow: 
                0 8px 20px rgba(201, 181, 156, 0.2),
                0 3px 8px rgba(184, 160, 130, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(201, 181, 156, 0.2);
        }
        
        .stat-mini-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(201, 181, 156, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .stat-mini-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 
                0 12px 30px rgba(201, 181, 156, 0.4),
                0 5px 15px rgba(184, 160, 130, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }
        
        .stat-mini-number {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin: 0.5rem 0;
            color: #c9b59c;
        }
        
        .stat-mini-label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            opacity: 1;
            line-height: 1;
            color: #4a5568;
        }
        
        .stat-mini-icon {
            font-size: 1.5rem;
            opacity: 1;
        }
        
        .stat-trend {
            font-size: 0.7rem;
            margin-top: 0.25rem;
            opacity: 1;
            font-weight: 500;
            color: #718096;
        }
        
        .activity-card:hover {
            /* No animation */
        }
        
        .logout-btn {
            background: #c9b59c;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            color: white;
            font-weight: 500;
        }
        
        .logout-btn:hover {
            background: #b8a082;
        }
        
        /* HOVER EFFECTS FOR DASHBOARD CARDS */
        .activity-card:hover {
            transform: translateY(-15px) scale(1.05) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3) !important;
            border: 2px solid #667eea !important;
            background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(248,249,250,0.95)) !important;
        }
        
        .activity-card:hover .card-icon {
            transform: scale(1.3) rotate(15deg) !important;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.4)) !important;
        }
        
        .activity-card:hover h5 {
            color: #667eea !important;
            transform: translateY(-3px) !important;
        }
        
        .activity-card:hover p {
            color: #764ba2 !important;
            transform: translateY(-2px) !important;
        }
        
        .stat-mini-card:hover {
            transform: translateY(-12px) scale(1.05) !important;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3) !important;
            border: 2px solid #667eea !important;
        }
        
        .stat-mini-card:hover .stat-mini-icon {
            transform: scale(1.4) rotate(20deg) !important;
            filter: drop-shadow(0 8px 16px rgba(0,0,0,0.4)) !important;
        }
        
        .stat-mini-card:hover .stat-mini-number {
            color: #667eea !important;
            transform: scale(1.1) !important;
        }
        
        .stat-mini-card:hover .stat-mini-label {
            color: #667eea !important;
        }
    </style>
</head>

<body>

    
    <div class="dashboard-container">
        <div class="welcome-card glass-card">
            <div class="text-center mb-4">
                <div class="page-icon floating">🎓</div>
                <img src="{{ asset('assets/img/logo-hd.svg') }}" alt="Logo Mading" style="max-width: 120px; height: auto;" class="floating">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-2" style="color: #c9b59c;">Dashboard Pembaca Mading</h1>
                    <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->nama }}!</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn logout-btn">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
            
            @php
                $myArticles = \App\Models\Article::where('id_user', Auth::id());
                $draftCount = $myArticles->clone()->where('status', 'draft')->count();
                $pendingCount = $myArticles->clone()->where('status', 'pending')->count();
                $publishedCount = $myArticles->clone()->where('status', 'published')->count();
                $rejectedCount = $myArticles->clone()->where('status', 'rejected')->count();
            @endphp
            
            <div class="mt-4">
                <h6 class="text-muted mb-3" style="font-size: 0.9rem; font-weight: 600;">📊 Ringkasan Artikel Anda</h6>
                <div class="row g-3 card-grid">
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="stat-mini-icon icon-animated">📰</div>
                            <div class="stat-mini-number">{{ $myArticles->clone()->count() }}</div>
                            <div class="stat-mini-label">Total Artikel</div>
                            @php
                                $totalCount = $myArticles->clone()->count();
                                $lastMonth = \App\Models\Article::where('id_user', Auth::id())
                                    ->whereMonth('created_at', now()->subMonth()->month)
                                    ->count();
                                $trend = $lastMonth > 0 ? (($totalCount - $lastMonth) / $lastMonth * 100) : 0;
                            @endphp
                            @if($trend > 0)
                                <div class="stat-trend">↗ +{{ number_format(abs($trend), 0) }}% dari bulan lalu</div>
                            @elseif($trend < 0)
                                <div class="stat-trend">↘ {{ number_format(abs($trend), 0) }}% dari bulan lalu</div>
                            @else
                                <div class="stat-trend">→ Stabil</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                            <div class="stat-mini-icon icon-animated">✅</div>
                            <div class="stat-mini-number">{{ $publishedCount }}</div>
                            <div class="stat-mini-label">Dipublikasi</div>
                            <div class="stat-trend">{{ $totalCount > 0 ? number_format(($publishedCount / $totalCount) * 100, 0) : 0 }}% dari total</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="stat-mini-icon icon-animated">⏳</div>
                            <div class="stat-mini-number">{{ $pendingCount }}</div>
                            <div class="stat-mini-label">Menunggu</div>
                            @if($pendingCount > 0)
                                <div class="stat-trend">Perlu verifikasi</div>
                            @else
                                <div class="stat-trend">Semua terverifikasi</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="stat-mini-icon icon-animated">📝</div>
                            <div class="stat-mini-number">{{ $draftCount }}</div>
                            <div class="stat-mini-label">Draft</div>
                            @if($draftCount > 0)
                                <div class="stat-trend">Siap dipublikasi</div>
                            @else
                                <div class="stat-trend">Tidak ada draft</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 d-flex">
                <a href="{{ route('articles.index') }}" class="text-decoration-none w-100">
                    <div class="activity-card stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">📝</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Artikel</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Kelola artikel yang sudah dibuat</p>
                    </div>
                </a>
            </div>

            <div class="col-md-3 d-flex">
                <a href="{{ route('home') }}" class="text-decoration-none w-100">
                    <div class="activity-card stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">📖</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Baca Artikel</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Jelajahi artikel mading terbaru</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3 d-flex">
                <a href="{{ route('articles.create') }}" class="text-decoration-none w-100">
                    <div class="activity-card stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">✍️</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Tulis Artikel</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Buat artikel untuk mading</p>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 d-flex">
                <a href="{{ route('laporan.index') }}" class="text-decoration-none w-100">
                    <div class="activity-card stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">📋</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Laporan</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Lihat laporan aktivitas</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 d-flex">
                <a href="{{ route('notifications.index') }}" class="text-decoration-none w-100">
                    <div class="activity-card stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">🔔</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Notifikasi</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Status artikel & pemberitahuan penting</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>