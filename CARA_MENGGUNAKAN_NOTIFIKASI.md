# 📱 Cara Menggunakan Sistem Notifikasi

## 🎯 Untuk SISWA

### 1️⃣ Mengirim Artikel untuk Review
```
1. Login sebagai siswa
2. Buat artikel baru atau edit artikel draft
3. Klik tombol "Kirim untuk Persetujuan"
4. Artikel akan berstatus "pending"
5. Guru/Admin akan menerima notifikasi otomatis
```

### 2️⃣ Melihat Notifikasi
```
1. Klik menu "Notifikasi" di navbar
2. Lihat notifikasi yang masuk:
   - ✅ Artikel Disetujui (hijau)
   - ❌ Artikel Ditolak (merah)
```

### 3️⃣ Merespon Notifikasi

**Jika Artikel Disetujui:**
```
1. Buka notifikasi
2. Klik tombol "Lihat Artikel Terpublikasi"
3. Artikel sudah bisa dilihat publik
```

**Jika Artikel Ditolak:**
```
1. Buka notifikasi
2. Klik tombol "Edit & Kirim Ulang"
3. Perbaiki artikel sesuai saran
4. Kirim ulang untuk review
```

### 4️⃣ Menandai Notifikasi Sudah Dibaca
```
- Klik tombol "Tandai Dibaca" pada notifikasi
- Atau klik "Tandai Semua Dibaca" untuk semua notifikasi
```

---

## 👨‍🏫 Untuk GURU/ADMIN

### 1️⃣ Menerima Notifikasi Artikel Baru
```
1. Siswa mengirim artikel untuk review
2. Anda otomatis menerima notifikasi (type: pending)
3. Notifikasi muncul dengan icon 🔍 (kuning)
```

### 2️⃣ Melihat Notifikasi
```
1. Klik menu "Notifikasi" di navbar
2. Lihat artikel yang perlu direview
3. Badge kuning menunjukkan artikel pending
```

### 3️⃣ Review Artikel
```
1. Buka notifikasi
2. Klik tombol "Lihat & Review Artikel"
3. Akan diarahkan ke halaman Moderasi
4. Pilih:
   - Klik "Setujui" → Artikel dipublikasikan
   - Klik "Tolak" → Artikel ditolak
```

### 4️⃣ Setelah Approve/Reject
```
- Siswa penulis otomatis menerima notifikasi
- Notifikasi Anda bisa ditandai sudah dibaca
```

---

## 🔔 Fitur Notifikasi

### Badge Warna
- 🟢 **Hijau** = Artikel disetujui (approved)
- 🔴 **Merah** = Artikel ditolak (rejected)
- 🟡 **Kuning** = Artikel perlu review (pending)
- 🔵 **Biru** = Notifikasi belum dibaca (unread)

### Tombol Aksi
- **Lihat Artikel Terpublikasi** - Untuk artikel yang disetujui
- **Edit & Kirim Ulang** - Untuk artikel yang ditolak
- **Lihat & Review Artikel** - Untuk moderator review artikel
- **Tandai Dibaca** - Menandai notifikasi sudah dibaca
- **Tandai Semua Dibaca** - Menandai semua notifikasi dibaca

### Informasi Notifikasi
- **Judul** - Ringkasan notifikasi
- **Deskripsi** - Penjelasan detail dengan alert box
- **Pesan** - Informasi artikel dan penulis
- **Waktu** - Kapan notifikasi dibuat (contoh: "2 jam yang lalu")

---

## 📊 Contoh Skenario Lengkap

