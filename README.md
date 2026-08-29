# 🌸 Kost Putri Ibu Idah - Website Resmi & Portal Manajemen Superadmin

![PHP Version](https://img.shields.io/badge/PHP-8.1%2B%20%7C%208.5-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-v5-F59E0B?style=for-the-badge&logo=filament&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![DaisyUI](https://img.shields.io/badge/DaisyUI-v5-570DF8?style=for-the-badge&logo=daisyui&logoColor=white)
![Design Style](https://img.shields.io/badge/Design-Neo--Brutalism-FF5E8A?style=for-the-badge)

Website resmi dan panel kontrol konten dinamis untuk **Kost Putri Ibu Idah** (Ciamis, Jawa Barat). Dibangun dengan gaya visual modern **Neo-Brutalism**, tata letak responsif, mode Gelap/Terang (*Dark/Light Mode*), integrasi WhatsApp langsung, asisten AI Tanya Kost, serta **Panel Superadmin Filament v5** dengan pelacakan analitik pengunjung secara **Real-Time**.

---

## 📑 Daftar Isi
- [Fitur Utama](#-fitur-utama)
  - [Halaman Publik (User Facing)](#1-halaman-publik-user-facing)
  - [Panel Superadmin (Filament v5)](#2-panel-superadmin-filament-v5)
- [Teknologi & Arsitektur](#-teknologi--arsitektur)
- [Struktur Halaman & Routing](#-struktur-halaman--routing)
- [Panduan Instalasi & Menjalankan Project](#-panduan-instalasi--menjalankan-project)
- [Akun Default Superadmin](#-akun-default-superadmin)
- [Manajemen Konten & Konfigurasi](#-manajemen-konten--konfigurasi)
- [Pengujian & Code Quality](#-pengujian--code-quality)
- [Informasi Kontak & Lokasi](#-informasi-kontak--lokasi)

---

## 🌟 Fitur Utama

### 1. Halaman Publik (User Facing)
- **Desain Neo-Brutalism Premium**: Tampilan berkarakter kuat dengan border hitam tegas (`3px`), bayangan kontras (`neo-shadow`), palet warna terkurasi (*Electric Pink*, *Bright Yellow*, *Soft Mint*, *Sky Blue*), dan tipografi modern *Plus Jakarta Sans*.
- **Dark Mode & Light Mode**: Switcher tema instan dengan persistensi `localStorage`.
- **Navigasi Lengkap & Responsif**:
  - Navbar desktop dengan indikator halaman aktif.
  - Sticky Mobile Bottom Navigation Bar untuk kemudahan navigasi di layar smartphone.
  - Floating WhatsApp Action Button di pojok kanan bawah.
- **Beranda Interaktif**:
  - *Hero Section* dengan badge terverifikasi kos khusus putri dan CTA WhatsApp.
  - *Quick Trust Indicators* (Maks. 2 orang, Listrik & Air termasuk, Wi-Fi).
  - *Preview 2 Tipe Kamar* dengan badge status.
  - *Grid 9 Fasilitas Terverifikasi*.
  - *Interactive Google Maps Embed* & panduan arah.
  - *Cuplikan Galeri Foto* & *FAQ Ringkas*.
- **Pilihan Kamar (`/kamar`)**:
  - **Tipe A**: Kamar dengan Kamar Mandi Dalam (Pribadi).
  - **Tipe B**: Kamar dengan Kamar Mandi Sharing (Luar).
  - Halaman detail kamar individual (`/kamar/{slug}`) dengan daftar fasilitas lengkap dan tombol WhatsApp otomatis dengan pesan pre-filled.
- **Fasilitas Kos (`/fasilitas`)**:
  - Rincian 9 fasilitas: Kasur, Wi-Fi, Listrik termasuk, Air termasuk, Kamar Mandi Dalam/Luar, Dapur Sharing, Area Jemur, Garasi Motor, dan Keamanan Gerbang (Kunci maks. 22.00 WIB).
  - Komparasi fasilitas termasuk sewa vs fasilitas bersama.
- **Galeri Foto Interaktif (`/galeri`)**:
  - Filter kategori dinamis (*Semua*, *Kamar*, *Kamar Mandi*, *Area Bersama*, *Fasilitas*, *Eksterior*).
  - **Lightbox Modal Lengkap**: Zoom foto layar penuh, navigasi Sebelumnya (*Prev*) / Selanjutnya (*Next*), navigasi keyboard (panah kiri/kanan/Esc), dan transisi halus.
- **Peta & Lokasi (`/lokasi`)**:
  - Embed Google Maps responsif langsung ke titik lokasi Kost Putri Ibu Idah.
  - Tombol buka Google Maps App / Navigasi Arah.
  - Catatan kebijakan survey fisik (wajib membuat janji via WhatsApp).
- **Tanya Jawab FAQ (`/faq`)**:
  - 10 pertanyaan terverifikasi dengan fitur pencarian real-time (*Live Search Bar*) dan filter kategori.
  - Desain akordeon interaktif.
- **Asisten AI Tanya Kost**:
  - Modal interaktif client-side AI chat yang menjawab pertanyaan seputar fasilitas kos secara akurat berdasarkan *Knowledge Base* resmi tanpa halusinasi.

---

### 2. Panel Superadmin (Filament v5)
Akses melalui URL: `http://127.0.0.1:8000/admin`

- **Dasbor Real-Time (*Live Dashboard*)**:
  - **Real-Time Polling 5 Detik**: Metrik dan grafik terupdate otomatis dari database tanpa reload browser.
  - **Kartu Statistik dengan Sparkline Curves**:
    - *Pengunjung Hari Ini (Live)*
    - *Total Traffic Bulan Ini*
    - *Status Pilihan Kamar*
    - *Fasilitas & Layanan Terdaftar*
  - **Grafik Pengunjung Web Real-Time**: Grafik Chart.js interaktif (*Page Views* vs *Unique Visitors*) dengan filter waktu: *Hari Ini (per jam)*, *7 Hari*, *14 Hari*, dan *30 Hari*.
  - **Ringkasan Aktivitas & Halaman Terpopuler**: Menampilkan halaman yang paling banyak diakses oleh calon penghuni.
  - **Panel Aksi Cepat (*Quick Action Panel*)**: Pintasan ke seluruh menu manajemen konten.
- **Manajemen Pilihan Kamar (`/admin/rooms`)**:
  - Tambah, ubah, hapus tipe kamar, upload foto utama, tentukan tipe kamar mandi, status ketersediaan, fasilitas, dan urutan.
- **Manajemen Fasilitas (`/admin/facilities`)**:
  - Kelola fasilitas kos, deskripsi, icon, status aktif, dan nomor urutan tampil.
- **Manajemen Galeri Foto (`/admin/galleries`)**:
  - Upload foto suasana kos, tentukan kategori, caption, deskripsi alt, dan urutan.
- **Manajemen Lokasi & Peta (`/admin/locations`)**:
  - Pengaturan satu halaman untuk alamat lengkap, link Google Maps, URL Embed Maps, patokan/landmark, info parkir, dan jam tutup gerbang.
- **Manajemen Tanya Jawab FAQ (`/admin/faqs`)**:
  - Tambah dan sesuaikan pertanyaan serta jawaban FAQ untuk calon penghuni.
- **Manajemen Aturan Kost (`/admin/house-rules`)**:
  - Kelola 7 tata tertib dan tata krama kenyamanan penghuni.
- **Pengaturan WhatsApp & Profil (`/admin/business-settings`)**:
  - **Satu Input Nomor WhatsApp Tunggal**: Mengatur nomor resmi pemilik kos (`081339259179`), yang otomatis diformat dan terhubung ke seluruh tombol website.

---

## 🛠 Teknologi & Arsitektur

| Komponen | Teknologi | Keterangan |
| :--- | :--- | :--- |
| **Backend Framework** | Laravel 13.x (PHP 8.1+ / 8.5) | Framework MVC modern |
| **Admin Panel** | Filament v5 | Admin panel dengan tema custom Neo-Brutalism |
| **Frontend Styling** | Tailwind CSS v4 + DaisyUI v5 | Utility classes & komponen interaktif |
| **Reactivity** | Livewire 3 + Alpine.js | State management & Live Polling |
| **Charting Library** | Chart.js (via Filament ChartWidget) | Grafik real-time interaktif |
| **Database** | MySQL / MariaDB (kompatibel SQLite) | Penyimpanan data relasional & traffic logs |
| **Code Formatting** | Laravel Pint | Standar kode PSR-12 |
| **Test Suite** | PHPUnit | Feature & Unit Testing |

---

## 🗺 Struktur Halaman & Routing

### Rute Publik
| Rute | Nama Rute | Deskripsi |
| :--- | :--- | :--- |
| `GET /` | `home` | Halaman Beranda Utama |
| `GET /kamar` | `rooms.index` | Daftar Pilihan Kamar |
| `GET /kamar/{slug}` | `rooms.show` | Detail Kamar Tertentu |
| `GET /fasilitas` | `facilities.index` | Rincian Fasilitas Lengkap |
| `GET /galeri` | `gallery.index` | Galeri Foto dengan Lightbox |
| `GET /lokasi` | `location.index` | Peta & Panduan Lokasi |
| `GET /faq` | `faq.index` | Tanya Jawab FAQ Interaktif |

### Rute Superadmin
| Rute | Modul | Deskripsi |
| :--- | :--- | :--- |
| `GET /admin` | Dashboard | Dasbor Analytics Real-Time & Ringkasan |
| `GET /admin/rooms` | Kamar | Kelola Kamar & Ketersediaan |
| `GET /admin/facilities` | Fasilitas | Kelola Fasilitas Kos |
| `GET /admin/galleries` | Galeri | Upload & Kelola Foto |
| `GET /admin/locations` | Lokasi | Pengaturan Peta & Alamat |
| `GET /admin/faqs` | FAQ | Kelola Tanya Jawab |
| `GET /admin/house-rules` | Aturan | Kelola Tata Tertib Kos |
| `GET /admin/business-settings` | Pengaturan | Pengaturan Kontak WhatsApp & Profil |

---

## 🚀 Panduan Instalasi & Menjalankan Project

### Prasyarat:
- **PHP** >= 8.1 (Disarankan PHP 8.2 atau lebih tinggi)
- **Composer** >= 2.x
- **Node.js** >= 18.x & **NPM**
- **MySQL** / **MariaDB** (atau Laragon / XAMPP)

### Langkah Instalasi:

1. **Clone Repositori**:
   ```bash
   git clone <repository-url> kosan-putri
   cd kosan-putri
   ```

2. **Instal Dependensi PHP (Composer)**:
   ```bash
   composer install
   ```

3. **Instal Dependensi JavaScript (NPM)**:
   ```bash
   npm install
   ```

4. **Konfigurasi Environment (`.env`)**:
   Salin file `.env.example` ke `.env`:
   ```bash
   cp .env.example .env
   ```
   Sesuaikan konfigurasi database Anda di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kosan_putri
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Migrasi & Database Seeder**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Perintah ini akan membuat semua tabel database beserta data default terverifikasi untuk kamar, fasilitas, galeri, lokasi, FAQ, aturan kos, dan akun Superadmin.*

7. **Kompilasi Asset Frontend**:
   Untuk mode pengembangan:
   ```bash
   npm run dev
   ```
   Atau untuk build produksi:
   ```bash
   npm run build
   ```

8. **Jalankan Local Server**:
   ```bash
   php artisan serve
   ```
   Buka di browser:
   - Website Publik: [http://127.0.0.1:8000](http://127.0.0.1:8000)
   - Panel Superadmin: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

---

## 🔑 Akun Default Superadmin

Gunakan kredensial berikut untuk masuk ke Panel Superadmin:

- **URL Login**: `http://127.0.0.1:8000/admin/login`
- **Email**: `admin@kosanputri.com`
- **Password**: `password`

*(Password dapat diubah kapan saja setelah masuk ke panel admin)*

---

## ⚙ Manajemen Konten & Konfigurasi

Semua data bisnis dan kontak terpusat dan dapat dikelola melalui dua cara:
1. **Melalui Panel Superadmin (`/admin`)**:
   - Perubahan langsung disimpan ke database dan otomatis tampil di website publik.
2. **Melalui File Konfigurasi [`config/kost.php`](file:///c:/laragon/www/kosan-putri/config/kost.php)**:
   - Berisi data dasar default dan knowledge base asisten AI.

---

## 🧪 Pengujian & Code Quality

Proyek ini dilengkapi dengan suite pengujian otomatis PHPUnit dan linter standar Laravel Pint:

```bash
# Menjalankan pengujian fitur & unit
php artisan test

# Memformat kode sesuai standar Laravel Pint
vendor/bin/pint
```

---

## 📍 Informasi Kontak & Lokasi

- **Nama Usaha**: Kost Putri Ibu Idah
- **Jenis Kos**: Kos Khusus Putri (Mahasiswi & Karyawati)
- **WhatsApp Resmi**: `0813-3925-9179` (`081339259179`)
- **Alamat**: Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271
- **Google Maps**: [Buka di Google Maps](https://maps.app.goo.gl/SjebDzqDyygXVm3V6)
- **Jam Kunci Gerbang**: Maksimal pukul 22.00 WIB

---

*Dikembangkan dengan ❤️ untuk kenyamanan hunian putri di Ciamis.*
