<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard User - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color-hunt-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-icons.css') }}" rel="stylesheet">
    
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
        
        .stats-card {
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
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(145deg, rgba(255,255,255,0.05) 0%, transparent 100%);
            pointer-events: none;
        }
        
        .stats-card:hover {
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
                0 12px 30px rgba(201, 181, 156, 0.25),
                0 5px 15px rgba(184, 160, 130, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
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
    </style>
</head>

<body>
    <div class="dashboard-container">
        <div class="welcome-card">
            <div class="text-center mb-4">
                <div class="page-icon">👤</div>
                <img src="{{ asset('assets/img/logo-hd.svg') }}" alt="Logo Mading" style="max-width: 120px; height: auto;">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-2" style="color: #c9b59c;">Dashboard {{ ucfirst(Auth::user()->role) }}</h1>
                    <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->nama }}!</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn logout-btn">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
            
            <div class="mt-4">
                <h6 class="text-muted mb-3" style="font-size: 0.9rem; font-weight: 600;">📊 Ringkasan Artikel Anda</h6>
                @php
                    $myArticles = \App\Models\Article::where('id_user', Auth::id());
                    $totalMyArticles = $myArticles->clone()->count();
                    $publishedMyArticles = $myArticles->clone()->where('status', 'published')->count();
                    $pendingMyArticles = $myArticles->clone()->where('status', 'pending')->count();
                    $draftMyArticles = $myArticles->clone()->where('status', 'draft')->count();
                @endphp
                <div class="row g-3">
                    <div class="col-3">
                        <div class="stat-mini-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="stat-mini-icon">📰</div>
                            <div class="stat-mini-number">{{ $totalMyArticles }}</div>
                            <div class="stat-mini-label">Total Artikel</div>
                            <div class="stat-trend">📊 Artikel Anda</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                            <div class="stat-mini-icon">✅</div>
                            <div class="stat-mini-number">{{ $publishedMyArticles }}</div>
                            <div class="stat-mini-label">Dipublikasi</div>
                            <div class="stat-trend">{{ $totalMyArticles > 0 ? number_format(($publishedMyArticles / $totalMyArticles) * 100, 0) : 0 }}% dari total</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="stat-mini-icon">⏳</div>
                            <div class="stat-mini-number">{{ $pendingMyArticles }}</div>
                            <div class="stat-mini-label">Menunggu</div>
                            @if($pendingMyArticles > 0)
                                <div class="stat-trend">Perlu verifikasi</div>
                            @else
                                <div class="stat-trend">Semua terverifikasi</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="stat-mini-icon">📝</div>
                            <div class="stat-mini-number">{{ $draftMyArticles }}</div>
                            <div class="stat-mini-label">Draft</div>
                            @if($draftMyArticles > 0)
                                <div class="stat-trend">Siap dipublikasi</div>
                            @else
                                <div class="stat-trend">Tidak ada draft</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->role == 'siswa')
        <div class="d-flex gap-3 mt-4" style="justify-content: space-between;">
            <a href="{{ route('articles.index') }}" class="text-decoration-none" style="flex: 1;">
                <div class="stats-card text-center">
                    <div class="card-icon">📝</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Artikel</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Buat, edit, dan kelola artikel</p>
                </div>
            </a>
            <a href="{{ route('home') }}" class="text-decoration-none" style="flex: 1;">
                <div class="stats-card text-center">
                    <div class="card-icon">📖</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Baca Artikel</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Jelajahi artikel mading terbaru</p>
                </div>
            </a>
        </div>
        @elseif(Auth::user()->role == 'guru')
        <div class="d-flex gap-3 mt-4" style="justify-content: space-between;">
            <a href="{{ route('articles.index') }}" class="text-decoration-none" style="flex: 1;">
                <div class="stats-card text-center">
                    <div class="card-icon">📝</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Artikel</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Buat, edit, dan kelola artikel</p>
                </div>
            </a>
            <a href="{{ route('moderasi.index') }}" class="text-decoration-none" style="flex: 1;">
                <div class="stats-card text-center">
                    <div class="card-icon">🛡️</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Moderasi Konten</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Tinjau artikel sebelum publikasi</p>
                </div>
            </a>
            <a href="{{ route('home') }}" class="text-decoration-none" style="flex: 1;">
                <div class="stats-card text-center">
                    <div class="card-icon">📖</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Baca Artikel</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Jelajahi artikel mading terbaru</p>
                </div>
            </a>
        </div>
        @else
        <div class="row mt-4">
            <div class="col-md-3">
                <a href="{{ route('articles.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">📝</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Artikel</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Buat, edit, dan kelola artikel</p>
                    </div>
                </a>
            </div>
            
            @if(Auth::user()->role == 'admin')
            <div class="col-md-3">
                <a href="{{ route('categories.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">📂</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Kategori</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Atur kategori artikel</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">👥</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola User</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Manajemen pengguna sistem</p>
                    </div>
                </a>
            </div>
            @endif
            
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'guru')
            <div class="col-md-3">
                <a href="{{ route('moderasi.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">🛡️</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Moderasi Konten</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Tinjau artikel sebelum publikasi</p>
                    </div>
                </a>
            </div>
            @endif
        </div>
        
        <div class="row">
            @if(Auth::user()->role == 'admin')
            <div class="col-md-3 offset-md-3">
                <a href="{{ route('statistik.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">📊</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Statistik</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Lihat laporan & analitik</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">📖</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Baca Artikel</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Jelajahi artikel mading terbaru</p>
                    </div>
                </a>
            </div>
            @endif
        </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>