### Skenario 1: Artikel Disetujui
```
SISWA (Budi):
1. Buat artikel "Kegiatan Pramuka"
2. Klik "Kirim untuk Persetujuan"
3. Status: draft → pending
4. Tunggu review

GURU (Pak Ahmad):
1. Menerima notifikasi: "Artikel Baru Perlu Review 🔍"
2. Pesan: "Artikel 'Kegiatan Pramuka' dari Budi menunggu persetujuan"
3. Klik "Lihat & Review Artikel"
4. Baca artikel di halaman Moderasi
5. Klik "Setujui"
6. Status: pending → published

SISWA (Budi):
1. Menerima notifikasi: "Artikel Disetujui! 🎉"
2. Pesan: "Artikel 'Kegiatan Pramuka' telah disetujui dan dipublikasikan"
3. Klik "Lihat Artikel Terpublikasikan"
4. Artikel sudah bisa dilihat publik
```

### Skenario 2: Artikel Ditolak & Dikirim Ulang
```
SISWA (Siti):
1. Buat artikel "Lomba Basket"
2. Klik "Kirim untuk Persetujuan"
3. Status: draft → pending

GURU (Bu Rina):
1. Menerima notifikasi artikel baru
2. Review artikel
3. Klik "Tolak" (misal: ada typo)
4. Status: pending → rejected

SISWA (Siti):
1. Menerima notifikasi: "Artikel Ditolak ❌"
2. Pesan: "Artikel 'Lomba Basket' ditolak. Silakan perbaiki dan kirim ulang"
3. Klik "Edit & Kirim Ulang"
4. Perbaiki typo
5. Klik "Kirim untuk Persetujuan"
6. Status: rejected → pending

GURU (Bu Rina):
1. Menerima notifikasi artikel baru lagi
2. Review artikel yang sudah diperbaiki
3. Klik "Setujui"
4. Status: pending → published

SISWA (Siti):
1. Menerima notifikasi: "Artikel Disetujui! 🎉"
2. Artikel berhasil dipublikasikan
```

---

## 🎨 Tampilan Notifikasi

### Di Navbar
```
[Notifikasi] ← Menu link
```

### Di Halaman Notifikasi
```
┌─────────────────────────────────────────┐
│ 🔔 Notifikasi                           │
│ Pantau status artikel dan aktivitas    │
│ Anda memiliki 2 notifikasi belum dibaca│
└─────────────────────────────────────────┘

┌─────────────────────────────────────────┐
│ 🔍 Artikel Baru Perlu Review            │
│ [Tandai Dibaca]                         │
│                                         │
│ ⚠️ Review Diperlukan:                   │
│ Ada artikel baru dari siswa yang        │
│ memerlukan persetujuan Anda             │
│                                         │
│ Artikel "Kegiatan Pramuka" dari Budi    │
│ menunggu persetujuan.                   │
│                                         │
│ 📰 Kegiatan Pramuka                     │
│ 🕐 2 jam yang lalu                      │
│                                         │
│ [Lihat & Review Artikel]                │
└─────────────────────────────────────────┘
```

---

## ⚙️ Pengaturan Otomatis

### Notifikasi Dibuat Otomatis Saat:
1. ✅ Siswa submit artikel → Notifikasi ke guru/admin
2. ✅ Guru/admin approve → Notifikasi ke siswa
3. ✅ Guru/admin reject → Notifikasi ke siswa

### Tidak Ada Notifikasi Untuk:
1. ❌ Siswa simpan draft (belum submit)
2. ❌ Guru/admin buat artikel (langsung publish)
3. ❌ Siswa edit artikel draft (belum submit)

---

## 💡 Tips Penggunaan

### Untuk Siswa:
- ✅ Cek notifikasi secara berkala
- ✅ Segera perbaiki artikel yang ditolak
- ✅ Tandai notifikasi yang sudah dibaca
- ✅ Simpan sebagai draft dulu jika belum yakin

### Untuk Guru/Admin:
- ✅ Review artikel sesegera mungkin
- ✅ Berikan feedback jelas saat menolak
- ✅ Cek halaman Moderasi untuk artikel pending
- ✅ Tandai notifikasi yang sudah direview

---

## 🔗 Link Terkait

- **Halaman Notifikasi**: `/notifications`
- **Halaman Moderasi**: `/moderasi` (guru/admin)
- **Daftar Artikel**: `/articles`
- **Dashboard**: `/dashboard`
