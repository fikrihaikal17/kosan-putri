# Kost Putri Ibu Idah - Dokumentasi Sistem & Portal Web

[![PHP](https://img.shields.io/badge/PHP-8.1%2B%20%7C%208.5-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament-v5-F59E0B?style=for-the-badge&logo=filament&logoColor=white)](https://filamentphp.com/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-v4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![DaisyUI](https://img.shields.io/badge/DaisyUI-v5-570DF8?style=for-the-badge&logo=daisyui&logoColor=white)](https://daisyui.com/)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=white)](https://alpinejs.dev/)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-FB70A9?style=for-the-badge&logo=livewire&logoColor=white)](https://livewire.laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Vite](https://img.shields.io/badge/Vite-8.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev/)
[![Chart.js](https://img.shields.io/badge/Chart.js-4.x-FF6384?style=for-the-badge&logo=chartdotjs&logoColor=white)](https://www.chartjs.org/)

Website profil resmi dan sistem manajemen konten (CMS) berbasis web untuk **Kost Putri Ibu Idah** yang berlokasi di Ciamis, Jawa Barat. Aplikasi ini dibangun dengan standar arsitektur modern menggunakan Laravel 13, Filament v5, Tailwind CSS, Alpine.js, dan Livewire 3. Sistem ini dirancang untuk memberikan transparansi informasi hunian bagi calon penghuni (mahasiswi dan karyawati) serta kemudahan pengelolaan operasional properti secara mandiri oleh pemilik kos.

---

## Daftar Isi
- [Ringkasan Proyek](#ringkasan-proyek)
- [Fitur Sistem](#fitur-sistem)
  - [1. Antarmuka Publik (Front-End)](#1-antarmuka-publik-front-end)
  - [2. Widget Asisten Cerdas "Tanya Kost"](#2-widget-asisten-cerdas-tanya-kost)
  - [3. Panel Kontrol Superadmin (Filament CMS)](#3-panel-kontrol-superadmin-filament-cms)
- [Arsitektur Data & Model Database](#arsitektur-data--model-database)
- [Struktur Rute & Endpoint](#struktur-rute--endpoint)
- [Tumpukan Teknologi (Tech Stack)](#tumpukan-teknologi-tech-stack)
- [Panduan Instalasi & Konfigurasi Lingkungan](#panduan-instalasi--konfigurasi-lingkungan)
- [Optimasi Mesin Pencari (SEO) & Google Indexing](#optimasi-mesin-pencari-seo--google-indexing)
- [Kredensial Default Panel Admin](#kredensial-default-panel-admin)
- [Standarisasi Pengujian Otomatis](#standarisasi-pengujian-otomatis)
- [Informasi Operasional & Lokasi Resmi](#informasi-operasional--lokasi-resmi)

---

## Ringkasan Proyek

Kost Putri Ibu Idah merupakan hunian sewa khusus putri yang mengedepankan keamanan, ketenangan, dan kepraktisan. Sistem web ini memfasilitasi calon penyewa untuk meninjau ketersediaan kamar, spesifikasi fasilitas, galeri foto terverifikasi, tata tertib, peta lokasi berkoordinat presisi, serta panduan survey langsung via WhatsApp resmi pemilik kos.

Desain antarmuka mengadopsi estetika **Neo-Brutalism Modern** dengan garis pembatas tegas (*bold border*), bayangan tajam (*hard shadows*), hierarki tipografi *Plus Jakarta Sans*, kontras warna yang nyaman, serta tata letak responsif di semua resolusi layar (ponsel, tablet, dan desktop).

---

## Fitur Sistem

### 1. Antarmuka Publik (Front-End)

#### A. Beranda Utama (`/`)
- **Hero Section**: Penegasan identitas kos khusus putri dengan indikator kepercayaan utama (*Maksimal 2 orang per kamar*, *Listrik & Air termasuk*, *Akses Wi-Fi*), tombol aksi reservasi via WhatsApp, dan tombol navigasi kamar.
- **Tentang Kami**: Ringkasan profil hunian, visi kenyamanan, serta tata letak simetris kartu foto properti terverifikasi.
- **Pratinjau Kamar Unggulan**: Kartu ringkasan tipe kamar dengan penanda ketersediaan (*Tersedia* / *Penuh*), spesifikasi kamar mandi, dan tautan detail.
- **Daftar Fasilitas Terverifikasi**: Menampilkan 6 fasilitas utama yang sudah termasuk biaya sewa dan 4 fasilitas bersama.
- **Pratinjau Galeri**: Cuplikan 3 foto properti terbaru dengan tautan ke galeri lengkap.
- **Lokasi & Peta Interaktif**: Peta Google Maps terintegrasi yang berfokus tepat pada koordinat bangunan kos, dilengkapi tombol *Salin Alamat* dan *Buka di Google Maps*.
- **Tanya Jawab Terpopuler**: Menampilkan 3 pertanyaan FAQ teratas dengan akordeon interaktif.

#### B. Pilihan Kamar (`/kamar` dan `/kamar/{slug}`)
- **Katalog Kamar**: Menampilkan 2 tipe kamar utama:
  1. *Tipe Kamar Mandi Dalam*: Kamar pribadi dengan fasilitas sanitasi di dalam ruangan untuk privasi maksimal.
  2. *Tipe Kamar Mandi Luar (Sharing)*: Kamar bersih dengan akses fasilitas kamar mandi bersama yang terawat.
- **Halaman Detail Kamar**: Menampilkan galeri foto kamar beresolusi tinggi, rincian kelengkapan fasilitas, aturan kapasitas maksimal penghuni, serta generator tautan WhatsApp dengan pesan kustom otomatis (*pre-filled message*).

#### C. Fasilitas Lengkap (`/fasilitas`)
- **Fasilitas Termasuk Biaya Sewa (Grid 2x3 Simetris)**:
  1. *Kasur*: Sudah tersedia dan siap pakai di setiap kamar.
  2. *Wi-Fi*: Akses koneksi internet gratis untuk kebutuhan belajar dan bekerja.
  3. *Listrik*: Biaya listrik harian sudah termasuk dalam biaya bulanan (tanpa token terpisah).
  4. *Air*: Pasokan air bersih lancar untuk mandi dan mencuci.
  5. *Kamar Mandi*: Pilihan kamar mandi pribadi dalam kamar maupun kamar mandi sharing.
  6. *Sirkulasi & Jendela*: Ventilasi dan pencahayaan alami di setiap kamar.
- **Fasilitas Bersama & Keamanan (Grid 1x4)**:
  1. *Dapur Sharing*: Dapur bersama untuk memasak harian.
  2. *Area Jemur*: Tempat menjemur pakaian terlindung dan terkena sinar matahari.
  3. *Garasi Motor*: Area parkir motor aman di dalam lingkungan kos.
  4. *Keamanan Gerbang*: Gerbang utama tertutup yang dikunci maksimal pukul 22.00 WIB.

#### D. Galeri Foto Properti (`/galeri`)
- **Filter Kategori Dinamis**: Penyaringan instan berdasarkan kategori (*Semua*, *Kamar*, *Kamar Mandi*, *Area Bersama*, *Fasilitas*, *Eksterior*).
- **Neo-Brutalist Lightbox Modal**: Penampil foto layar penuh dengan penengahan presisi, deskripsi foto, tombol navigasi foto sebelumnya (*Prev*) dan selanjutnya (*Next*), tombol tutup (*Close*), serta dukungan navigasi keyboard (`Esc`, panah kiri/kanan).

#### E. Lokasi & Petunjuk Arah (`/lokasi`)
- **Akurasi Titik Koordinat**: Peta Google Maps Embed langsung berfokus pada titik bangunan Kost Putri Ibu Idah (`Latitude: -7.3226066`, `Longitude: 108.3780388`, `Place ID: 0x8b96d290aad1c3ab:0x25e81025801d51c9`) pada tingkat pembesaran optimal (*zoom 17–19*).
- **Keterangan Penanda**: Menyertakan catatan verifikasi lokasi resmi kos.
- **Aksi Cepat**: Tombol *Salin Alamat* dengan umpan balik clipboard dan tombol *Buka di Google Maps*.
- **Informasi Akses**: Patokan arah jalan, fasilitas garasi motor, kebijakan kunci gerbang malam, serta panduan survey fisik.
- **Mekanisme Cadangan (Fallback)**: Penanganan otomatis jika iframe peta terhambat dengan menyajikan rincian alamat teks terstruktur dan tautan navigasi langsung.

#### F. Pusat Informasi & FAQ (`/faq`)
- Menyajikan 10 tanya jawab mendalam seputar kebijakan gender khusus putri, kapasitas maksimal, kelistrikan, pasokan air, Wi-Fi, kamar mandi, dapur, fasilitas cuci/jemur, parkir motor, dan jam malam gerbang.
- Tipografi dengan format perataan rata kanan-kiri (*justify*) untuk kenyamanan membaca.

---

### 2. Widget Asisten Cerdas "Tanya Kost"
- **Komponen Interaktif Mengambang (*Floating Trigger*)**: Terletak di sudut kanan bawah antarmuka pengguna.
- **Knowledge Base Berbasis Fakta**: Sistem menjawab pertanyaan seputar properti secara instan dan akurat berdasarkan data terverifikasi (tanpa halusinasi data fiktif).
- **Pintasan Pertanyaan Cepat (*Quick Prompts*)**: Tombol topik instan (Listrik, Kamar Mandi, Maksimal Orang, Jam Gerbang, Dapur, Alamat, Cara Survey).
- **Guardrail Keamanan**: Menolak dan mengarahkan kembali pertanyaan di luar konteks kos (misalnya perhitungan matematika murni atau topik di luar properti).
- **Penanganan Izin Khusus**: Menjelaskan prosedur izin langsung ke Ibu Idah untuk kebutuhan spesifik (misalnya pemasangan paku dinding, membawa alat elektronik daya tinggi, penambahan kasur pribadi, atau kepulangan larut malam karena lembur/tugas).

---

### 3. Panel Kontrol Superadmin (Filament CMS)
Akses melalui: `http://127.0.0.1:8000/admin`

- **Dasbor Statistik Pengunjung Real-Time**:
  - Pelacakan langsung tampilan halaman (*Page Views*) dan pengunjung unik (*Unique Visitors*).
  - Sinkronisasi warna metrik: Kartu Tampilan Halaman (Merah Muda / Primary) dan Pengunjung Unik (Kuning / Warning) selaras dengan kurva grafik.
  - Grafik interaktif dengan filter rentang waktu: *Hari Ini (per jam)*, *7 Hari*, *14 Hari*, dan *30 Hari*.
- **Manajemen Pilihan Kamar (`/admin/rooms`)**: Manajemen tipe kamar, status ketersediaan, upload foto, penetapan harga, dan relasi fasilitas.
- **Manajemen Fasilitas (`/admin/facilities`)**: Pengaturan daftar fasilitas, pengelompokan (*Termasuk Biaya* vs *Bersama*), pemilihan ikon, dan urutan tampilan.
- **Manajemen Galeri (`/admin/galleries`)**: Unggah foto properti, penetapan kategori, judul, teks alternatif SEO, dan takarir (*caption*).
- **Manajemen Lokasi & Peta (`/admin/locations`)**: Pengaturan terpusat untuk alamat lengkap, koordinat latitude & longitude, Google Place ID, link navigasi, URL embed, patokan arah, dan jam kunci gerbang.
- **Manajemen FAQ (`/admin/faqs`)**: Penambahan dan pembaruan pertanyaan serta jawaban tanya jawab.
- **Manajemen Aturan Kos (`/admin/house-rules`)**: Penyesuaian tata tertib dan aturan kenyamanan bersama.
- **Informasi Bisnis & Kontak (`/admin/business-settings`)**: Pengaturan nomor WhatsApp tunggal resmi pemilik kos, deskripsi usaha, dan konfigurasi meta SEO.

---

## Arsitektur Data & Model Database

| Model | Tabel Database | Peran & Deskripsi |
| :--- | :--- | :--- |
| `User` | `users` | Akun autentikasi pengelola panel superadmin. |
| `BusinessSetting` | `business_settings` | Pengaturan tunggal identitas kos, nomor WhatsApp, alamat, koordinat geo, dan meta SEO. |
| `Room` | `rooms` | Entitas tipe kamar kos, slug URL, deskripsi, tipe kamar mandi, status ketersediaan, dan urutan. |
| `RoomImage` | `room_images` | Berkas foto terkait kamar dengan penanda foto utama (*is_primary*). |
| `Facility` | `facilities` | Daftar fasilitas kos, tipe inklusi sewa (*is_included*), status aktif, dan ikon visual. |
| `FacilityRoom` | `facility_room` | Tabel pivot relasi many-to-many antara kamar dan fasilitas. |
| `Gallery` | `galleries` | Foto galeri properti, kategori, teks takarir, dan urutan tampil. |
| `Faq` | `faqs` | Pertanyaan dan jawaban informasi umum calon penghuni. |
| `HouseRule` | `house_rules` | Tata tertib dan aturan kenyamanan penghuni. |
| `PageView` | `page_views` | Pencatatan log kunjungan analitik (alamat IP, session ID, URL rute, user agent, waktu). |

---

## Struktur Rute & Endpoint

### Rute Publik (Web)
| Metode | URI | Nama Rute | Pengontrol / Aksi |
| :--- | :--- | :--- | :--- |
| `GET` | `/` | `home` | `HomeController@index` |
| `GET` | `/kamar` | `rooms.index` | `HomeController@rooms` |
| `GET` | `/kamar/{slug}` | `rooms.show` | `HomeController@roomDetail` |
| `GET` | `/fasilitas` | `facilities.index` | `HomeController@facilities` |
| `GET` | `/galeri` | `gallery.index` | `HomeController@gallery` |
| `GET` | `/lokasi` | `location.index` | `HomeController@location` |
| `GET` | `/faq` | `faq.index` | `HomeController@faq` |

### Endpoint API Asisten AI
| Metode | URI | Deskripsi |
| :--- | :--- | :--- |
| `POST` | `/api/tanya-kost` | Pemrosesan pertanyaan asisten Tanya Kost berbasis basis pengetahuan terverifikasi. |

### Rute Panel Admin (Filament)
| Metode | URI | Modul Panel Admin |
| :--- | :--- | :--- |
| `GET` | `/admin` | Dasbor Analitik & Statistik Real-Time |
| `GET` | `/admin/login` | Halaman Masuk Superadmin |
| `GET` | `/admin/rooms` | Manajemen Tipe Kamar & Ketersediaan |
| `GET` | `/admin/facilities` | Manajemen Fasilitas Kos |
| `GET` | `/admin/galleries` | Manajemen Galeri Foto |
| `GET` | `/admin/locations` | Manajemen Lokasi, Koordinat & Peta |
| `GET` | `/admin/faqs` | Manajemen Tanya Jawab (FAQ) |
| `GET` | `/admin/house-rules` | Manajemen Aturan & Tata Tertib |
| `GET` | `/admin/business-settings` | Informasi Bisnis, WhatsApp & SEO |

---

## Tumpukan Teknologi (Tech Stack)

- **Bahasa Pemrograman**: PHP >= 8.1 / PHP 8.2
- **Framework Utama**: Laravel 13.x
- **Panel Administrasi**: Filament v5
- **Mesin Basis Data**: MySQL 8.x / MariaDB
- **Tata Letak & Gaya Visual**: Tailwind CSS v4 & DaisyUI v5
- **Interaktivitas Sisi Klien**: Alpine.js & Vanilla JavaScript
- **Pustaka Ikon**: Lucide Icons
- **Pustaka Visualisasi Data**: Chart.js
- **Alat Kompilasi Asset**: Vite 8.x
- **Framework Pengujian**: PHPUnit 11.x

---

## Panduan Instalasi & Konfigurasi Lingkungan

### 1. Prasyarat Sistem
Pastikan perangkat kerja telah terpasang:
- PHP versi 8.1 atau lebih baru dengan ekstensi `pdo_mysql`, `mbstring`, `openssl`, `bcmath`, `curl`, `fileinfo`, `gd`.
- Composer versi 2.x
- Node.js versi 18.x atau lebih baru dan NPM
- MySQL Server (misalnya melalui Laragon, XAMPP, atau instalasi native)

### 2. Langkah-Langkah Pemasangan

1. **Unduh Repositori**:
   ```bash
   git clone https://github.com/fikrihaikal17/kosan-putri.git
   cd kosan-putri
   ```

2. **Instal Dependensi Backend (Composer)**:
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend (NPM)**:
   ```bash
   npm install
   ```

4. **Konfigurasi Berkas Lingkungan (`.env`)**:
   Salin berkas contoh konfigurasi:
   ```bash
   cp .env.example .env
   ```
   Buka berkas `.env` dan sesuaikan parameter koneksi basis data:
   ```env
   APP_NAME="Kost Putri Ibu Idah"
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_URL=http://127.0.0.1:8000

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kosan_putri
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Kunci Enkripsi Aplikasi**:
   ```bash
   php artisan key:generate
   ```

6. **Eksekusi Migrasi & Pembuatan Data Awal (Seeder)**:
   ```bash
   php artisan migrate:fresh --seed
   ```
   *Perintah ini akan menyusun seluruh tabel basis data dan menyuntikkan data resmi untuk kamar, fasilitas, galeri, lokasi presisi, aturan kos, FAQ, serta akun superadmin.*

7. **Kompilasi Berkas Aset Frontend**:
   Untuk mode produksi:
   ```bash
   npm run build
   ```
   Atau untuk mode pengembangan (*hot module replacement*):
   ```bash
   npm run dev
   ```

8. **Jalankan Server Lokal**:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui peramban:
   - Antarmuka Publik: `http://127.0.0.1:8000` (atau `https://kosanputri.kall.my.id` pada server produksi)
   - Panel Admin: `http://127.0.0.1:8000/admin`

---

## Optimasi Mesin Pencari (SEO) & Google Indexing

Sistem ini telah dikonfigurasi secara mendalam untuk meraih visibilitas maksimal di mesin pencari Google dengan domain resmi **`https://kosanputri.kall.my.id`**:

### 1. Peta Situs Dinamis & Statis (`sitemap.xml`)
- **URL Sitemap**: [`https://kosanputri.kall.my.id/sitemap.xml`](https://kosanputri.kall.my.id/sitemap.xml)
- Menyusun indeks URL seluruh halaman publik beserta seluruh tipe kamar aktif (`/kamar/{slug}`) secara dinamis dengan bobot prioritas (`priority: 1.0` untuk beranda, `0.9` untuk kamar dan lokasi, `0.8` untuk galeri, fasilitas, dan FAQ).

### 2. Pengaturan Perayap (`robots.txt`)
- **URL Robots**: [`https://kosanputri.kall.my.id/robots.txt`](https://kosanputri.kall.my.id/robots.txt)
- Mengizinkan seluruh bot pencarian (Googlebot, Googlebot-Image, Bingbot) untuk mengindeks halaman publik, gambar galeri, dan logo, serta membatasi akses pada area panel manajemen (`/admin*`, `/livewire*`).

### 3. Data Terstruktur Kaya (Schema.org JSON-LD)
- **`LodgingBusiness` & `LocalBusiness`**: Entitas bisnis penginapan lengkap dengan nama resmi, nomor telepon internasional (`+6281339259179`), rentang harga, jam operasional gerbang malam, koordinat lintang/bujur presisi (`-7.3226066, 108.3780388`), alamat lengkap Ciamis, dan 11 fitur fasilitas terverifikasi.
- **`FAQPage` Schema**: Menginjeksi 10 daftar tanya jawab resmi langsung ke format yang didukung cuplikan kaya (*Rich Snippets*) Google Search.
- **`BreadcrumbList` Schema**: Struktur remah roti (*breadcrumbs*) di setiap halaman internal (`/kamar`, `/kamar/{slug}`, `/fasilitas`, `/galeri`, `/lokasi`, `/faq`).
- **`HotelRoom` Schema**: Spesifikasi kamar tidur dan fasilitas inklusif di setiap halaman detail kamar.
- **`Place` Schema**: Titik lokasi dan peta geospasial pada halaman lokasi.

### 4. Tag Meta Geografis & SEO Lokal (Ciamis, Jawa Barat)
- Dilengkapi tag `geo.region` (`ID-JB`), `geo.placename` (`Ciamis`), `geo.position` (`-7.3226066;108.3780388`), serta `ICBM` untuk mempercepat pemetaan di Google Search Lokal dan Google Maps.

### 5. Media Sosial & PWA (Open Graph & Twitter Cards)
- Kartu pratinjau resolusi tinggi (1200x630px) untuk WhatsApp, Facebook, dan Twitter/X.
- Dukungan PWA Web App Manifest (`/site.webmanifest`) dengan ikon maskable dan tema `#FF5E8A`.

---

## Kredensial Default Panel Admin

Tersedia dua akun superadmin terverifikasi yang siap digunakan setelah proses seeding basis data:

- **Akun Utama**:
  - Email: `admin@kosanputri.com`
  - Password: `password`
- **Akun Alternatif**:
  - Email: `admin@kostputriibuidah.com`
  - Password: `password`

*Kredensial dapat diperbarui sewaktu-waktu melalui menu pengaturan akun di panel admin.*

---

## Standarisasi Pengujian Otomatis

Proyek ini dilengkapi pengujian otomatis menyeluruh untuk memastikan keandalan rute publik, integritas data seeder, keamanan panel admin, fungsionalitas asisten Tanya Kost, pembatasan guardrail, dan akurasi informasi lokasi.

Jalankan pengujian dengan perintah:

```bash
php artisan test
```

Seluruh 16 pengujian fitur (*feature tests*) dan unit dengan 60 *assertions* telah terverifikasi lulus secara penuh (100% Passed).

---

## Informasi Operasional & Lokasi Resmi

- **Nama Properti**: Kost Putri Ibu Idah
- **Segmentasi Hunian**: Mahasiswi dan Karyawati Putri
- **Nomor Kontak Resmi (WhatsApp)**: `0813-3925-9179` (`081339259179`)
- **Alamat Resmi Lengkap**: Jalan K. H. Zakaria No. 82, RT. 3/RW. 14, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271
- **Titik Koordinat Geografis**: Latitude `-7.3226066`, Longitude `108.3780388`
- **Google Place ID**: `0x8b96d290aad1c3ab:0x25e81025801d51c9`
- **Tautan Navigasi Google Maps**: [Buka di Google Maps](https://maps.app.goo.gl/SjebDzqDyygXVm3V6)
- **Ketentuan Jam Malam**: Gerbang utama ditutup dan dikunci maksimal pukul 22.00 WIB
- **Kebijakan Survey**: Survey fisik ke lokasi wajib membuat janji temu terlebih dahulu melalui WhatsApp resmi pemilik kos demi menjaga privasi dan keamanan penghuni.
