@extends('layouts.app')

@section('title', 'Pengumuman & Informasi Sekolah')
@section('body-class', 'pengumuman-page')

@section('content')
<!-- Page Title -->
<div class="page-title" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); padding: 4rem 0 2rem; color: white;">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title" style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">📢 Pengumuman & Informasi</h1>
          <p class="mb-0" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important; text-shadow: 1px 1px 2px rgba(255,255,255,0.3); font-weight: 500;">Informasi terkini dan pengumuman penting dari sekolah</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 1rem 0;">
    <div class="container">
      <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center; gap: 0.5rem;">
        <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Beranda</a></li>
        <li style="color: white;">/</li>
        <li class="current" style="color: white;">Pengumuman</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Pengumuman Posts Section -->
<section id="pengumuman-posts" class="section" style="padding: 3rem 0;">
  <div class="container">
    @if($pengumuman->count() > 0)
    <div class="row gy-4">
      @foreach($pengumuman as $item)
      <div class="col-lg-4 col-md-6">
        <article class="pengumuman-card" onclick="window.location.href='{{ route('blog-details', $item->id) }}'" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; cursor: pointer; height: 100%;">
          
          <div class="post-img" style="height: 200px; overflow: hidden;">
            @if($item->foto)
              <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <div style="width: 100%; height: 100%; background: linear-gradient(45deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">📢</div>
            @endif
          </div>

          <div style="padding: 1.5rem;">
            <p class="post-category" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; padding: 6px 15px; border-radius: 15px; font-size: 0.85rem; font-weight: 600; display: inline-block; margin-bottom: 1rem;">
              {{ $item->category->nama ?? 'Pengumuman' }}
            </p>

            <h2 class="title" style="margin-bottom: 1rem;">
              <a href="{{ route('blog-details', $item->id) }}" style="color: #333; text-decoration: none; font-size: 1.2rem; font-weight: 600; line-height: 1.4;">{{ $item->judul }}</a>
            </h2>

            <p style="color: #666; font-size: 0.95rem; margin-bottom: 1rem; line-height: 1.6;">
              {{ Str::limit(strip_tags($item->isi), 100) }}
            </p>

            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center gap-2">
                <div style="width: 35px; height: 35px; border-radius: 50%; background: linear-gradient(45deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white; font-size: 0.8rem; font-weight: bold;">
                  {{ strtoupper(substr($item->user->nama, 0, 1)) }}
                </div>
                <div>
                  <p style="margin: 0; font-size: 0.85rem; font-weight: 600; color: #333;">{{ $item->user->nama }}</p>
                  <p style="margin: 0; font-size: 0.8rem; color: #666;">{{ $item->created_at->format('d M Y') }}</p>
                </div>
              </div>
              <span style="background: rgba(102, 126, 234, 0.1); color: #667eea; padding: 4px 8px; border-radius: 10px; font-size: 0.75rem; font-weight: 600;">
                <i class="bi bi-clock"></i> {{ $item->created_at->diffForHumans() }}
              </span>
            </div>
          </div>
        </article>
      </div>
      @endforeach
    </div>

    <!-- Pagination -->
    @if($pengumuman->hasPages())
    <div class="d-flex justify-content-center mt-5">
      {{ $pengumuman->links() }}
    </div>
    @endif

    @else
    <!-- No Results -->
    <div class="text-center py-5">
      <div style="font-size: 4rem; margin-bottom: 1rem;">📢</div>
      <h3>Belum ada pengumuman</h3>
      <p class="text-muted">Pengumuman dan informasi terbaru akan ditampilkan di sini.</p>
    </div>
    @endif
  </div>
</section>
@endsection

@push('styles')
<style>
.pengumuman-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.pengumuman-card:hover .post-img img {
    transform: scale(1.05);
}

.post-img img {
    transition: transform 0.3s ease;
}
</style>
@endpush