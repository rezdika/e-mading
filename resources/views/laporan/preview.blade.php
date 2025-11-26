<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title }} - Mading Arga</title>
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    
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
            position: relative;
            z-index: 1;
        }
        
        .report-container {
            background: linear-gradient(145deg, #f5f0ea 0%, #efe9e3 50%, #e8e0d8 100%);
            border-radius: 25px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 800px;
            box-shadow: 
                0 20px 40px rgba(201, 181, 156, 0.15),
                0 8px 16px rgba(201, 181, 156, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(217, 207, 199, 0.8);
        }
        
        .report-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(201, 181, 156, 0.2);
        }
        
        .report-header h1 {
            color: #c9b59c;
            font-weight: 700;
        }
        
        .download-buttons {
            text-align: center;
            margin: 2rem 0;
        }
        
        .btn-download {
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
        }
        
        .btn-primary {
            background: #c9b59c;
            border-color: #c9b59c;
        }
        
        .btn-primary:hover {
            background: #b8a082;
            border-color: #b8a082;
        }
        
        .btn-success {
            background: #38a169;
            border-color: #38a169;
        }
        
        .btn-success:hover {
            background: #2f855a;
            border-color: #2f855a;
        }
        
        .btn-secondary {
            background: #718096;
            border-color: #718096;
        }
        
        .btn-info {
            background: #4facfe;
            border-color: #4facfe;
        }
        
        .table {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table-dark {
            background: #4a5568 !important;
        }
        
        .badge.bg-primary {
            background: #c9b59c !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="report-container">
            <div class="report-header">
                <h1>{{ $title }}</h1>
                <p class="text-muted">Tanggal: {{ date('d F Y') }}</p>
            </div>
            
            <div class="download-buttons">
                <a href="{{ route('laporan.generate', ['type' => $type, 'format' => 'pdf']) }}" 
                   class="btn btn-primary btn-download">
                    📄 Download PDF
                </a>
                <a href="{{ route('laporan.generate', ['type' => $type, 'format' => 'excel']) }}" 
                   class="btn btn-success btn-download">
                    📈 Download Excel
                </a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            @if($type == 'monthly')
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Jumlah Artikel</th>
                            @elseif($type == 'articles')
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            @else
                                <th>Kategori</th>
                                <th>Jumlah Artikel</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $index => $item)
                            <tr>
                                @if($type == 'monthly')
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->month_name }}</td>
                                    <td><span class="badge bg-primary">{{ $item->total }}</span></td>
                                @elseif($type == 'articles')
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ ucfirst($item->user->role ?? 'Unknown') }}</td>
                                    <td>{{ $item->category->nama_kategori ?? 'Tidak ada kategori' }}</td>
                                    <td>{{ $item->status == 'published' ? 'publish' : $item->status }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                @else
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td><span class="badge bg-primary">{{ $item->articles_count }}</span></td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $type == 'monthly' ? '3' : ($type == 'articles' ? '6' : '2') }}" class="text-center">
                                    Tidak ada data untuk ditampilkan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                    ← Kembali ke Laporan
                </a>
                <a href="{{ route('statistik.index') }}" class="btn btn-info">
                    📊 Lihat Statistik
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>