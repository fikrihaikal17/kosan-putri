<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Business Profile
    |--------------------------------------------------------------------------
    | Informasi resmi bisnis Kost Putri Ibu Idah.
    | Semua data terpusat dan dapat diperbarui dari file konfigurasi ini.
    */
    'business' => [
        'name' => 'Kost Putri Ibu Idah',
        'short_name' => 'Kost Ibu Idah',
        'type' => 'Kos Khusus Putri',
        'tagline' => 'Tempat tinggal nyaman untuk putri, dengan fasilitas yang praktis untuk kebutuhan sehari-hari.',
        'description' => 'Kos khusus putri dengan kasur, Wi-Fi, listrik dan air termasuk, serta pilihan kamar mandi dalam maupun sharing.',
        'about_text' => 'Kost Putri Ibu Idah merupakan tempat tinggal khusus putri yang mengutamakan kenyamanan dan kepraktisan untuk mahasiswa maupun pekerja. Dengan fasilitas yang telah tersedia serta listrik dan air yang sudah termasuk dalam biaya kos, penghuni dapat tinggal dengan lebih praktis untuk menjalani aktivitas sehari-hari.',
        'trust_line' => 'Kos Putri • Maks. 2 Orang/Kamar • Listrik & Air Termasuk',
        'max_occupants' => 2,
    ],

    /*
    |--------------------------------------------------------------------------
    | Contact & Location
    |--------------------------------------------------------------------------
    | Data kontak dan lokasi kos. Nilai default menggunakan placeholder yang jelas
    | sampai informasi resmi disediakan oleh pemilik.
    */
    'contact' => [
        'whatsapp_number' => env('WHATSAPP_NUMBER', '081339259179'),
        'whatsapp_formatted' => env('WHATSAPP_FORMATTED', '0813-3925-9179'),
        'address' => env('KOST_ADDRESS', 'Jalan K. H. Zakaria No.82, RT.3/RW.14, Ds. Dewasari, Cijeungjing, Kab. Ciamis, Jawa Barat, 46271'),
        'maps_url' => env('GOOGLE_MAPS_URL', 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6'),
        'maps_embed_url' => env('GOOGLE_MAPS_EMBED_URL', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126632.90504739172!2d108.27803875896687!3d-7.322606637159948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8b96d290aad1c3ab%3A0x25e81025801d51c9!2sKosan%20Putri%20Ibu%20Idah!5e0!3m2!1sid!2sid!4v1787967398353!5m2!1sid!2sid'),
        'default_wa_message' => 'Halo Ibu Idah, saya melihat website Kost Putri Ibu Idah. Saya ingin menanyakan informasi dan ketersediaan kamar.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Quick Highlights / Trust Indicators
    |--------------------------------------------------------------------------
    */
    'highlights' => [
        [
            'title' => 'Kos Khusus Putri',
            'desc' => 'Lingkungan aman dan tenang khusus penghuni wanita',
            'icon' => 'user-check',
        ],
        [
            'title' => 'Maks. 2 Orang/Kamar',
            'desc' => 'Kapasitas maksimal 2 orang per kamar untuk kenyamanan',
            'icon' => 'users',
        ],
        [
            'title' => 'Wi-Fi Tersedia',
            'desc' => 'Koneksi internet untuk kebutuhan belajar dan bekerja',
            'icon' => 'wifi',
        ],
        [
            'title' => 'Listrik Termasuk',
            'desc' => 'Biaya listrik sudah termasuk dalam tagihan bulanan',
            'icon' => 'zap',
        ],
        [
            'title' => 'Air Termasuk',
            'desc' => 'Penggunaan air sudah termasuk dalam biaya kos',
            'icon' => 'droplet',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Room Types
    |--------------------------------------------------------------------------
    | Tipe kamar terverifikasi. Informasi harga dan ketersediaan menggunakan placeholder.
    */
    'rooms' => [
        [
            'id' => 'kamar-mandi-dalam',
            'slug' => 'kamar-mandi-dalam',
            'name' => 'Kamar dengan Kamar Mandi Dalam',
            'short_desc' => 'Pilihan kamar privat dengan kamar mandi di dalam kamar untuk privasi dan kenyamanan lebih.',
            'bathroom_type' => 'Kamar Mandi Pribadi (Dalam)',
            'capacity' => 'Maksimal 2 Orang',
            'price_label' => 'Hubungi untuk informasi harga',
            'price_placeholder' => '[HARGA KAMAR]',
            'availability_label' => 'Tanyakan Ketersediaan',
            'is_available_verified' => false,
            'image' => '/images/rooms/kamar-mandi-dalam.svg',
            'image_alt' => 'Foto Kamar dengan Kamar Mandi Dalam Kost Putri Ibu Idah',
            'facilities' => [
                'Kasur',
                'Wi-Fi',
                'Kamar mandi pribadi',
                'Listrik termasuk',
                'Air termasuk',
                'Maksimal 2 orang',
            ],
            'notes' => 'Cocok bagi yang menginginkan kepraktisan dan privasi ekstra.',
            'wa_message' => 'Halo Ibu Idah, saya tertarik dengan kamar dengan kamar mandi dalam di Kost Putri Ibu Idah. Apakah masih tersedia dan berapa informasinya?',
        ],
        [
            'id' => 'kamar-mandi-sharing',
            'slug' => 'kamar-mandi-sharing',
            'name' => 'Kamar dengan Kamar Mandi Sharing',
            'short_desc' => 'Pilihan kamar nyaman dengan akses kamar mandi luar yang digunakan bersama penghuni lainnya.',
            'bathroom_type' => 'Kamar Mandi Sharing (Luar)',
            'capacity' => 'Maksimal 2 Orang',
            'price_label' => 'Hubungi untuk informasi harga',
            'price_placeholder' => '[HARGA KAMAR]',
            'availability_label' => 'Tanyakan Ketersediaan',
            'is_available_verified' => false,
            'image' => '/images/rooms/kamar-mandi-sharing.svg',
            'image_alt' => 'Foto Kamar dengan Kamar Mandi Sharing Kost Putri Ibu Idah',
            'facilities' => [
                'Kasur',
                'Wi-Fi',
                'Kamar mandi sharing',
                'Listrik termasuk',
                'Air termasuk',
                'Maksimal 2 orang',
            ],
            'notes' => 'Fasilitas kamar mandi sharing dijaga kebersihan dan kenyamanannya secara bersama.',
            'wa_message' => 'Halo Ibu Idah, saya tertarik dengan kamar dengan kamar mandi sharing di Kost Putri Ibu Idah. Apakah masih tersedia dan berapa informasinya?',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | What's Included (Biaya Termasuk vs Bersama)
    |--------------------------------------------------------------------------
    */
    'included_items' => [
        'in_rent' => [
            ['name' => 'Kasur', 'desc' => 'Kasur sudah disediakan di dalam kamar siap pakai'],
            ['name' => 'Wi-Fi', 'desc' => 'Akses internet untuk belajar, bekerja, dan hiburan'],
            ['name' => 'Listrik', 'desc' => 'Tagihan listrik sudah termasuk dalam biaya kos bulanan'],
            ['name' => 'Air', 'desc' => 'Penggunaan air harian sudah termasuk dalam biaya kos'],
        ],
        'shared' => [
            ['name' => 'Dapur Sharing', 'desc' => 'Dapur bersama untuk memasak kebutuhan sehari-hari'],
            ['name' => 'Area Jemur Sharing', 'desc' => 'Tempat menjemur pakaian khusus penghuni'],
            ['name' => 'Garasi Motor', 'desc' => 'Tempat parkir motor yang tertata rapi'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Facilities (9 Fasilitas Terverifikasi)
    |--------------------------------------------------------------------------
    */
    'facilities' => [
        [
            'number' => 1,
            'title' => 'Kasur',
            'description' => 'Kasur sudah tersedia di setiap kamar.',
            'icon' => 'bed',
        ],
        [
            'number' => 2,
            'title' => 'Wi-Fi',
            'description' => 'Wi-Fi tersedia untuk mendukung kebutuhan belajar, bekerja, dan aktivitas sehari-hari.',
            'icon' => 'wifi',
        ],
        [
            'number' => 3,
            'title' => 'Listrik',
            'description' => 'Listrik sudah termasuk dalam biaya kos.',
            'icon' => 'zap',
        ],
        [
            'number' => 4,
            'title' => 'Air',
            'description' => 'Air sudah termasuk dalam biaya kos.',
            'icon' => 'droplet',
        ],
        [
            'number' => 5,
            'title' => 'Kamar Mandi',
            'description' => 'Tersedia pilihan kamar dengan kamar mandi dalam maupun kamar mandi sharing.',
            'icon' => 'bath',
        ],
        [
            'number' => 6,
            'title' => 'Dapur Sharing',
            'description' => 'Dapur bersama dapat digunakan oleh penghuni.',
            'icon' => 'utensils',
        ],
        [
            'number' => 7,
            'title' => 'Area Jemur',
            'description' => 'Area jemur pakaian tersedia untuk digunakan bersama.',
            'icon' => 'sun',
        ],
        [
            'number' => 8,
            'title' => 'Garasi Motor',
            'description' => 'Garasi motor tersedia bagi penghuni.',
            'icon' => 'bike',
        ],
        [
            'number' => 9,
            'title' => 'Keamanan / Gerbang',
            'description' => 'Gerbang kos dikunci maksimal pukul 22.00 WIB.',
            'icon' => 'lock',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gallery (Suasana Kost)
    |--------------------------------------------------------------------------
    */
    'gallery' => [
        [
            'id' => 1,
            'title' => 'Tampilan Kamar',
            'category' => 'Kamar',
            'image' => '/images/gallery/kamar-1.svg',
            'alt' => 'Suasana kamar Kost Putri Ibu Idah',
            'caption' => 'Kamar tidur bersih dilengkapi kasur dan sirkulasi udara baik.',
        ],
        [
            'id' => 2,
            'title' => 'Kamar Mandi Dalam',
            'category' => 'Kamar Mandi',
            'image' => '/images/gallery/kamar-mandi.svg',
            'alt' => 'Kamar mandi di Kost Putri Ibu Idah',
            'caption' => 'Kamar mandi bersih dengan sanitasi terawat.',
        ],
        [
            'id' => 3,
            'title' => 'Dapur Bersama',
            'category' => 'Area Bersama',
            'image' => '/images/gallery/dapur.svg',
            'alt' => 'Dapur bersama Kost Putri Ibu Idah',
            'caption' => 'Dapur sharing untuk memasak praktis sehari-hari.',
        ],
        [
            'id' => 4,
            'title' => 'Area Jemur Pakaian',
            'category' => 'Area Bersama',
            'image' => '/images/gallery/jemuran.svg',
            'alt' => 'Area jemur pakaian bersama',
            'caption' => 'Area jemur pakaian yang terlindung dan terkena sinar matahari.',
        ],
        [
            'id' => 5,
            'title' => 'Garasi Motor',
            'category' => 'Fasilitas',
            'image' => '/images/gallery/garasi.svg',
            'alt' => 'Garasi motor Kost Putri Ibu Idah',
            'caption' => 'Area parkir motor khusus penghuni di dalam area kos.',
        ],
        [
            'id' => 6,
            'title' => 'Area Depan & Gerbang',
            'category' => 'Eksterior',
            'image' => '/images/gallery/eksterior.svg',
            'alt' => 'Tampak depan dan gerbang Kost Putri Ibu Idah',
            'caption' => 'Gerbang utama tertutup yang dikunci maksimal pukul 22.00 WIB.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | House Rules (7 Aturan Resmi)
    |--------------------------------------------------------------------------
    */
    'rules' => [
        [
            'number' => 1,
            'title' => 'Khusus Putri',
            'desc' => 'Kost diperuntukkan khusus bagi mahasiswi dan karyawati putri.',
        ],
        [
            'number' => 2,
            'title' => 'Maksimal 2 Orang per Kamar',
            'desc' => 'Setiap kamar dihuni maksimal oleh 2 orang penghuni.',
        ],
        [
            'number' => 3,
            'title' => 'Menjaga Kebersihan Bersama',
            'desc' => 'Penghuni wajib menjaga kebersihan kamar dan area fasilitas bersama.',
        ],
        [
            'number' => 4,
            'title' => 'Menjaga Ketenangan Lingkungan Kos',
            'desc' => 'Menjaga kenyamanan dan ketenangan agar suasana kos tetap kondusif.',
        ],
        [
            'number' => 5,
            'title' => 'Dapur & Area Jemur Digunakan Bersama',
            'desc' => 'Menggunakan fasilitas bersama secara tertib dan merapikan kembali setelah digunakan.',
        ],
        [
            'number' => 6,
            'title' => 'Kendaraan Ditempatkan di Area yang Disediakan',
            'desc' => 'Sepeda motor diparkir dengan rapi di dalam garasi/area parkir.',
        ],
        [
            'number' => 7,
            'title' => 'Gerbang Dikunci Maksimal Pukul 22.00 WIB',
            'desc' => 'Untuk keamanan bersama, gerbang utama ditutup dan dikunci maksimal jam 22.00 WIB.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Frequently Asked Questions (10 FAQ Terverifikasi)
    |--------------------------------------------------------------------------
    */
    'faq' => [
        [
            'question' => 'Apakah kos ini khusus putri?',
            'answer' => 'Ya, Kost Putri Ibu Idah diperuntukkan khusus bagi putri.',
        ],
        [
            'question' => 'Berapa orang maksimal dalam satu kamar?',
            'answer' => 'Maksimal 2 orang dalam satu kamar.',
        ],
        [
            'question' => 'Apakah listrik termasuk?',
            'answer' => 'Ya, listrik sudah termasuk dalam biaya kos.',
        ],
        [
            'question' => 'Apakah air termasuk?',
            'answer' => 'Ya, air sudah termasuk dalam biaya kos.',
        ],
        [
            'question' => 'Apakah tersedia Wi-Fi?',
            'answer' => 'Ya, tersedia Wi-Fi.',
        ],
        [
            'question' => 'Apakah ada kamar mandi dalam?',
            'answer' => 'Ada. Beberapa kamar memiliki kamar mandi pribadi di dalam kamar dan beberapa kamar menggunakan kamar mandi sharing.',
        ],
        [
            'question' => 'Apakah tersedia dapur?',
            'answer' => 'Ya, tersedia dapur bersama.',
        ],
        [
            'question' => 'Apakah tersedia tempat jemur?',
            'answer' => 'Ya, tersedia area jemur pakaian bersama.',
        ],
        [
            'question' => 'Apakah tersedia parkir motor?',
            'answer' => 'Ya, tersedia garasi motor untuk penghuni.',
        ],
        [
            'question' => 'Jam berapa gerbang dikunci?',
            'answer' => 'Gerbang dikunci maksimal pukul 22.00 WIB.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Knowledge Base for AI Tanya Kost
    |--------------------------------------------------------------------------
    | Data ini digunakan secara eksklusif oleh asisten AI Tanya Kost.
    | Asisten dilarang mengarang informasi di luar data ini.
    */
    'ai_knowledge_base' => [
        'name' => 'Kost Putri Ibu Idah',
        'type' => 'Kos khusus putri (hanya wanita)',
        'max_occupancy' => 'Maksimal 2 orang per kamar',
        'mattress' => 'Kasur sudah tersedia di dalam setiap kamar',
        'wifi' => 'Tersedia Wi-Fi untuk penghuni',
        'electricity' => 'Listrik sudah termasuk dalam biaya kos',
        'water' => 'Air sudah termasuk dalam biaya kos',
        'private_bathroom' => 'Tersedia kamar dengan kamar mandi pribadi (dalam)',
        'shared_bathroom' => 'Tersedia kamar dengan kamar mandi sharing (luar)',
        'kitchen' => 'Tersedia dapur bersama untuk memasak',
        'drying_area' => 'Tersedia area jemur pakaian bersama',
        'parking' => 'Tersedia garasi parkir motor untuk penghuni',
        'gate_time' => 'Gerbang dikunci maksimal pukul 22.00 WIB',
        'rules' => 'Khusus putri, maksimal 2 orang per kamar, menjaga kebersihan dan ketenangan bersama, parkir di tempat yang disediakan, gerbang dikunci maksimal 22.00 WIB.',
        'missing_info_notice' => 'Informasi tersebut belum tersedia di website. Silakan tanyakan langsung melalui WhatsApp ke Ibu Idah.',
    ],
];
