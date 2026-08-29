@extends('layouts.app')

@section('title', 'Fasilitas Kost Putri Ibu Idah')
@section('meta_description', 'Fasilitas yang tersedia meliputi kasur, Wi-Fi, listrik dan air termasuk, kamar mandi, dapur bersama, area jemur, dan garasi motor.')
@section('meta_keywords', 'fasilitas kost putri ciamis, kosan free wifi ciamis, kosan gratis listrik air ciamis, fasilitas kost ibu idah')
@section('og_image', 'https://kosanputri.kall.my.id/images/gallery/garasi.svg')
@section('canonical_url', 'https://kosanputri.kall.my.id/fasilitas')

@push('schema')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
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
            'name' => 'Fasilitas',
            'item' => 'https://kosanputri.kall.my.id/fasilitas',
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<!-- Header Banner -->
<section class="bg-brutal-black text-white py-14 sm:py-20 border-b-3 border-brutal-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brutal-green text-brutal-black text-xs font-black uppercase neo-shadow-xs border border-white">
            <i data-lucide="sparkles" class="w-3.5 h-3.5"></i>
            <span>Fasilitas Lengkap</span>
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white uppercase tracking-tight">
            Fasilitas Praktis Keseharian
        </h1>
        <p class="text-neutral-300 text-sm sm:text-base font-semibold leading-relaxed">
            Kost Putri Ibu Idah menyediakan fasilitas yang dirancang untuk mendukung kenyamanan, keamanan, dan kepraktisan mahasiswi serta karyawati.
        </p>
    </div>
</section>

<!-- Facilities Section -->
<section class="py-16 sm:py-24 bg-brutal-warm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Included in Rent Group -->
        <div class="mb-16">
            <div class="border-b-3 border-brutal-black pb-3 mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <h2 class="text-2xl sm:text-3xl font-black text-brutal-black uppercase tracking-tight flex items-center gap-2">
                    <i data-lucide="zap" class="w-6 h-6 text-brutal-pink"></i>
                    <span>Sudah Termasuk dalam Biaya Kos</span>
                </h2>
                <span class="text-xs font-extrabold bg-brutal-yellow px-2 py-1 border border-brutal-black uppercase">Tanpa Biaya Tersembunyi</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($facilities->where('is_included', true) as $facility)
                    <div class="p-6 bg-white border-3 border-brutal-black neo-shadow flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="w-12 h-12 bg-brutal-pink border-2 border-brutal-black neo-shadow-xs flex items-center justify-center font-black">
                                @if($facility->icon === 'bed') <i data-lucide="bed" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'wifi') <i data-lucide="wifi" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'zap') <i data-lucide="zap" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'droplet') <i data-lucide="droplets" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'bath') <i data-lucide="bath" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'wind') <i data-lucide="wind" class="w-6 h-6"></i>
                                @else <i data-lucide="sparkles" class="w-6 h-6"></i>
                                @endif
                            </div>
                            <h3 class="text-lg font-black text-brutal-black uppercase">{{ $facility->name }}</h3>
                            <p class="text-xs sm:text-sm font-semibold text-brutal-darkgray leading-relaxed">{{ $facility->description }}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t-2 border-brutal-black">
                            <span class="inline-block px-2.5 py-0.5 text-[10px] font-black bg-brutal-green text-brutal-black border border-brutal-black uppercase">Termasuk Biaya</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Shared Facilities Group -->
        <div>
            <div class="border-b-3 border-brutal-black pb-3 mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                <h2 class="text-2xl sm:text-3xl font-black text-brutal-black uppercase tracking-tight flex items-center gap-2">
                    <i data-lucide="home" class="w-6 h-6 text-brutal-blue"></i>
                    <span>Fasilitas Bersama & Keamanan</span>
                </h2>
                <span class="text-xs font-extrabold bg-brutal-blue px-2 py-1 border border-brutal-black uppercase">Digunakan Tertib Bersama</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($facilities->where('is_included', false) as $facility)
                    <div class="p-6 bg-white border-3 border-brutal-black neo-shadow flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="w-12 h-12 bg-brutal-yellow border-2 border-brutal-black neo-shadow-xs flex items-center justify-center font-black">
                                @if($facility->icon === 'utensils') <i data-lucide="utensils" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'sun') <i data-lucide="sun" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'bike') <i data-lucide="bike" class="w-6 h-6"></i>
                                @elseif($facility->icon === 'lock') <i data-lucide="lock" class="w-6 h-6"></i>
                                @else <i data-lucide="home" class="w-6 h-6"></i>
                                @endif
                            </div>
                            <h3 class="text-lg font-black text-brutal-black uppercase">{{ $facility->name }}</h3>
                            <p class="text-xs font-semibold text-brutal-darkgray leading-relaxed">{{ $facility->description }}</p>
                        </div>
                        <div class="mt-4 pt-3 border-t-2 border-brutal-black">
                            <span class="inline-block px-2.5 py-0.5 text-[10px] font-black bg-brutal-black text-white border border-brutal-black uppercase">Fasilitas Bersama</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Call to action -->
        <div class="mt-16 bg-brutal-pink border-3 border-brutal-black neo-shadow-lg p-8 sm:p-10 text-center max-w-2xl mx-auto space-y-4">
            <h3 class="text-2xl sm:text-3xl font-black text-brutal-black uppercase tracking-tight">Ingin Menanyakan Fasilitas Lainnya?</h3>
            <p class="text-xs sm:text-sm font-bold text-brutal-darkgray leading-relaxed">
                Hubungi Ibu Idah via WhatsApp atau tanyakan langsung melalui asisten Tanya Kost di pojok kanan bawah.
            </p>
            <div class="pt-2">
                <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-dark uppercase">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Tanya via WhatsApp</span>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
