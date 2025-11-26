@extends('layouts.app')

@section('title', 'Notifikasi - Mading Arga')

@push('styles')
<style>
.notification-hero {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 3rem 0;
    color: white;
}

.notification-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    border-left: 4px solid #dee2e6;
    position: relative;
}

.notification-card.unread {
    border-left-color: #667eea;
    background: #f8f9ff;
}

.notification-card.unread::before {
    content: '●';
    position: absolute;
    top: 20px;
    right: 20px;
    color: #667eea;
    font-size: 1rem;
}

.notification-card.approved {
    border-left-color: #28a745;
}

.notification-card.rejected {
    border-left-color: #dc3545;
}

.notification-card.pending {
    border-left-color: #ffc107;
}

.notification-card.viewed {
    border-left-color: #17a2b8;
}

.alert-sm {
    padding: 0.5rem 0.75rem;
    font-size: 0.875rem;
}

.notification-description {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 0.75rem;
    border-left: 3px solid #dee2e6;
    margin-top: 0.5rem;
}

.notification-card.approved .notification-description {
    border-left-color: #28a745;
}

.notification-card.rejected .notification-description {
    border-left-color: #dc3545;
}

.notification-card.pending .notification-description {
    border-left-color: #ffc107;
}

.notification-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.notification-icon {
    font-size: 2rem;
    margin-right: 1rem;
    flex-shrink: 0;
}

.notification-time {
    font-size: 0.85rem;
    color: #6c757d;
}

.btn-mark-read {
    background: #667eea;
    color: white;
    border: none;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.btn-mark-read:hover {
    background: #5568d3;
}
</style>
@endpush

@section('content')
<section class="notification-hero">
    <div class="container text-center">
        <h1 class="fw-bold mb-2">🔔 Notifikasi</h1>
        <p>Pantau status artikel dan aktivitas mading Anda</p>
        @php
            $unreadCount = $notifications->where('is_read', false)->count();
        @endphp
        @if($unreadCount > 0)
            <div class="alert alert-info d-inline-block">
                <i class="bi bi-info-circle"></i> Anda memiliki {{ $unreadCount }} notifikasi yang belum dibaca
            </div>
        @endif
    </div>
</section>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5>📬 Notifikasi Anda</h5>
        @if($notifications->where('is_read', false)->count() > 0)
        <button class="btn btn-outline-primary btn-sm" onclick="markAllAsRead()">
            <i class="bi bi-check-all"></i> Tandai Semua Dibaca
        </button>
        @endif
    </div>

    @forelse($notifications as $notification)
    <div class="notification-card {{ !$notification->is_read ? 'unread' : '' }} {{ $notification->type }}" 
         id="notification-{{ $notification->id }}">
        <div class="d-flex align-items-start">
            <div class="notification-icon">
                @if($notification->type == 'approved')
                    ✅
                @elseif($notification->type == 'rejected')
                    ❌
                @elseif($notification->type == 'pending')
                    🔍
                @elseif($notification->type == 'viewed')
                    👀
                @else
                    📢
                @endif
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <h6 class="mb-1">{{ $notification->title }}</h6>
                    @if(!$notification->is_read)
                    <button class="btn btn-mark-read btn-sm" onclick="markAsRead({{ $notification->id }})">
                        <i class="bi bi-check"></i> Tandai Dibaca
                    </button>
                    @endif
                </div>
                
                <!-- Deskripsi Detail Notifikasi -->
                <div class="notification-description mb-3">
                    @if($notification->type == 'approved')
                        <div class="alert alert-success alert-sm mb-2">
                            <strong>Artikel Disetujui:</strong> Artikel Anda telah disetujui oleh moderator dan sekarang dapat dilihat oleh semua pengunjung mading.
                        </div>
                    @elseif($notification->type == 'rejected')
                        <div class="alert alert-danger alert-sm mb-2">
                            <strong>Artikel Ditolak:</strong> Artikel Anda ditolak oleh moderator. Silakan periksa kembali konten dan kirim ulang setelah diperbaiki.
                        </div>
                    @elseif($notification->type == 'pending')
                        <div class="alert alert-warning alert-sm mb-2">
                            <strong>Review Diperlukan:</strong> Ada artikel baru dari siswa yang memerlukan persetujuan Anda sebagai moderator.
                        </div>
                    @elseif($notification->type == 'viewed')
                        <div class="alert alert-info alert-sm mb-2">
                            <strong>Artikel Dilihat:</strong> Artikel Anda telah dilihat oleh admin/guru. Ini menunjukkan artikel Anda mendapat perhatian!
                        </div>
                    @endif
                </div>
                
                <p class="mb-2">{{ $notification->message }}</p>
                @if($notification->article)
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <i class="bi bi-newspaper"></i> {{ $notification->article->judul }}
                    </small>
                    <small class="notification-time">
                        <i class="bi bi-clock"></i> {{ $notification->created_at->diffForHumans() }}
                    </small>
                </div>
                @endif
                
                <!-- Action Buttons -->
                @if($notification->article && $notification->type == 'pending' && in_array(Auth::user()->role, ['guru', 'admin']))
                <div class="mt-3">
                    <a href="{{ route('moderasi.index') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye"></i> Lihat & Review Artikel
                    </a>
                </div>
                @elseif($notification->article && $notification->type == 'approved')
                <div class="mt-3">
                    <a href="{{ route('blog-details', $notification->article->id) }}" class="btn btn-success btn-sm">
                        <i class="bi bi-eye"></i> Lihat Artikel Terpublikasi
                    </a>
                </div>
                @elseif($notification->article && $notification->type == 'rejected')
                <div class="mt-3">
                    <a href="{{ route('articles.edit', $notification->article->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit & Kirim Ulang
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    @empty
    <div class="text-center py-5">
        <div style="font-size: 5rem; opacity: 0.2; margin-bottom: 1rem;">📭</div>
        <h4 class="mt-3 mb-3">Belum Ada Notifikasi</h4>
        <p class="text-muted mb-4">Notifikasi Anda akan muncul di sini</p>
        <div class="alert alert-info d-inline-block">
            <h6><strong>Kapan notifikasi akan muncul?</strong></h6>
            <ul class="text-start mb-0">
                @if(Auth::user()->role === 'siswa')
                <li>Ketika artikel Anda disetujui oleh guru/admin</li>
                <li>Ketika artikel Anda ditolak oleh guru/admin</li>
                @else
                <li>Ketika ada artikel baru dari siswa yang perlu direview</li>
                @endif
            </ul>
        </div>
        <div class="mt-4">
            @if(Auth::user()->role === 'siswa')
            <a href="{{ route('articles.create') }}" class="btn btn-primary rounded-pill">
                <i class="bi bi-plus-circle"></i> Tulis Artikel
            </a>
            @else
            <a href="{{ route('moderasi.index') }}" class="btn btn-primary rounded-pill">
                <i class="bi bi-eye"></i> Lihat Moderasi
            </a>
            @endif
        </div>
    </div>
    @endforelse
    
    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-lg rounded-pill px-4">
            <i class="bi bi-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>

@endsection

@push('scripts')
<script>
function markAsRead(id) {
    fetch(`/notifications/${id}/read`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const card = document.getElementById(`notification-${id}`);
            card.classList.remove('unread');
            card.querySelector('.btn-mark-read').remove();
        }
    });
}

function markAllAsRead() {
    fetch('/notifications/mark-all-read', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}
</script>
@endpush