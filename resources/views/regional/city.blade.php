@extends('layouts.app')

@section('title', 'Training Alat Berat & SIO di ' . $city['name'] . ' — Konsultasi Resmi Operator')
@section('meta_description', 'Layanan informasi pembinaan Training Alat Berat, sertifikasi operator, dan pengurusan SIO untuk sektor konstruksi, pertambangan, dan industri di ' . $city['name'] . ', Provinsi ' . $city['province'] . '.')
@section('wa_message', $waMessage)

@section('content')
    {{-- Breadcrumb --}}
    <div class="bg-navy-950 border-b border-navy-900">
        <x-breadcrumb :items="[
            ['label' => 'Wilayah', 'url' => null],
            ['label' => $city['province'], 'url' => route('regional.province', $city['province_slug'])],
            ['label' => $city['name'], 'url' => null],
        ]" />
    </div>

    {{-- Hero --}}
    <section class="relative bg-navy-950 text-white overflow-hidden border-b border-navy-800" aria-labelledby="city-hero-heading">
        <div class="absolute inset-0 opacity-10 pointer-events-none" aria-hidden="true">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid-c" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="#FFF" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-c)" />
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-900 border border-teal-500/40 text-teal-400 text-xs sm:text-sm font-semibold mb-6">
                    <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                    Layanan Pembinaan Operator &amp; SIO Kemnaker
                </div>
                <h1 id="city-hero-heading" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight uppercase">
                    Training Alat Berat &amp; SIO<br><span class="text-teal-400">{{ $city['name'] }}</span>
                </h1>
                <p class="mt-6 text-base sm:text-lg text-concrete-300 leading-relaxed">
                    Solusi komprehensif pembinaan keselamatan operasional alat berat, persiapan uji kompetensi operator, dan sertifikasi Lisensi K3 / SIO (Surat Izin Alat) resmi Kemnaker RI bagi tenaga kerja industri di <strong class="text-white">{{ $city['name'] }}</strong>, Provinsi {{ $city['province'] }}.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <x-wa-cta variant="primary" size="lg" :message="$waMessage" label="Konsultasi Wilayah {{ $city['name'] }}" class="font-bold shadow-lg" />
                </div>
                <div class="mt-10 pt-8 border-t border-navy-800/80 grid grid-cols-2 sm:grid-cols-4 gap-6">
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Provinsi</div><div class="text-base font-extrabold text-white mt-0.5 truncate">{{ $city['province'] }}</div></div>
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Pulau</div><div class="text-base font-extrabold text-white mt-0.5">{{ $city['island'] }}</div></div>
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Layanan SIO</div><div class="text-base font-extrabold text-teal-400 mt-0.5">{{ count($programs) }} Kategori</div></div>
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Regulasi</div><div class="text-base font-extrabold text-white mt-0.5">Permenaker 8/2020</div></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Disclaimer --}}
    <section class="py-10 bg-safety-soft border-b border-safety-400/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-start gap-4">
                <svg class="w-6 h-6 text-safety-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <p class="text-sm text-slate-700 leading-relaxed">
                    <strong class="text-navy-950">Catatan penting:</strong> Halaman ini adalah portal informasi dan koordinasi resmi. Penyelenggaraan pelatihan praktik/in-house di {{ $city['name'] }}, jadwal pelaksanaan, dan verifikasi persyaratan calon operator dikonfirmasi langsung melalui representasi konsultan kami.
                </p>
            </div>
        </div>
    </section>

    {{-- Program Links: All 9 SIO Categories --}}
    <section id="program" class="py-14 sm:py-20 bg-concrete-50 border-b border-concrete-200" aria-labelledby="city-program-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">Kategori Layanan SIO</span>
                <h2 id="city-program-heading" class="mt-3 text-2xl sm:text-3xl font-extrabold text-navy-950 tracking-tight">
                    Program Pelatihan &amp; SIO Alat Berat di {{ $city['name'] }}
                </h2>
                <p class="mt-4 text-base text-slate-700">Pilih kategori alat berat yang sesuai dengan kebutuhan operasional armada proyek Anda di {{ $city['name'] }}.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($programs as $prog)
                <a href="{{ route('city.program.detail', ['city' => $city['slug'], 'program' => $prog['slug']]) }}" class="group flex flex-col bg-white rounded-xl border border-concrete-200 hover:border-teal-500 hover:shadow-md transition-all overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    <div class="h-1.5 bg-teal-600"></div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="text-xs font-bold uppercase tracking-wider text-teal-700 mb-1">{{ $prog['category_label'] ?? 'Layanan SIO' }}</div>
                        <h3 class="text-lg font-bold text-navy-950 mb-2 group-hover:text-teal-700 transition-colors">{{ $prog['title'] }} — {{ $city['name'] }}</h3>
                        <p class="text-xs sm:text-sm text-slate-700 flex-1 leading-relaxed line-clamp-3">{{ $prog['hero_subheading'] }}</p>
                        <div class="mt-4 pt-4 border-t border-concrete-100 text-xs font-bold text-teal-700 flex items-center justify-between">
                            <span>Rincian Layanan di {{ $city['name'] }}</span>
                            <span>&rarr;</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Districts List --}}
    @if(count($city['districts']) > 0)
    <section id="kecamatan" class="py-14 sm:py-20 bg-white border-b border-concrete-200" aria-labelledby="city-kec-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="city-kec-heading" class="text-2xl font-extrabold text-navy-950 mb-2">
                Kecamatan di {{ $city['name'] }}
            </h2>
            <p class="text-sm text-slate-600 mb-8">Daftar wilayah administratif di {{ $city['name'] }}. Layanan konsultasi pembinaan operator alat berat menjangkau seluruh kecamatan.</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                @foreach($city['districts'] as $dist)
                <a href="{{ route('regional.district', [$city['slug'], $dist['slug']]) }}" class="block px-3 py-2.5 rounded-lg bg-concrete-50 border border-concrete-200 hover:border-teal-500 hover:bg-teal-soft text-sm font-medium text-navy-900 hover:text-teal-700 transition-colors truncate focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    {{ $dist['name'] }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <x-regional-map :citySlug="$city['slug']" :regionName="$city['name']" />

    {{-- Articles --}}
    @if(isset($articles) && count($articles) > 0)
    <section id="artikel" class="py-14 sm:py-20 bg-white border-b border-concrete-200" aria-labelledby="city-article-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="city-article-heading" class="text-2xl font-extrabold text-navy-950 mb-2">
                Artikel &amp; Panduan Alat Berat di {{ $city['name'] }}
            </h2>
            <p class="text-sm text-slate-600 mb-8">Kumpulan artikel edukatif seputar operasional keselamatan alat berat &amp; SIO untuk wilayah {{ $city['name'] }}.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $art)
                <a href="{{ route('articles.show', $art->slug) }}" class="group flex flex-col bg-concrete-50 rounded-xl border border-concrete-200 hover:border-teal-500 hover:shadow-md transition-all overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    @if($art->featured_image)
                        <div class="relative overflow-hidden bg-concrete-200 aspect-video">
                            <img
                                src="/{{ ltrim($art->featured_image, '/') }}"
                                alt="{{ $art->title }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                loading="lazy"
                            >
                        </div>
                    @else
                        <div class="aspect-video bg-gradient-to-br from-navy-900 to-navy-800 flex items-center justify-center">
                            <svg class="w-10 h-10 text-teal-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-navy-950 mb-2 group-hover:text-teal-700 transition-colors line-clamp-2">{{ $art->title }}</h3>
                        <p class="text-xs sm:text-sm text-slate-700 flex-1 leading-relaxed line-clamp-3">{{ $art->excerpt }}</p>
                        <div class="mt-4 pt-4 border-t border-concrete-100 text-xs font-bold text-teal-700 flex items-center justify-between">
                            <span>Baca Selengkapnya</span>
                            <span>&rarr;</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Nearby Cities --}}
    @if(count($nearbyCities) > 0)
    <section class="py-14 sm:py-20 bg-concrete-50 border-b border-concrete-200" aria-labelledby="city-nearby-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="city-nearby-heading" class="text-xl font-extrabold text-navy-950 mb-6">
                Kabupaten &amp; Kota Lain di Provinsi {{ $city['province'] }}
            </h2>
            <div class="flex flex-wrap gap-3">
                @foreach($nearbyCities as $c)
                <a href="{{ route('regional.city', $c['slug']) }}" class="inline-flex px-4 py-2 rounded-full bg-white border border-concrete-200 hover:border-teal-500 text-sm text-navy-800 hover:text-teal-700 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    {{ $c['name'] }}
                </a>
                @endforeach
                <a href="{{ route('regional.province', $city['province_slug']) }}" class="inline-flex px-4 py-2 rounded-full bg-teal-soft border border-teal-500/30 text-sm font-semibold text-teal-700 hover:bg-teal-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    Lihat semua Provinsi {{ $city['province'] }} &rarr;
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- FAQ --}}
    <section id="faq" class="py-14 sm:py-20 bg-white border-b border-concrete-200" aria-labelledby="city-faq-heading">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">Tanya Jawab</span>
                <h2 id="city-faq-heading" class="mt-3 text-2xl font-extrabold text-navy-950 tracking-tight">FAQ: Layanan SIO di {{ $city['name'] }}</h2>
            </div>
            <div class="space-y-4">
                @foreach([
                    [
                        'q' => 'Apakah layanan pembinaan operator alat berat menjangkau wilayah ' . $city['name'] . '?',
                        'a' => 'Ya, kami melayani calon peserta perseorangan dan perusahaan di ' . $city['name'] . ' untuk pembinaan operator seluruh 9 kategori alat berat serta koordinasi sertifikasi SIO resmi Kemnaker RI.',
                    ],
                    [
                        'q' => 'Bagaimana menentukan kategori SIO yang sesuai untuk kebutuhan proyek di ' . $city['name'] . '?',
                        'a' => 'Kategori SIO ditentukan berdasarkan jenis unit armada: SIO Excavator untuk alat gali, SIO Loader untuk pemuatan curah, SIO Bulldozer untuk perataan tanah, SIO Dump Truck untuk angkutan, dan kategori lainnya. Hubungi kami untuk konsultasi spesifik.',
                    ],
                    [
                        'q' => 'Bagaimana proses pengajuan in-house training alat berat di ' . $city['name'] . '?',
                        'a' => 'Hubungi representasi resmi kami via WhatsApp. Sampaikan jumlah operator, tipe unit alat berat yang tersedia di lokasi, dan jadwal target, lalu kami akan menerbitkan proposal teknis dan biaya penawaran resmi.',
                    ],
                ] as $faq)
                <details class="group bg-concrete-50 rounded-xl border border-concrete-200 p-5 sm:p-6 open:border-teal-500">
                    <summary class="flex justify-between items-center gap-4 font-bold text-navy-950 cursor-pointer list-none focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                        <span>{{ $faq['q'] }}</span>
                        <span class="w-7 h-7 rounded-full bg-concrete-100 flex items-center justify-center shrink-0 group-open:rotate-180 transition-transform">
                            <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </span>
                    </summary>
                    <p class="mt-4 pt-4 border-t border-concrete-100 text-sm text-slate-700 leading-relaxed">{{ $faq['a'] }}</p>
                </details>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="py-16 sm:py-24 bg-navy-950 text-white" aria-labelledby="city-cta-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 id="city-cta-heading" class="text-2xl sm:text-3xl font-extrabold uppercase tracking-tight text-white">
                    Konsultasi Training Alat Berat &amp; SIO<br><span class="text-teal-400">{{ $city['name'] }}</span>
                </h2>
                <p class="mt-4 text-base text-concrete-300 leading-relaxed">
                    Hubungi tim kami via WhatsApp untuk informasi pendaftaran operator, jadwal pembinaan terdekat, dan penawaran in-house training perusahaan di {{ $city['name'] }}.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <x-wa-cta variant="primary" size="lg" :message="$waMessage" label="Konsultasi Sekarang" class="font-bold shadow-lg" />
                    <x-button :href="route('regional.province', $city['province_slug'])" variant="outline" size="lg" class="text-white border-concrete-300 hover:bg-navy-900">Provinsi {{ $city['province'] }}</x-button>
                </div>
                <div class="mt-10 pt-8 border-t border-navy-800/80 flex flex-wrap justify-center gap-4 text-xs text-concrete-300">
                    <a href="{{ route('home') }}#pelatihan" class="text-concrete-300 hover:text-teal-400 transition-colors">9 Layanan SIO Alat Berat</a>
                    <span>•</span>
                    <a href="{{ route('home') }}#wilayah" class="text-concrete-300 hover:text-teal-400 transition-colors">Wilayah Pembinaan</a>
                    <span>•</span>
                    <a href="{{ route('regional.province', $city['province_slug']) }}" class="text-concrete-300 hover:text-teal-400 transition-colors">Provinsi {{ $city['province'] }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
