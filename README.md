# 🎓 E-VOTING SYSTEM
Check out the live here: https://evoting.bisubilar.org/

---

# 📦 Laravel Project Installation Guide

This guide will help you set up and run the SMARTID Attendance System on your local development environment.

---

## 🚀 Requirements

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Laravel Installer (optional)

---

## ⚙️ Installation Steps

```bash
git clone https://github.com/markrusselbaral/e-voting-system.git
cd e-voting-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
