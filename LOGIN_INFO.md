# 🎵 Fitur Login Multiuser - Arga Mading

## Akun Default yang Tersedia

### 👑 Admin
- **Username:** `admin`
- **Password:** `admin123`
- **Akses:** Kelola semua konten, user, dan sistem

### 🎤 Guru
- **Username:** `guru`
- **Password:** `guru123`
- **Akses:** Membuat dan mengedit artikel

### 🎵 Siswa
- **Username:** `siswa`
- **Password:** `siswa123`
- **Akses:** Membaca artikel dan memberikan like

## Cara Menggunakan

1. **Akses halaman login:** Klik tombol "Login" di navbar atau kunjungi `/login`
2. **Masukkan kredensial** sesuai role yang diinginkan
3. **Sistem akan redirect** ke dashboard sesuai role:
   - Admin → `/admin/dashboard`
   - Guru → `/guru/dashboard`
   - Siswa → `/siswa/dashboard`

## Fitur Keamanan

- ✅ Password di-hash menggunakan bcrypt
- ✅ Middleware role-based access control
- ✅ Session management
- ✅ CSRF protection
- ✅ Input validation

## Desain Theme

- 🎨 **Soft gradient design** dengan warna lembut
- 🎵 **Music-themed elements** (note animations, band colors)
- 📱 **Responsive design** untuk semua device
- ✨ **Smooth animations** dan hover effects
- 🌈 **Role-specific color schemes**:
  - Admin: Blue-Purple gradient
  - Guru: Green gradient
  - Siswa: Pink gradient

## Struktur File

```
app/Http/Controllers/AuthController.php    # Controller untuk autentikasi
app/Http/Middleware/RoleMiddleware.php     # Middleware untuk role checking
resources/views/auth/login.blade.php       # Halaman login
resources/views/dashboard/                 # Dashboard untuk setiap role
database/seeders/UserSeeder.php           # Data user default
public/assets/css/band-style.css          # CSS theme khusus
```

## Pengembangan Selanjutnya

- [ ] Fitur register untuk siswa
- [ ] Profile management
- [ ] Password reset
- [ ] Activity logging
- [ ] Role permissions yang lebih detail