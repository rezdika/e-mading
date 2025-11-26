<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manajemen User - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #f9f8f6 0%, #efe9e3 50%, #f9f8f6 100%);
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
                radial-gradient(circle at 6% 10%, rgba(201, 181, 156, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 94% 90%, rgba(201, 181, 156, 0.08) 0%, transparent 40%),
                linear-gradient(90deg, rgba(201, 181, 156, 0.05) 0%, transparent 10%, transparent 90%, rgba(201, 181, 156, 0.05) 100%);
            pointer-events: none;
            z-index: -1;
        }
        
        .container {
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        .header-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            box-shadow: 
                0 15px 35px rgba(201, 181, 156, 0.15),
                0 5px 15px rgba(184, 160, 130, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(201, 181, 156, 0.2);
        }
        
        .content-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 
                0 8px 25px rgba(201, 181, 156, 0.12),
                0 3px 10px rgba(184, 160, 130, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(201, 181, 156, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #c9b59c 0%, #b8a082 100%);
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 500;
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #b8a082 0%, #a89070 100%);
            transform: translateY(-1px);
        }
        
        .floating-element {
            position: fixed;
            font-size: 16px;
            color: rgba(201, 181, 156, 0.15);
            animation: floatSlow 8s ease-in-out infinite;
            pointer-events: none;
            z-index: 0;
        }
        
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); opacity: 0.15; }
            50% { transform: translateY(-10px); opacity: 0.25; }
        }
        
        .table {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(201, 181, 156, 0.1);
        }
        
        .table thead th {
            background: linear-gradient(135deg, #c9b59c 0%, #b8a082 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 15px;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background: rgba(201, 181, 156, 0.05);
            transform: translateY(-1px);
        }
        
        .table tbody td {
            padding: 12px 15px;
            border-color: rgba(201, 181, 156, 0.1);
            vertical-align: middle;
        }
        
        .btn-outline-secondary {
            border-color: #c9b59c;
            color: #c9b59c;
        }
        
        .btn-outline-secondary:hover {
            background: #c9b59c;
            border-color: #c9b59c;
            color: white;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #ffd700 0%, #ffb347 100%);
            border: none;
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            border: none;
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
        <!-- Header -->
        <div class="header-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-2" style="color: #c9b59c; font-weight: 700;">
                        👥 Manajemen User
                    </h1>
                    <p class="text-muted mb-0">Kelola pengguna sistem mading</p>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Dashboard
                    </a>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i> Tambah User
                    </a>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content-card">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Jumlah Artikel</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ $user->nama }}</strong>
                                </td>
                                <td>
                                    <code>{{ $user->username }}</code>
                                </td>
                                <td>
                                    @if($user->role == 'admin')
                                        <span class="badge bg-danger">👑 Admin</span>
                                    @elseif($user->role == 'guru')
                                        <span class="badge bg-success">✏️ Guru</span>
                                    @else
                                        <span class="badge bg-info">📚 Siswa</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-secondary">{{ $user->articles_count }} artikel</span>
                                </td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @if($user->id != auth()->id())
                                            <form method="POST" action="{{ route('users.destroy', $user) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus user ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="bi bi-people" style="font-size: 3rem; color: #ccc;"></i>
                                    <p class="mt-2 text-muted">Belum ada user</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>