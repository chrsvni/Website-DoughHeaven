<h1 align="center">Website DoughHeaven</h1>

<p align="center">
  Website digital marketing dan branding untuk brand usaha DoughHeaven.
</p>

## Tentang Proyek

**Website DoughHeaven** adalah sebuah website yang dirancang untuk mendukung aktivitas **digital marketing** dan **branding** dari brand usaha *DoughHeaven*.  
Website ini terbagi menjadi dua sisi utama:

- **Situs Pelanggan:** Halaman publik untuk pengunjung dan pelanggan yang menampilkan konten seperti profil brand, produk, promo, dan lainnya.
- **Situs Admin:** Halaman backend untuk mengelola konten yang tampil pada situs pelanggan, termasuk fitur CRUD seperti produk, banner, artikel, dsb.

Website dibangun menggunakan **Laravel Framework 11.44.7** dan sistem templating **Blade**.

## Fitur

- Halaman publik pelanggan yang menarik dan informatif
- Sistem autentikasi untuk admin
- Dashboard admin
- Manajemen konten dinamis dengan fitur CRUD
- Layout responsif menggunakan TailwindCSS

## Teknologi yang Digunakan

- **Frontend:** HTML, CSS, JavaScript, TailwindCSS  
- **Backend:** Laravel (versi 11.44.7)  
- **Database:** MySQL  
- **Dependency Manager:** Composer

## Instalasi dan Penggunaan

### Prasyarat

Pastikan Anda telah menginstal:

- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm

### Langkah Instalasi

```bash
git clone https://github.com/username/doughheaven.git
cd doughheaven
composer install
npm install
cp .env.example .env
php artisan key:generate
