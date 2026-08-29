@extends('layouts.app')

@section('title', 'Pilihan Tipe Kamar | Kost Putri Ibu Idah Ciamis')
@section('meta_description', 'Lihat pilihan tipe kamar di Kost Putri Ibu Idah Ciamis: Kamar Mandi Dalam dan Kamar Mandi Luar. Fasilitas kasur, Wi-Fi, listrik dan air termasuk biaya sewa.')
@section('meta_keywords', 'pilihan kamar kost putri ciamis, sewa kamar kos putri, kost kamar mandi dalam ciamis, kamar kost ciamis murah')

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
                    'name' => 'Pilihan Kamar',
                    'item' => 'https://kosanputri.kall.my.id/kamar',
                ],
            ],
        ],
        [
            '@type' => 'ItemList',
            'name' => 'Daftar Tipe Kamar Kost Putri Ibu Idah',
            'itemListElement' => $rooms->values()->map(fn($r, $idx) => [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'name' => $r->name,
                'url' => 'https://kosanputri.kall.my.id/kamar/' . $r->slug,
            ])->all(),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<!-- Header Banner -->
<section class="bg-brutal-black text-white py-14 sm:py-20 border-b-3 border-brutal-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brutal-pink text-brutal-black text-xs font-black uppercase neo-shadow-xs border border-white">
            <i data-lucide="home" class="w-3.5 h-3.5"></i>
            <span>Pilihan Tipe Kamar</span>
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white uppercase tracking-tight">
            Kamar Nyaman Khusus Putri
        </h1>
        <p class="text-neutral-300 text-sm sm:text-base font-semibold leading-relaxed">
            Semua kamar telah dilengkapi kasur, koneksi Wi-Fi, serta biaya listrik dan air yang sudah termasuk dalam sewa bulanan.
        </p>
    </div>
</section>

<!-- Rooms Grid Section -->
<section class="py-16 sm:py-24 bg-brutal-warm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @forelse($rooms as $room)
                <div class="bg-white border-3 border-brutal-black neo-shadow-lg p-5 flex flex-col justify-between">
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
                            <h2 class="text-xl sm:text-2xl font-black text-brutal-black uppercase tracking-tight text-center">
                                {{ $room->name }}
                            </h2>
                            <p class="text-xs sm:text-sm font-semibold text-brutal-darkgray leading-relaxed">
                                {{ $room->short_description ?: $room->description }}
                            </p>

                            <!-- Key Amenities Checklist -->
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

                    <!-- Room Footer & Actions -->
                    <div class="pt-6 space-y-4">
                        <div class="p-3.5 bg-brutal-warm border-2 border-brutal-black neo-shadow-xs flex items-center justify-between">
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
            @empty
                <div class="col-span-2 text-center py-12 bg-white border-3 border-brutal-black p-8">
                    <p class="font-bold text-brutal-black">Data kamar belum ditambahkan di CMS.</p>
                </div>
            @endforelse
        </div>

        <!-- Trust Note -->
        <div class="mt-12 text-center text-xs font-bold text-brutal-black max-w-xl mx-auto bg-brutal-yellow-light p-4 border-2 border-brutal-black neo-shadow-xs">
            Biaya sewa kamar sudah mencakup penggunaan listrik, air, Wi-Fi, dan akses fasilitas bersama (dapur sharing, area jemur, garasi motor).
        </div>

    </div>
</section>
@endsection
