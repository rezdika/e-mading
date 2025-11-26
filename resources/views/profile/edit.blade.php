@extends('layouts.app')

@section('title', 'Edit Profil - Mading Arga')
@section('body-class', 'profile-edit-page')

@push('styles')
<style>
body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #f9f8f6 0%, #f1ede8 50%, #ebe5df 100%);
    min-height: 100vh;
}

.edit-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 4rem 0 2rem;
    position: relative;
    overflow: hidden;
    color: white;
}

.edit-hero::before {
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

.form-content {
    background: white;
    margin-top: -50px;
    position: relative;
    z-index: 3;
    border-radius: 30px 30px 0 0;
    box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
    padding: 3rem;
}

.form-control {
    border-radius: 15px;
    border: 2px solid #e9ecef;
    padding: 15px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #c9b59c;
    box-shadow: 0 0 0 0.2rem rgba(201, 181, 156, 0.25);
    transform: translateY(-2px);
}

.form-label {
    font-weight: 600;
    color: #333;
    margin-bottom: 0.5rem;
}

.btn-primary {
    background: linear-gradient(45deg, #c9b59c, #b8a082) !important;
    border: none;
    border-radius: 25px;
    padding: 15px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(201, 181, 156, 0.3);
}

.btn-secondary {
    background: #6c757d;
    border: none;
    border-radius: 25px;
    padding: 15px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
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

.form-container {
    max-width: 600px;
    margin: 0 auto;
}
</style>
@endpush

@section('content')
<!-- Edit Hero -->
<section class="edit-hero">
    <div class="container">
        <nav class="breadcrumb-custom">
            <a href="{{ route('home') }}">🏠 Home</a> 
            <span class="mx-2">/</span> 
            <a href="{{ route('dashboard') }}">📊 Dashboard</a>
            <span class="mx-2">/</span>
            <a href="{{ route('profile.show') }}">👤 Profil</a>
            <span class="mx-2">/</span>
            <span class="active">✏️ Edit</span>
        </nav>
        
        <div class="text-center">
            <div style="font-size: 4rem; margin-bottom: 1rem;">✏️</div>
            <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 0.5rem;">Edit Profil</h1>
            <p style="font-size: 1.2rem; opacity: 0.9;">Ubah informasi profil Anda</p>
        </div>
    </div>
</section>

<!-- Form Content -->
<section class="form-content">
    <div class="container">
        <div class="form-container">
            
            <form method="POST" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="nama" class="form-label">👤 Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                           id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required 
                           placeholder="Masukkan nama lengkap Anda">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="username" class="form-label">🏷️ Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" 
                           id="username" name="username" value="{{ old('username', $user->username) }}" required 
                           placeholder="Username unik Anda">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">🔒 Password Baru (Opsional)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
                    <div class="form-text" style="color: #666; font-size: 0.9rem;">
                        <i class="bi bi-info-circle"></i> Biarkan kosong jika tidak ingin mengubah password
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label class="form-label">🎭 Role</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: #f8f9fa; border: 2px solid #e9ecef; border-radius: 15px 0 0 15px;">
                            @if($user->role == 'admin')
                                👑
                            @elseif($user->role == 'guru')
                                ✏️
                            @else
                                📚
                            @endif
                        </span>
                        <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" readonly 
                               style="background: #f8f9fa; border-radius: 0 15px 15px 0;">
                    </div>
                    <div class="form-text" style="color: #666; font-size: 0.9rem;">
                        <i class="bi bi-lock"></i> Role tidak dapat diubah
                    </div>
                </div>
                
                <div class="d-flex justify-content-between gap-3 mt-5">
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection