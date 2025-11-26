# 🎬 Tutorial Visual - Sistem Notifikasi

## 📱 Alur Notifikasi (Diagram)

```
┌─────────────────────────────────────────────────────────────────┐
│                    ALUR LENGKAP NOTIFIKASI                      │
└─────────────────────────────────────────────────────────────────┘

SISWA                          SISTEM                    GURU/ADMIN
  │                              │                            │
  │ 1. Buat Artikel              │                            │
  │─────────────────────────────>│                            │
  │                              │                            │
  │ 2. Klik "Kirim Persetujuan"  │                            │
  │─────────────────────────────>│                            │
  │                              │                            │
  │                              │ 3. Status: pending         │
  │                              │ 4. Buat Notifikasi         │
  │                              │───────────────────────────>│
  │                              │    "Artikel Baru 🔍"       │
  │                              │                            │
  │                              │                            │ 5. Buka Notifikasi
  │                              │                            │<───────────
  │                              │                            │
  │                              │                            │ 6. Review Artikel
  │                              │                            │<───────────
  │                              │                            │
  │                              │                            │ 7. Klik "Setujui"
  │                              │<───────────────────────────│
  │                              │                            │
  │                              │ 8. Status: published       │
  │                              │ 9. Buat Notifikasi         │
  │<─────────────────────────────│                            │
  │    "Artikel Disetujui! 🎉"   │                            │
  │                              │                            │
  │ 10. Buka Notifikasi          │                            │
  │<─────────────                │                            │
  │                              │                            │
  │ 11. Lihat Artikel Published  │                            │
  │─────────────────────────────>│                            │
  │                              │                            │
```

---

## 🎯 Langkah-Langkah dengan Screenshot

### UNTUK SISWA

#### Step 1: Buat Artikel
```
┌──────────────────────────────────────┐
│  📝 Buat Artikel Baru                │
├──────────────────────────────────────┤
│  Judul: [Kegiatan Pramuka]           │
│  Kategori: [Kegiatan Sekolah]        │
│  Isi: [Konten artikel...]            │
│                                      │
│  [Simpan Draft]  [Kirim Persetujuan] │ ← Klik ini
└──────────────────────────────────────┘
```

#### Step 2: Tunggu Review
```
┌──────────────────────────────────────┐
│  📋 Daftar Artikel Saya              │
├──────────────────────────────────────┤
│  Kegiatan Pramuka                    │
│  Status: 🟡 Pending                  │ ← Menunggu review
│  Tanggal: 15 Jan 2025                │
└──────────────────────────────────────┘
```

#### Step 3: Terima Notifikasi
```
┌──────────────────────────────────────┐
│  🔔 Notifikasi (1 baru)              │ ← Klik menu ini
├──────────────────────────────────────┤
│  ✅ Artikel Disetujui! 🎉            │
│  Artikel "Kegiatan Pramuka" telah    │
│  disetujui dan dipublikasikan.       │
│                                      │
│  [Lihat Artikel Terpublikasi]       │ ← Klik untuk lihat
│  [Tandai Dibaca]                     │
└──────────────────────────────────────┘
```

---

### UNTUK GURU/ADMIN

#### Step 1: Terima Notifikasi
```
┌──────────────────────────────────────┐
│  🔔 Notifikasi (1 baru)              │ ← Ada notifikasi baru
├──────────────────────────────────────┤
│  🔍 Artikel Baru Perlu Review        │
│  Artikel "Kegiatan Pramuka" dari     │
│  Budi menunggu persetujuan.          │
│                                      │
│  [Lihat & Review Artikel]            │ ← Klik untuk review
│  [Tandai Dibaca]                     │
└──────────────────────────────────────┘
```

#### Step 2: Review di Halaman Moderasi
```
┌──────────────────────────────────────┐
│  🔍 Moderasi Artikel                 │
├──────────────────────────────────────┤
│  Kegiatan Pramuka                    │
│  Penulis: Budi                       │
│  Status: 🟡 Pending                  │
│  Tanggal: 15 Jan 2025                │
│                                      │
│  [Lihat Detail]                      │
│  [✅ Setujui]  [❌ Tolak]            │ ← Pilih aksi
└──────────────────────────────────────┘
```

#### Step 3: Konfirmasi
```
┌──────────────────────────────────────┐
│  ✅ Sukses!                          │
│  Artikel "Kegiatan Pramuka" berhasil │
│  disetujui dan dipublikasikan!       │
│                                      │
│  Penulis telah menerima notifikasi.  │
└──────────────────────────────────────┘
```

---

## 🎨 Tampilan Notifikasi Berdasarkan Type

### 1. Notifikasi APPROVED (Siswa)
```
┌─────────────────────────────────────────────┐
│ ✅ Artikel Disetujui! 🎉                    │
│ [Tandai Dibaca]                             │
├─────────────────────────────────────────────┤
│ ┌─────────────────────────────────────────┐ │
│ │ ✅ Artikel Disetujui:                   │ │
│ │ Artikel Anda telah disetujui oleh       │ │
│ │ moderator dan sekarang dapat dilihat    │ │
│ │ oleh semua pengunjung mading.           │ │
│ └─────────────────────────────────────────┘ │
│                                             │
│ Artikel "Kegiatan Pramuka" telah disetujui  │
│ dan dipublikasikan.                         │
│                                             │
│ 📰 Kegiatan Pramuka                         │
│ 🕐 2 jam yang lalu                          │
│                                             │
│ [Lihat Artikel Terpublikasi]               │
└─────────────────────────────────────────────┘
```

### 2. Notifikasi REJECTED (Siswa)
```
┌─────────────────────────────────────────────┐
│ ❌ Artikel Ditolak ❌                       │
│ [Tandai Dibaca]                             │
├─────────────────────────────────────────────┤
│ ┌─────────────────────────────────────────┐ │
│ │ ❌ Artikel Ditolak:                     │ │
│ │ Artikel Anda ditolak oleh moderator.    │ │
│ │ Silakan periksa kembali konten dan      │ │
│ │ kirim ulang setelah diperbaiki.         │ │
│ └─────────────────────────────────────────┘ │
│                                             │
│ Artikel "Lomba Basket" ditolak. Silakan     │
│ perbaiki dan kirim ulang.                   │
│                                             │
│ 📰 Lomba Basket                             │
│ 🕐 1 jam yang lalu                          │
│                                             │
│ [Edit & Kirim Ulang]                        │
└─────────────────────────────────────────────┘
```

### 3. Notifikasi PENDING (Guru/Admin)
```
┌─────────────────────────────────────────────┐
│ 🔍 Artikel Baru Perlu Review                │
│ [Tandai Dibaca]                             │
├─────────────────────────────────────────────┤
│ ┌─────────────────────────────────────────┐ │
│ │ ⚠️ Review Diperlukan:                   │ │
│ │ Ada artikel baru dari siswa yang        │ │
│ │ memerlukan persetujuan Anda sebagai     │ │
│ │ moderator.                              │ │
│ └─────────────────────────────────────────┘ │
│                                             │
│ Artikel "Kegiatan Pramuka" dari Budi        │
│ menunggu persetujuan.                       │
│                                             │
│ 📰 Kegiatan Pramuka                         │
│ 🕐 5 menit yang lalu                        │
│                                             │
│ [Lihat & Review Artikel]                    │
└─────────────────────────────────────────────┘
```

---

## 🎯 Quick Guide (Cheat Sheet)

### Siswa
```
┌────────────────────────────────────────┐
│ SISWA - QUICK GUIDE                    │
├────────────────────────────────────────┤
│ 1. Buat artikel                        │
│ 2. Klik "Kirim untuk Persetujuan"      │
│ 3. Tunggu notifikasi dari guru         │
│ 4. Jika DISETUJUI → Lihat artikel      │
│ 5. Jika DITOLAK → Edit & kirim ulang   │
└────────────────────────────────────────┘
```

