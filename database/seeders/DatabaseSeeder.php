<?php

namespace Database\Seeders;

use App\Models\BusinessSetting;
use App\Models\Facility;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HouseRule;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with verified Kost Putri Ibu Idah data.
     */
    public function run(): void
    {
        // 1. Admin Users for Filament CMS
        User::updateOrCreate(
            ['email' => 'admin@kosanputri.com'],
            [
                'name' => 'Admin Kost Ibu Idah',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'admin@kostputriibuidah.com'],
            [
                'name' => 'Admin Kost Ibu Idah',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Business Settings
        BusinessSetting::updateOrCreate(
            ['id' => 1],
            [
                'business_name' => 'Kost Putri Ibu Idah',
                'short_name' => 'Kost Ibu Idah',
                'tagline' => 'Tempat tinggal nyaman untuk putri, dengan fasilitas yang praktis untuk kebutuhan sehari-hari.',
                'description' => 'Kos khusus putri dengan kasur, Wi-Fi, listrik dan air termasuk, serta pilihan kamar mandi dalam maupun sharing.',
                'about_text' => 'Kost Putri Ibu Idah merupakan tempat tinggal khusus putri yang mengutamakan kenyamanan dan kepraktisan untuk mahasiswa maupun pekerja. Dengan fasilitas yang telah tersedia serta listrik dan air yang sudah termasuk dalam biaya kos, penghuni dapat tinggal dengan lebih praktis untuk menjalani aktivitas sehari-hari.',
                'trust_line' => 'Kos Putri • Maks. 2 Orang/Kamar • Listrik & Air Termasuk',
                'max_occupants' => 2,
                'whatsapp_number' => '081339259179',
                'whatsapp_formatted' => '0813-3925-9179',
                'address' => 'Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
                'latitude' => '-7.3226066',
                'longitude' => '108.3780388',
                'city_district' => 'Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271',
                'location_landmark' => 'Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis. Hubungi Ibu Idah untuk petunjuk arah detail.',
                'parking_info' => 'Tersedia garasi motor di dalam area kos khusus bagi penghuni.',
                'survey_policy_note' => 'Demi privasi dan keamanan penghuni, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp.',
                'google_maps_url' => 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6',
                'google_place_id' => '0x8b96d290aad1c3ab:0x25e81025801d51c9',
                'google_maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126632.90504739172!2d108.27803875896687!3d-7.322606637159948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b96d290aad1c3ab%3A0x25e81025801d51c9!2sKosan%20Putri%20Ibu%20Idah!5e0!3m2!1sid!2sid!4v1787967398353!5m2!1sid!2sid',
                'gate_closing_time' => '22.00 WIB',
                'seo_title' => 'Kost Putri Ibu Idah | Kos Putri Nyaman & Praktis',
                'seo_description' => 'Tempat tinggal nyaman untuk putri dengan fasilitas kasur, Wi-Fi, listrik dan air termasuk, serta pilihan kamar mandi dalam maupun sharing.',
            ]
        );

        // 3. Verified Facilities
        $facilitiesData = [
            [
                'name' => 'Kasur',
                'description' => 'Kasur sudah tersedia di setiap kamar.',
                'icon' => 'bed',
                'is_included' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Wi-Fi',
                'description' => 'Wi-Fi tersedia untuk mendukung kebutuhan belajar, bekerja, dan aktivitas sehari-hari.',
                'icon' => 'wifi',
                'is_included' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Listrik',
                'description' => 'Listrik sudah termasuk dalam biaya kos.',
                'icon' => 'zap',
                'is_included' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Air',
                'description' => 'Air sudah termasuk dalam biaya kos.',
                'icon' => 'droplet',
                'is_included' => true,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Kamar Mandi',
                'description' => 'Tersedia pilihan kamar dengan kamar mandi dalam maupun kamar mandi sharing.',
                'icon' => 'bath',
                'is_included' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Sirkulasi & Jendela',
                'description' => 'Setiap kamar memiliki jendela dan ventilasi untuk pencahayaan alami serta sirkulasi udara yang segar.',
                'icon' => 'wind',
                'is_included' => true,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Dapur Sharing',
                'description' => 'Dapur bersama dapat digunakan oleh penghuni.',
                'icon' => 'utensils',
                'is_included' => false,
                'is_active' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Area Jemur',
                'description' => 'Area jemur pakaian tersedia untuk digunakan bersama.',
                'icon' => 'sun',
                'is_included' => false,
                'is_active' => true,
                'sort_order' => 8,
            ],
            [
                'name' => 'Garasi Motor',
                'description' => 'Garasi motor tersedia bagi penghuni.',
                'icon' => 'bike',
                'is_included' => false,
                'is_active' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Keamanan / Gerbang',
                'description' => 'Gerbang kos dikunci maksimal pukul 22.00 WIB.',
                'icon' => 'lock',
                'is_included' => false,
                'is_active' => true,
                'sort_order' => 10,
            ],
        ];

        $createdFacilities = [];
        foreach ($facilitiesData as $fData) {
            $createdFacilities[$fData['name']] = Facility::updateOrCreate(
                ['name' => $fData['name']],
                $fData
            );
        }

        // 4. Verified Room Types
        $room1 = Room::updateOrCreate(
            ['slug' => 'kamar-mandi-dalam'],
            [
                'name' => 'Kamar dengan Kamar Mandi Dalam',
                'short_description' => 'Pilihan kamar privat dengan kamar mandi di dalam kamar untuk privasi dan kenyamanan lebih.',
                'description' => 'Kamar dengan fasilitas kamar mandi pribadi di dalam kamar, kasur yang nyaman, koneksi Wi-Fi, serta biaya listrik dan air yang sudah termasuk dalam sewa bulanan. Didesain khusus untuk mahasiswi dan karyawati yang mengutamakan privasi dan kepraktisan.',
                'price' => null,
                'price_label' => 'Hubungi untuk informasi harga',
                'capacity' => 2,
                'bathroom_type' => 'Kamar Mandi Dalam',
                'wifi' => true,
                'electricity_included' => true,
                'water_included' => true,
                'availability_status' => 'Hubungi untuk ketersediaan',
                'is_active' => true,
                'sort_order' => 1,
                'notes' => 'Cocok bagi yang menginginkan kepraktisan dan privasi ekstra.',
            ]
        );

        RoomImage::updateOrCreate(
            ['room_id' => $room1->id, 'image_path' => 'rooms/kamar-mandi-dalam.svg'],
            [
                'caption' => 'Foto Kamar dengan Kamar Mandi Dalam',
                'alt_text' => 'Foto Kamar dengan Kamar Mandi Dalam Kost Putri Ibu Idah',
                'is_primary' => true,
                'sort_order' => 1,
            ]
        );

        $room2 = Room::updateOrCreate(
            ['slug' => 'kamar-mandi-sharing'],
            [
                'name' => 'Kamar dengan Kamar Mandi Sharing',
                'short_description' => 'Pilihan kamar nyaman dengan akses kamar mandi luar yang digunakan bersama penghuni lainnya.',
                'description' => 'Kamar tidur bersih dilengkapi kasur, Wi-Fi, serta listrik dan air sudah termasuk. Akses fasilitas kamar mandi luar/sharing yang dijaga kebersihannya secara rutin oleh penghuni kos.',
                'price' => null,
                'price_label' => 'Hubungi untuk informasi harga',
                'capacity' => 2,
                'bathroom_type' => 'Kamar Mandi Sharing',
                'wifi' => true,
                'electricity_included' => true,
                'water_included' => true,
                'availability_status' => 'Hubungi untuk ketersediaan',
                'is_active' => true,
                'sort_order' => 2,
                'notes' => 'Fasilitas kamar mandi sharing dijaga kebersihan dan kenyamanannya secara bersama.',
            ]
        );

        RoomImage::updateOrCreate(
            ['room_id' => $room2->id, 'image_path' => 'rooms/kamar-mandi-sharing.svg'],
            [
                'caption' => 'Foto Kamar dengan Kamar Mandi Sharing',
                'alt_text' => 'Foto Kamar dengan Kamar Mandi Sharing Kost Putri Ibu Idah',
                'is_primary' => true,
                'sort_order' => 1,
            ]
        );

        // Attach facilities to rooms
        $facilityIds = Facility::pluck('id')->toArray();
        $room1->facilities()->sync($facilityIds);
        $room2->facilities()->sync($facilityIds);

        // 5. Verified Gallery Items
        $galleryData = [
            [
                'title' => 'Tampilan Kamar',
                'category' => 'Kamar',
                'image_path' => 'gallery/kamar-1.svg',
                'alt_text' => 'Suasana kamar Kost Putri Ibu Idah',
                'caption' => 'Kamar tidur bersih dilengkapi kasur dan sirkulasi udara baik.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Kamar Mandi Dalam',
                'category' => 'Kamar Mandi',
                'image_path' => 'gallery/kamar-mandi.svg',
                'alt_text' => 'Kamar mandi di Kost Putri Ibu Idah',
                'caption' => 'Kamar mandi bersih dengan sanitasi terawat.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Dapur Bersama',
                'category' => 'Area Bersama',
                'image_path' => 'gallery/dapur.svg',
                'alt_text' => 'Dapur bersama Kost Putri Ibu Idah',
                'caption' => 'Dapur sharing untuk memasak praktis sehari-hari.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Area Jemur Pakaian',
                'category' => 'Area Bersama',
                'image_path' => 'gallery/jemuran.svg',
                'alt_text' => 'Area jemur pakaian bersama',
                'caption' => 'Area jemur pakaian yang terlindung dan terkena sinar matahari.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Garasi Motor',
                'category' => 'Fasilitas',
                'image_path' => 'gallery/garasi.svg',
                'alt_text' => 'Garasi motor Kost Putri Ibu Idah',
                'caption' => 'Area parkir motor khusus penghuni di dalam area kos.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Area Depan & Gerbang',
                'category' => 'Eksterior',
                'image_path' => 'gallery/eksterior.svg',
                'alt_text' => 'Tampak depan dan gerbang Kost Putri Ibu Idah',
                'caption' => 'Gerbang utama tertutup yang dikunci maksimal pukul 22.00 WIB.',
                'sort_order' => 6,
            ],
        ];

        foreach ($galleryData as $gData) {
            Gallery::updateOrCreate(
                ['title' => $gData['title']],
                $gData
            );
        }

        // 6. Verified House Rules (7 Rules)
        $rulesData = [
            ['title' => 'Khusus Putri', 'description' => 'Kost diperuntukkan khusus bagi mahasiswi dan karyawati putri.', 'sort_order' => 1],
            ['title' => 'Maksimal 2 Orang per Kamar', 'description' => 'Setiap kamar dihuni maksimal oleh 2 orang penghuni.', 'sort_order' => 2],
            ['title' => 'Menjaga Kebersihan Bersama', 'description' => 'Penghuni wajib menjaga kebersihan kamar dan area fasilitas bersama.', 'sort_order' => 3],
            ['title' => 'Menjaga Ketenangan Lingkungan Kos', 'description' => 'Menjaga kenyamanan dan ketenangan agar suasana kos tetap kondusif.', 'sort_order' => 4],
            ['title' => 'Dapur & Area Jemur Digunakan Bersama', 'description' => 'Menggunakan fasilitas bersama secara tertib dan merapikan kembali setelah digunakan.', 'sort_order' => 5],
            ['title' => 'Kendaraan Ditempatkan di Area yang Disediakan', 'description' => 'Sepeda motor diparkir dengan rapi di dalam garasi/area parkir.', 'sort_order' => 6],
            ['title' => 'Gerbang Dikunci Maksimal Pukul 22.00 WIB', 'description' => 'Untuk keamanan bersama, gerbang utama ditutup dan dikunci maksimal jam 22.00 WIB.', 'sort_order' => 7],
        ];

        foreach ($rulesData as $rData) {
            HouseRule::updateOrCreate(
                ['title' => $rData['title']],
                $rData
            );
        }

        // 7. Verified FAQ (10 FAQs)
        $faqsData = [
            [
                'question' => 'Apakah kos ini khusus putri?',
                'answer' => 'Ya, Kost Putri Ibu Idah dikhususkan secara eksklusif bagi mahasiswi dan karyawati putri. Lingkungan hunian dirancang aman, tertib, dan nyaman khusus wanita demi menjaga privasi dan ketenangan seluruh penghuni.',
                'sort_order' => 1,
            ],
            [
                'question' => 'Berapa orang maksimal dalam satu kamar?',
                'answer' => 'Setiap kamar dapat dihuni sendiri (1 orang) maupun berdua (maksimal 2 orang per kamar). Kapasitas dibatasi agar sirkulasi udara dan ruang gerak di dalam kamar tetap luas, nyaman, dan tidak berdesakan.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Apakah listrik termasuk?',
                'answer' => 'Ya, biaya listrik sudah termasuk (all-in) dalam harga sewa bulanan, sehingga penghuni tidak perlu repot membeli token listrik tambahan. Penghuni diperbolehkan membawa peralatan elektronik standar seperti laptop, smartphone, rice cooker, setrika, dan kipas angin.',
                'sort_order' => 3,
            ],
            [
                'question' => 'Apakah air termasuk?',
                'answer' => 'Ya, penggunaan air harian sudah termasuk dalam biaya sewa kos. Pasokan air bersih, lancar, dan jernih siap digunakan setiap saat untuk kebutuhan mandi, mencuci pakaian di kamar mandi, maupun memasak di dapur.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Apakah tersedia Wi-Fi?',
                'answer' => 'Ya, tersedia koneksi internet Wi-Fi gratis berkecepatan stabil yang dapat diakses oleh seluruh penghuni untuk mendukung kegiatan belajar kuliah online, mengerjakan tugas, bekerja, maupun hiburan streaming.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Apakah ada kamar mandi dalam?',
                'answer' => 'Ya, tersedia 2 pilihan tipe kamar: (1) Tipe Kamar Mandi Dalam untuk Anda yang mengutamakan kepraktisan dan privasi penuh, serta (2) Tipe Kamar Mandi Luar (Sharing) yang bersih, luas, dan terawat bersama.',
                'sort_order' => 6,
            ],
            [
                'question' => 'Apakah tersedia dapur?',
                'answer' => 'Ya, tersedia fasilitas Dapur Bersama (sharing) yang dilengkapi area memasak dan wastafel cuci piring. Fasilitas ini dapat digunakan oleh seluruh penghuni untuk membuat air hangat, mie instan, maupun memasak makanan harian secara mandiri dan tertib.',
                'sort_order' => 7,
            ],
            [
                'question' => 'Apakah tersedia tempat jemur?',
                'answer' => 'Ya, penghuni dapat mencuci pakaian di kamar mandi yang tersedia dengan pasokan air bersih yang melimpah. Setelah dicuci, pakaian dapat dijemur di Area Jemur Pakaian bersama yang terlindung dan mendapatkan sinar matahari yang cukup agar cepat kering.',
                'sort_order' => 8,
            ],
            [
                'question' => 'Apakah tersedia parkir motor?',
                'answer' => 'Ya, tersedia garasi parkir motor khusus penghuni di dalam lingkungan kos. Area parkir aman, terlindung dari cuaca panas dan hujan, serta berada di balik gerbang utama yang terkunci rapat pada malam hari.',
                'sort_order' => 9,
            ],
            [
                'question' => 'Jam berapa gerbang dikunci?',
                'answer' => 'Demi menjaga keamanan aset kendaraan dan ketenangan istirahat seluruh penghuni, gerbang utama kos dikunci maksimal pukul 22.00 WIB. Bagi penghuni yang memiliki jadwal lembur kerja atau tugas kuliah malam, kepulangan tetap diperbolehkan dengan konfirmasi dan izin terlebih dahulu ke Ibu Idah.',
                'sort_order' => 10,
            ],
        ];

        foreach ($faqsData as $faqItem) {
            Faq::updateOrCreate(
                ['sort_order' => $faqItem['sort_order']],
                $faqItem
            );
        }
    }
}
