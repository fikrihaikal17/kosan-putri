@extends('layouts.app')

@section('title', 'Kost Putri Ibu Idah')
@section('meta_description', 'Kos khusus putri dengan kamar nyaman, Wi-Fi, listrik dan air termasuk, serta fasilitas bersama.')
@section('meta_keywords', 'kost putri ciamis, kosan putri ibu idah, kos putri ciamis, kost mahasiswi ciamis, sewa kos putri ciamis, kos putri dewasari cijeungjing, kost kamar mandi dalam ciamis')
@section('og_image', 'https://kosanputri.kall.my.id/images/og/og-default.png')
@section('canonical_url', 'https://kosanputri.kall.my.id/')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => $faq->map(fn($item) => [
        '@type' => 'Question',
        'name' => $item->question,
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => $item->answer,
        ],
    ])->values()->all(),
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')

<!-- ==========================================
     SECTION 1: NEO-BRUTALIST HERO SECTION
     ========================================== -->
<section class="relative bg-brutal-warm border-b-3 border-brutal-black py-16 sm:py-24" id="hero">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Text Content -->
            <div class="lg:col-span-7 space-y-6 text-left">
                
                <!-- Category Tag -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-brutal-pink text-brutal-black border-2 border-brutal-black neo-shadow-xs font-black text-xs uppercase tracking-wider">
                    <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                    <span>Kos Khusus Putri — Mahasiswi & Karyawati</span>
                </div>

                <!-- Main Business Headline -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-brutal-black leading-[1.08] tracking-tight uppercase">
                    {{ $business['name'] ?? 'Kost Putri Ibu Idah' }}
                </h1>

                <!-- Value Proposition Subheadline -->
                <p class="text-base sm:text-lg text-brutal-darkgray max-w-2xl leading-relaxed font-semibold">
                    {{ $business['tagline'] ?? 'Tempat tinggal nyaman untuk putri, dengan fasilitas yang praktis untuk kebutuhan sehari-hari.' }}
                </p>

                <!-- Core Facilities Highlights (Quick Checkmarks) -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2 text-xs sm:text-sm font-bold text-brutal-black">
                    <div class="flex items-center gap-2 p-2.5 bg-white border-2 border-brutal-black neo-shadow-xs">
                        <i data-lucide="check" class="w-4 h-4 text-brutal-black stroke-3"></i>
                        <span>Kasur Tersedia</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-white border-2 border-brutal-black neo-shadow-xs">
                        <i data-lucide="check" class="w-4 h-4 text-brutal-black stroke-3"></i>
                        <span>Wi-Fi Termasuk</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-white border-2 border-brutal-black neo-shadow-xs">
                        <i data-lucide="check" class="w-4 h-4 text-brutal-black stroke-3"></i>
                        <span>Listrik & Air Free</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-white border-2 border-brutal-black neo-shadow-xs">
                        <i data-lucide="check" class="w-4 h-4 text-brutal-black stroke-3"></i>
                        <span>KM Dalam/Sharing</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-white border-2 border-brutal-black neo-shadow-xs">
                        <i data-lucide="check" class="w-4 h-4 text-brutal-black stroke-3"></i>
                        <span>Dapur Bersama</span>
                    </div>
                    <div class="flex items-center gap-2 p-2.5 bg-white border-2 border-brutal-black neo-shadow-xs">
                        <i data-lucide="check" class="w-4 h-4 text-brutal-black stroke-3"></i>
                        <span>Garasi Motor</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-4">
                    <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary px-8 py-3.5 text-sm sm:text-base">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                        <span>Tanya Ketersediaan Kamar</span>
                    </a>
                    
                    <a href="#kamar" class="neo-btn neo-btn-secondary px-8 py-3.5 text-sm sm:text-base">
                        <span>Lihat Pilihan Kamar</span>
                        <i data-lucide="arrow-down" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Trust Micro-copy -->
                <p class="text-xs font-bold text-brutal-darkgray flex items-center gap-1.5">
                    <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                    <span>Lingkungan tenang & tertib • Gerbang dikunci maksimal pukul {{ $contact['gate_closing_time'] ?? '22.00 WIB' }}</span>
                </p>

            </div>

            <!-- Right Visual Frame (Neo-Brutalist Offset Frame) -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Main Framed Card -->
                    <div class="bg-white border-3 border-brutal-black neo-shadow-lg p-4 sm:p-5">
                        <div class="relative aspect-4/3 overflow-hidden bg-brutal-cream border-2 border-brutal-black mb-4">
                            <img src="{{ asset('images/rooms/kamar-mandi-dalam.svg') }}" alt="Tampilan Kamar Kost Putri Ibu Idah" width="600" height="450" fetchpriority="high" class="w-full h-full object-cover">
                            
                            <!-- Badges Overlay -->
                            <div class="absolute top-3 left-3">
                                <span class="bg-brutal-yellow text-brutal-black font-extrabold text-[11px] px-2.5 py-1 border-2 border-brutal-black neo-shadow-xs uppercase">
                                    Kamar Mandi Dalam
                                </span>
                            </div>
                            <div class="absolute bottom-3 right-3">
                                <span class="bg-white text-brutal-black font-extrabold text-[11px] px-2.5 py-1 border-2 border-brutal-black neo-shadow-xs uppercase">
                                    Maks. 2 Orang
                                </span>
                            </div>
                        </div>

                        <!-- Card Caption Info -->
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <h2 class="font-black text-lg text-brutal-black uppercase">Tipe KM Dalam</h2>
                                <span class="text-xs font-black bg-brutal-yellow px-2 py-0.5 border-2 border-brutal-black uppercase">Siap Huni</span>
                            </div>
                            <p class="text-xs font-semibold text-brutal-darkgray leading-relaxed">
                                Kasur, Wi-Fi, listrik, dan air sudah termasuk. Pilihan ideal untuk mahasiswi & pekerja.
                            </p>
                            <div class="pt-2 border-t-2 border-brutal-black flex items-center justify-between font-extrabold text-xs">
                                <span>Tersedia 2 Tipe Kamar</span>
                                <a href="#kamar" class="text-brutal-black hover:text-brutal-pink underline font-black uppercase flex items-center gap-1">
                                    <span>Lihat Semua</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Offset Floating Badge -->
                    <div class="hidden sm:flex absolute -bottom-5 -left-6 bg-brutal-yellow text-brutal-black p-3.5 border-3 border-brutal-black neo-shadow items-center gap-3">
                        <div class="w-8 h-8 bg-brutal-black text-white flex items-center justify-center font-black">
                            <i data-lucide="zap" class="w-5 h-5 text-brutal-yellow"></i>
                        </div>
                        <div>
                            <p class="text-xs font-black uppercase leading-tight">Listrik & Air Free</p>
                            <p class="text-[10px] font-bold">Tanpa biaya tambahan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 2: QUICK INFORMATION BLOCKS
     ========================================== -->