### Guru/Admin
```
┌────────────────────────────────────────┐
│ GURU/ADMIN - QUICK GUIDE               │
├────────────────────────────────────────┤
│ 1. Terima notifikasi artikel baru      │
│ 2. Klik "Lihat & Review Artikel"       │
│ 3. Baca artikel di halaman Moderasi    │
│ 4. Klik "Setujui" atau "Tolak"         │
│ 5. Siswa otomatis dapat notifikasi     │
└────────────────────────────────────────┘
```

---

## 📊 Status Artikel & Notifikasi

```
STATUS ARTIKEL          NOTIFIKASI YANG MUNCUL
─────────────────────────────────────────────────
Draft                   ❌ Tidak ada notifikasi
  ↓ (Submit)
Pending                 ✅ Guru/Admin: "Artikel Baru 🔍"
  ↓ (Approve)
Published               ✅ Siswa: "Artikel Disetujui! 🎉"

─────────────────────────────────────────────────
Pending                 
  ↓ (Reject)
Rejected                ✅ Siswa: "Artikel Ditolak ❌"
  ↓ (Edit & Submit)
Pending                 ✅ Guru/Admin: "Artikel Baru 🔍"
  ↓ (Approve)
Published               ✅ Siswa: "Artikel Disetujui! 🎉"
```

---

## 🔔 Kapan Notifikasi Muncul?

### ✅ MUNCUL
- Siswa submit artikel → Notifikasi ke guru/admin
- Guru approve artikel → Notifikasi ke siswa
- Guru reject artikel → Notifikasi ke siswa
- Siswa kirim ulang artikel → Notifikasi ke guru/admin

### ❌ TIDAK MUNCUL
- Siswa simpan draft (belum submit)
- Guru/admin buat artikel sendiri
- Siswa edit artikel draft (belum submit)
- Admin edit kategori

---

## 💡 Tips & Trik

### Untuk Siswa:
```
✅ DO:
- Cek notifikasi setiap hari
- Segera perbaiki artikel yang ditolak
- Tandai notifikasi yang sudah dibaca
- Baca feedback dari guru dengan teliti

❌ DON'T:
- Jangan spam submit artikel
- Jangan abaikan notifikasi rejection
- Jangan lupa tandai notifikasi dibaca
```

### Untuk Guru/Admin:
```
✅ DO:
- Review artikel dalam 24 jam
- Berikan feedback jelas saat reject
- Cek halaman Moderasi secara berkala
- Tandai notifikasi yang sudah direview

❌ DON'T:
- Jangan biarkan artikel pending terlalu lama
- Jangan reject tanpa alasan jelas
- Jangan lupa beri notifikasi ke siswa
```

---

## 🎓 Latihan

### Latihan 1: Siswa Submit Artikel
```
1. Login sebagai siswa
2. Buat artikel baru dengan judul "Test Notifikasi"
3. Klik "Kirim untuk Persetujuan"
4. Cek apakah status berubah menjadi "Pending"
5. Login sebagai guru
6. Cek apakah ada notifikasi baru
```

### Latihan 2: Guru Approve Artikel
```
1. Login sebagai guru
2. Buka menu "Notifikasi"
3. Klik "Lihat & Review Artikel"
4. Klik "Setujui" pada artikel
5. Login sebagai siswa
6. Cek apakah ada notifikasi "Artikel Disetujui"
```

### Latihan 3: Guru Reject & Siswa Kirim Ulang
```
1. Login sebagai guru
2. Reject artikel dengan alasan "Ada typo"
3. Login sebagai siswa
4. Cek notifikasi "Artikel Ditolak"
5. Klik "Edit & Kirim Ulang"
6. Perbaiki artikel
7. Kirim ulang untuk review
8. Login sebagai guru
9. Cek apakah ada notifikasi baru
```
