<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tambah Artikel - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <style>
        body {
            background: #f9f8f6 !important;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            position: relative;
        }
        
        .container {
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .form-card {
            background: #efe9e3 !important;
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(201, 181, 156, 0.2) !important;
            padding: 40px;
            border: 1px solid #d9cfc7 !important;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #c9b59c;
            box-shadow: 0 0 0 0.2rem rgba(201, 181, 156, 0.25);
        }
        
        .form-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .upload-area:hover {
            border-color: #c9b59c;
            background: rgba(201, 181, 156, 0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: #c9b59c !important;
            border: none;
            border-radius: 15px;
            padding: 12px 24px;
            font-weight: 600;
            color: white;
        }
        
        .btn-primary:hover {
            background: #b8a082 !important;
            transform: translateY(-2px);
        }
        
        .page-title {
            color: #c9b59c !important;
        }
    </style>
</head>

<body>
    <div class="container" style="padding-top: 40px; padding-bottom: 40px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card">
                    <div class="text-center mb-4">
                        <h1 class="h3 page-title">
                            ✏️ Tambah Artikel Baru
                        </h1>
                        <p class="text-muted">Tulis artikel untuk mading digital</p>
                    </div>

                    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">
                                <i class="bi bi-pencil-square"></i> Judul Artikel
                            </label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul') }}" 
                                   placeholder="📝 Masukkan judul artikel yang menarik..." required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="form-label fw-semibold">
                                <i class="bi bi-tags"></i> Kategori
                            </label>
                            <select class="form-select @error('id_kategori') is-invalid @enderror" 
                                    id="id_kategori" name="id_kategori" required
                                    style="border: 2px solid #e9ecef; border-radius: 12px; padding: 12px 16px;">
                                <option value="" disabled selected>🏷️ Pilih Kategori Artikel</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('id_kategori') == $category->id ? 'selected' : '' }}>
                                        📂 {{ $category->nama_kategori }}
                                    </option>
                                @empty
                                    <option value="" disabled>⚠️ Belum ada kategori tersedia</option>
                                @endforelse
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi" class="form-label fw-semibold">
                                <i class="bi bi-file-text"></i> Isi Artikel
                            </label>
                            <textarea class="form-control @error('isi') is-invalid @enderror" 
                                      id="isi" name="isi" rows="10" 
                                      placeholder="✍️ Tulis isi artikel dengan detail dan menarik...

💡 Tips: 
- Gunakan paragraf yang jelas
- Tambahkan informasi yang akurat
- Buat pembaca tertarik untuk membaca" 
                                      required>{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label fw-semibold">
                                <i class="bi bi-camera"></i> Foto Artikel (Opsional)
                            </label>
                            <div class="upload-area" style="border: 2px dashed #c9b59c; border-radius: 12px; padding: 20px; text-align: center; background: rgba(201, 181, 156, 0.05);">
                                <i class="bi bi-cloud-upload" style="font-size: 2rem; color: #c9b59c;"></i>
                                <p class="mt-2 mb-2">📷 Klik untuk upload foto atau drag & drop</p>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                       id="foto" name="foto" accept="image/*"
                                       style="border: none; background: transparent;">
                                <small class="text-muted">📁 Format: JPG, PNG, GIF. Maksimal 2MB</small>
                            </div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(in_array(Auth::user()->role, ['admin', 'guru']))
                        <div class="mb-4">
                            <div class="publish-section" style="background: rgba(201, 181, 156, 0.1); border-radius: 15px; padding: 20px; border: 1px solid rgba(201, 181, 156, 0.3);">
                                <h6 class="fw-semibold mb-3" style="color: #c9b59c;">
                                    <i class="bi bi-gear"></i> Pengaturan Publikasi
                                </h6>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="publish" name="publish" value="1" 
                                           style="transform: scale(1.2);">
                                    <label class="form-check-label fw-semibold" for="publish">
                                        🚀 <strong>Publikasikan Artikel</strong>
                                        <br><small class="text-muted">📄 Jika tidak dicentang, artikel akan disimpan sebagai draft</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="mb-4">
                            <div class="alert alert-info" style="border-radius: 15px; border: 1px solid #bee5eb;">
                                <i class="bi bi-info-circle"></i> <strong>Info untuk Siswa:</strong><br>
                                Artikel perlu persetujuan guru sebelum dipublikasikan. Anda bisa menyimpan sebagai draft atau langsung kirim untuk persetujuan.
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary" 
                               style="border-radius: 12px; padding: 10px 20px;">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <div>
                                @if(in_array(Auth::user()->role, ['admin', 'guru']))
                                    <button type="submit" class="btn btn-outline-secondary me-2">
                                        <i class="bi bi-file-earmark"></i> Simpan Draft
                                    </button>
                                    <button type="submit" class="btn btn-primary" 
                                            onclick="document.getElementById('publish').checked = true;">
                                        <i class="bi bi-rocket"></i> Publikasikan
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-outline-secondary me-2">
                                        <i class="bi bi-file-earmark"></i> Simpan Draft
                                    </button>
                                    <button type="submit" name="submit_for_approval" value="1" class="btn btn-primary">
                                        <i class="bi bi-send"></i> Kirim untuk Persetujuan
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>