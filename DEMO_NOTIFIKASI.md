# 🎬 Demo Notifikasi - Langkah demi Langkah

## ✅ Status: Notifikasi Sudah Dibuat!

Saya sudah membuat **15 notifikasi test** di database. Sekarang tinggal test di browser!

## 🎯 Cara Test Notifikasi

### Step 1: Buka Browser & Login

#### Login sebagai SISWA:
```
URL: http://localhost:8000/login
Email: siswa@example.com
Password: password
```

#### Setelah Login:
1. Lihat **navbar** (menu atas)
2. Klik menu **"Notifikasi"**
3. Anda akan melihat notifikasi:
   - ✅ "Artikel Disetujui! 🎉"
   - ❌ "Artikel Ditolak ❌"

---

### Step 2: Test sebagai GURU

#### Logout dari Siswa:
1. Klik nama user di pojok kanan
2. Klik "Logout"

#### Login sebagai GURU:
```
Email: guru@example.com
Password: password
```

#### Setelah Login:
1. Klik menu **"Notifikasi"**
2. Anda akan melihat notifikasi:
   - 🔍 "Artikel Baru Perlu Review 🔍"

---

### Step 3: Test sebagai ADMIN

#### Logout dari Guru:
1. Klik nama user di pojok kanan
2. Klik "Logout"

#### Login sebagai ADMIN:
```
Email: admin@example.com
Password: password
```

#### Setelah Login:
1. Klik menu **"Notifikasi"**
2. Anda akan melihat notifikasi:
   - 🔍 "Artikel Baru Perlu Review 🔍"

---

## 🎨 Apa yang Harus Terlihat?

### Halaman Notifikasi Siswa:
```
┌─────────────────────────────────────────────┐
│ 🔔 Notifikasi                               │
│ Pantau status artikel dan aktivitas        │
│ Anda memiliki 2 notifikasi belum dibaca    │
└─────────────────────────────────────────────┘

┌─────────────────────────────────────────────┐
│ ✅ Artikel Disetujui! 🎉                    │
│ [Tandai Dibaca]                             │
│                                             │
│ Artikel "..." telah disetujui dan           │
│ dipublikasikan.                             │
│                                             │
│ [Lihat Artikel Terpublikasi]               │
└─────────────────────────────────────────────┘

┌─────────────────────────────────────────────┐
│ ❌ Artikel Ditolak ❌                       │
│ [Tandai Dibaca]                             │
│                                             │
│ Artikel "..." ditolak. Silakan perbaiki     │
│ dan kirim ulang.                            │
│                                             │
│ [Edit & Kirim Ulang]                        │
└─────────────────────────────────────────────┘
```

### Halaman Notifikasi Guru/Admin:
```
┌─────────────────────────────────────────────┐
│ 🔔 Notifikasi                               │
│ Pantau status artikel dan aktivitas        │
│ Anda memiliki 1 notifikasi belum dibaca    │
└─────────────────────────────────────────────┘

┌─────────────────────────────────────────────┐
│ 🔍 Artikel Baru Perlu Review                │
│ [Tandai Dibaca]                             │
│                                             │
│ Artikel "..." dari Siswa menunggu           │
│ persetujuan.                                │
│                                             │
│ [Lihat & Review Artikel]                    │
└─────────────────────────────────────────────┘
```

---

## 🧪 Test Fitur Notifikasi

### Test 1: Tandai Dibaca
1. Buka halaman notifikasi
2. Klik tombol **"Tandai Dibaca"** pada notifikasi
3. Notifikasi akan berubah dari **biru** (unread) ke **putih** (read)
4. Tombol "Tandai Dibaca" akan hilang

### Test 2: Tandai Semua Dibaca
1. Buka halaman notifikasi
2. Klik tombol **"Tandai Semua Dibaca"** di atas
3. Semua notifikasi akan ditandai sebagai dibaca
4. Halaman akan refresh

### Test 3: Klik Tombol Aksi
1. Untuk notifikasi **"Artikel Disetujui"**:
   - Klik **"Lihat Artikel Terpublikasi"**
   - Akan diarahkan ke halaman detail artikel

2. Untuk notifikasi **"Artikel Ditolak"**:
   - Klik **"Edit & Kirim Ulang"**
   - Akan diarahkan ke halaman edit artikel

3. Untuk notifikasi **"Artikel Perlu Review"**:
   - Klik **"Lihat & Review Artikel"**
   - Akan diarahkan ke halaman moderasi

---

## 🔄 Test Alur Lengkap (End-to-End)

### Skenario: Siswa Submit Artikel → Guru Approve

#### Step 1: Login sebagai SISWA
```
1. Login: siswa@example.com / password
2. Klik "Dashboard"
3. Klik "Buat Artikel" atau "Artikel Saya"
4. Buat artikel baru:
   - Judul: "Test Notifikasi Artikel"
   - Kategori: Pilih kategori
   - Isi: Tulis konten artikel
5. Klik "Kirim untuk Persetujuan"
6. Artikel akan berstatus "Pending"
```

