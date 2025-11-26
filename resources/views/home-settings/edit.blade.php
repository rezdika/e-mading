@extends('layouts.app')

@section('title', 'Pengaturan Home - Mading Arga')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>🏠 Pengaturan Halaman Home</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('home-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <h5 class="mb-3">📝 Hero Section</h5>
                        <div class="mb-3">
                            <label for="hero_title" class="form-label">Judul Hero</label>
                            <input type="text" class="form-control @error('hero_title') is-invalid @enderror" 
                                   id="hero_title" name="hero_title" value="{{ old('hero_title', $settings->hero_title) }}" required>
                            @error('hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hero_subtitle" class="form-label">Subtitle Hero</label>
                            <textarea class="form-control @error('hero_subtitle') is-invalid @enderror" 
                                      id="hero_subtitle" name="hero_subtitle" rows="3" required>{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                            @error('hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="hero_background" class="form-label">Background Hero</label>
                            @if($settings->hero_background)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $settings->hero_background) }}" alt="Current background" class="img-thumbnail" style="max-width: 200px;">
                                    <p class="text-muted small">Background saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('hero_background') is-invalid @enderror" 
                                   id="hero_background" name="hero_background" accept="image/*">
                            @error('hero_background')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <h5 class="mb-3">ℹ️ About Section</h5>
                        <div class="mb-3">
                            <label for="about_title" class="form-label">Judul About</label>
                            <input type="text" class="form-control @error('about_title') is-invalid @enderror" 
                                   id="about_title" name="about_title" value="{{ old('about_title', $settings->about_title) }}" required>
                            @error('about_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="about_description" class="form-label">Deskripsi About</label>
                            <textarea class="form-control @error('about_description') is-invalid @enderror" 
                                      id="about_description" name="about_description" rows="4" required>{{ old('about_description', $settings->about_description) }}</textarea>
                            @error('about_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>

                        <h5 class="mb-3">📞 Contact Info</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Telepon</label>
                                    <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" 
                                           id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}">
                                    @error('contact_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('contact_email') is-invalid @enderror" 
                                           id="contact_email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}">
                                    @error('contact_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="contact_address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('contact_address') is-invalid @enderror" 
                                           id="contact_address" name="contact_address" value="{{ old('contact_address', $settings->contact_address) }}">
                                    @error('contact_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">💾 Simpan Pengaturan</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">🔙 Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection