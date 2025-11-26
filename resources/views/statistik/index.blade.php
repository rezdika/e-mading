@extends('layouts.app')

@section('title', 'Statistik Mading - Mading Arga')

@push('styles')
<style>
body {
    background: linear-gradient(135deg, #f9f8f6 0%, #f1ede8 50%, #ebe5df 100%);
    min-height: 100vh;
    font-family: 'Inter', sans-serif;
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

.stats-hero {
    background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
    border-radius: 25px;
    padding: 2rem;
    margin: 2rem 0;
    box-shadow: 
        0 20px 40px rgba(201, 181, 156, 0.15),
        0 8px 16px rgba(201, 181, 156, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
    border: 1px solid rgba(217, 207, 199, 0.8);
    color: #4a5568;
}

.stat-card {
    background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
    border-radius: 15px;
    padding: 1.25rem;
    box-shadow: 
        0 8px 20px rgba(201, 181, 156, 0.12),
        0 3px 6px rgba(201, 181, 156, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
    transition: all 0.3s ease;
    margin-bottom: 1rem;
    height: 120px;
    display: flex;
    align-items: center;
    border: 1px solid rgba(217, 207, 199, 0.6);
    border-left: 4px solid #c9b59c;
}

.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 15px 35px rgba(201, 181, 156, 0.2),
        0 5px 15px rgba(201, 181, 156, 0.12),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
}

.stat-card.primary { border-left-color: #667eea; }
.stat-card.success { border-left-color: #38ef7d; }
.stat-card.warning { border-left-color: #f5576c; }
.stat-card.info { border-left-color: #4facfe; }

.stat-icon {
    width: 70px;
    height: 70px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
}

.stat-icon.primary { background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(102, 126, 234, 0.05)); }
.stat-icon.success { background: linear-gradient(135deg, rgba(56, 239, 125, 0.15), rgba(56, 239, 125, 0.05)); }
.stat-icon.warning { background: linear-gradient(135deg, rgba(245, 87, 108, 0.15), rgba(245, 87, 108, 0.05)); }
.stat-icon.info { background: linear-gradient(135deg, rgba(79, 172, 254, 0.15), rgba(79, 172, 254, 0.05)); }

.stat-icon svg {
    width: 40px;
    height: 40px;
    display: block;
}

.stat-icon i {
    font-size: 2rem;
    display: block;
}

.stat-content {
    flex: 1;
}

.stat-number {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
    line-height: 1;
}

.stat-label {
    color: #7f8c8d;
    font-weight: 500;
    font-size: 0.8rem;
    margin: 0.25rem 0 0 0;
    line-height: 1;
}

.chart-container {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}
</style>
@endpush

@section('content')
<section class="stats-hero">
    <div class="container text-center">
        <div style="font-size: 3rem; margin-bottom: 1rem;">📊</div>
        <h1 class="h3 fw-bold mb-2" style="color: #c9b59c;">Statistik Mading</h1>
        <p class="mb-0">Data dan analisis aktivitas mading sekolah</p>
    </div>
</section>

<section class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card primary">
                <div class="stat-icon primary">
                    <div style="font-size: 2.5rem;">📰</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalArticles }}</div>
                    <div class="stat-label">Total Artikel</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <div style="font-size: 2.5rem;">👥</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalUsers }}</div>
                    <div class="stat-label">Total Pengguna</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <div style="font-size: 2.5rem;">📂</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalCategories }}</div>
                    <div class="stat-label">Kategori</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <div style="font-size: 2.5rem;">❤️</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalLikes }}</div>
                    <div class="stat-label">Total Likes</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <div style="font-size: 2.5rem;">✅</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $publishedArticles }}</div>
                    <div class="stat-label">Dipublikasi</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <div style="font-size: 2.5rem;">📝</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $draftArticles }}</div>
                    <div class="stat-label">Draft</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <div style="font-size: 2.5rem;">💬</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ \App\Models\Comment::count() }}</div>
                    <div class="stat-label">Komentar</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card primary">
                <div class="stat-icon primary">
                    <div style="font-size: 2.5rem;">📈</div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalArticles > 0 ? number_format(($publishedArticles / $totalArticles) * 100, 1) : '0' }}%</div>
                    <div class="stat-label">Tingkat Publikasi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="chart-container">
                <h4 class="mb-4">📊 Karya per Bulan ({{ date('Y') }})</h4>
                <canvas id="monthlyChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</section> -->

<section class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="stat-card text-center" style="height: auto; padding: 1.5rem;">
                <h5 class="mb-2">📤 Bagikan Laporan</h5>
                <p class="text-muted mb-3" style="font-size: 0.9rem;">Download laporan statistik dalam format PDF atau Excel</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('laporan.preview', ['type' => 'monthly']) }}" 
                       class="btn btn-outline-primary">
                        <i class="bi bi-eye"></i> Lihat Laporan Bulanan
                    </a>
                    <a href="{{ route('laporan.preview', ['type' => 'category']) }}" 
                       class="btn btn-outline-success">
                        <i class="bi bi-eye"></i> Lihat Laporan Kategori
                    </a>
                </div>
                <div class="mt-3">
                    <a href="{{ route('laporan.index') }}" class="btn btn-info">
                        <i class="bi bi-eye"></i> Lihat Halaman Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-3">
        <a href="{{ route('dashboard') }}" class="btn" style="background: #c9b59c; color: white; border-radius: 10px; padding: 10px 20px;">
            ← Kembali ke Dashboard
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
const monthlyData = @json($articlesByMonth);
const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
const monthlyValues = months.map((month, index) => monthlyData[index + 1] || 0);

new Chart(monthlyCtx, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Karya Dipublikasi',
            data: monthlyValues,
            borderColor: '#667eea',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});


</script>
@endpush