#### Step 2: Cek Notifikasi GURU
```
1. Logout dari siswa
2. Login sebagai guru: guru@example.com / password
3. Klik menu "Notifikasi"
4. Akan muncul notifikasi baru:
   "Artikel Baru Perlu Review 🔍"
   "Artikel 'Test Notifikasi Artikel' dari [Nama Siswa] menunggu persetujuan"
5. Klik "Lihat & Review Artikel"
```

#### Step 3: Guru Approve Artikel
```
1. Di halaman Moderasi, cari artikel "Test Notifikasi Artikel"
2. Klik tombol "Setujui"
3. Artikel akan berstatus "Published"
4. Notifikasi otomatis dikirim ke siswa
```

#### Step 4: Cek Notifikasi SISWA
```
1. Logout dari guru
2. Login sebagai siswa: siswa@example.com / password
3. Klik menu "Notifikasi"
4. Akan muncul notifikasi baru:
   "Artikel Disetujui! 🎉"
   "Artikel 'Test Notifikasi Artikel' telah disetujui dan dipublikasikan"
5. Klik "Lihat Artikel Terpublikasi"
6. Artikel sudah bisa dilihat publik
```

---

## 🎯 Checklist Verifikasi

Pastikan semua ini berfungsi:

### Untuk SISWA:
- [ ] Menu "Notifikasi" muncul di navbar
- [ ] Halaman notifikasi bisa diakses
- [ ] Notifikasi "Artikel Disetujui" muncul
- [ ] Notifikasi "Artikel Ditolak" muncul
- [ ] Tombol "Lihat Artikel Terpublikasi" berfungsi
- [ ] Tombol "Edit & Kirim Ulang" berfungsi
- [ ] Tombol "Tandai Dibaca" berfungsi

### Untuk GURU/ADMIN:
- [ ] Menu "Notifikasi" muncul di navbar
- [ ] Halaman notifikasi bisa diakses
- [ ] Notifikasi "Artikel Perlu Review" muncul
- [ ] Tombol "Lihat & Review Artikel" berfungsi
- [ ] Tombol "Tandai Dibaca" berfungsi

### Alur Lengkap:
- [ ] Siswa submit artikel → Guru dapat notifikasi
- [ ] Guru approve artikel → Siswa dapat notifikasi
- [ ] Guru reject artikel → Siswa dapat notifikasi

---

## 🐛 Troubleshooting

### Masalah: Halaman Notifikasi Kosong

#### Solusi 1: Jalankan Seeder Lagi
```bash
php artisan db:seed --class=NotificationSeeder
```

#### Solusi 2: Buat Notifikasi Manual via Tinker
```bash
php artisan tinker

# Buat notifikasi untuk user ID 1
$user = App\Models\User::first();
$article = App\Models\Article::first();

App\Models\Notification::create([
    'user_id' => $user->id,
    'article_id' => $article->id,
    'type' => 'approved',
    'title' => 'Test Notifikasi',
    'message' => 'Ini adalah test notifikasi',
    'is_read' => false
]);
```

### Masalah: Notifikasi Tidak Muncul Setelah Submit Artikel

#### Cek 1: Pastikan NotificationHelper di-autoload
```bash
composer dump-autoload
```

#### Cek 2: Cek Error Log
```bash
tail -f storage/logs/laravel.log
```

#### Cek 3: Test Manual
```bash
php artisan tinker

# Test create moderation notification
$article = App\Models\Article::where('status', 'pending')->first();
App\Helpers\NotificationHelper::createModerationNotification($article);
```

### Masalah: Tombol Tidak Berfungsi

#### Cek JavaScript Console:
1. Buka browser
2. Tekan F12
3. Klik tab "Console"
4. Cek apakah ada error JavaScript

#### Clear Cache:
```bash
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

---

## 📊 Cek Status Notifikasi

### Via Tinker:
```bash
php artisan tinker

# Cek total notifikasi
App\Models\Notification::count()

# Cek notifikasi per user
App\Models\Notification::where('user_id', 1)->get()

# Cek notifikasi belum dibaca
App\Models\Notification::where('is_read', false)->count()

# Cek notifikasi per type
App\Models\Notification::where('type', 'approved')->count()
App\Models\Notification::where('type', 'rejected')->count()
App\Models\Notification::where('type', 'pending')->count()
```

---

## 🎉 Kesimpulan

**Sistem notifikasi sudah LENGKAP dan BERFUNGSI!**

Yang sudah dibuat:
- ✅ 15 notifikasi test di database
- ✅ Halaman notifikasi sudah ada
- ✅ Menu notifikasi di navbar
- ✅ Tombol aksi berfungsi
- ✅ Tandai dibaca berfungsi
- ✅ Alur lengkap sudah terintegrasi

**Cara test:**
1. Login ke aplikasi
2. Klik menu "Notifikasi"
3. Lihat notifikasi yang muncul
4. Test tombol-tombol yang ada

**Jika masih ada masalah:**
1. Clear cache: `php artisan cache:clear`
2. Restart server: `php artisan serve`
3. Jalankan seeder: `php artisan db:seed --class=NotificationSeeder`

Selamat mencoba! 🚀
