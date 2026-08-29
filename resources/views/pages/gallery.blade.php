@extends('layouts.app')

@section('content')
<!-- Header Banner -->
<section class="bg-brutal-black text-white py-14 sm:py-20 border-b-3 border-brutal-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brutal-yellow text-brutal-black text-xs font-black uppercase neo-shadow-xs border border-white">
            <i data-lucide="image" class="w-3.5 h-3.5"></i>
            <span>Suasana & Lingkungan</span>
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white uppercase tracking-tight">
            Galeri Kost Putri Ibu Idah
        </h1>
        <p class="text-neutral-300 text-sm sm:text-base font-semibold leading-relaxed">
            Lihat gambaran suasana kamar, fasilitas bersama, dan lingkungan kos yang bersih dan terawat.
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-16 sm:py-24 bg-brutal-warm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Category Filter Tabs -->
        <div class="flex items-center justify-center gap-2.5 flex-wrap mb-12">
            @foreach($categories as $cat)
                <a href="{{ route('gallery.index', $cat === 'Semua' ? [] : ['kategori' => $cat]) }}" 
                   class="neo-btn text-xs uppercase {{ ($category === $cat || (!$category && $cat === 'Semua')) ? 'neo-btn-primary' : 'neo-btn-secondary' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($gallery as $index => $item)
                <div class="gallery-item group bg-white border-3 border-brutal-black neo-shadow p-3 cursor-pointer"
                     data-index="{{ $index }}"
                     data-src="{{ $item->url }}"
                     data-title="{{ $item->title }}"
                     data-caption="{{ $item->caption }}">
                    
                    <div class="aspect-4/3 overflow-hidden bg-brutal-cream border-2 border-brutal-black mb-3">
                        <img src="{{ $item->url }}" alt="{{ $item->alt_text ?: $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-black text-brutal-pink uppercase block">{{ $item->category }}</span>
                            <h3 class="font-extrabold text-sm text-brutal-black uppercase">{{ $item->title }}</h3>
                        </div>
                        <span class="text-xs font-black text-brutal-black group-hover:underline flex items-center gap-1">
                            <span>BUKA</span>
                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white border-3 border-brutal-black p-8">
                    <p class="font-bold text-brutal-black">Belum ada foto untuk kategori ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Survey Invite -->
        <div class="mt-16 text-center bg-brutal-yellow-light p-6 border-3 border-brutal-black neo-shadow max-w-xl mx-auto space-y-3">
            <p class="text-sm font-black text-brutal-black uppercase">
                Ingin melihat kondisi fisik kamar secara langsung?
            </p>
            <p class="text-xs font-bold text-brutal-darkgray">
                Silakan jadwalkan survey lokasi dengan Ibu Idah terlebih dahulu melalui WhatsApp.
            </p>
            <div class="pt-2">
                <a href="{{ $defaultWaUrl ?? 'https://wa.me/' }}?text={{ urlencode('Halo Ibu Idah, saya ingin membuat janji survey lokasi untuk melihat kamar kos.') }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary text-xs uppercase">
                    <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                    <span>Jadwalkan Survey Lokasi</span>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
