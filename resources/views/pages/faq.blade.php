@extends('layouts.app')

@section('title', 'FAQ | Kost Putri Ibu Idah')
@section('meta_description', 'Temukan jawaban atas pertanyaan umum mengenai kamar, fasilitas, aturan, dan informasi Kost Putri Ibu Idah.')
@section('meta_keywords', 'faq kost putri ciamis, aturan kos putri ibu idah, tanya jawab sewa kos ciamis, info kost ciamis')
@section('og_image', 'https://kosanputri.kall.my.id/images/og/og-default.png')
@section('canonical_url', 'https://kosanputri.kall.my.id/faq')

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
                    'name' => 'FAQ',
                    'item' => 'https://kosanputri.kall.my.id/faq',
                ],
            ],
        ],
        [
            '@type' => 'FAQPage',
            'mainEntity' => $faqs->map(fn($item) => [
                '@type' => 'Question',
                'name' => $item->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item->answer,
                ],
            ])->values()->all(),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<!-- Header Banner -->
<section class="bg-brutal-black text-white py-14 sm:py-20 border-b-3 border-brutal-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-brutal-yellow text-brutal-black text-xs font-black uppercase neo-shadow-xs border border-white">
            <i data-lucide="help-circle" class="w-3.5 h-3.5"></i>
            <span>Pusat Informasi & Bantuan</span>
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white uppercase tracking-tight">
            Pertanyaan yang Sering Diajukan
        </h1>
        <p class="text-neutral-300 text-sm sm:text-base font-semibold leading-relaxed">
            Temukan jawaban lengkap dan transparan seputar ketentuan, fasilitas, dan tata cara pendaftaran di Kost Putri Ibu Idah.
        </p>
    </div>
</section>

<!-- FAQ Accordion Section -->
<section class="py-16 sm:py-24 bg-brutal-warm">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="space-y-4">
            @forelse($faqs as $index => $item)
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
            @empty
                <div class="text-center py-12 bg-white border-3 border-brutal-black p-8">
                    <p class="font-bold text-brutal-black">Daftar FAQ belum ditambahkan di CMS.</p>
                </div>
            @endforelse
        </div>

        <!-- Have other questions CTA -->
        <div class="mt-16 bg-white p-8 sm:p-10 border-3 border-brutal-black neo-shadow-lg text-center space-y-4">
            <h3 class="text-2xl font-black text-brutal-black uppercase tracking-tight">Punya Pertanyaan Lain?</h3>
            <p class="text-xs sm:text-sm font-semibold text-brutal-darkgray leading-relaxed max-w-md mx-auto">
                Tanyakan pertanyaan spesifik langsung kepada Ibu Idah via WhatsApp atau gunakan widget Tanya Kost AI di pojok kanan bawah.
            </p>
            <div class="pt-2">
                <a href="{{ $defaultWaUrl ?? 'https://wa.me/?text=Halo%20Ibu%20Idah' }}" target="_blank" rel="noopener noreferrer" class="neo-btn neo-btn-primary uppercase">
                    <i data-lucide="message-circle" class="w-4 h-4"></i>
                    <span>Tanya via WhatsApp</span>
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
