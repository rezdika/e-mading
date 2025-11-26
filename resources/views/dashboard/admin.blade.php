<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Dashboard Admin - Mading Arga</title>
    
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
        
        .stats-card {
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
            height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            animation: slideInUp 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(201, 181, 156, 0.1), transparent);
            transition: left 0.6s;
        }
        
        .stats-card:hover::before {
            left: 100%;
        }
        
        .stats-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 20px 40px rgba(201, 181, 156, 0.25),
                0 8px 20px rgba(201, 181, 156, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border-color: rgba(201, 181, 156, 0.8);
        }
        
        .stats-card:hover .card-icon {
            transform: scale(1.2) rotate(5deg);
        }
        
        .stats-card:hover h5 {
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
        
        /* Stagger animation delays */
        .stats-card:nth-child(1) { animation-delay: 0.1s; }
        .stats-card:nth-child(2) { animation-delay: 0.2s; }
        .stats-card:nth-child(3) { animation-delay: 0.3s; }
        .stats-card:nth-child(4) { animation-delay: 0.4s; }
        
        .stat-mini-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-mini-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-mini-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-mini-card:nth-child(4) { animation-delay: 0.4s; }
        
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
        
        /* SIMPLE HOVER EFFECTS */
        .stats-card:hover {
            background: red !important;
            transform: scale(1.1) !important;
        }
        
        .stat-mini-card:hover {
            background: blue !important;
            transform: scale(1.1) !important;
        }
    </style>
</head>

<body>

    
    <div class="dashboard-container">
        <div class="welcome-card hero-section">
            <div class="text-center mb-4">
                <div class="page-icon hero-icon">🏛️</div>
                <img src="{{ asset('assets/img/logo-hd.svg') }}" alt="Logo Mading" style="max-width: 120px; height: auto;">
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-2" style="color: #c9b59c;">Dashboard Admin Mading</h1>
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
                <h6 class="text-muted mb-3" style="font-size: 0.9rem; font-weight: 600;">📊 Ringkasan Sistem Mading</h6>
                @php
                    $totalArticles = \App\Models\Article::count();
                    $totalUsers = \App\Models\User::count();
                    $totalCategories = \App\Models\Category::count();
                    $pendingArticles = \App\Models\Article::where('status', 'pending')->count();
                @endphp
                <div class="row g-3 card-grid">
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="stat-mini-icon icon-animated">📰</div>
                            <div class="stat-mini-number">{{ $totalArticles }}</div>
                            <div class="stat-mini-label">Total Artikel</div>
                            <div class="stat-trend">📊 Semua status</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                            <div class="stat-mini-icon icon-animated">👥</div>
                            <div class="stat-mini-number">{{ $totalUsers }}</div>
                            <div class="stat-mini-label">Total User</div>
                            <div class="stat-trend">👤 Admin, Guru & Siswa</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="stat-mini-icon icon-animated">📂</div>
                            <div class="stat-mini-number">{{ $totalCategories }}</div>
                            <div class="stat-mini-label">Kategori</div>
                            <div class="stat-trend">🏷️ Klasifikasi artikel</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="stat-mini-card stats-item dashboard-item" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
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
                </div>
            </div>
        </div>

        <div class="row mt-4 card-grid">
            <div class="col-md-3">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">👥</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola User</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Admin, Guru & Siswa</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('articles.index') }}" class="text-decoration-none">
                    <div class="stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">📝</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Artikel</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Semua artikel mading</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('categories.index') }}" class="text-decoration-none">
                    <div class="stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">📂</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Kelola Kategori</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Kategori artikel</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('laporan.index') }}" class="text-decoration-none">
                    <div class="stats-card dashboard-menu-card dashboard-item text-center">
                        <div class="card-icon icon-animated">📋</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Laporan Aktivitas</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Download laporan</p>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('statistik.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">📊</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Statistik</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Data & analisis</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('moderasi.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center position-relative">
                        @php
                            $pendingCount = \App\Models\Article::where('status', 'pending')->count();
                        @endphp
                        @if($pendingCount > 0)
                            <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger" style="font-size: 0.75rem;">
                                {{ $pendingCount }}
                            </span>
                        @endif
                        <div class="card-icon">🛡️</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Verifikasi Artikel</h5>
                        <p class="text-muted mb-0" style="font-size: 0.85rem;">
                            @if($pendingCount > 0)
                                <span class="badge bg-warning text-dark" style="font-size: 0.75rem;">{{ $pendingCount }} menunggu</span>
                            @else
                                Semua terverifikasi
                            @endif
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('home-settings.edit') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon">🏡</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Pengaturan Home</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Edit tampilan home</p>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('notifications.index') }}" class="text-decoration-none">
                    <div class="stats-card text-center">
                        <div class="card-icon icon-bounce">🔔</div>
                        <h5 class="mt-2 mb-1" style="color: #4a5568;">Notifikasi</h5>
                        <p class="mb-0" style="font-size: 0.85rem; color: #718096;">Status artikel & pemberitahuan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Dashboard Animation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add stagger animation to stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.1) + 's';
        });
        
        // Add stagger animation to mini cards
        const miniCards = document.querySelectorAll('.stat-mini-card');
        miniCards.forEach((card, index) => {
            card.style.animationDelay = (index * 0.1) + 's';
        });
        
        // Add click ripple effect
        const clickableCards = document.querySelectorAll('.stats-card, .stat-mini-card');
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
        
        // Add loading animation when clicking cards
        const cardLinks = document.querySelectorAll('a .stats-card');
        cardLinks.forEach(card => {
            card.addEventListener('click', function(e) {
                const icon = this.querySelector('.card-icon');
                if (icon) {
                    icon.style.animation = 'spin 1s linear infinite';
                }
                
                // Add spin animation
                const spinStyle = document.createElement('style');
                spinStyle.textContent = `
                    @keyframes spin {
                        from { transform: rotate(0deg); }
                        to { transform: rotate(360deg); }
                    }
                `;
                document.head.appendChild(spinStyle);
            });
        });
        
        // Add hover sound effect simulation
        const allCards = document.querySelectorAll('.stats-card, .stat-mini-card, .logout-btn');
        allCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1)';
            });
        });
        
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