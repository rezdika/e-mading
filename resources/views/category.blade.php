@extends('layouts.app')

@section('title', 'Kategori - Mading Arga')
@section('body-class', 'category-page')

@section('content')
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">📂 Kategori Artikel</h1>
          <p class="mb-0">Jelajahi artikel berdasarkan kategori yang tersedia</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="current">Kategori</li>
      </ol>
    </div>
  </nav>
</div>

<section class="category section">
  <div class="container">
    @if($categories->count() > 0)
    <div class="row gy-4">
      @foreach($categories as $category)
      <div class="col-lg-4 col-md-6">
        <div class="card h-100" style="border-radius: 15px; border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer;" onclick="window.location.href='{{ route('category.show', $category->id) }}'">
          <div class="card-body text-center p-4">
            <div class="mb-3" style="font-size: 3rem;">📁</div>
            <h5 class="card-title mb-3" style="color: #333; font-weight: 600;">{{ $category->nama }}</h5>
            <p class="card-text text-muted mb-3">{{ $category->deskripsi ?? 'Kategori artikel ' . $category->nama }}</p>
            <div class="d-flex justify-content-center align-items-center">
              <span class="badge" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 8px 16px; border-radius: 20px;">
                {{ $category->articles_count }} artikel
              </span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="text-center py-5">
      <div style="font-size: 5rem; opacity: 0.3;">📂</div>
      <h3 class="mt-3">Belum Ada Kategori</h3>
      <p class="text-muted">Kategori artikel belum tersedia</p>
    </div>
    @endif
  </div>
</section>
@endsection