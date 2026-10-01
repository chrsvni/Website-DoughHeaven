# 🍩 DoughHeaven Bakery — Web Platform Digital Marketing & E-Commerce

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11.44.7-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+" />
  <img src="https://img.shields.io/badge/PostgreSQL-16+-4169E1?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL" />
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS" />
  <img src="https://img.shields.io/badge/Status-Active%20Development-success?style=for-the-badge" alt="Status" />
</p>

<p align="center">
  <strong>Platform digital marketing, branding visual, dan manajemen katalog donat artisanal DoughHeaven (Melong Asih, Bandung).</strong><br>
  Dilengkapi dengan arsitektur <em>Role-Based Access Control</em> (Super Admin & Staff Admin), manajemen konten interaktif, sistem moderasi ulasan, serta modul otomasi <em>Email Newsletter & Broadcast</em> pelanggan.
</p>

---

## 📑 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Struktur Peran Pengguna (RBAC)](#-struktur-peran-pengguna-rbac)
- [Fitur Utama Sistem](#-fitur-utama-sistem)
  - [1. Sisi Publik (Pengunjung & Pelanggan)](#1-sisi-publik-pengunjung--pelanggan)
  - [2. Sisi Panel Admin (Operasional & Manajemen)](#2-sisi-panel-admin-operasional--manajemen)
  - [3. Sistem Email Newsletter & Broadcast](#3-sistem-email-newsletter--broadcast)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Struktur Database & Relasi](#-struktur-database--relasi)
- [Panduan Instalasi & Menjalankan Proyek](#-panduan-instalasi--menjalankan-proyek)
- [Akun Bawaan (Default Seed Credentials)](#-akun-bawaan-default-seed-credentials)
- [Pengujian Email di Lingkungan Lokal](#-pengujian-email-di-lingkungan-lokal)
- [Kontributor & Lisensi](#-kontributor--lisensi)

---

## 📖 Tentang Proyek

**DoughHeaven Bakery** adalah platform berbasis web modern yang dirancang untuk mendukung ekspansi digital bisnis artisanal donat segar harian. Website ini memiliki dua domain antarmuka utama:

1. **Situs Publik Pengunjung:** Antarmuka responsif bernuansa hangat (*sweet pink bakery*) dengan Tailwind CSS untuk menarik calon pembeli, menampilkan katalog menu, menyajikan promo aktif, menerbitkan artikel inspirasi dapur, serta mengumpulkan testimoni pelanggan.
2. **Panel Kontrol Admin:** Ruang kerja administratif terpadu dengan Bootstrap 4/5 dan Blade untuk mengelola inventaris donat, menyaring ulasan masuk, memantau audiens pelanggan email, hingga membuat akun staf karyawan baru.

---

## 👥 Struktur Peran Pengguna (RBAC)

Aplikasi menerapkan sistem pembagian hak akses (*Role-Based Access Control*) dua tingkat untuk menjaga keamanan dan membatasi wewenang operasional:

| Peran (Role) | Hak Akses & Wewenang | Akses Menu Khusus |
|---|---|---|
| **Super Administrator** (`super_admin`) | Pemilik toko / Administrator tertinggi dengan wewenang penuh atas seluruh konfigurasi sistem, data operasional, dan tata kelola akun staf. | • **Kelola Pengguna (`/admin/users`)**: Buat akun staf baru, atur status keaktifan, reset hak akses.<br>• **Kelola Pelanggan (`/admin/subscribers`)**: Broadcast email, kelola audiens, ekspor data.<br>• **Panel Super Admin Command Center** di Dashboard. |
| **Staff Admin Toko** (`admin`) | Karyawan operasional toko yang bertugas mengelola pembaruan etalase katalog dan konten promosi harian. Dilarang mengakses modul manajemen akun staf (dilindungi `SuperAdminMiddleware`). | • Katalog Produk & Kategori Menu<br>• Promo & Penawaran Khusus<br>• Artikel & Cerita Blog<br>• Moderasi Ulasan Masuk<br>• Kelola Pelanggan & Newsletter |

---

## 🌟 Fitur Utama Sistem

### 1. Sisi Publik (Pengunjung & Pelanggan)
- **Beranda Interaktif (`/`):** Hero section menggugah selera, etalase *Flash Sale*, sorotan donat terlaris (*Chef's Pick*), nilai keunggulan bahan alami, dan testimoni pelanggan terverifikasi.
- **Katalog Menu Donat (`/menu`):** Navigasi *filter bar sticky* berdasarkan kategori donat, pencarian menu, dan modal detail produk (deskripsi rasa, status stok, harga) dengan tombol pemesanan langsung terhubung ke WhatsApp toko.
- **Halaman Penawaran & Promosi (`/promos`):** Tampilan daftar promo aktif, *countdown timer* jatuh tempo, dan navigasi paginasi (*Previous / Next*) yang responsif.
- **Dapur Cerita & Blog (`/halblogs`, `/halblog/{slug}`):** Kumpulan resep, tips penyimpanan donat, dan kisah dapur manis DoughHeaven dengan pencarian artikel dinamis.
- **Formulir Testimoni Pelanggan (`/contact`):** Formulir kirim ulasan bintang (1–5) dan kesan pelanggan secara publik.
- **Portal Berhenti Langganan (`/newsletter/unsubscribe/{token}`):** Fitur ramah privasi di mana pelanggan dapat menonaktifkan langganan newsletter dengan 1-klik melalui token rahasia unik.

### 2. Sisi Panel Admin (Operasional & Manajemen)
- **Executive Store Dashboard (`/dashboard`):** 4 metrik kartu utama (Total Produk, Promosi Aktif, Artikel Blog, Total Ulasan), kartu profil pengguna dinamis, status koneksi database, serta *Command Center* khusus Super Admin.
- **Manajemen Kategori & Koleksi Produk (`/kategori`, `/produk`):** CRUD inventaris donat lengkap dengan sistem unggah gambar (*Storage link*), status rekomendasi chef, dan penetapan harga.
- **Manajemen Promo & Diskon (`/promosi`):** Pengaturan promosi, kategori penawaran (*Flash Sale, Bundling, Loyalty*), tanggal jatuh tempo, dan relasi multi-produk donat yang diikutsertakan dalam promo.
- **Manajemen Artikel Blog (`/blog`):** Editor artikel, manajemen kategori, unggah gambar sampul, dan pembentukan URL *slug* otomatis yang ramah SEO.
- **Moderasi Ulasan Pelanggan (`/admin/ulasan`):** Fitur pengamanan di mana ulasan baru pelanggan **tidak langsung muncul** di halaman publik. Admin dapat meninjau isi ulasan terlebih dahulu dan mengklik tombol **Tampilkan** / **Sembunyikan** (*Approval Workflow*).
- **Manajemen Staf Pengguna (`/admin/users` - Khusus Super Admin):** Pembuatan akun staf baru, pengaturan peran (*role*), pemantauan tanggal registrasi, serta pengubahan status akun (*aktif / dinonaktifkan*).

### 3. Sistem Email Newsletter & Broadcast
- **Otomasi Email Sambutan (Welcome Mailer):** Setiap pengunjung yang mendaftarkan emailnya di halaman blog akan langsung mendapatkan email sambutan hangat berdesain manis disertai voucher diskon selamat datang `SWEETWELCOME10`.
- **Pusat Siaran Email Massal (`/admin/subscribers/broadcast`):**
  - Mendukung siaran pengumuman bebas, promosi baru, atau kabar artikel baru ke seluruh pelanggan aktif.
  - **Pintasan Cerdas (*Smart Autofill*):** Dropdown pilihan promo dan blog riil yang secara otomatis mengisi subjek, pesan, tanggal kadaluarsa promo, tombol aksi (CTA), dan URL tujuan tanpa perlu mengetik manual.
- **Auto-Broadcast Integrasi:** Terdapat opsi *checkbox* otomatis pada formulir **Tambah Promosi** dan **Tambah Blog** untuk langsung menyiarkan email notifikasi ke seluruh pelanggan aktif saat konten baru disimpan.
- **Ekspor Data Pelanggan:** Fitur unduh seluruh daftar subscriber dalam format **CSV** dengan standar UTF-8 BOM untuk kebutuhan arsip dan analisis pemasaran.

---

## 🛠 Teknologi yang Digunakan

### Backend & Database
- **Framework:** [Laravel 11.44.7](https://laravel.com/)
- **Bahasa Pemrograman:** PHP >= 8.2 (Ekstensi: `pdo_pgsql`, `pgsql`, `mbstring`, `openssl`, `curl`)
- **Database Engine:** [PostgreSQL](https://www.postgresql.org/) (Port 5432, Client Encoding `utf8`)
- **Arsitektur:** Model-View-Controller (MVC) & Eloquent ORM

### Frontend & Tampilan
- **Situs Publik:** Tailwind CSS, Alpine JS, Swiper Slider, Google Fonts (Plus Jakarta Sans).
- **Situs Admin:** Bootstrap 4/5 Admin Dashboard UI, Bootstrap Icons (`bi-icons`), jQuery, CSS Grid/Flexbox.
- **Email Engine:** Laravel Mailable dengan template HTML responsif (*inline CSS*).

---

## 🗄 Struktur Database & Relasi

Aplikasi menggunakan skema database relasional pada PostgreSQL:

```
[ users ]
   ├── id, name, email, password, role ('super_admin'|'admin'), status ('aktif'|'nonaktif')

[ kategori_produk ]
   └── id, nama_kategori, deskripsi, aktif
         │ 1:N
[ produk ]
   ├── id, nama_produk, deskripsi, harga, foto, rekomendasi, kategori_id (FK)
   └── N:M ─── [ produk_promosi ] (Pivot) ─── N:M ─── [ promosi ]
                                                        ├── id, nama_promosi, kategori_promosi
                                                        └── deskripsi, jatuh_tempo

[ blogs ]
   └── id, user_id (FK), judul, slug, kategori, deskripsi, isi_blog, gambar, tanggal

[ ulasans ]
   └── id, nama_pengulas, rating, pesan, tampilkan (boolean / default: false)

[ subscribers ]
   └── id, email (unique), status ('aktif'|'nonaktif'), token_unsubscribe (unique)
```

---

## 💻 Panduan Instalasi & Menjalankan Proyek

### 1. Prasyarat Sistem
- **PHP** versi 8.2 atau lebih baru.
- **Composer** versi 2.x.
- **Node.js** (v18+) & **npm**.
- **PostgreSQL Server** aktif di komputer lokal (misal via pgAdmin atau Postgres Service) atau database cloud (Supabase/Neon).

### 2. Kloning Repositori
```bash
git clone https://github.com/chrsvni/Website-DoughHeaven.git
cd digital_marketing
```

### 3. Instal Dependensi
```bash
# Instal dependensi PHP
composer install

# Instal dependensi aset Frontend
npm install
```

### 4. Konfigurasi File Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
copy .env.example .env
```
Buka file `.env` dan pastikan konfigurasi database PostgreSQL telah sesuai:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_digital_marketing
DB_USERNAME=postgres
DB_PASSWORD=password_postgres_anda
DB_CHARSET=utf8

# Driver pengiriman email (gunakan 'log' untuk pengetesan lokal tanpa SMTP)
MAIL_MAILER=log
MAIL_FROM_ADDRESS="halo@doughheaven.com"
MAIL_FROM_NAME="DoughHeaven Bakery"
```

### 5. Generate Application Key & Storage Link
```bash
php artisan key:generate
php artisan storage:link
```

### 6. Jalankan Migrasi & Seeder Database
Pastikan database kosong bernama `db_digital_marketing` sudah dibuat di PostgreSQL Anda, kemudian jalankan:
```bash
php artisan migrate --seed
```

### 7. Jalankan Server Aplikasi
Buka dua jendela terminal terpisah:

**Terminal 1 (Laravel Server):**
```bash
php artisan serve
```

**Terminal 2 (Aset Vite):**
```bash
npm run dev
```

Aplikasi sekarang dapat diakses melalui browser di: **`http://127.0.0.1:8000`**.

---

## 🔑 Akun Bawaan (Default Seed Credentials)

Setelah menjalankan `php artisan db:seed`, Anda dapat langsung masuk ke Panel Admin melalui rute **`/login`** menggunakan akun berikut:

| Peran | Alamat Email | Kata Sandi | Wewenang Utama |
|---|---|---|---|
| **Super Administrator** | `cheriaapiani@gmail.com` | `admin123` | Hak akses penuh, manajemen akun staf, kelola pelanggan, promosi, & produk. |
| **Staff Admin Toko** | `admin@doughheaven.com` | `admin123` | Pengelolaan operasional harian katalog menu, blog, ulasan, & newsletter. |

---

## 📬 Pengujian Email di Lingkungan Lokal

Untuk memudahkan evaluasi tanpa membutuhkan akun SMTP sungguhan:
1. Konfigurasi email disetel ke `MAIL_MAILER=log`.
2. Setiap pengiriman email (seperti pendaftaran subscriber baru atau broadcast massal) akan langsung dirender dan disimpan dalam file log lokal:  
   📁 **`storage/logs/laravel.log`**
3. Anda dapat memantau jalannya email secara langsung melalui terminal PowerShell:
   ```powershell
   Get-Content storage/logs/laravel.log -Wait -Tail 30
   ```
   *Seluruh struktur isi pesan, tombol klaim diskon, hingga tautan berhenti berlangganan akan tampil seketika saat tombol siaran diklik.*

---

## 🧁 Tautan Rute Penting

- **Halaman Beranda Publik:** `http://127.0.0.1:8000/`
- **Katalog Menu:** `http://127.0.0.1:8000/menu`
- **Halaman Promo:** `http://127.0.0.1:8000/promos`
- **Artikel Blog & Langganan:** `http://127.0.0.1:8000/halblogs`
- **Formulir Ulasan Pengunjung:** `http://127.0.0.1:8000/contact`
- **Pintu Masuk Admin:** `http://127.0.0.1:8000/login`
- **Dashboard Admin:** `http://127.0.0.1:8000/dashboard`
- **Kelola Pengguna (Super Admin):** `http://127.0.0.1:8000/admin/users`
- **Kelola Pelanggan (Newsletter):** `http://127.0.0.1:8000/admin/subscribers`
- **Broadcast Email Center:** `http://127.0.0.1:8000/admin/subscribers/broadcast`

---

## 👩‍💻 Pengembang

Proyek ini dikembangkan oleh **Cheria Apiani / Cheria Sevani** sebagai bagian dari perancangan sistem informasi digital marketing dan branding toko roti artisanal **DoughHeaven Bakery**.
