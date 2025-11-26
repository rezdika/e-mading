@extends('layouts.app')

@section('title', 'Kontak - Mading Arga')
@section('body-class', 'contact-page')

@section('content')
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">📞 Kontak Kami</h1>
          <p class="mb-0">Hubungi tim Mading 666 untuk informasi lebih lanjut</p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="contact section py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card shadow">
          <div class="card-body p-5">
            <h3 class="mb-4">💬 Kirim Pesan</h3>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            
            <form method="POST" action="{{ route('contact.send') }}">
              @csrf
              <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                       placeholder="Nama lengkap" value="{{ old('name') }}" required>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                       placeholder="Email Anda" value="{{ old('email') }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Pesan</label>
                <textarea name="message" class="form-control @error('message') is-invalid @enderror" 
                          rows="5" placeholder="Tulis pesan Anda" required>{{ old('message') }}</textarea>
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection