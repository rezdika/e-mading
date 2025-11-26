@extends('layouts.app')

@section('title', 'Manajemen Kategori - Mading Arga')

@push('styles')
<style>
.category-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
    padding: 3rem 0;
    color: white;
}

.content-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    border: 1px solid #dee2e6;
}

.table {
    background: white;
}

.table thead {
    background: #f8f9fa;
}

.table th, .table td {
    color: #212529 !important;
    -webkit-text-fill-color: #212529 !important;
}
</style>
@endpush

@section('content')
<section class="category-hero hero-section">
    <div class="container text-center">
        <div class="hero-icon" style="font-size: 4rem; margin-bottom: 1rem;">📂</div>
        <h1 class="display-5 fw-bold mb-3" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important; text-shadow: 2px 2px 4px rgba(255,255,255,0.3);">Manajemen Kategori</h1>
        <p class="lead" style="color: #000000 !important; -webkit-text-fill-color: #000000 !important; text-shadow: 1px 1px 2px rgba(255,255,255,0.3);">Kelola kategori artikel mading</p>
    </div>
</section>

<div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="header-section">
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <div style="font-size: 2rem;">📂</div>
                <h3 style="color: #212529;">Daftar Kategori</h3>
            </div>
            <p class="mb-0" style="color: #6c757d;">Kelola kategori untuk mengorganisir artikel</p>
        </div>
        <div class="action-buttons">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left"></i> Dashboard
            </a>
            @if(auth()->user()->role !== 'siswa')
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Kategori
            </a>
            @endif
        </div>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Artikel</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <span class="badge bg-primary" style="font-size: 14px;">
                                    🏷️ {{ $category->nama_kategori }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $category->articles_count }} artikel</span>
                            </td>
                            <td>{{ $category->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning" title="Edit">
                                        ✏️
                                    </a>
                                    <form method="POST" action="{{ route('categories.destroy', $category) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori ini?')" title="Hapus">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">
                                <div style="font-size: 3rem; color: #ccc;">📂</div>
                                <p class="mt-2 text-muted">Belum ada kategori</p>
                                @if(auth()->user()->role !== 'siswa')
                                <a href="{{ route('categories.create') }}" class="btn btn-primary mt-2">
                                    <i class="bi bi-plus-circle"></i> Tambah Kategori Pertama
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg rounded-pill px-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
