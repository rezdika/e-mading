# Sistem Notifikasi - Arga Mading

## Ketentuan Notifikasi

### 1. Notifikasi untuk SISWA
Siswa **HANYA** menerima notifikasi ketika:
- ✅ **Artikel Disetujui** (type: `approved`) - Ketika guru/admin menyetujui artikel mereka
- ❌ **Artikel Ditolak** (type: `rejected`) - Ketika guru/admin menolak artikel mereka

Siswa **TIDAK** menerima notifikasi ketika:
- ❌ Mereka mengirim artikel untuk review (tidak perlu konfirmasi)
- ❌ Mereka mengirim ulang artikel (tidak perlu konfirmasi)

### 2. Notifikasi untuk GURU/ADMIN
Guru dan Admin menerima notifikasi ketika:
- 🔍 **Artikel Perlu Review** (type: `pending`) - Ketika siswa mengirim artikel baru untuk direview

## Tipe Notifikasi

| Type | Penerima | Kapan Dibuat | Deskripsi |
|------|----------|--------------|-----------|
| `approved` | Siswa (penulis) | Ketika guru/admin approve artikel | Artikel disetujui dan dipublikasikan |
| `rejected` | Siswa (penulis) | Ketika guru/admin reject artikel | Artikel ditolak, perlu diperbaiki |
| `pending` | Guru & Admin | Ketika siswa submit artikel | Ada artikel baru yang perlu direview |

## Alur Notifikasi

### Alur 1: Siswa Submit Artikel Baru
```
1. Siswa membuat artikel baru
2. Siswa klik "Kirim untuk Persetujuan"
3. Status artikel: draft → pending
4. ✅ Notifikasi dikirim ke SEMUA guru & admin (type: pending)
5. ❌ TIDAK ada notifikasi ke siswa
```

### Alur 2: Guru/Admin Approve Artikel
```
1. Guru/Admin buka halaman Moderasi
2. Guru/Admin klik "Setujui" pada artikel
3. Status artikel: pending → published
4. ✅ Notifikasi dikirim ke siswa penulis (type: approved)
```

### Alur 3: Guru/Admin Reject Artikel
```
1. Guru/Admin buka halaman Moderasi
2. Guru/Admin klik "Tolak" pada artikel
3. Status artikel: pending → rejected
4. ✅ Notifikasi dikirim ke siswa penulis (type: rejected)
```

### Alur 4: Siswa Kirim Ulang Artikel yang Ditolak
```
1. Siswa edit artikel yang ditolak
2. Siswa klik "Kirim untuk Persetujuan"
3. Status artikel: rejected → pending
4. ✅ Notifikasi dikirim ke SEMUA guru & admin (type: pending)
5. ❌ TIDAK ada notifikasi ke siswa
```

## File yang Terlibat

### 1. NotificationHelper.php
```php
// Hanya 2 method yang digunakan:
- createModerationNotification($article)  // Untuk guru/admin
- createApprovalNotification($article, $type)  // Untuk siswa
```

### 2. ArticleController.php
```php
// Notifikasi dibuat di 3 tempat:
- store() - Ketika siswa submit artikel baru
- update() - Ketika siswa submit artikel yang sudah diedit
- submitForApproval() - Ketika siswa submit artikel draft
```

### 3. ModerasiController.php
```php
// Notifikasi dibuat di 2 tempat:
- approve() - Ketika guru/admin approve artikel
- reject() - Ketika guru/admin reject artikel
```

## Contoh Notifikasi

### Untuk Siswa (Approved)
```
Judul: Artikel Disetujui! 🎉
Pesan: Artikel "Judul Artikel" telah disetujui dan dipublikasikan.
Action: [Lihat Artikel Terpublikasi]
```

### Untuk Siswa (Rejected)
```
Judul: Artikel Ditolak ❌
Pesan: Artikel "Judul Artikel" ditolak. Silakan perbaiki dan kirim ulang.
Action: [Edit & Kirim Ulang]
```

### Untuk Guru/Admin (Pending)
```
Judul: Artikel Baru Perlu Review 🔍
Pesan: Artikel "Judul Artikel" dari Nama Siswa menunggu persetujuan.
Action: [Lihat & Review Artikel]
```

## Kesimpulan

Sistem notifikasi dirancang untuk:
1. **Mengurangi spam** - Siswa tidak perlu notifikasi konfirmasi submit
2. **Fokus pada hasil** - Siswa hanya diberi tahu hasil review (approved/rejected)
3. **Alert moderator** - Guru/admin langsung tahu ada artikel baru yang perlu direview