<section class="py-12 bg-white border-b-3 border-brutal-black" id="keunggulan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="p-5 bg-brutal-pink-light border-2 border-brutal-black neo-shadow flex items-start gap-4">
                <div class="w-11 h-11 bg-brutal-pink border-2 border-brutal-black flex items-center justify-center font-black shrink-0 neo-shadow-xs">
                    <i data-lucide="users" class="w-5 h-5 text-brutal-black"></i>
                </div>
                <div>
                    <h4 class="font-black text-brutal-black text-sm uppercase">Khusus Putri</h4>
                    <p class="text-xs font-semibold text-brutal-darkgray mt-1">Mahasiswi & karyawati.</p>
                </div>
            </div>

            <div class="p-5 bg-brutal-yellow-light border-2 border-brutal-black neo-shadow flex items-start gap-4">
                <div class="w-11 h-11 bg-brutal-yellow border-2 border-brutal-black flex items-center justify-center font-black shrink-0 neo-shadow-xs">
                    <i data-lucide="zap" class="w-5 h-5 text-brutal-black"></i>
                </div>
                <div>
                    <h4 class="font-black text-brutal-black text-sm uppercase">Listrik & Air Free</h4>
                    <p class="text-xs font-semibold text-brutal-darkgray mt-1">Sudah masuk biaya sewa.</p>
                </div>
            </div>

            <div class="p-5 bg-brutal-green-light border-2 border-brutal-black neo-shadow flex items-start gap-4">
                <div class="w-11 h-11 bg-brutal-green border-2 border-brutal-black flex items-center justify-center font-black shrink-0 neo-shadow-xs">
                    <i data-lucide="wifi" class="w-5 h-5 text-brutal-black"></i>
                </div>
                <div>
                    <h4 class="font-black text-brutal-black text-sm uppercase">Wi-Fi & Kasur</h4>
                    <p class="text-xs font-semibold text-brutal-darkgray mt-1">Fasilitas pokok siap pakai.</p>
                </div>
            </div>

            <div class="p-5 bg-brutal-blue-light border-2 border-brutal-black neo-shadow flex items-start gap-4">
                <div class="w-11 h-11 bg-brutal-blue border-2 border-brutal-black flex items-center justify-center font-black shrink-0 neo-shadow-xs">
                    <i data-lucide="shield-check" class="w-5 h-5 text-brutal-black"></i>
                </div>
                <div>
                    <h4 class="font-black text-brutal-black text-sm uppercase">Aman & Tertib</h4>
                    <p class="text-xs font-semibold text-brutal-darkgray mt-1">Gerbang kunci maks. {{ $contact['gate_closing_time'] ?? '22.00 WIB' }}.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 3: ABOUT / TENTANG KOST
     ========================================== -->
