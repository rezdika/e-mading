# Sistem Persetujuan Artikel - Arga Mading

## Deskripsi
Sistem ini mengimplementasikan persetujuan artikel untuk guru dan siswa, dimana hanya admin yang dapat menyetujui artikel untuk dipublikasikan.

## Fitur yang Ditambahkan

### 1. Status Artikel Baru
- **draft**: Artikel masih dalam tahap draft
- **pending**: Artikel menunggu persetujuan admin
- **published**: Artikel sudah dipublikasikan
- **rejected**: Artikel ditolak oleh admin

### 2. Alur Kerja Berdasarkan Role

#### Admin Sekolah
- Login, kelola kategori, verifikasi artikel, kelola user, membuat laporan
- Dapat membuat artikel dan langsung mempublikasikan
- Dapat menyetujui atau menolak artikel dari siswa
- Akses penuh ke halaman moderasi

#### Guru/Pembina Mading
- Menulis artikel, mengedit, melihat komentar, menyetujui artikel siswa
- Dapat membuat artikel dan langsung mempublikasikan
- Dapat menyetujui atau menolak artikel dari siswa
- Akses ke halaman moderasi untuk artikel siswa

#### Siswa
- Membuat artikel, mengedit artikel miliknya, membaca & berkomentar
- Dapat membuat artikel sebagai draft
- Dapat mengirim artikel untuk persetujuan guru
- Perlu menunggu persetujuan guru untuk publikasi

### 3. Perubahan pada Interface

#### Form Artikel (Create/Edit)
- **Admin & Guru**: Tombol "Simpan Draft" dan "Publikasikan"
- **Siswa**: Tombol "Simpan Draft" dan "Kirim untuk Persetujuan"

#### Daftar Artikel
- Menampilkan status artikel dengan badge berwarna
- Tombol "Kirim untuk Persetujuan" untuk artikel draft milik siswa

#### Halaman Moderasi
- Dapat diakses oleh admin dan guru
- Menampilkan artikel dengan status "pending" dari siswa
- Tombol "Setujui" dan "Tolak" untuk setiap artikel

### 4. Notifikasi
- Penulis mendapat notifikasi ketika artikel disetujui atau ditolak
- Notifikasi otomatis dibuat saat admin melakukan moderasi

## File yang Dimodifikasi

1. **Migration**: `2025_01_15_000000_add_pending_status_to_articles.php`
2. **Controller**: `ArticleController.php` - Menambah method `submitForApproval()`
3. **Controller**: `ModerasiController.php` - Hanya admin yang bisa moderasi
4. **Views**: 
   - `articles/create.blade.php` - Form berbeda untuk admin vs guru/siswa
   - `articles/edit.blade.php` - Edit form dengan status approval
   - `articles/index.blade.php` - Tombol submit approval
5. **Routes**: `web.php` - Route baru untuk submit approval
6. **Seeder**: `ArticleStatusSeeder.php` - Data testing

## Cara Penggunaan

### Untuk Siswa:
1. Login ke sistem
2. Buat artikel baru atau edit artikel draft
3. Pilih "Kirim untuk Persetujuan" untuk mengirim ke guru
4. Tunggu notifikasi persetujuan dari guru

### Untuk Guru:
1. Login ke sistem
2. Buat artikel dan langsung publikasikan, atau
3. Akses menu "Moderasi" untuk review artikel siswa
4. Klik "Setujui" untuk mempublikasikan atau "Tolak" untuk menolak artikel siswa

### Untuk Admin:
1. Login ke sistem
2. Kelola kategori, user, dan buat laporan
3. Buat artikel dan langsung publikasikan
4. Akses menu "Moderasi" untuk verifikasi artikel
5. Kelola sistem secara keseluruhan

## Status Artikel
- 🟡 **Draft**: Artikel belum dikirim untuk review
- 🟠 **Pending**: Artikel menunggu persetujuan admin  
- 🟢 **Published**: Artikel sudah dipublikasikan
- 🔴 **Rejected**: Artikel ditolak, perlu diperbaiki

Sistem ini memastikan kontrol kualitas konten dengan memberikan admin kontrol penuh atas publikasi artikel dari guru dan siswa.