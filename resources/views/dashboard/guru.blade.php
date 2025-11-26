<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard Guru - Mading Arga</title>
    
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
        
        .action-card {
            background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
            border-radius: 15px;
            padding: 1.25rem;
            margin-bottom: 0.75rem;
            box-shadow: 
                0 8px 20px rgba(201, 181, 156, 0.12),
                0 3px 6px rgba(201, 181, 156, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid rgba(217, 207, 199, 0.6);
            height: 140px !important;
            min-height: 140px !important;
            max-height: 140px !important;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            animation: slideInUp 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .row.g-3 {
            display: flex;
            align-items: stretch;
        }
        
        .row.g-3 > [class*="col-"] {
            display: flex;
        }
        
        .row.g-3 .action-card {
            width: 100%;
            flex: 1;
        }
        
        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(201, 181, 156, 0.1), transparent);
            transition: left 0.6s;
        }
        
        .action-card:hover::before {
            left: 100%;
        }
        
        .action-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 20px 40px rgba(201, 181, 156, 0.25),
                0 8px 20px rgba(201, 181, 156, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border-color: rgba(201, 181, 156, 0.8);
        }
        
        .action-card:hover .card-icon {
            transform: scale(1.2) rotate(5deg);
        }
        
        .action-card:hover h5 {
            color: #c9b59c !important;
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
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(201, 181, 156, 0.2);
            cursor: pointer;
            animation: fadeInScale 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .stat-mini-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .stat-mini-card:hover::before {
            left: 100%;
        }
        
        .stat-mini-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 
                0 15px 35px rgba(201, 181, 156, 0.5),
                0 8px 20px rgba(184, 160, 130, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }
        
        .stat-mini-card:hover .stat-mini-icon {
            transform: scale(1.3) rotate(10deg);
        }
        
        .stat-mini-card:hover .stat-mini-number {
            transform: scale(1.1);
        }
        
        @keyframes fadeInScale {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .stat-mini-number {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin: 0.5rem 0;
            color: #c9b59c;
            transition: all 0.3s ease;
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
            transition: all 0.3s ease;
        }
        
        .stat-trend {
            font-size: 0.7rem;
            margin-top: 0.25rem;
            opacity: 1;
            font-weight: 500;
            color: #718096;
        }
        
        .card-icon {
            font-size: 2.5rem;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        /* Welcome card animation */
        .welcome-card {
            animation: slideInDown 0.8s ease-out;
        }
        
        @keyframes slideInDown {
            0% {
                transform: translateY(-30px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Pulse animation for notification badge */
        .badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Icon bounce animation */
        .icon-bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
        
        .logout-btn {
            background: #c9b59c;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .logout-btn:hover::before {
            left: 100%;
        }
        
        .logout-btn:hover {
            background: #b8a082;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(201, 181, 156, 0.4);
        }
        
        /* HOVER EFFECTS FOR DASHBOARD CARDS */
        .action-card:hover {
            transform: translateY(-15px) scale(1.05) !important;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3) !important;
            border: 2px solid #667eea !important;
            background: linear-gradient(145deg, rgba(255,255,255,0.95), rgba(248,249,250,0.95)) !important;
        }
        
        .action-card:hover .card-icon {
            transform: scale(1.3) rotate(15deg) !important;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.4)) !important;
        }
        
        .action-card:hover h5 {
            color: #667eea !important;
            transform: translateY(-3px) !important;
        }
        
        .action-card:hover p {
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
        <div class="welcome-card">
            <div class="text-center mb-4">
                <div class="page-icon">👩‍🏫</div>
                <img src="{{ asset('assets/img/logo-hd.svg') }}" alt="Logo Mading" style="max-width: 120px; height: auto;">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-2" style="color: #c9b59c;">Dashboard Penulis Mading</h1>
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
                <h6 class="text-muted mb-3" style="font-size: 0.9rem; font-weight: 600;">📊 Ringkasan Aktivitas Mading</h6>
                @php
                    $totalArticles = \App\Models\Article::count();
                    $publishedArticles = \App\Models\Article::where('status', 'published')->count();
                    $pendingArticles = \App\Models\Article::where('status', 'pending')->count();
                    $totalComments = \App\Models\Comment::count();
                @endphp
                <div class="row g-3 card-grid">
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="stat-mini-icon icon-animated">📰</div>
                            <div class="stat-mini-number">{{ $totalArticles }}</div>
                            <div class="stat-mini-label">Total Artikel</div>
                            <div class="stat-trend">→ Semua status</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                            <div class="stat-mini-icon icon-animated">✅</div>
                            <div class="stat-mini-number">{{ $publishedArticles }}</div>
                            <div class="stat-mini-label">Dipublikasi</div>
                            <div class="stat-trend">{{ $totalArticles > 0 ? number_format(($publishedArticles / $totalArticles) * 100, 0) : 0 }}% dari total</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="stat-mini-icon icon-animated">⏳</div>
                            <div class="stat-mini-number">{{ $pendingArticles }}</div>
                            <div class="stat-mini-label">Perlu Review</div>
                            @if($pendingArticles > 0)
                                <div class="stat-trend">⚠️ Butuh verifikasi</div>
                            @else
                                <div class="stat-trend">✅ Semua terverifikasi</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="stat-mini-icon icon-animated">💬</div>
                            <div class="stat-mini-number">{{ $totalComments }}</div>
                            <div class="stat-mini-label">Komentar</div>
                            <div class="stat-trend">📝 Interaksi pembaca</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex gap-3 mt-4" style="justify-content: space-between;">
            <a href="{{ route('articles.index') }}" class="text-decoration-none" style="flex: 1;">
                <div class="action-card stats-card dashboard-menu-card dashboard-item text-center">
                    <div class="card-icon icon-animated">📝</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Artikel</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Buat, edit, dan kelola artikel</p>
                </div>
            </a>
            <a href="{{ route('moderasi.index') }}" class="text-decoration-none" style="flex: 1;">
                <div class="action-card stats-card dashboard-menu-card dashboard-item text-center position-relative">
                    @php
                        $pendingCount = \App\Models\Article::where('status', 'pending')->count();
                    @endphp
                    @if($pendingCount > 0)
                        <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger" style="font-size: 0.75rem;">
                            {{ $pendingCount }}
                        </span>
                    @endif
                    <div class="card-icon icon-animated">🛡️</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Moderasi Konten</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Tinjau artikel sebelum publikasi</p>
                </div>
            </a>
            <a href="{{ route('home') }}" class="text-decoration-none" style="flex: 1;">
                <div class="action-card stats-card dashboard-menu-card dashboard-item text-center">
                    <div class="card-icon icon-animated">📖</div>
                    <h5 class="mt-2 mb-1" style="color: #4a5568;">Baca Artikel</h5>
                    <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Jelajahi artikel mading terbaru</p>
                </div>
            </a>
        </div>
    </div>
    <!-- Dashboard Animation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add stagger animation to action cards
        const actionCards = document.querySelectorAll('.action-card');
        actionCards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.1) + 's';
        });
        
        // Add stagger animation to mini cards
        const miniCards = document.querySelectorAll('.stat-mini-card');
        miniCards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.1) + 's';
        });
        
        // Add click ripple effect
        const clickableCards = document.querySelectorAll('.action-card, .stat-mini-card');
        clickableCards.forEach(card => {
            card.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    background: rgba(201, 181, 156, 0.3);
                    border-radius: 50%;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                    z-index: 10;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
        
        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
        
        // Add number counter animation
        const numbers = document.querySelectorAll('.stat-mini-number');
        numbers.forEach(number => {
            const finalValue = parseInt(number.textContent);
            let currentValue = 0;
            const increment = finalValue / 30;
            
            const counter = setInterval(() => {
                currentValue += increment;
                if (currentValue >= finalValue) {
                    number.textContent = finalValue;
                    clearInterval(counter);
                } else {
                    number.textContent = Math.floor(currentValue);
                }
            }, 50);
        });
    });
    </script>
</body>
</html>