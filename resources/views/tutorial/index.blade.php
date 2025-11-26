@extends('layouts.app')

@section('title', 'Tutorial Penggunaan Sistem')
@section('body-class', 'tutorial-page')

@section('content')
<!-- Page Title -->
<div class="page-title" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); padding: 4rem 0 2rem; color: white;">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title" style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">📚 Tutorial & Panduan</h1>
          <p class="mb-0">Pelajari cara menggunakan sistem E-Mading dengan mudah</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); padding: 1rem 0;">
    <div class="container">
      <ol style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center; gap: 0.5rem;">
        <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.8); text-decoration: none;">Beranda</a></li>
        <li style="color: white;">/</li>
        <li class="current" style="color: white;">Tutorial</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Tutorial Cards Section -->
<section class="container" style="padding: 3rem 0;">
  <div class="row gy-4">
    @foreach($tutorials as $index => $tutorial)
    <div class="col-lg-6 col-md-6">
      <div class="tutorial-card" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; height: 100%;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.1)'">
        
        <!-- Tutorial Header -->
        <div class="tutorial-header" style="text-align: center; margin-bottom: 2rem;">
          <div style="width: 80px; height: 80px; margin: 0 auto 1rem; background: linear-gradient(45deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 2rem;">
            <i class="{{ $tutorial['icon'] }}"></i>
          </div>
          <h3 style="color: #333; font-weight: 700; margin-bottom: 0.5rem;">{{ $tutorial['title'] }}</h3>
          <p style="color: #666; margin: 0;">{{ $tutorial['description'] }}</p>
        </div>

        <!-- Tutorial Steps -->
        <div class="tutorial-steps">
          <h5 style="color: #333; font-weight: 600; margin-bottom: 1rem;">
            <i class="bi bi-list-ol"></i> Langkah-langkah:
          </h5>
          <ol style="padding-left: 1.5rem; color: #555; line-height: 1.8;">
            @foreach($tutorial['steps'] as $step)
            <li style="margin-bottom: 0.5rem;">{{ $step }}</li>
            @endforeach
          </ol>
        </div>

        <!-- Tutorial Footer -->
        <div class="tutorial-footer" style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #eee; text-align: center;">
          <span style="background: rgba(102, 126, 234, 0.1); color: #667eea; padding: 6px 12px; border-radius: 15px; font-size: 0.85rem; font-weight: 600;">
            Tutorial {{ $index + 1 }}
          </span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>

<!-- Quick Tips Section -->
<section class="container" style="padding: 2rem 0;">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(240, 147, 251, 0.1)); border-radius: 25px; padding: 3rem; text-align: center;">
        <div style="font-size: 4rem; margin-bottom: 1.5rem;">💡</div>
        <h3 style="color: #333; margin-bottom: 1rem;">Tips Penggunaan</h3>
        <div class="row">
          <div class="col-md-4 mb-3">
            <div style="padding: 1rem;">
              <i class="bi bi-shield-check" style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
              <h6 style="color: #333; font-weight: 600;">Keamanan</h6>
              <p style="color: #666; font-size: 0.9rem; margin: 0;">Jangan bagikan password Anda kepada orang lain</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div style="padding: 1rem;">
              <i class="bi bi-chat-dots" style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
              <h6 style="color: #333; font-weight: 600;">Interaksi</h6>
              <p style="color: #666; font-size: 0.9rem; margin: 0;">Berikan komentar yang membangun pada artikel</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div style="padding: 1rem;">
              <i class="bi bi-pencil-square" style="font-size: 2rem; color: #667eea; margin-bottom: 0.5rem;"></i>
              <h6 style="color: #333; font-weight: 600;">Konten</h6>
              <p style="color: #666; font-size: 0.9rem; margin: 0;">Tulis artikel yang bermanfaat dan berkualitas</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="container" style="padding: 2rem 0 4rem;">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <h3 style="text-align: center; margin-bottom: 2rem; color: #333; font-weight: 700;">
        <i class="bi bi-question-circle"></i> Pertanyaan Umum
      </h3>
      
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background: white; border: none; font-weight: 600; color: #333;">
              Bagaimana cara mengubah password?
            </button>
          </h2>
          <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="color: #666;">
              Masuk ke halaman Profile, klik "Edit Profile", lalu ubah password di form yang tersedia.
            </div>
          </div>
        </div>

        <div class="accordion-item" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" style="background: white; border: none; font-weight: 600; color: #333;">
              Kenapa artikel saya belum muncul?
            </button>
          </h2>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="color: #666;">
              Artikel siswa perlu persetujuan dari guru atau admin terlebih dahulu sebelum dipublikasikan.
            </div>
          </div>
        </div>

        <div class="accordion-item" style="border: none; margin-bottom: 1rem; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" style="background: white; border: none; font-weight: 600; color: #333;">
              Bagaimana cara menghapus komentar?
            </button>
          </h2>
          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body" style="color: #666;">
              Anda hanya bisa menghapus komentar sendiri dengan klik tombol hapus (ikon tempat sampah) di komentar Anda.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Support -->
<section class="container" style="padding-bottom: 3rem;">
  <div class="text-center">
    <h4 style="color: #333; margin-bottom: 1rem;">Butuh Bantuan Lebih Lanjut?</h4>
    <p style="color: #666; margin-bottom: 2rem;">Jika masih ada pertanyaan, jangan ragu untuk menghubungi kami</p>
    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg rounded-pill px-5" style="background: linear-gradient(45deg, #667eea, #764ba2); border: none;">
      <i class="bi bi-envelope"></i> Hubungi Kami
    </a>
  </div>
</section>

@endsection