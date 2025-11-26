@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan')
@section('body-class', 'error-page')

@section('content')
<section class="error section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="error-content">
          <h1 class="display-1 fw-bold text-primary">404</h1>
          <h2 class="mb-4">😅 Halaman Tidak Ditemukan</h2>
          <p class="lead mb-4">Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin halaman telah dipindahkan atau dihapus.</p>
          <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-house"></i> Kembali ke Beranda
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection