<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login - Arga Mading</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color-hunt-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/enhanced-design.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f9f8f6 0%, #f1ede8 50%, #ebe5df 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-title {
            font-size: 32px;
            font-weight: 700;
            color: #c9b59c;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(201, 181, 156, 0.3);
        }

        .login-subtitle {
            color: #8b7355;
            font-size: 15px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #8b7355;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-control {
            border: 2px solid rgba(201, 181, 156, 0.3);
            border-radius: 15px;
            padding: 15px 20px;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            color: #8b7355;
        }

        .form-control:focus {
            border-color: #c9b59c;
            box-shadow: 0 0 0 0.2rem rgba(201, 181, 156, 0.25);
            background: rgba(255, 255, 255, 0.95);
            transform: translateY(-2px);
        }

        .btn-login {
            background: #000000;
            border: none;
            border-radius: 25px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 16px;
            color: #ffffff !important;
            width: 100%;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: none;
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
            color: #ffffff !important;
            background: #333333;
        }

        .alert {
            border-radius: 12px;
            border: none;
            font-size: 14px;
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
            border-left: 4px solid #e74c3c;
        }

        .role-info {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 18px;
            margin-bottom: 25px;
            border-left: 4px solid #c9b59c;
            border: 1px solid rgba(201, 181, 156, 0.3);
            animation: fadeIn 1s ease-out 0.3s both;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .role-info h6 {
            color: #8b7355;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 15px;
        }

        .role-info small {
            color: #a89070;
            font-size: 12px;
            line-height: 1.4;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #c9b59c;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .back-link a:hover {
            color: #b8a082;
            text-decoration: underline;
        }

        /* Ensure button text is always visible */
        .btn-login * {
            color: #ffffff !important;
        }
        
        .btn-login i {
            color: #ffffff !important;
        }
        
        /* Additional contrast improvements */
        .form-control::placeholder {
            color: #a89070 !important;
            opacity: 0.8;
        }
        
        .form-control {
            color: #8b7355 !important;
        }
        
        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
                margin: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Particle Background -->
    <div class="particles-bg" id="particles-bg"></div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">Arga Mading</h1>
                <p class="login-subtitle">Portal Kreatif Siswa Berjiwa Seni</p>
            </div>

            <div class="role-info">
                <h6><i class="bi bi-newspaper"></i> Akses Mading Digital</h6>
                <small>
                    <strong>Admin:</strong> Kelola seluruh mading<br>
                    <strong>Guru:</strong> Tulis artikel & berita<br>
                    <strong>Siswa:</strong> Baca & apresiasi karya
                </small>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="username" class="form-label">
                        <i class="bi bi-person"></i> Username
                    </label>
                    <input type="text" 
                           class="form-control @error('username') is-invalid @enderror" 
                           id="username" 
                           name="username" 
                           value="{{ old('username') }}" 
                           placeholder="Masukkan username"
                           required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i> Password
                    </label>
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           placeholder="Masukkan password"
                           required>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </button>
            </form>

            <div class="back-link">
                <a href="{{ route('home') }}">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <script>
    // Create particle background
    function createParticles() {
        const particlesContainer = document.getElementById('particles-bg');
        if (!particlesContainer) return;
        
        for (let i = 0; i < 30; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 20 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 15) + 's';
            particlesContainer.appendChild(particle);
        }
    }
    
    // Enhanced form interactions
    document.addEventListener('DOMContentLoaded', function() {
        createParticles();
        
        // Add floating label effect
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
        
        // Add loading effect to login button
        const loginBtn = document.querySelector('.btn-login');
        const loginForm = document.querySelector('form');
        
        loginForm.addEventListener('submit', function() {
            loginBtn.innerHTML = '<span class="pulse-dot"></span><span class="pulse-dot"></span><span class="pulse-dot"></span> Memproses...';
            loginBtn.disabled = true;
        });
    });
    </script>
</body>
</html>