<section class="py-16 sm:py-24 bg-brutal-warm border-b-3 border-brutal-black" id="tentang">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-block px-3 py-1 bg-brutal-yellow border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                    Tentang Kost Kami
                </div>
                <h2 class="text-3xl sm:text-4xl font-black text-brutal-black leading-tight uppercase tracking-tight">
                    Tempat Tinggal Praktis & Nyaman Khusus Putri
                </h2>
                <div class="space-y-4 text-sm sm:text-base text-brutal-darkgray leading-relaxed font-semibold">
                    <p class="text-justify" style="text-align: justify; text-justify: inter-word;">
                        {{ $business['about_text'] ?? 'Kost Putri Ibu Idah merupakan tempat tinggal khusus putri yang mengutamakan kenyamanan dan kepraktisan untuk mahasiswa maupun pekerja.' }}
                    </p>
                    <p class="text-justify" style="text-align: justify; text-justify: inter-word;">
                        Dengan kasur yang sudah disediakan, koneksi Wi-Fi, serta biaya listrik dan air yang sudah termasuk dalam sewa, penghuni dapat beraktivitas dengan nyaman tanpa terbebani biaya terpisah.
                    </p>
                </div>

                <div class="pt-2">
                    <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-secondary font-bold">
                        <span>Hubungi Ibu Idah untuk Jadwal Survey</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="grid grid-cols-2 gap-4 items-stretch">
                    <div class="bg-white border-3 border-brutal-black neo-shadow p-2.5 flex flex-col justify-between">
                        <img src="{{ asset('images/gallery/kamar-1.svg') }}" alt="Suasana Kamar" class="w-full aspect-square object-cover border border-brutal-black">
                        <p class="text-[11px] font-black text-center mt-2.5 uppercase text-brutal-black tracking-wide">Kamar Bersih</p>
                    </div>
                    <div class="bg-white border-3 border-brutal-black neo-shadow p-2.5 flex flex-col justify-between">
                        <img src="{{ asset('images/gallery/dapur.svg') }}" alt="Dapur Bersama" class="w-full aspect-square object-cover border border-brutal-black">
                        <p class="text-[11px] font-black text-center mt-2.5 uppercase text-brutal-black tracking-wide">Dapur Sharing</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 4: ROOM TYPES (PILIKAN KAMAR)
     ========================================== -->
