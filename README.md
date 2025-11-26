# 📰 ARGA MADING - Digital School Bulletin Platform

<p align="center">
  <img src="public/assets/img/logo.webp" alt="Arga Mading Logo" width="200">
</p>

<p align="center">
  <strong>Platform digital mading sekolah modern dengan sistem approval terintegrasi</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.37.0-red?style=flat-square&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.3.16-blue?style=flat-square&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Bootstrap-5.0-purple?style=flat-square&logo=bootstrap" alt="Bootstrap">
  <img src="https://img.shields.io/badge/SQLite-Database-green?style=flat-square&logo=sqlite" alt="SQLite">
</p>

## 🎯 **Overview**

Arga Mading adalah platform digital yang menggantikan sistem mading konvensional sekolah dengan fitur modern seperti:
- **Multi-role authentication** (Admin, Guru, Siswa)
- **Article management** dengan workflow approval
- **Real-time notifications**
- **File upload system**
- **Responsive design**
- **Dashboard analytics**

## 🚀 **Quick Start**

### Prerequisites
- PHP 8.3+
- Composer
- Node.js (optional)

### Installation

1. **Clone repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/arga-mading.git
   cd arga-mading
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Storage link**
   ```bash
   php artisan storage:link
   ```

6. **Run application**
   ```bash
   php artisan serve
   ```

Visit: `http://127.0.0.1:8000`

## 🔐 **Default Login Credentials**

| Role | Username | Password | Access Level |
|------|----------|----------|--------------|
| **Admin** | `admin` | `admin123` | Full system control |
| **Guru** | `guru` | `guru123` | Content + moderation |
| **Siswa** | `siswa` | `siswa123` | Read + write (approval needed) |

## ✨ **Key Features**

### 📝 **Content Management**
- Rich text editor for articles
- Image upload with storage management
- Category-based organization
- Search and filtering capabilities

### 🔄 **Workflow System**
```
Draft → Pending → Published
         ↓
    Approved/Rejected
```

### 👥 **Role-Based Access Control**
- **Admin**: Full system management
- **Guru**: Content creation and moderation
- **Siswa**: Article creation with approval requirement

### 🔔 **Notification System**
- Real-time notifications
- Moderation alerts
- User activity tracking

### 📊 **Analytics & Reporting**
- Dashboard statistics
- Article performance metrics
- PDF report generation

## 🏗️ **Tech Stack**

- **Backend**: Laravel 12.37.0
- **Database**: SQLite (dev) / MySQL (prod)
- **Frontend**: Bootstrap 5 + Custom CSS
- **Authentication**: Laravel Sanctum
- **File Storage**: Laravel File Storage
- **Icons**: Bootstrap Icons

## 📁 **Project Structure**

```
arga_mading/
├── app/
│   ├── Http/Controllers/     # Business logic
│   ├── Models/              # Database models
│   ├── Policies/            # Authorization rules
│   └── Helpers/             # Utility functions
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/            # Sample data
├── resources/
│   └── views/              # Blade templates
├── public/
│   ├── assets/             # CSS, JS, Images
│   └── storage/            # Uploaded files
└── routes/
    └── web.php             # Application routes
```

## 🔧 **Configuration**

### Database Configuration
For production, update `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### File Storage
Configure file storage in `config/filesystems.php` for production deployment.

## 📖 **Documentation**

- [User Guide](USER_GUIDE_ARGA_MADING.md) - Comprehensive user manual
- [Login Info](LOGIN_INFO.md) - Default credentials and access levels
- [Notification System](SISTEM_NOTIFIKASI.md) - Notification features guide

## 🧪 **Testing**

Run tests:
```bash
php artisan test
```

## 🚀 **Deployment**

### Production Checklist
- [ ] Switch to production database (MySQL/PostgreSQL)
- [ ] Configure mail server
- [ ] Set up file storage (AWS S3/local)
- [ ] Enable HTTPS
- [ ] Configure backup system
- [ ] Set up monitoring

### Environment Variables
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

## 🤝 **Contributing**

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 📝 **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 **Team**

- **Developer**: Arga Mading Team
- **Framework**: Laravel Community
- **Design**: Bootstrap Team

## 📞 **Support**

- **Email**: support@argamading.sch.id
- **Documentation**: [User Guide](USER_GUIDE_ARGA_MADING.md)
- **Issues**: [GitHub Issues](https://github.com/YOUR_USERNAME/arga-mading/issues)

## 🎉 **Acknowledgments**

- Laravel Framework
- Bootstrap CSS Framework
- Bootstrap Icons
- All contributors and testers

---

<p align="center">
  Made with ❤️ for digital education
</p>