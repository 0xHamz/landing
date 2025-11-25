<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300">
</p>

<h2 align="center">🚐 TravelApp – Sistem Pemesanan Travel</h2>
<p align="center">Dibuat oleh <b>Akbar Pratama</b></p>

---

## 📌 Tentang Project

**TravelApp** adalah aplikasi berbasis **Laravel** untuk membantu pengguna mencari, mem-filter, dan memesan travel sesuai:
- Asal keberangkatan  
- Tujuan  
- Tanggal  
- Jumlah penumpang  

Aplikasi ini dibuat sebagai latihan sekaligus project web Laravel dengan fitur filtering dinamis, relasi database, dan UI menggunakan TailwindCSS + Bootstrap Icons.

---

## ✨ Fitur Utama

- 🔍 **Filter travel** berdasarkan Asal, Tujuan, dan Tanggal  
- 📆 **Dropdown tanggal otomatis** dari database tabel `jadwal`  
- 🔄 **Swap asal ↔ tujuan**  
- 👤 Input jumlah penumpang  
- 📱 Tampilan responsive  
- 🗄️ Relasi database Laravel (Jadwal, Pemesanan, Travel)  
- ⚡ Query dinamis mengikuti filter  

---

## 🛠️ Teknologi yang Digunakan

- Laravel 11  
- PostgreSQL / MySQL  
- TailwindCSS  
- Bootstrap Icons  
- Blade Template  
- GitHub Version Control  

---

## ⚙️ Instalasi Project

Jalankan perintah berikut:

```bash
git clone https://github.com/username/travelapp.git
cd travelapp
composer install
cp .env.example .env
php artisan key:generate
