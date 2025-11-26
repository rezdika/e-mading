<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Manajemen Artikel - Mading Arga</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color-hunt-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom-icons.css') }}" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #f9f8f6 0%, #f1ede8 50%, #ebe5df 100%);
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
            background: radial-gradient(circle at 20% 80%, rgba(201, 181, 156, 0.1) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(217, 207, 199, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }
        
        .container {
            padding: 20px;
            position: relative;
            z-index: 1;
            max-width: 1200px;
        }
        
        .header-card {
            background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
            border-radius: 25px;
            box-shadow: 
                0 20px 40px rgba(201, 181, 156, 0.15),
                0 8px 16px rgba(201, 181, 156, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(217, 207, 199, 0.8);
        }
        
        .content-card {
            background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 
                0 20px 40px rgba(201, 181, 156, 0.15),
                0 8px 16px rgba(201, 181, 156, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(217, 207, 199, 0.8);
        }
        
        .btn-primary {
            background: #c9b59c;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #b8a082;
            color: white;
            transform: translateY(-1px);
        }
        
        .btn-outline-secondary {
            border-color: #718096;
            color: #718096;
            border-radius: 10px;
        }
        
        .btn-outline-secondary:hover {
            background: #718096;
            border-color: #718096;
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
            border-radius: 6px;
        }
        
        .btn-group .btn {
            margin: 0 2px;
        }
        
        .badge {
            font-size: 0.75rem;
            padding: 6px 10px;
        }
        
        .table {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 0;
        }
        
        .table thead th {
            background: #4a5568;
            color: white;
            border: none;
            padding: 15px 12px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        .table tbody td {
            padding: 12px;
            vertical-align: middle;
            border-color: rgba(201, 181, 156, 0.1);
        }
        
        .table tbody tr:hover {
            background: rgba(201, 181, 156, 0.05);
        }
        
        .badge {
            border-radius: 8px;
            padding: 6px 12px;
        }
        

        
        /* Custom Pagination Styling */
        .pagination {
            justify-content: center;
            margin: 2rem 0;
        }
        
        .pagination .page-link {
            color: #c9b59c;
            border: 1px solid #d9cfc7;
            padding: 0.5rem 0.75rem;
            margin: 0 2px;
            border-radius: 8px;
            font-size: 0.9rem;
            background: #f9f8f6;
        }
        
        .pagination .page-link:hover {
            color: white;
            background: #c9b59c;
            border-color: #c9b59c;
        }
        
        .pagination .page-item.active .page-link {
            background: #c9b59c;
            border-color: #c9b59c;
            color: white;
        }
        
        .pagination .page-item.disabled .page-link {
            color: #999;
            background-color: #efe9e3;
            border-color: #d9cfc7;
        }
        
        .pagination .page-link svg {
            display: none !important;
        }
        
        .pagination .page-item:first-child .page-link::before {
            content: '‹';
            font-size: 16px;
            font-weight: bold;
        }
        
        .pagination .page-item:last-child .page-link::before {
            content: '›';
            font-size: 16px;
            font-weight: bold;
        }
        
        .pagination .page-link[rel="prev"]::before {
            content: '‹ Prev';
            font-size: 13px;
        }
        
        .pagination .page-link[rel="next"]::before {
            content: 'Next ›';
            font-size: 13px;
        }
    </style>
</head>

<body>


    <div class="container">
        <!-- Header -->
        <div class="header-card">
            <div class="text-center mb-3">
                <div class="page-icon">📝</div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 mb-2" style="color: #c9b59c;">
                        Manajemen Artikel
                    </h1>
                    <p class="text-muted mb-0">Kelola artikel mading digital</p>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                        ← Dashboard
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
            
            <!-- Search Form -->
            <div class="mb-4">
                <div class="row">
                    <div class="col-md-8">
                        <form method="GET" action="{{ route('articles.index') }}" class="d-flex gap-2">
                            <div class="flex-grow-1">
                                <input type="text" name="search" class="form-control" 
                                       placeholder="🔍 Cari berdasarkan judul/kategori/tanggal..." 
                                       value="{{ request('search') }}" style="border-radius: 10px;">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                🔍 Cari
                            </button>
                            @if(request('search'))
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                                ❌ Reset
                            </a>
                            @endif
                        </form>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('articles.create') }}" class="btn btn-primary">
                            ➕ Tambah Artikel
                        </a>
                    </div>
                </div>
            </div>

            @if(request('search'))
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Menampilkan {{ $articles->count() }} hasil untuk pencarian: <strong>"{{ request('search') }}"</strong>
            </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ Str::limit($article->judul, 50) }}</strong>
                                    @if($article->foto)
                                        <br><small class="text-muted"><i class="bi bi-image"></i> Ada foto</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge" style="background: #c9b59c; color: white;">
                                        {{ $article->category->nama ?? 'Tanpa Kategori' }}
                                    </span>
                                </td>
                                <td>{{ $article->user->nama }}</td>
                                <td>
                                    @if($article->status == 'published')
                                        <span class="badge bg-success">Dipublikasikan</span>
                                    @elseif($article->status == 'pending')
                                        <span class="badge bg-warning">Menunggu Persetujuan</span>
                                    @elseif($article->status == 'rejected')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-info" title="Lihat">
                                            👁️
                                        </a>
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-warning" title="Edit">
                                            ✏️
                                        </a>
                                        @if(Auth::user()->role === 'siswa' && $article->status === 'draft' && $article->id_user === Auth::id())
                                            <form method="POST" action="{{ route('articles.submit-approval', $article) }}" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" title="Kirim untuk Persetujuan">
                                                    <i class="bi bi-send"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('articles.destroy', $article) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus artikel ini?')" title="Hapus">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    @if(request('search'))
                                        <i class="bi bi-search" style="font-size: 3rem; color: #ccc;"></i>
                                        <p class="mt-2 text-muted">Tidak ada artikel yang cocok dengan pencarian "{{ request('search') }}"</p>
                                        <a href="{{ route('articles.index') }}" class="btn btn-sm btn-primary">Lihat Semua Artikel</a>
                                    @else
                                        <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                        <p class="mt-2 text-muted">Belum ada artikel</p>
                                    @endif
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