<section class="py-16 sm:py-24 bg-white border-b-3 border-brutal-black" id="kamar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Heading -->
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
            <span class="inline-block px-3 py-1 bg-brutal-pink border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                Pilihan Tipe Kamar
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-brutal-black uppercase tracking-tight">
                Pilihan Kamar Siap Huni
            </h2>
            <p class="text-sm sm:text-base text-brutal-darkgray font-semibold leading-relaxed">
                Tersedia 2 pilihan tipe kamar. Setiap kamar dapat dihuni maksimal 2 orang.
            </p>
        </div>

        <!-- Room Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @foreach($rooms as $room)
                <div class="bg-brutal-warm border-3 border-brutal-black neo-shadow-lg p-5 flex flex-col justify-between">
                    <div>
                        <!-- Room Image -->
                        <div class="relative aspect-16/10 bg-brutal-cream border-2 border-brutal-black overflow-hidden mb-5">
                            <img src="{{ $room->featured_image_url }}" alt="{{ $room->name }}" class="w-full h-full object-cover">
                            <div class="absolute top-3 left-3">
                                <span class="bg-brutal-yellow text-brutal-black font-extrabold text-xs px-3 py-1 border-2 border-brutal-black neo-shadow-xs uppercase">
                                    {{ $room->bathroom_type }}
                                </span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="bg-white text-brutal-black font-extrabold text-[11px] px-2.5 py-1 border-2 border-brutal-black neo-shadow-xs uppercase">
                                    Maks. {{ $room->capacity }} Orang
                                </span>
                            </div>
                        </div>

                        <!-- Room Content -->
                        <div class="space-y-4">
                            <h3 class="text-xl sm:text-2xl font-black text-brutal-black uppercase tracking-tight text-center">
                                {{ $room->name }}
                            </h3>
                            <p class="text-xs sm:text-sm font-semibold text-brutal-darkgray leading-relaxed">
                                {{ $room->short_description ?: $room->description }}
                            </p>

                            <!-- Amenities List -->
                            <div class="pt-3 border-t-2 border-brutal-black grid grid-cols-2 gap-2 text-xs font-bold text-brutal-black">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-brutal-pink stroke-3"></i>
                                    <span>Kasur Tersedia</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-brutal-pink stroke-3"></i>
                                    <span>Wi-Fi Termasuk</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-brutal-pink stroke-3"></i>
                                    <span>Listrik Free</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="check" class="w-4 h-4 text-brutal-pink stroke-3"></i>
                                    <span>Air Free</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Room Actions -->
                    <div class="pt-6 space-y-4">
                        <div class="p-3.5 bg-white border-2 border-brutal-black neo-shadow-xs flex items-center justify-between">
                            <div>
                                <span class="block text-[10px] font-extrabold text-brutal-darkgray uppercase">Tarif Sewa</span>
                                <span class="font-black text-sm text-brutal-black">{{ $room->formatted_price }}</span>
                            </div>
                            <span class="px-2.5 py-1 bg-brutal-green text-brutal-black font-extrabold text-[11px] border border-brutal-black uppercase">
                                {{ $room->availability_status }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <a href="{{ route('rooms.detail', $room->slug) }}" class="neo-btn neo-btn-secondary text-xs w-full text-center">
                                Detail Kamar
                            </a>
                            <a href="{{ $defaultWaUrl ?? 'https://wa.me/' }}?text={{ urlencode('Halo Ibu Idah, saya tertarik dengan tipe kamar ' . $room->name . '. Apakah saat ini masih tersedia?') }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary text-xs w-full text-center">
                                <i data-lucide="message-circle" class="w-3.5 h-3.5"></i>
                                <span>Tanya via WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('rooms.index') }}" class="neo-btn neo-btn-secondary text-xs uppercase">
                <span>Lihat Halaman Kamar Lengkap</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

    </div>
</section>

