<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🎫 Ticketing_App

**Ticketing_App** adalah aplikasi berbasis **Laravel** yang digunakan untuk mengelola sistem tiket, mulai dari pembuatan tiket, manajemen data, hingga proses monitoring tiket secara terstruktur dan efisien.

---

## 🚀 Teknologi yang Digunakan

- **Laravel**
- **PHP**
- **MySQL / MariaDB**
- **Composer**
- **Git**

---

## 📥 Cara Clone Repository
```bash
git clone https://github.com/Fatlem/Ticketing_App.git
```

Masuk ke folder project:
```bash
cd Ticketing_App
```

---

## ⚙️ Install Dependency

Pastikan Composer sudah terinstall.
```bash
composer install
```

---

## 🔧 Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Generate application key:
```bash
php artisan key:generate
```

---

## 🗄️ Konfigurasi Database

Buka file `.env`, lalu sesuaikan dengan database kamu:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ticketing_app
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan database `ticketing_app` sudah dibuat di phpMyAdmin / MySQL.

---

## 🧱 Migrasi Database

Jalankan perintah berikut untuk membuat tabel:
```bash
php artisan migrate
```

Jika ada seeder:
```bash
php artisan db:seed
```

---

## ▶️ Menjalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di browser:
```
http://127.0.0.1:8000
```

---

## 🛠️ Troubleshooting

### ❌ Error: vendor/autoload.php not found

Jalankan ulang:
```bash
composer install
```

### ❌ Error database

- Pastikan database sudah dibuat
- Cek kembali konfigurasi `.env`
- Jalankan:
```bash
php artisan config:clear
```

---

## 📄 License

Project ini menggunakan lisensi MIT.

---

## 👨‍💻 Author

**Faathir El Tasleem**  
NIM: A11.2022.14624
