<!DOCTYPE html>
<html lang="id" class="scroll-smooth" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $siteDomain = 'https://kosanputri.kall.my.id';
    @endphp

    <!-- Primary SEO & Social Link Preview (Open Graph & Twitter Cards) -->
    <x-seo
        :title="trim($__env->yieldContent('title')) ?: null"
        :description="trim($__env->yieldContent('meta_description')) ?: null"
        :image="trim($__env->yieldContent('og_image')) ?: null"
        :url="trim($__env->yieldContent('canonical_url')) ?: null"
        :type="trim($__env->yieldContent('og_type')) ?: 'website'"
        :keywords="trim($__env->yieldContent('meta_keywords')) ?: null"
        :business="$business ?? []"
        :contact="$contact ?? []"
    />

    <!-- Favicon & Mobile Web App Manifest -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/svg+xml" href="/logo/logo.svg">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#FF5E8A">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Kost Ibu Idah">

    <!-- Fonts: Plus Jakarta Sans with non-blocking async load & display=swap -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800;900&display=swap" rel="stylesheet">
    </noscript>
    @stack('head')

    <!-- Styles and Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Comprehensive Schema.org Structured Data (LodgingBusiness & LocalBusiness) -->
    <script type="application/ld+json">
    {!! json_encode([
      '@context' => 'https://schema.org',
      '@graph' => [
        [
          '@type' => 'LodgingBusiness',
          '@id' => $siteDomain . '/#lodging',
          'name' => 'Kost Putri Ibu Idah',
          'alternateName' => [
            'Kosan Putri Ibu Idah',
            'Kost Putri Ibu Idah Ciamis',
            'Kos Khusus Putri Dewasari Cijeungjing',
          ],
          'description' => 'Kost khusus putri nyaman, aman, dan praktis di Ciamis. Dilengkapi kasur, Wi-Fi gratis, listrik dan air termasuk dalam biaya sewa, pilihan kamar mandi dalam maupun sharing, dapur bersama, garasi motor aman, dan sirkulasi udara segar.',
          'url' => $siteDomain,
          'logo' => $siteDomain . '/logo/logo.svg',
          'image' => [
            $siteDomain . '/images/gallery/eksterior.svg',
            $siteDomain . '/images/gallery/kamar-1.svg',
            $siteDomain . '/images/gallery/kamar-mandi.svg',
            $siteDomain . '/images/gallery/dapur.svg',
            $siteDomain . '/images/gallery/garasi.svg',
          ],
          'telephone' => '+6281339259179',
          'priceRange' => 'IDR 500.000 - 1.000.000',
          'currenciesAccepted' => 'IDR',
          'paymentAccepted' => 'Cash, Transfer Bank',
          'hasMap' => 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6',
          'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Jalan K. H. Zakaria No. 82, RT. 3/RW. 14',
            'addressLocality' => 'Dewasari, Cijeungjing',
            'addressRegion' => 'Kabupaten Ciamis, Jawa Barat',
            'postalCode' => '46271',
            'addressCountry' => 'ID',
          ],
          'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => -7.3226066,
            'longitude' => 108.3780388,
          ],
          'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '06:00',
            'closes' => '22:00',
          ],
          'amenityFeature' => [
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Kasur Siap Pakai', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Wi-Fi Berkecepatan Tinggi', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Listrik Termasuk Biaya Sewa', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Air Bersih Termasuk Biaya Sewa', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Pilihan Kamar Mandi Dalam', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Kamar Mandi Luar Bersih', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Dapur Bersama', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Area Jemur Pakaian', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Garasi Parkir Motor', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Sirkulasi Udara & Jendela', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Gerbang Keamanan Malam', 'value' => true],
          ],
          'audience' => [
            '@type' => 'Audience',
            'audienceType' => 'Mahasiswi dan Karyawati Putri',
          ],
        ],
        [
          '@type' => 'WebSite',
          '@id' => $siteDomain . '/#website',
          'url' => $siteDomain,
          'name' => 'Kost Putri Ibu Idah',
          'description' => 'Website Resmi Kost Putri Ibu Idah Ciamis',
          'publisher' => [
            '@id' => $siteDomain . '/#lodging',
          ],
          'inLanguage' => 'id-ID',
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    @stack('schema')
</head>
<body class="bg-brutal-warm text-brutal-black antialiased min-h-screen flex flex-col selection:bg-brutal-pink selection:text-brutal-black font-sans">

    <!-- Skip to Main Content (Accessibility) -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-brutal-pink focus:text-brutal-black focus:border-2 focus:border-brutal-black focus:font-bold focus:shadow-[4px_4px_0_#111111]">
        Langsung ke konten utama
    </a>

    <!-- Neo-Brutalist Sticky Navbar -->
    <header id="main-navbar" class="sticky top-0 z-40 bg-white border-b-2 border-brutal-black transition-all duration-200 py-3.5">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between" aria-label="Navigasi Utama">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group focus:outline-none" aria-label="Kost Putri Ibu Idah - Beranda">
                <div class="w-10 h-10 bg-brutal-pink border-2 border-brutal-black neo-shadow-xs flex items-center justify-center text-brutal-black font-black text-base group-hover:bg-brutal-yellow transition-colors">
                    KP
                </div>
                <div>
                    <span class="block text-lg sm:text-xl font-black text-brutal-black leading-tight tracking-tight uppercase">{{ $business['name'] ?? 'Kost Putri Ibu Idah' }}</span>
                    <span class="block text-[11px] text-brutal-darkgray font-extrabold uppercase tracking-wider">Kos Khusus Putri</span>
                </div>
            </a>

            <!-- Desktop Nav Items -->
            <div class="hidden lg:flex items-center gap-6 text-sm font-extrabold uppercase tracking-wide">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-brutal-yellow px-3 py-1 border-2 border-brutal-black neo-shadow-xs text-brutal-black' : 'hover:bg-brutal-pink-light px-3 py-1 rounded transition-colors text-brutal-black' }}">Beranda</a>
                <a href="{{ route('rooms.index') }}" class="{{ request()->routeIs('rooms.*') ? 'bg-brutal-yellow px-3 py-1 border-2 border-brutal-black neo-shadow-xs text-brutal-black' : 'hover:bg-brutal-pink-light px-3 py-1 rounded transition-colors text-brutal-black' }}">Kamar</a>
                <a href="{{ route('facilities.index') }}" class="{{ request()->routeIs('facilities.*') ? 'bg-brutal-yellow px-3 py-1 border-2 border-brutal-black neo-shadow-xs text-brutal-black' : 'hover:bg-brutal-pink-light px-3 py-1 rounded transition-colors text-brutal-black' }}">Fasilitas</a>
                <a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.*') ? 'bg-brutal-yellow px-3 py-1 border-2 border-brutal-black neo-shadow-xs text-brutal-black' : 'hover:bg-brutal-pink-light px-3 py-1 rounded transition-colors text-brutal-black' }}">Galeri</a>
                <a href="{{ route('location.index') }}" class="{{ request()->routeIs('location.*') ? 'bg-brutal-yellow px-3 py-1 border-2 border-brutal-black neo-shadow-xs text-brutal-black' : 'hover:bg-brutal-pink-light px-3 py-1 rounded transition-colors text-brutal-black' }}">Lokasi</a>
                <a href="{{ route('faq.index') }}" class="{{ request()->routeIs('faq.*') ? 'bg-brutal-yellow px-3 py-1 border-2 border-brutal-black neo-shadow-xs text-brutal-black' : 'hover:bg-brutal-pink-light px-3 py-1 rounded transition-colors text-brutal-black' }}">FAQ</a>
            </div>

            <!-- Primary Action CTA (Desktop) -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Tanya via WhatsApp</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center gap-2 lg:hidden">
                <button type="button" id="mobile-menu-toggle" aria-label="Buka menu navigasi" aria-expanded="false" class="p-2 border-2 border-brutal-black neo-shadow-xs bg-white text-brutal-black active:translate-x-0.5 active:translate-y-0.5 active:shadow-none">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Mobile Drawer Menu & Backdrop -->
    <div id="mobile-menu-backdrop" class="fixed inset-0 bg-brutal-black/70 z-50 hidden opacity-0 transition-opacity duration-200" aria-hidden="true"></div>
    <div id="mobile-menu-drawer" class="fixed top-0 right-0 bottom-0 w-4/5 max-w-sm bg-brutal-warm z-50 border-l-3 border-brutal-black shadow-2xl p-6 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between" role="dialog" aria-modal="true" aria-label="Menu Navigasi Mobile">
        <div class="space-y-6">
            <div class="flex items-center justify-between pb-4 border-b-2 border-brutal-black">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 bg-brutal-pink border-2 border-brutal-black text-brutal-black flex items-center justify-center font-black text-sm">
                        KP
                    </div>
                    <span class="font-extrabold text-brutal-black text-base uppercase">{{ $business['name'] ?? 'Kost Putri Ibu Idah' }}</span>
                </div>
                <button type="button" id="mobile-menu-close" aria-label="Tutup menu navigasi" class="p-1.5 border-2 border-brutal-black bg-white text-brutal-black">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <nav class="flex flex-col space-y-2.5 font-extrabold text-brutal-black text-sm uppercase">
                <a href="{{ route('home') }}" class="mobile-nav-link p-3 border-2 border-brutal-black {{ request()->routeIs('home') ? 'bg-brutal-yellow neo-shadow-xs' : 'bg-white' }}">Beranda</a>
                <a href="{{ route('rooms.index') }}" class="mobile-nav-link p-3 border-2 border-brutal-black {{ request()->routeIs('rooms.*') ? 'bg-brutal-yellow neo-shadow-xs' : 'bg-white' }}">Pilihan Kamar</a>
                <a href="{{ route('facilities.index') }}" class="mobile-nav-link p-3 border-2 border-brutal-black {{ request()->routeIs('facilities.*') ? 'bg-brutal-yellow neo-shadow-xs' : 'bg-white' }}">Fasilitas</a>
                <a href="{{ route('gallery.index') }}" class="mobile-nav-link p-3 border-2 border-brutal-black {{ request()->routeIs('gallery.*') ? 'bg-brutal-yellow neo-shadow-xs' : 'bg-white' }}">Galeri Kost</a>
                <a href="{{ route('location.index') }}" class="mobile-nav-link p-3 border-2 border-brutal-black {{ request()->routeIs('location.*') ? 'bg-brutal-yellow neo-shadow-xs' : 'bg-white' }}">Lokasi</a>
                <a href="{{ route('faq.index') }}" class="mobile-nav-link p-3 border-2 border-brutal-black {{ request()->routeIs('faq.*') ? 'bg-brutal-yellow neo-shadow-xs' : 'bg-white' }}">FAQ</a>
            </nav>
        </div>

        <div class="pt-6 border-t-2 border-brutal-black space-y-3">
            <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary w-full text-center">
                <i data-lucide="message-circle" class="w-4 h-4"></i>
                <span>Tanya via WhatsApp</span>
            </a>
            <p class="text-[11px] text-center font-bold text-brutal-darkgray uppercase">Khusus Mahasiswi & Karyawati Putri</p>
        </div>
    </div>

    <!-- Main Content Injection -->
    <main id="main-content" class="grow">
        @yield('content')
    </main>

    <!-- Neo-Brutalist Structured Footer -->
    <footer class="bg-brutal-black text-white pt-16 pb-24 sm:pb-12 border-t-3 border-brutal-black" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 pb-12 border-b-2 border-neutral-800">
                
                <!-- Business Identity -->
                <div class="md:col-span-5 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-brutal-pink text-brutal-black border-2 border-white font-black text-lg flex items-center justify-center neo-shadow-xs">
                            KP
                        </div>
                        <div>
                            <span class="text-xl font-black text-white block uppercase tracking-tight">{{ $business['name'] ?? 'Kost Putri Ibu Idah' }}</span>
                            <span class="text-xs text-brutal-yellow font-extrabold uppercase">Kos Khusus Putri</span>
                        </div>
                    </div>
                    <p class="text-sm text-neutral-300 leading-relaxed max-w-sm font-medium">
                        {{ $business['description'] ?? 'Kos putri yang nyaman, aman, dan praktis. Dilengkapi fasilitas kasur, Wi-Fi, listrik dan air termasuk, serta pilihan kamar mandi dalam maupun sharing.' }}
                    </p>
                    <div class="pt-2">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brutal-yellow text-brutal-black text-xs font-black border-2 border-white neo-shadow-xs uppercase">
                            Maks. {{ $business['max_occupants'] ?? 2 }} Orang per Kamar
                        </span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="md:col-span-3 space-y-3">
                    <p class="text-sm font-black text-white uppercase tracking-wider border-b-2 border-brutal-pink pb-1 inline-block" role="heading" aria-level="2">Halaman Website</p>
                    <ul class="space-y-1 text-sm text-neutral-300 font-bold">
                        <li><a href="{{ route('home') }}" class="block py-1 hover:text-brutal-pink transition-colors">Beranda</a></li>
                        <li><a href="{{ route('rooms.index') }}" class="block py-1 hover:text-brutal-pink transition-colors">Pilihan Kamar</a></li>
                        <li><a href="{{ route('facilities.index') }}" class="block py-1 hover:text-brutal-pink transition-colors">Fasilitas Lengkap</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="block py-1 hover:text-brutal-pink transition-colors">Galeri Kost</a></li>
                        <li><a href="{{ route('location.index') }}" class="block py-1 hover:text-brutal-pink transition-colors">Lokasi & Peta</a></li>
                        <li><a href="{{ route('faq.index') }}" class="block py-1 hover:text-brutal-pink transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact & Location Info -->
                <div class="md:col-span-4 space-y-3">
                    <p class="text-sm font-black text-white uppercase tracking-wider border-b-2 border-brutal-yellow pb-1 inline-block" role="heading" aria-level="2">Kontak & Lokasi</p>
                    <div class="space-y-3 text-sm text-neutral-300 font-medium">
                        <div class="grid grid-cols-[90px_1fr] gap-2.5 items-start">
                            <span class="text-brutal-pink font-extrabold uppercase">WhatsApp:</span>
                            <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="text-white hover:text-brutal-yellow underline font-bold">
                                {{ $contact['whatsapp_formatted'] ?? '[NOMOR WHATSAPP]' }}
                            </a>
                        </div>
                        <div class="grid grid-cols-[90px_1fr] gap-2.5 items-start">
                            <span class="text-brutal-pink font-extrabold uppercase">Alamat:</span>
                            <span class="leading-relaxed">{{ $contact['address'] ?? '[ALAMAT LENGKAP]' }}</span>
                        </div>
                        <div class="grid grid-cols-[90px_1fr] gap-2.5 items-start">
                            <span class="text-brutal-pink font-extrabold uppercase">Gerbang:</span>
                            <span class="font-bold text-white leading-relaxed">Dikunci maksimal pukul {{ $contact['gate_closing_time'] ?? '22.00 WIB' }}</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-neutral-400 gap-4 font-bold">
                <p>&copy; 2026 Kost Putri Ibu Idah. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Sticky Mobile Bottom CTA -->
    <div class="fixed bottom-0 left-0 right-0 z-30 p-3 bg-white border-t-2 border-brutal-black sm:hidden shadow-lg">
        <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary w-full text-center text-sm">
            <i data-lucide="message-circle" class="w-4 h-4"></i>
            <span>Tanya via WhatsApp</span>
        </a>
    </div>

    <!-- "Tanya Kost" Neo-Brutalist Floating Trigger & Chat Dialog -->
    <div class="fixed bottom-20 sm:bottom-6 right-4 sm:right-6 z-40">
        <!-- Floating Launcher Button -->
        <button type="button" id="tanya-kost-open-btn" class="neo-btn neo-btn-dark py-3 px-5 text-xs font-black shadow-[5px_5px_0_#111111] flex items-center gap-2" aria-label="Buka Asisten Tanya Kost">
            <i data-lucide="message-square-text" class="w-4 h-4 text-brutal-yellow"></i>
            <span>TANYA KOST</span>
        </button>

        <!-- Chat Widget Window -->
        <div id="tanya-kost-widget" class="hidden absolute bottom-14 right-0 w-85 sm:w-95 max-w-[calc(100vw-32px)] bg-white border-3 border-brutal-black neo-shadow-lg flex-col overflow-hidden text-brutal-black z-50 rounded-lg" style="background-color: #ffffff !important; border: 3px solid #111111 !important; box-shadow: 6px 6px 0px #111111 !important;">
            <!-- Chat Header -->
            <div class="bg-brutal-black text-white p-3.5 flex items-center justify-between border-b-2 border-brutal-black" style="background-color: #111111 !important; color: #ffffff !important;">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 bg-brutal-pink border-2 border-white flex items-center justify-center text-brutal-black text-xs font-black shadow-xs shrink-0" style="background-color: #FF5E8A !important; color: #111111 !important; border: 2px solid #ffffff !important; font-weight: 900 !important;">
                        KP
                    </div>
                    <div>
                        <p class="font-black text-sm text-white uppercase tracking-wide leading-tight" style="color: #ffffff !important; font-weight: 900 !important;">Tanya Kost Ibu Idah</p>
                        <p class="text-[11px] text-brutal-yellow font-extrabold" style="color: #FFE600 !important; font-weight: 800 !important;">Pusat Informasi & Tanya Jawab Cepat</p>
                    </div>
                </div>
                <button type="button" id="tanya-kost-close-btn" class="text-white hover:text-brutal-pink p-1 font-bold text-sm" style="color: #ffffff !important;" aria-label="Tutup Tanya Kost">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>

            <!-- Knowledge Disclaimer -->
            <div class="bg-brutal-yellow-light px-3 py-1.5 border-b-2 border-brutal-black text-[11px] text-brutal-black font-extrabold flex items-center gap-1.5 leading-tight" style="background-color: #FFFDE6 !important; color: #111111 !important;">
                <span class="text-brutal-pink font-black">⚡</span>
                <span style="color: #111111 !important; font-weight: 800 !important;">Respon instan seputar kamar, fasilitas, aturan & harga</span>
            </div>

            <!-- Chat Messages Container -->
            <div id="tanya-kost-messages" class="p-3.5 space-y-2.5 h-72 overflow-y-auto chat-scroll text-xs bg-brutal-warm" style="background-color: #FBF7EE !important;">
                <!-- Welcome Message from Assistant -->
                <div class="flex items-start gap-2">
                    <div class="w-7 h-7 bg-brutal-pink border-2 border-brutal-black text-brutal-black flex items-center justify-center text-[10px] font-black shrink-0" style="background-color: #FF5E8A !important; color: #111111 !important; font-weight: 900 !important; border: 2px solid #111111 !important;">KP</div>
                    <div class="bg-white text-brutal-black border-2 border-brutal-black p-2.5 text-xs leading-relaxed max-w-[85%] neo-shadow-xs" style="background-color: #ffffff !important; color: #111111 !important; border: 2px solid #111111 !important; box-shadow: 2px 2px 0 #111111 !important; word-break: break-word;"><p style="color: #111111 !important; font-weight: 600 !important; margin: 0; line-height: 1.55; text-align: justify; text-justify: inter-word;">Halo! Saya asisten informasi Kost Putri Ibu Idah. Ada yang ingin ditanyakan seputar pilihan kamar, fasilitas, aturan, atau lokasi?</p></div>
                </div>
            </div>

            <!-- Quick Suggestion Prompts -->
            <div class="p-2 bg-white border-t-2 border-brutal-black flex items-center gap-1.5 overflow-x-auto text-[11px]" style="background-color: #ffffff !important; border-top: 2px solid #111111 !important; scrollbar-width: none; -ms-overflow-style: none;">
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Listrik termasuk?
                </button>
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Kamar mandi dalam?
                </button>
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Maksimal orang?
                </button>
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Jam gerbang?
                </button>
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Dapur bersama?
                </button>
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Alamat lengkap?
                </button>
                <button type="button" class="tanya-kost-quick-prompt shrink-0 px-2.5 py-1 bg-brutal-warm hover:bg-brutal-pink text-brutal-black font-bold border-2 border-brutal-black neo-shadow-xs transition-colors" style="background-color: #FBF7EE; color: #111111;">
                    Cara survey?
                </button>
            </div>

            <!-- Chat Input Form -->
            <form id="tanya-kost-form" class="p-2 bg-white border-t-2 border-brutal-black flex items-end gap-1.5" style="background-color: #ffffff !important; border-top: 2px solid #111111 !important;">
                <textarea id="tanya-kost-input" rows="1" placeholder="Ketik pertanyaan... (Shift+Enter = baris baru, Enter = kirim)" class="grow bg-brutal-warm border-2 border-brutal-black px-2.5 py-2 text-xs font-semibold focus:outline-none focus:bg-white text-brutal-black resize-none max-h-24 overflow-y-auto leading-normal" style="background-color: #FBF7EE !important; color: #111111 !important; border: 2px solid #111111 !important; height: 36px; min-height: 36px;"></textarea>
                <button type="submit" class="neo-btn neo-btn-primary p-2 text-xs shrink-0 flex items-center justify-center" style="height: 36px; width: 36px;" aria-label="Kirim Pertanyaan">
                    <i data-lucide="send" class="w-3.5 h-3.5"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Gallery Lightbox Component (Neo-Brutalist Framed) -->
    <div id="gallery-lightbox" class="fixed inset-0 z-50 hidden flex-col items-center justify-center p-4 sm:p-6 bg-brutal-black/85 backdrop-blur-sm lightbox-backdrop" role="dialog" aria-modal="true" aria-label="Pratinjau Foto Galeri">
        <button type="button" id="lightbox-close" class="absolute top-5 right-5 text-white hover:text-brutal-pink p-2.5 bg-brutal-black border-2 border-white neo-shadow-xs z-20 font-bold cursor-pointer transition-transform hover:scale-105" aria-label="Tutup pratinjau">
            <i data-lucide="x" class="w-5 h-5"></i>
        </button>

        <button type="button" id="lightbox-prev" class="absolute left-4 sm:left-8 top-1/2 -translate-y-1/2 text-white hover:text-brutal-yellow p-3 bg-brutal-black border-2 border-white neo-shadow-xs z-20 font-bold cursor-pointer transition-transform hover:scale-105" aria-label="Foto sebelumnya">
            <i data-lucide="chevron-left" class="w-6 h-6"></i>
        </button>

        <button type="button" id="lightbox-next" class="absolute right-4 sm:right-8 top-1/2 -translate-y-1/2 text-white hover:text-brutal-yellow p-3 bg-brutal-black border-2 border-white neo-shadow-xs z-20 font-bold cursor-pointer transition-transform hover:scale-105" aria-label="Foto selanjutnya">
            <i data-lucide="chevron-right" class="w-6 h-6"></i>
        </button>

        <div class="max-w-3xl w-full flex flex-col items-center justify-center my-auto">
            <div class="relative w-full max-h-[70vh] flex items-center justify-center overflow-hidden bg-white border-3 border-brutal-black neo-shadow-lg p-2.5">
                <img id="lightbox-img" src="" alt="" class="max-h-[60vh] max-w-full w-auto h-auto object-contain border border-brutal-black">
                <div id="lightbox-placeholder" class="hidden py-24 text-center text-brutal-black">
                    <p class="text-base font-extrabold">Foto Properti Terverifikasi</p>
                </div>
            </div>
            <div class="mt-3.5 p-3.5 bg-white border-2 border-brutal-black neo-shadow-xs text-center text-brutal-black w-full">
                <p id="lightbox-title" class="font-black text-sm sm:text-base uppercase tracking-tight"></p>
                <p id="lightbox-caption" class="text-xs font-semibold text-brutal-darkgray mt-1 leading-relaxed"></p>
            </div>
        </div>
    </div>

</body>
</html>