<!-- ==========================================
     SECTION 5: INCLUDED UTILITIES & BILLING
     ========================================== -->
<section class="py-16 bg-brutal-yellow border-b-3 border-brutal-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border-3 border-brutal-black neo-shadow-lg p-8 sm:p-12 text-center max-w-4xl mx-auto space-y-6">
            <span class="inline-block px-3 py-1 bg-brutal-black text-white text-xs font-black uppercase">
                Transparan & Praktis
            </span>
            <h2 class="text-2xl sm:text-4xl font-black text-brutal-black uppercase tracking-tight">
                Listrik & Air Sudah Termasuk dalam Biaya Kos
            </h2>
            <p class="text-sm sm:text-base text-brutal-darkgray font-semibold leading-relaxed max-w-2xl mx-auto">
                Penghuni Kost Putri Ibu Idah tidak perlu khawatir dengan tagihan listrik atau air tambahan setiap bulannya.
            </p>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 text-center font-black text-xs uppercase">
                <div class="p-3.5 bg-brutal-pink-light border-2 border-brutal-black neo-shadow-xs flex flex-col items-center gap-1.5">
                    <i data-lucide="zap" class="w-6 h-6 text-brutal-black"></i>
                    <span>Listrik Termasuk</span>
                </div>
                <div class="p-3.5 bg-brutal-blue-light border-2 border-brutal-black neo-shadow-xs flex flex-col items-center gap-1.5">
                    <i data-lucide="droplets" class="w-6 h-6 text-brutal-black"></i>
                    <span>Air Termasuk</span>
                </div>
                <div class="p-3.5 bg-brutal-green-light border-2 border-brutal-black neo-shadow-xs flex flex-col items-center gap-1.5">
                    <i data-lucide="wifi" class="w-6 h-6 text-brutal-black"></i>
                    <span>Wi-Fi Termasuk</span>
                </div>
                <div class="p-3.5 bg-brutal-yellow-light border-2 border-brutal-black neo-shadow-xs flex flex-col items-center gap-1.5">
                    <i data-lucide="bed" class="w-6 h-6 text-brutal-black"></i>
                    <span>Kasur Siap Pakai</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 6: FACILITIES GRID (TOP 3 PREVIEW)
     ========================================== -->
<section class="py-16 sm:py-24 bg-brutal-warm border-b-3 border-brutal-black" id="fasilitas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
            <span class="inline-block px-3 py-1 bg-brutal-green border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                Fasilitas Unggulan
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-brutal-black uppercase tracking-tight">
                Fasilitas Praktis Keseharian
            </h2>
            <p class="text-sm sm:text-base text-brutal-darkgray font-semibold leading-relaxed">
                Fasilitas terverifikasi untuk menunjang kenyamanan istirahat, belajar, dan bekerja.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($facilities->take(3) as $facility)
                <div class="p-6 bg-white border-3 border-brutal-black neo-shadow flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-12 h-12 bg-brutal-yellow border-2 border-brutal-black neo-shadow-xs flex items-center justify-center font-black">
                            @if($facility->icon === 'bed') <i data-lucide="bed" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'wifi') <i data-lucide="wifi" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'zap') <i data-lucide="zap" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'droplet') <i data-lucide="droplets" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'bath') <i data-lucide="bath" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'wind') <i data-lucide="wind" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'utensils') <i data-lucide="utensils" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'sun') <i data-lucide="sun" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'bike') <i data-lucide="bike" class="w-6 h-6"></i>
                            @elseif($facility->icon === 'lock') <i data-lucide="lock" class="w-6 h-6"></i>
                            @else <i data-lucide="sparkles" class="w-6 h-6"></i>
                            @endif
                        </div>
                        <h3 class="text-lg font-black text-brutal-black uppercase">{{ $facility->name }}</h3>
                        <p class="text-xs sm:text-sm font-semibold text-brutal-darkgray leading-relaxed">{{ $facility->description }}</p>
                    </div>
                    <div class="mt-4 pt-3 border-t-2 border-brutal-black">
                        <span class="inline-block px-2.5 py-0.5 text-[10px] font-black border border-brutal-black uppercase {{ $facility->is_included ? 'bg-brutal-green text-brutal-black' : 'bg-brutal-black text-white' }}">
                            {{ $facility->is_included ? 'Termasuk Biaya' : 'Fasilitas Bersama' }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('facilities.index') }}" class="neo-btn neo-btn-primary text-xs uppercase">
                <span>Lihat Semua Fasilitas Lengkap</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

    </div>
