@extends('layouts.app')

@section('title', 'Edit Artikel - Mading Arga')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Artikel</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul', $article->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="form-label">Kategori</label>
                            <select class="form-select @error('id_kategori') is-invalid @enderror" 
                                    id="id_kategori" name="id_kategori" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('id_kategori', $article->id_kategori) == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi Artikel</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" 
                                      id="isi" name="isi" rows="10" required>{{ old('isi', $article->isi) }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto (Opsional)</label>
                            @if($article->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $article->foto) }}" alt="Current photo" class="img-thumbnail" style="max-width: 200px;">
                                    <p class="text-muted small">Foto saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                   id="foto" name="foto" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(in_array(Auth::user()->role, ['admin', 'guru']))
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="publish" name="publish" 
                                   {{ $article->status == 'published' ? 'checked' : '' }}>
                            <label class="form-check-label" for="publish">
                                Publikasikan artikel
                            </label>
                        </div>
                        @else
                        <div class="mb-3">
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle"></i> <strong>Status saat ini:</strong> 
                                @if($article->status === 'draft')
                                    <span class="badge bg-secondary">Draft</span>
                                @elseif($article->status === 'pending')
                                    <span class="badge bg-warning">Menunggu Persetujuan</span>
                                @elseif($article->status === 'published')
                                    <span class="badge bg-success">Dipublikasikan</span>
                                @elseif($article->status === 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                                <br><small>Artikel perlu persetujuan guru untuk dipublikasikan.</small>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex gap-2">
                            @if(in_array(Auth::user()->role, ['admin', 'guru']))
                                <button type="submit" class="btn btn-primary">Update Artikel</button>
                            @else
                                <button type="submit" class="btn btn-primary">Simpan Draft</button>
                                @if($article->status === 'draft' || $article->status === 'rejected')
                                    <button type="submit" name="submit_for_approval" value="1" class="btn btn-success">
                                        <i class="bi bi-send"></i> Kirim untuk Persetujuan
                                    </button>
                                @endif
                            @endif
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection