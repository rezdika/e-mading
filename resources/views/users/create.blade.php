<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tambah User - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #2d3748 0%, #1a202c 50%, #2d3748 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 6% 10%, rgba(0, 0, 0, 0.8) 0%, transparent 40%),
                radial-gradient(circle at 94% 90%, rgba(0, 0, 0, 0.7) 0%, transparent 40%),
                linear-gradient(90deg, rgba(0, 0, 0, 0.7) 0%, transparent 10%, transparent 90%, rgba(0, 0, 0, 0.7) 100%);
            pointer-events: none;
            z-index: -1;
        }
        
        .container {
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .form-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(251, 182, 206, 0.2);
            padding: 40px;
            border: 2px solid rgba(251, 182, 206, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .form-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(251, 182, 206, 0.05), transparent);
            animation: shimmer 3s ease-in-out infinite;
        }
        
        .form-control, .form-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #f093fb;
            box-shadow: 0 0 0 0.2rem rgba(240, 147, 251, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #fbb6ce 0%, #f093fb 100%);
            border: none;
            border-radius: 15px;
            padding: 12px 24px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #f093fb 0%, #e879f9 100%);
            transform: translateY(-2px);
        }
        
        .floating-element {
            position: fixed;
            font-size: 18px;
            color: rgba(251, 182, 206, 0.2);
            animation: floatSlow 8s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            50% { transform: translateX(0%) translateY(0%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); opacity: 0.2; }
            50% { transform: translateY(-10px); opacity: 0.4; }
        }
    </style>
</head>

<body>
    <!-- Floating Decorations -->
    <div class="floating-element" style="top: 15%; left: 5%; animation-delay: 0s;">👥</div>
    <div class="floating-element" style="top: 25%; right: 8%; animation-delay: 2s;">👤</div>
    <div class="floating-element" style="bottom: 30%; left: 3%; animation-delay: 4s;">🔐</div>
    <div class="floating-element" style="bottom: 20%; right: 6%; animation-delay: 1s;">⚙️</div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="form-card">
                    <div class="text-center mb-4">
                        <h1 class="h3" style="background: linear-gradient(135deg, #f093fb 0%, #fd9853 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            👤 Tambah User Baru
                        </h1>
                        <p class="text-muted">Buat akun pengguna sistem mading</p>
                    </div>

                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">
                                <i class="bi bi-person"></i> Nama Lengkap
                            </label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama') }}" 
                                   placeholder="👤 Masukkan nama lengkap..." required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">
                                <i class="bi bi-at"></i> Username
                            </label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                   id="username" name="username" value="{{ old('username') }}" 
                                   placeholder="🔤 Masukkan username..." required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock"></i> Password
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" 
                                   placeholder="🔒 Masukkan password..." required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="role" class="form-label fw-semibold">
                                <i class="bi bi-shield"></i> Role
                            </label>
                            <select class="form-select @error('role') is-invalid @enderror" 
                                    id="role" name="role" required>
                                <option value="" disabled selected>👑 Pilih Role User</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>👑 Admin</option>
                                <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>✏️ Guru</option>
                                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>📚 Siswa</option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-person-plus"></i> Simpan User
                            </button>
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