</section>

<!-- ==========================================
     SECTION 7: GALLERY PREVIEW (TOP 3 PREVIEW)
     ========================================== -->
<section class="py-16 sm:py-24 bg-white border-b-3 border-brutal-black" id="galeri">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
            <span class="inline-block px-3 py-1 bg-brutal-blue border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                Dokumentasi Suasana
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-brutal-black uppercase tracking-tight">
                Galeri Foto Kost
            </h2>
            <p class="text-sm sm:text-base text-brutal-darkgray font-semibold leading-relaxed">
                Cuplikan dokumentasi suasana kamar dan area Kost Putri Ibu Idah.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($gallery->take(3) as $index => $item)
                <div class="gallery-item group bg-brutal-warm border-3 border-brutal-black neo-shadow p-3 cursor-pointer"
                     data-index="{{ $index }}"
                     data-src="{{ $item->url }}"
                     data-title="{{ $item->title }}"
                     data-caption="{{ $item->caption }}">
                    
                    <div class="aspect-4/3 overflow-hidden bg-brutal-cream border-2 border-brutal-black mb-3">
                        <img src="{{ $item->url }}" alt="{{ $item->alt_text ?: $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black text-neutral-700 uppercase block tracking-wider">{{ $item->category }}</span>
                            <h3 class="font-extrabold text-sm text-brutal-black uppercase">{{ $item->title }}</h3>
                        </div>
                        <span class="text-xs font-black text-brutal-black group-hover:underline flex items-center gap-1">
                            <span>BUKA</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('gallery.index') }}" class="neo-btn neo-btn-primary text-xs uppercase">
                <span>Lihat Semua Foto Galeri</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

    </div>
</section>

<!-- ==========================================
     SECTION 8: HOUSE RULES (TOP 3 PREVIEW)
     ========================================== -->
