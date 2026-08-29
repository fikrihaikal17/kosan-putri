# Kost Putri Ibu Idah - Website Resmi & Panel Admin

Website resmi dan sistem manajemen konten untuk **Kost Putri Ibu Idah** (Ciamis, Jawa Barat). Dibangun menggunakan arsitektur modern berbasis Laravel dengan gaya visual Neo-Brutalism yang responsif, asisten interaktif Tanya Kost, serta Panel Admin Filament untuk pengelolaan kamar, fasilitas, galeri, lokasi, dan FAQ secara real-time.

---

## Daftar Isi
- [Fitur Utama](#fitur-utama)
  - [Halaman Publik](#1-halaman-publik)
  - [Panel Admin (Filament)](#2-panel-admin-filament)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Struktur Halaman & Rute](#struktur-halaman--rute)
- [Panduan Instalasi](#panduan-instalasi)
- [Akun Default Superadmin](#akun-default-superadmin)
- [Pengujian & Kualitas Kode](#pengujian--kualitas-kode)
- [Informasi Kontak & Lokasi](#informasi-kontak--lokasi)

---

## Fitur Utama

### 1. Halaman Publik
- **Desain Neo-Brutalism Responsif**: Tata letak dengan garis batas tegas, bayangan kontras, tipografi modern, dan navigasi yang optimal untuk perangkat desktop maupun mobile.
- **Beranda Interaktif**: Menampilkan ringkasan informasi kos, sorotan tipe kamar, daftar fasilitas terverifikasi, cuplikan galeri, lokasi peta presisi, serta tanya jawab ringkas.
- **Pilihan Kamar (`/kamar`)**:
  - Tipe A: Kamar dengan Kamar Mandi Dalam (Pribadi).
  - Tipe B: Kamar dengan Kamar Mandi Sharing (Luar).
  - Halaman detail kamar individual (`/kamar/{slug}`) lengkap dengan fasilitas dan tombol hubungi WhatsApp otomatis.
- **Fasilitas Kos (`/fasilitas`)**:
  - Menampilkan 6 fasilitas utama yang sudah termasuk dalam biaya sewa (Kasur, Wi-Fi, Listrik, Air, Kamar Mandi, Sirkulasi & Jendela).
  - Menampilkan 4 fasilitas bersama (Dapur Sharing, Area Jemur, Garasi Motor, Keamanan Gerbang).
- **Galeri Foto (`/galeri`)**:
  - Filter kategori foto (Kamar, Kamar Mandi, Area Bersama, Fasilitas, Eksterior).
  - Lightbox modal terintegrasi dengan tombol navigasi foto sebelumnya/selanjutnya dan tombol tutup.
- **Lokasi & Petunjuk Arah (`/lokasi`)**:
  - Menampilkan alamat resmi lengkap dan wilayah administratif.
  - Peta Google Maps interaktif yang berfokus tepat pada titik koordinat Kost Putri Ibu Idah dengan penanda lokasi.
  - Tombol aksi: "Buka di Google Maps" dan "Salin Alamat".
  - Petunjuk arah, info garasi/parkir motor, dan jam tutup gerbang malam (22.00 WIB).
- **Tanya Jawab FAQ (`/faq`)**:
  - 10 daftar pertanyaan dan jawaban lengkap seputar ketentuan kos dengan tampilan akordeon yang rapi.
- **Widget Tanya Kost AI**:
  - Asisten informasi otomatis di pojok kanan bawah untuk menjawab pertanyaan calon penghuni seputar kamar, aturan, fasilitas, dan harga berdasarkan basis pengetahuan resmi.

---

### 2. Panel Admin (Filament)
Akses melalui URL: `http://127.0.0.1:8000/admin`

- **Dasbor Statistik & Analitik**:
  - Pelacakan pengunjung langsung (Real-Time Live Visitor Tracking).
  - Grafik tren kunjungan halaman (Page Views vs Unique Visitors).
  - Ringkasan status kamar dan fasilitas aktif.
- **Manajemen Pilihan Kamar (`/admin/rooms`)**: Tambah, perbarui, dan atur ketersediaan tipe kamar beserta foto dan fasilitasnya.
- **Manajemen Fasilitas (`/admin/facilities`)**: Kelola daftar fasilitas termasuk biaya sewa dan fasilitas bersama.
- **Manajemen Galeri Foto (`/admin/galleries`)**: Unggah foto properti kos berdasarkan kategori.
- **Manajemen Lokasi & Peta (`/admin/locations`)**: Atur alamat resmi, garis lintang (latitude), garis bujur (longitude), Google Place ID, link navigasi, dan embed peta.
- **Manajemen Tanya Jawab FAQ (`/admin/faqs`)**: Kelola daftar pertanyaan dan jawaban FAQ untuk pengunjung.
- **Manajemen Aturan Kos (`/admin/house-rules`)**: Kelola tata tertib penghuni kos.
- **Informasi Kos & Kontak (`/admin/business-settings`)**: Pengaturan nomor WhatsApp resmi Ibu Idah, profil kos, dan konfigurasi SEO.

---

## Teknologi yang Digunakan

| Komponen | Teknologi | Keterangan |
| :--- | :--- | :--- |
| **Backend Framework** | Laravel 13 (PHP 8.1+) | Framework aplikasi utama |
| **Admin Panel** | Filament v5 | Panel manajemen data terintegrasi |
| **Frontend Styling** | Tailwind CSS & DaisyUI | Sistem desain dan komponen antarmuka |
| **Reaktivitas** | Alpine.js & Livewire | Interaktivitas komponen antarmuka |
| **Database** | MySQL / MariaDB | Penyimpanan data relasional |
| **Pengujian** | PHPUnit | Pengujian otomatis fungsionalitas dan fitur |

---

## Struktur Halaman & Rute

### Rute Publik
| Rute | Nama Rute | Deskripsi |
| :--- | :--- | :--- |
| `GET /` | `home` | Halaman Beranda Utama |
| `GET /kamar` | `rooms.index` | Daftar Pilihan Kamar |
| `GET /kamar/{slug}` | `rooms.show` | Detail Kamar Tertentu |
| `GET /fasilitas` | `facilities.index` | Rincian Fasilitas Lengkap |
| `GET /galeri` | `gallery.index` | Galeri Foto dengan Lightbox |
| `GET /lokasi` | `location.index` | Peta & Panduan Lokasi |
| `GET /faq` | `faq.index` | Tanya Jawab FAQ |

### Rute Panel Admin
| Rute | Modul | Deskripsi |
| :--- | :--- | :--- |
| `GET /admin` | Dasbor | Statistik Pengunjung & Ringkasan Data |
| `GET /admin/rooms` | Kamar | Kelola Kamar & Ketersediaan |
| `GET /admin/facilities` | Fasilitas | Kelola Fasilitas Kos |
| `GET /admin/galleries` | Galeri | Kelola Foto Galeri |
| `GET /admin/locations` | Lokasi | Pengaturan Alamat & Koordinat Peta |
| `GET /admin/faqs` | FAQ | Kelola Tanya Jawab |
| `GET /admin/house-rules` | Aturan | Kelola Tata Tertib Kos |
| `GET /admin/business-settings` | Profil & Kontak | Pengaturan Kontak WhatsApp & Identitas Usaha |

---

## Panduan Instalasi

### Prasyarat
- PHP >= 8.1
- Composer >= 2.x
- Node.js >= 18.x & NPM
- MySQL / MariaDB

### Langkah Pemasangan

1. **Clone Repositori**:
   ```bash
   git clone https://github.com/fikrihaikal17/kosan-putri.git
   cd kosan-putri
   ```

2. **Instal Dependensi PHP**:
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend**:
   ```bash
   npm install
   ```

4. **Konfigurasi Environment (`.env`)**:
   ```bash
   cp .env.example .env
   ```
   Sesuaikan pengaturan database pada file `.env`:
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

7. **Kompilasi Asset Frontend**:
   ```bash
   npm run build
   ```

8. **Jalankan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Akses aplikasi di browser:
   - Website Publik: [http://127.0.0.1:8000](http://127.0.0.1:8000)
   - Panel Admin: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

---

## Akun Default Superadmin

Gunakan akun berikut untuk masuk ke Panel Admin:

- **URL Login**: `http://127.0.0.1:8000/admin/login`
- **Email**: `admin@kosanputri.com` (atau `admin@kostputriibuidah.com`)
- **Password**: `password`

*(Password dapat diperbarui kapan saja melalui panel admin)*

---

## Pengujian & Kualitas Kode

Jalankan suite pengujian otomatis dengan perintah:

```bash
php artisan test
```

---

## Informasi Kontak & Lokasi

- **Nama Usaha**: Kost Putri Ibu Idah
- **Jenis Hunian**: Khusus Mahasiswi & Karyawati Putri
- **WhatsApp Resmi**: `0813-3925-9179`
- **Alamat Resmi**: Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271
- **Koordinat Peta**: `-7.3226066, 108.3780388`
- **Google Maps**: [https://maps.app.goo.gl/SjebDzqDyygXVm3V6](https://maps.app.goo.gl/SjebDzqDyygXVm3V6)
- **Jam Kunci Gerbang**: Maksimal pukul 22.00 WIB
