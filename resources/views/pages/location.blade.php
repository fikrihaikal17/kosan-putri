@extends('layouts.app')

@section('title', 'Lokasi Kost Putri Ibu Idah')
@section('meta_description', 'Temukan lokasi Kost Putri Ibu Idah dan lihat alamat lengkap melalui Google Maps.')
@section('meta_keywords', 'lokasi kost putri ciamis, peta kost ibu idah, alamat kosan putri ciamis, kost dewasari cijeungjing ciamis, petunjuk arah kost')
@section('og_image', 'https://kosanputri.kall.my.id/images/gallery/eksterior.svg')
@section('canonical_url', 'https://kosanputri.kall.my.id/lokasi')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Beranda',
                    'item' => 'https://kosanputri.kall.my.id/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Lokasi & Peta',
                    'item' => 'https://kosanputri.kall.my.id/lokasi',
                ],
            ],
        ],
        [
            '@type' => 'Place',
            'name' => 'Kost Putri Ibu Idah',
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
            'hasMap' => 'https://maps.app.goo.gl/SjebDzqDyygXVm3V6',
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<!-- Header Banner -->
<section class="bg-brutal-black text-white py-14 sm:py-20 border-b-3 border-brutal-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brutal-blue text-brutal-black text-xs font-black uppercase neo-shadow-xs border border-white">
            <i data-lucide="map-pin" class="w-3.5 h-3.5"></i>
            <span>Akses & Lokasi Akurat</span>
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white uppercase tracking-tight">
            Lokasi & Petunjuk Arah
        </h1>
        <p class="text-neutral-300 text-sm sm:text-base font-semibold leading-relaxed">
            Kost Putri Ibu Idah berada di lokasi yang strategis, tenang, dan aman di Ciamis untuk mahasiswi serta karyawati.
        </p>
    </div>
</section>

<!-- Location Details & Accurate Map Section -->
<section class="py-16 sm:py-24 bg-brutal-warm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start max-w-6xl mx-auto">
            
            <!-- Left Column: Address & Practical Details -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white p-6 sm:p-8 border-3 border-brutal-black neo-shadow-lg space-y-5">
                    <div class="flex items-center justify-between border-b-2 border-brutal-black pb-3">
                        <h2 class="text-xl sm:text-2xl font-black text-brutal-black uppercase tracking-tight">Alamat Resmi Kos</h2>
                        <span class="px-2.5 py-1 bg-brutal-yellow text-brutal-black font-extrabold text-[11px] border-2 border-brutal-black neo-shadow-xs uppercase">
                            Terverifikasi
                        </span>
                    </div>
                    
                    <!-- Official Address Card with Copy Button -->
                    <div class="p-4 bg-brutal-yellow-light border-2 border-brutal-black space-y-3">
                        <div>
                            <span class="text-[10px] font-black text-brutal-darkgray uppercase tracking-wider block">Alamat Lengkap:</span>
                            <p class="text-xs sm:text-sm font-extrabold text-brutal-black leading-relaxed mt-1" id="kost-address-text">
                                {{ $contact['address'] }}
                            </p>
                        </div>

                        <div class="pt-1 border-t border-brutal-black/20">
                            <span class="text-[10px] font-black text-brutal-darkgray uppercase tracking-wider block">Wilayah Administratif:</span>
                            <p class="text-xs font-bold text-brutal-black leading-relaxed">
                                {{ $contact['city_district'] ?? 'Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis, Jawa Barat, 46271' }}
                            </p>
                        </div>

                        @if(!empty($contact['latitude']) && !empty($contact['longitude']))
                            <div class="pt-1 border-t border-brutal-black/20 flex items-center justify-between text-[11px] font-bold text-brutal-darkgray">
                                <span>Koordinat Presisi:</span>
                                <span class="font-mono text-brutal-black bg-white px-1.5 py-0.5 border border-brutal-black">{{ $contact['latitude'] }}, {{ $contact['longitude'] }}</span>
                            </div>
                        @endif

                        <div class="pt-2 flex flex-wrap gap-2">
                            <button type="button" 
                                    onclick="navigator.clipboard.writeText('{{ addslashes($contact['address']) }}'); const btn = this; btn.querySelector('.copy-label').innerText = 'Alamat Berhasil Disalin!'; setTimeout(() => btn.querySelector('.copy-label').innerText = 'Salin Alamat', 2500)" 
                                    class="inline-flex items-center gap-1.5 text-xs font-black bg-white px-3 py-1.5 border-2 border-brutal-black neo-shadow-xs hover:bg-brutal-yellow transition-colors cursor-pointer"
                                    aria-label="Salin alamat resmi kos ke papan klip">
                                <i data-lucide="copy" class="w-3.5 h-3.5"></i>
                                <span class="copy-label">Salin Alamat</span>
                            </button>
                        </div>
                    </div>

                    <!-- Landmark & Access Information -->
                    <div class="space-y-3.5 text-xs font-bold text-brutal-darkgray border-t-2 border-brutal-black pt-4">
                        <div class="flex items-start gap-3">
                            <i data-lucide="lock" class="w-5 h-5 text-brutal-pink shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-brutal-black block uppercase">Aturan Kunci Gerbang Malam:</strong>
                                <span>Gerbang ditutup & dikunci maksimal pukul <strong>{{ $contact['gate_closing_time'] ?? '22.00 WIB' }}</strong> demi keamanan dan kenyamanan istirahat bersama.</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i data-lucide="bike" class="w-5 h-5 text-brutal-green shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-brutal-black block uppercase">Parkir Kendaraan:</strong>
                                <span>{{ $contact['parking_info'] ?? 'Tersedia garasi motor di dalam area kos khusus bagi penghuni.' }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i data-lucide="navigation" class="w-5 h-5 text-brutal-blue shrink-0 mt-0.5"></i>
                            <div>
                                <strong class="text-brutal-black block uppercase">Patokan Lokasi & Petunjuk Arah:</strong>
                                <span>{{ $contact['location_landmark'] ?? 'Jl. K. H. Zakaria, Ds. Dewasari, Kec. Cijeungjing, Kab. Ciamis. Hubungi Ibu Idah untuk petunjuk arah detail.' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Direct Navigation Action Buttons -->
                    <div class="pt-2 space-y-3">
                        <a href="{{ $contact['maps_url'] }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-secondary text-xs w-full text-center">
                            <i data-lucide="map" class="w-4 h-4"></i>
                            <span>Buka di Google Maps</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5 ml-auto"></i>
                        </a>

                        <a href="{{ $defaultWaUrl ?? 'https://wa.me/' }}?text={{ urlencode('Halo Ibu Idah, saya ingin meminta petunjuk arah dan membuat janji survey lokasi Kost Putri Ibu Idah.') }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary text-xs w-full text-center">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>Hubungi Ibu Idah via WhatsApp</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Right Column: Interactive Google Maps with Verified Marker -->
            <div class="lg:col-span-7 space-y-6">
                
                <div class="bg-white p-6 sm:p-8 border-3 border-brutal-black neo-shadow-lg space-y-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b-2 border-brutal-black pb-3">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black text-brutal-black uppercase tracking-tight">Lokasi Kost Putri Ibu Idah</h2>
                            <p class="text-xs font-semibold text-brutal-darkgray mt-0.5">Peta interaktif berfokus langsung pada titik bangunan kos</p>
                        </div>
                        <span class="inline-flex items-center gap-1 text-[11px] font-black text-brutal-black bg-brutal-green px-2.5 py-1 border-2 border-brutal-black neo-shadow-xs uppercase">
                            <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>
                            <span>Titik Akurat</span>
                        </span>
                    </div>
                    
                    <!-- Google Maps Responsive Iframe Container with Fallback Support -->
                    <div class="relative w-full aspect-4/3 sm:aspect-16/10 bg-brutal-warm border-3 border-brutal-black overflow-hidden neo-shadow group" id="map-container">
                        @if(!empty($contact['maps_embed_url']))
                            <iframe 
                                data-src="{{ $contact['maps_embed_url'] }}"
                                src="about:blank"
                                class="lazy-map w-full h-full border-0"
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Peta Lokasi Kost Putri Ibu Idah">
                            </iframe>
                        @else
                            <!-- Fallback Area when Map Embed is unavailable -->
                            <div class="w-full h-full flex flex-col items-center justify-center p-6 text-center bg-white space-y-4">
                                <div class="w-12 h-12 bg-brutal-yellow border-2 border-brutal-black flex items-center justify-center">
                                    <i data-lucide="map-pin" class="w-6 h-6 text-brutal-black"></i>
                                </div>
                                <div class="space-y-1 max-w-sm">
                                    <h3 class="font-black text-brutal-black uppercase text-base">Lokasi Kost Putri Ibu Idah</h3>
                                    <p class="text-xs font-semibold text-brutal-darkgray leading-relaxed">{{ $contact['address'] }}</p>
                                </div>
                                <a href="{{ $contact['maps_url'] }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary text-xs">
                                    <i data-lucide="map" class="w-3.5 h-3.5"></i>
                                    <span>Buka di Google Maps</span>
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Map Marker Verification Note (Mandatory Requirement) -->
                    <div class="p-3.5 bg-brutal-yellow-light border-2 border-brutal-black flex items-start sm:items-center gap-2.5 text-xs font-bold text-brutal-black">
                        <i data-lucide="map-pin" class="w-4 h-4 text-brutal-pink shrink-0 mt-0.5 sm:mt-0"></i>
                        <span>Lokasi kos ditunjukkan oleh penanda pada peta.</span>
                    </div>

                    <!-- Survey Policy Disclaimer -->
                    <p class="text-[11px] font-bold text-brutal-darkgray text-center pt-1 leading-relaxed">
                        {{ $contact['survey_policy_note'] ?? 'Demi privasi dan keamanan penghuni, survey kamar fisik hanya dilayani dengan membuat janji terlebih dahulu melalui WhatsApp.' }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
