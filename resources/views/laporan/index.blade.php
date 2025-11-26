<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Laporan Aktivitas - Mading Arga</title>
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-icons.css') }}" rel="stylesheet">
    
<style>
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

.laporan-hero {
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

.report-card {
    background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 
        0 8px 20px rgba(201, 181, 156, 0.12),
        0 3px 6px rgba(201, 181, 156, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.4);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    border: 1px solid rgba(217, 207, 199, 0.6);
    height: 200px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.report-card:hover {
    transform: translateY(-3px);
    box-shadow: 
        0 15px 35px rgba(201, 181, 156, 0.2),
        0 5px 15px rgba(201, 181, 156, 0.12),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);
}

.btn-download {
    background: #c9b59c;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    margin: 3px;
}

.btn-download:hover {
    background: #b8a082;
    color: white;
    transform: translateY(-1px);
}

.btn-excel {
    background: #38a169;
}

.btn-excel:hover {
    background: #2f855a;
}

.report-icon {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
    opacity: 0.8;
}

.report-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #4a5568;
    margin-bottom: 0.5rem;
}

.report-desc {
    font-size: 0.85rem;
    color: #718096;
    margin-bottom: 1rem;
}
</style>
</head>

<body>
<div class="container">
    <div class="laporan-hero text-center">
        <div style="font-size: 3rem; margin-bottom: 1rem;">📋</div>
        <h1 class="h3 fw-bold mb-2" style="color: #c9b59c;">Laporan Aktivitas</h1>
        <p class="mb-0">Generate laporan artikel per bulan atau per kategori</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="report-card text-center">
                <div class="report-icon">📅</div>
                <div class="report-title">Laporan Bulanan</div>
                <div class="report-desc">Laporan artikel yang dipublikasi per bulan</div>
                
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="{{ route('laporan.preview', ['type' => 'monthly']) }}" 
                       class="btn-download">
                        👁️ Preview
                    </a>
                    <a href="{{ route('laporan.generate', ['type' => 'monthly', 'format' => 'pdf']) }}" 
                       class="btn-download">
                        📄 PDF
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="report-card text-center">
                <div class="report-icon">📂</div>
                <div class="report-title">Laporan Kategori</div>
                <div class="report-desc">Laporan artikel yang dipublikasi per kategori</div>
                
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="{{ route('laporan.preview', ['type' => 'category']) }}" 
                       class="btn-download">
                        👁️ Preview
                    </a>
                    <a href="{{ route('laporan.generate', ['type' => 'category', 'format' => 'pdf']) }}" 
                       class="btn-download">
                        📄 PDF
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="report-card text-center">
                <div class="report-icon">📰</div>
                <div class="report-title">Laporan Artikel</div>
                <div class="report-desc">Daftar detail semua artikel yang dipublikasi</div>
                
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="{{ route('laporan.preview', ['type' => 'articles']) }}" 
                       class="btn-download">
                        👁️ Preview
                    </a>
                    <a href="{{ route('laporan.generate', ['type' => 'articles', 'format' => 'pdf']) }}" 
                       class="btn-download">
                        📄 PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-3">
        <a href="{{ route('statistik.index') }}" class="btn" style="background: #c9b59c; color: white; border-radius: 10px; padding: 10px 20px;">
            ← Kembali ke Statistik
        </a>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>