@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan - Mading Arga')
@section('body-class', 'error-page')

@push('styles')
<style>
.error-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.error-content {
    text-align: center;
    color: white;
    position: relative;
    z-index: 2;
    max-width: 600px;
    padding: 2rem;
}

.error-code {
    font-size: 8rem;
    font-weight: 900;
    margin: 0;
    text-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.error-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 1rem 0;
}

.error-text {
    font-size: 1.2rem;
    margin: 1.5rem 0;
    opacity: 0.9;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
    flex-wrap: wrap;
}

.error-btn {
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-home {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
}

.btn-home:hover {
    background: rgba(255,255,255,0.3);
    color: white;
    transform: translateY(-3px);
}

@media (max-width: 768px) {
    .error-code { font-size: 5rem; }
    .error-title { font-size: 1.8rem; }
    .error-actions { flex-direction: column; align-items: center; }
}
</style>
@endpush

@section('content')
<div class="error-hero">
    <div class="error-content">
        <div style="font-size: 4rem; margin-bottom: 1rem;">😅</div>
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Halaman Tidak Ditemukan</h2>
        <p class="error-text">
            Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin halaman telah dipindahkan atau dihapus.
        </p>
        
        <div class="error-actions">
            <a href="{{ route('home') }}" class="error-btn btn-home">
                <i class="bi bi-house"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection