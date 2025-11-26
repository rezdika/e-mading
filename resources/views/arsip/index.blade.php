@extends('layouts.app')

@section('title', 'Arsip Artikel')
@section('body-class', 'arsip-page')

@section('content')
<!-- Page Title -->
<div class="page-title" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); padding: 4rem 0 2rem; color: white;">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title" style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">📚 Arsip Artikel</h1>
          <p class="mb-0">Dokumentasi lengkap semua karya yang telah dipublikasikan</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Filter Section -->
<section class="container" style="margin-top: -30px; position: relative; z-index: 2;">
  <div class="card" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
    <div class="card-body p-4">
      <form method="GET" action="{{ route('arsip.index') }}">
        <div class="row g-3">
          <div class="col-md-3">
            <label class="form-label fw-bold">Tahun</label>
            <select name="tahun" class="form-select" style="border-radius: 10px;">
              <option value="">Semua Tahun</option>
              @foreach($years as $year)
              <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label fw-bold">Bulan</label>
            <select name="bulan" class="form-select" style="border-radius: 10px;">
              <option value="">Semua Bulan</option>
              @foreach($months as $num => $name)
              <option value="{{ $num }}" {{ request('bulan') == $num ? 'selected' : '' }}>
                {{ $name }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label fw-bold">Kategori</label>
            <select name="kategori" class="form-select" style="border-radius: 10px;">
              <option value="">Semua Kategori</option>
              @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ request('kategori') == $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label">&nbsp;</label>
            <div class="d-flex gap-2">
              <button type="submit" class="btn flex-fill" style="background: linear-gradient(45deg, #667eea, #764ba2); color: white; border-radius: 10px;">
                <i class="bi bi-funnel"></i> Filter
              </button>
              <a href="{{ route('arsip.index') }}" class="btn btn-outline-secondary" style="border-radius: 10px;">
                <i class="bi bi-arrow-clockwise"></i>
              </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Filter Info -->
@if(request()->hasAny(['tahun', 'bulan', 'kategori']))
<section class="container" style="padding: 1rem 0;">
  <div class="alert alert-info" style="border-radius: 15px;">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <strong><i class="bi bi-info-circle"></i> Filter Aktif:</strong>
        @if(request('tahun'))
          <span class="badge bg-primary ms-1">Tahun: {{ request('tahun') }}</span>
        @endif
        @if(request('bulan'))
          <span class="badge bg-success ms-1">Bulan: {{ $months[request('bulan')] }}</span>
        @endif
        @if(request('kategori'))
          <span class="badge bg-warning ms-1">Kategori: {{ $categories->find(request('kategori'))->nama ?? 'Unknown' }}</span>
        @endif
        <span class="ms-2 text-muted">{{ $articles->total() }} artikel ditemukan</span>
      </div>
      <a href="{{ route('arsip.index') }}" class="btn btn-sm btn-outline-secondary">
        <i class="bi bi-x"></i> Reset Filter
      </a>
    </div>
  </div>
</section>
@endif

<!-- Articles Section -->
<section class="container" style="padding: 2rem 0;">
  @if($articles->count() > 0)
  <div class="row gy-4">
    @foreach($articles as $article)
    <div class="col-lg-4 col-md-6">
      <div class="card h-100" style="border-radius: 15px; cursor: pointer; transition: all 0.3s ease;" onclick="window.location.href='{{ route('blog-details', $article->id) }}'" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 15px rgba(0,0,0,0.1)'">
        <div style="height: 200px; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 15px 15px 0 0; position: relative; overflow: hidden;">
          @if($article->foto)
          <img src="{{ asset('storage/' . $article->foto) }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px 15px 0 0;">
          @else
          <div class="d-flex align-items-center justify-content-center h-100 text-white">
            <i class="bi bi-file-text" style="font-size: 4rem; opacity: 0.7;"></i>
          </div>
          @endif
          <div class="position-absolute top-0 start-0 m-3">
            <span class="badge bg-light text-dark" style="font-size: 0.75rem;">{{ $article->category->nama ?? 'Umum' }}</span>
          </div>
        </div>
        <div class="card-body p-3">
          <h5 class="card-title mb-2" style="font-weight: 600; line-height: 1.3;">{{ $article->judul }}</h5>
          <p class="card-text text-muted" style="font-size: 0.9rem; line-height: 1.5;">{{ Str::limit(strip_tags($article->isi), 100) }}</p>
          <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">
              <i class="bi bi-person"></i> {{ $article->user->nama }}
            </small>
            <small class="text-muted">
              <i class="bi bi-calendar"></i> {{ $article->created_at->format('d M Y') }}
            </small>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Pagination -->
  @if($articles->hasPages())
  <div class="d-flex justify-content-center mt-5">
    {{ $articles->appends(request()->query())->links() }}
  </div>
  @endif

  @else
  <!-- No Results -->
  <div class="text-center py-5">
    <div style="font-size: 5rem; margin-bottom: 2rem; opacity: 0.3;">📂</div>
    <h3>Tidak ada artikel ditemukan</h3>
    @if(request()->hasAny(['tahun', 'bulan', 'kategori']))
      <p class="text-muted">Tidak ada artikel yang sesuai dengan filter yang dipilih.</p>
      <div class="mt-3">
        <a href="{{ route('arsip.index') }}" class="btn btn-outline-primary rounded-pill px-4 me-2">
          <i class="bi bi-arrow-clockwise"></i> Reset Filter
        </a>
        <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4">
          <i class="bi bi-house"></i> Kembali ke Beranda
        </a>
      </div>
    @else
      <p class="text-muted">Belum ada artikel yang dipublikasikan.</p>
      <a href="{{ route('home') }}" class="btn btn-primary rounded-pill px-4 mt-3">
        <i class="bi bi-house"></i> Kembali ke Beranda
      </a>
    @endif
  </div>
  @endif
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Auto submit when filter changes
    $('select[name="tahun"], select[name="bulan"], select[name="kategori"]').change(function() {
        // Optional: Auto submit form when filter changes
        // $(this).closest('form').submit();
    });
    
    // Add loading state to filter button
    $('form').submit(function() {
        const btn = $(this).find('button[type="submit"]');
        btn.html('<i class="bi bi-hourglass-split"></i> Memfilter...');
        btn.prop('disabled', true);
    });
    
    // Smooth scroll to results after filter
    @if(request()->hasAny(['tahun', 'bulan', 'kategori']))
    $('html, body').animate({
        scrollTop: $('.alert-info').offset().top - 100
    }, 500);
    @endif
});
</script>
@endpush

@push('styles')
<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.alert-info {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(240, 147, 251, 0.1));
    border: 1px solid rgba(102, 126, 234, 0.2);
    color: #333;
}

.badge {
    font-size: 0.75rem;
}
</style>
@endpush