@extends('layouts.app')

@section('title', $category->nama . ' - Mading Arga')
@section('body-class', 'category-articles-page')

@section('content')
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">📁 {{ $category->nama_kategori }}</h1>
          <p class="mb-0">{{ $category->deskripsi ?? 'Jelajahi artikel menarik seputar ' . $category->nama_kategori }}</p>
          <div class="mt-3">
            <span class="badge bg-primary rounded-pill px-3 py-2">
              <i class="bi bi-file-text"></i> {{ $articles->total() }} Artikel Tersedia
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('category') }}">Kategori</a></li>
        <li class="current">{{ $category->nama_kategori }}</li>
      </ol>
    </div>
  </nav>
</div>

<section class="category-articles section">
  <div class="container">
    @if($articles->count() > 0)
    <div class="row gy-4">
      @foreach($articles as $article)
      <div class="col-lg-4 col-md-6">
        <div class="card h-100" style="border-radius: 15px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer;" onclick="window.location.href='{{ route('blog-details', $article->id) }}'">
          <div style="height: 200px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 15px 15px 0 0;">
            @if($article->foto)
            <img src="{{ asset('storage/' . $article->foto) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px 15px 0 0;">
            @endif
          </div>
          <div class="card-body p-3">
            <h6 class="card-title mb-2">{{ Str::limit($article->judul, 60) }}</h6>
            <p class="card-text text-muted small mb-2">{{ Str::limit(strip_tags($article->isi), 100) }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">
                <i class="bi bi-person"></i> {{ $article->user->nama }}
              </small>
              <small class="text-muted">
                <i class="bi bi-calendar"></i> {{ $article->tanggal->format('d M Y') }}
              </small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
    @if($articles->hasPages())
    <div class="d-flex justify-content-center mt-4">
      {{ $articles->links() }}
    </div>
    @endif
    
    @else
    <div class="text-center py-5">
      <div style="font-size: 5rem; opacity: 0.3;">📄</div>
      <h3 class="mt-3">Belum Ada Artikel</h3>
      <p class="text-muted">Belum ada artikel dalam kategori {{ $category->nama_kategori }}</p>
      <a href="{{ route('category') }}" class="btn btn-primary rounded-pill">
        <i class="bi bi-arrow-left"></i> Kembali ke Kategori
      </a>
    </div>
    @endif
  </div>
</section>
@endsection