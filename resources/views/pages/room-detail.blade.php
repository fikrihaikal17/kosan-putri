@extends('layouts.app')

@section('content')
<!-- Breadcrumbs -->
<div class="bg-white border-b-2 border-brutal-black py-3 text-xs font-bold text-brutal-darkgray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-2">
        <a href="{{ route('home') }}" class="hover:text-brutal-pink">Beranda</a>
        <span>/</span>
        <a href="{{ route('rooms.index') }}" class="hover:text-brutal-pink">Pilihan Kamar</a>
        <span>/</span>
        <span class="text-brutal-black uppercase">{{ $room->name }}</span>
    </div>
</div>

<!-- Room Detail Section -->
<section class="py-12 sm:py-16 bg-brutal-warm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left Column: Gallery & Details -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Main Room Image -->
                <div class="bg-white border-3 border-brutal-black neo-shadow-lg p-3">
                    <div class="relative aspect-16/10 bg-brutal-cream border-2 border-brutal-black overflow-hidden">
                        <img src="{{ $room->featured_image_url }}" alt="{{ $room->name }}" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-brutal-yellow text-brutal-black font-extrabold text-xs px-3 py-1.5 border-2 border-brutal-black neo-shadow-xs uppercase">
                                {{ $room->bathroom_type }}
                            </span>
                        </div>
                    </div>

                    @if($room->images->count() > 1)
                        <div class="p-3 grid grid-cols-4 gap-3 bg-brutal-warm border-2 border-brutal-black mt-3">
                            @foreach($room->images as $img)
                                <div class="aspect-4/3 overflow-hidden border-2 border-brutal-black">
                                    <img src="{{ $img->url }}" alt="{{ $img->caption ?? $room->name }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="bg-white p-6 sm:p-8 border-3 border-brutal-black neo-shadow space-y-4">
                    <h2 class="text-2xl font-black text-brutal-black uppercase tracking-tight">Deskripsi Kamar</h2>
                    <p class="text-sm font-semibold text-brutal-darkgray leading-relaxed">
                        {{ $room->description ?: $room->short_description }}
                    </p>

                    @if($room->notes)
                        <div class="p-4 bg-brutal-yellow-light border-2 border-brutal-black text-xs font-bold text-brutal-black">
                            <strong>CATATAN:</strong> {{ $room->notes }}
                        </div>
                    @endif
                </div>

                <!-- Facilities in this Room -->
                <div class="bg-white p-6 sm:p-8 border-3 border-brutal-black neo-shadow space-y-4">
                    <h2 class="text-2xl font-black text-brutal-black uppercase tracking-tight">Fasilitas yang Didapatkan</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm">
                        <div class="flex items-center gap-3 p-3 bg-brutal-warm border-2 border-brutal-black">
                            <i data-lucide="bed" class="w-5 h-5 text-brutal-black"></i>
                            <div>
                                <span class="font-black text-brutal-black block uppercase">Kasur</span>
                                <span class="text-[11px] font-semibold text-brutal-darkgray">Sudah tersedia di kamar</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-brutal-warm border-2 border-brutal-black">
                            <i data-lucide="wifi" class="w-5 h-5 text-brutal-black"></i>
                            <div>
                                <span class="font-black text-brutal-black block uppercase">Wi-Fi</span>
                                <span class="text-[11px] font-semibold text-brutal-darkgray">Akses internet tersedia</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-brutal-warm border-2 border-brutal-black">
                            <i data-lucide="zap" class="w-5 h-5 text-brutal-black"></i>
                            <div>
                                <span class="font-black text-brutal-black block uppercase">Listrik Termasuk</span>
                                <span class="text-[11px] font-semibold text-brutal-darkgray">Sudah masuk biaya sewa</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-brutal-warm border-2 border-brutal-black">
                            <i data-lucide="droplets" class="w-5 h-5 text-brutal-black"></i>
                            <div>
                                <span class="font-black text-brutal-black block uppercase">Air Termasuk</span>
                                <span class="text-[11px] font-semibold text-brutal-darkgray">Sudah masuk biaya sewa</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-brutal-warm border-2 border-brutal-black">
                            <i data-lucide="utensils" class="w-5 h-5 text-brutal-black"></i>
                            <div>
                                <span class="font-black text-brutal-black block uppercase">Dapur Sharing</span>
                                <span class="text-[11px] font-semibold text-brutal-darkgray">Fasilitas bersama</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-brutal-warm border-2 border-brutal-black">
                            <i data-lucide="bike" class="w-5 h-5 text-brutal-black"></i>
                            <div>
                                <span class="font-black text-brutal-black block uppercase">Garasi Motor</span>
                                <span class="text-[11px] font-semibold text-brutal-darkgray">Parkir motor penghuni</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Room Card Summary & WhatsApp CTA -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white p-6 sm:p-8 border-3 border-brutal-black neo-shadow-lg sticky top-24 space-y-6">
                    <div>
                        <span class="inline-block px-2.5 py-0.5 bg-brutal-green text-brutal-black border border-brutal-black text-xs font-black uppercase mb-2">
                            {{ $room->availability_status }}
                        </span>
                        <h1 class="text-2xl sm:text-3xl font-black text-brutal-black uppercase tracking-tight">
                            {{ $room->name }}
                        </h1>
                    </div>

                    <!-- Price Block -->
                    <div class="p-4 bg-brutal-yellow-light border-2 border-brutal-black">
                        <span class="text-xs font-black text-brutal-darkgray block uppercase">Informasi Tarif</span>
                        <span class="text-2xl font-black text-brutal-black">{{ $room->formatted_price }}</span>
                        <p class="text-[11px] font-bold text-brutal-darkgray mt-1">Biaya sudah mencakup listrik, air, dan Wi-Fi.</p>
                    </div>

                    <!-- Room Specs List -->
                    <div class="space-y-3 text-xs font-bold text-brutal-black border-y-2 border-brutal-black py-4">
                        <div class="flex justify-between">
                            <span class="text-brutal-darkgray uppercase">Tipe Kos:</span>
                            <span>Khusus Putri</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-brutal-darkgray uppercase">Kapasitas Maksimal:</span>
                            <span>{{ $room->capacity }} Orang / Kamar</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-brutal-darkgray uppercase">Kamar Mandi:</span>
                            <span>{{ $room->bathroom_type }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-brutal-darkgray uppercase">Jam Gerbang:</span>
                            <span>Kunci Maks. {{ $contact['gate_closing_time'] ?? '22.00 WIB' }}</span>
                        </div>
                    </div>

                    <!-- Direct WhatsApp CTA Button -->
                    <div class="space-y-3">
                        <a href="{{ $roomWaUrl }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary w-full text-center text-sm py-3.5">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            <span>Tanyakan Kamar Ini via WhatsApp</span>
                        </a>
                        <p class="text-[11px] text-center font-bold text-brutal-darkgray">Hubungi langsung Ibu Idah untuk konfirmasi ketersediaan terkini dan jadwal survey.</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
@endsection