<section class="py-16 sm:py-24 bg-brutal-warm border-b-3 border-brutal-black" id="aturan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
            <span class="inline-block px-3 py-1 bg-brutal-pink border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                Tata Tertib
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-brutal-black uppercase tracking-tight">
                Aturan & Kenyamanan Bersama
            </h2>
            <p class="text-sm sm:text-base text-brutal-darkgray font-semibold leading-relaxed">
                Menjaga ketertiban, ketenangan, dan rasa aman bagi setiap penghuni.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-5xl mx-auto">
            @foreach($rules->take(3) as $rule)
                <div class="p-5 bg-white border-3 border-brutal-black neo-shadow flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="w-9 h-9 bg-brutal-yellow border-2 border-brutal-black flex items-center justify-center text-xs font-black shrink-0 neo-shadow-xs">
                            0{{ $rule->sort_order }}
                        </div>
                        <h3 class="font-black text-brutal-black text-sm uppercase">{{ $rule->title }}</h3>
                        <p class="text-xs font-semibold text-brutal-darkgray leading-relaxed">{{ $rule->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ==========================================
     SECTION 9: LOCATION & ACCESS
     ========================================== -->
<section class="py-16 sm:py-24 bg-white border-b-3 border-brutal-black" id="lokasi">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-5 space-y-6">
                <span class="inline-block px-3 py-1 bg-brutal-yellow border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                    Akses & Lokasi Akurat
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-brutal-black leading-tight uppercase tracking-tight">
                    Lingkungan Tenang dan Mudah Dijangkau
                </h2>
                <div class="p-5 bg-brutal-warm border-3 border-brutal-black neo-shadow space-y-3">
                    <div>
                        <span class="text-[10px] font-black text-brutal-darkgray uppercase tracking-wider block">Alamat Resmi Kos:</span>
                        <p class="text-xs sm:text-sm font-extrabold text-brutal-black leading-relaxed mt-0.5">
                            {{ $contact['address'] }}
                        </p>
                    </div>

                    <div class="pt-1 border-t border-brutal-black/20">
                        <span class="text-[10px] font-black text-brutal-darkgray uppercase tracking-wider block">Wilayah Administratif:</span>
                        <p class="text-xs font-bold text-brutal-black">
                            {{ $contact['city_district'] ?? 'Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271' }}
                        </p>
                    </div>

                    <div class="pt-1">
                        <button type="button" 
                                onclick="navigator.clipboard.writeText('{{ addslashes($contact['address']) }}'); const btn = this; btn.querySelector('.copy-label').innerText = 'Alamat Berhasil Disalin!'; setTimeout(() => btn.querySelector('.copy-label').innerText = 'Salin Alamat', 2500)" 
                                class="inline-flex items-center gap-1.5 text-xs font-black bg-white px-3 py-1.5 border-2 border-brutal-black neo-shadow-xs hover:bg-brutal-yellow transition-colors cursor-pointer"
                                aria-label="Salin alamat resmi kos">
                            <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                            <span class="copy-label">Salin Alamat</span>
                        </button>
                    </div>
                </div>

                <div class="space-y-2 text-xs font-bold text-brutal-darkgray">
                    <p class="flex items-center gap-2">
                        <i data-lucide="lock" class="w-4 h-4 text-brutal-pink"></i>
                        <span><strong>Aturan Kunci Gerbang:</strong> Dikunci maksimal pukul <strong>{{ $contact['gate_closing_time'] ?? '22.00 WIB' }}</strong> demi keamanan bersama.</span>
                    </p>
                    <p class="flex items-center gap-2">
                        <i data-lucide="bike" class="w-4 h-4 text-brutal-green"></i>
                        <span><strong>Parkir:</strong> {{ $contact['parking_info'] ?? 'Tersedia garasi motor di dalam area kos khusus bagi penghuni.' }}</span>
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="{{ $contact['maps_url'] }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary text-xs">
                        <i data-lucide="map" class="w-3.5 h-3.5"></i>
                        <span>Buka di Google Maps</span>
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                    </a>
                    <a href="{{ route('location.index') }}" class="neo-btn neo-btn-secondary text-xs">
                        <span>Halaman Lokasi Lengkap</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="bg-brutal-warm border-3 border-brutal-black neo-shadow-lg p-4 sm:p-5 space-y-3">
                    <div class="flex items-center justify-between">
                        <h3 class="font-black text-sm sm:text-base text-brutal-black uppercase">Lokasi Kost Putri Ibu Idah</h3>
                        <span class="text-[10px] font-black bg-brutal-green text-brutal-black px-2 py-0.5 border border-brutal-black uppercase">Fokus Titik Bangunan</span>
                    </div>

                    <div class="relative w-full aspect-4/3 sm:aspect-16/10 bg-white border-2 border-brutal-black overflow-hidden neo-shadow-xs">
                        @if(!empty($contact['maps_embed_url']))
                            <iframe 
                                src="{{ $contact['maps_embed_url'] }}"
                                class="w-full h-full border-0"
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Pratinjau Peta Lokasi Kost Putri Ibu Idah">
                            </iframe>
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center p-4 text-center bg-white space-y-2">
                                <i data-lucide="map-pin" class="w-6 h-6 text-brutal-black"></i>
                                <p class="text-xs font-bold text-brutal-black">{{ $contact['address'] }}</p>
                                <a href="{{ $contact['maps_url'] }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary text-[11px] py-1 px-3">
                                    <span>Buka di Google Maps</span>
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="p-2.5 bg-brutal-yellow-light border border-brutal-black flex items-center gap-2 text-xs font-bold text-brutal-black">
                        <i data-lucide="map-pin" class="w-3.5 h-3.5 text-brutal-pink shrink-0"></i>
                        <span>Lokasi kos ditunjukkan oleh penanda pada peta.</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================
     SECTION 10: FAQ ACCORDION SECTION (TOP 3 PREVIEW)
     ========================================== -->
<section class="py-16 sm:py-24 bg-brutal-warm border-b-3 border-brutal-black" id="faq">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
            <span class="inline-block px-3 py-1 bg-brutal-green border-2 border-brutal-black neo-shadow-xs text-xs font-black uppercase">
                Tanya Jawab
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-brutal-black uppercase tracking-tight">
                Pertanyaan yang Sering Diajukan
            </h2>
            <p class="text-sm sm:text-base text-brutal-darkgray font-semibold leading-relaxed">
                Jawaban ringkas seputar ketentuan kos. Untuk FAQ selengkapnya, kunjungi halaman FAQ.
            </p>
        </div>

        <div class="space-y-4">
            @foreach($faq->take(3) as $index => $item)
                <div x-data="{ open: {{ $index === 0 ? 'true' : 'false' }} }" 
                     class="bg-white border-3 border-brutal-black neo-shadow p-5 transition-colors duration-300"
                     :class="{ 'bg-brutal-yellow-light': open }">
                    <button type="button" 
                            @click="open = !open" 
                            class="w-full flex items-center justify-between cursor-pointer text-left font-black text-brutal-black text-base sm:text-lg select-none gap-4 focus:outline-none"
                            :aria-expanded="open">
                        <span class="flex items-center gap-3">
                            <span class="w-7 h-7 bg-brutal-yellow border-2 border-brutal-black text-brutal-black flex items-center justify-center text-xs font-black shrink-0 neo-shadow-xs">
                                0{{ $index + 1 }}
                            </span>
                            <span>{{ $item->question }}</span>
                        </span>
                        <span class="w-8 h-8 bg-white border-2 border-brutal-black text-brutal-black flex items-center justify-center shrink-0 font-black text-base neo-shadow-xs transition-colors duration-300"
                              :class="{ 'bg-brutal-pink': open }">
                            <span x-text="open ? '−' : '+'"></span>
                        </span>
                    </button>

                    <!-- Slow & Smooth Slide Down Container -->
                    <div class="grid transition-all duration-400 ease-in-out overflow-hidden"
                         :class="open ? 'grid-rows-[1fr] opacity-100 mt-4 pt-4 border-t-2 border-brutal-black' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="text-xs sm:text-sm font-semibold text-brutal-darkgray leading-relaxed pl-10">
                                <p class="text-justify" style="text-align: justify; text-justify: inter-word;">{{ $item->answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('faq.index') }}" class="neo-btn neo-btn-primary text-xs uppercase">
                <span>Lihat Semua Tanya Jawab (FAQ)</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

    </div>
</section>

<!-- ==========================================
     SECTION 11: WHATSAPP CONVERSION CTA
     ========================================== -->
<section class="py-16 sm:py-24 bg-brutal-pink text-brutal-black text-center border-b-3 border-brutal-black">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <span class="inline-block px-3.5 py-1 bg-brutal-black text-white text-xs font-black uppercase">
            Hubungi Langsung Ibu Idah
        </span>
        <h2 class="text-3xl sm:text-5xl font-black text-brutal-black uppercase tracking-tight leading-tight">
            Sudah Menemukan Kamar yang Cocok?
        </h2>
        <p class="text-sm sm:text-base font-bold text-brutal-darkgray leading-relaxed max-w-xl mx-auto">
            Hubungi kami melalui WhatsApp untuk konfirmasi ketersediaan kamar terbaru atau mengatur janji temu survey lokasi.
        </p>
        <div class="pt-3">
            <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-dark px-10 py-4 text-base font-black uppercase neo-shadow-lg">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
                <span>Chat Langsung via WhatsApp</span>
            </a>
        </div>
    </div>
</section>

@endsection
