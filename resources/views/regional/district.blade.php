@extends('layouts.app')

{{-- District pages are intentionally noindex: content is thin until meaningful local detail is available --}}
@section('robots', 'noindex, follow')

@section('title', 'Layanan K3 & Training Ahli K3 Umum — Kecamatan ' . $district['name'] . ', ' . $district['city_name'])
@section('meta_description', 'Halaman referensi wilayah administratif Kecamatan ' . $district['name'] . ' di ' . $district['city_name'] . '. Konsultasi pembinaan kompetensi K3 dan jasa konsultansi SMK3 tersedia melalui WhatsApp.')
@section('wa_message', $waMessage)

@section('content')
    {{-- Breadcrumb --}}
    <div class="bg-navy-950 border-b border-navy-900">
        <x-breadcrumb :items="[
            ['label' => 'Wilayah', 'url' => null],
            ['label' => $district['province'], 'url' => route('regional.province', $district['province_slug'])],
            ['label' => $district['city_name'], 'url' => route('regional.city', $district['city_slug'])],
            ['label' => $district['name'], 'url' => null],
        ]" />
    </div>

    {{-- Hero (compact — thin page) --}}
    <section class="relative bg-navy-950 text-white overflow-hidden border-b border-navy-800" aria-labelledby="dist-hero-heading">
        <div class="absolute inset-0 opacity-10 pointer-events-none" aria-hidden="true">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid-d" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="#FFF" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-d)" />
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-900 border border-teal-500/40 text-teal-400 text-xs sm:text-sm font-semibold mb-6">
                    <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                    Halaman Referensi Wilayah
                </div>
                <h1 id="dist-hero-heading" class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white leading-tight uppercase">
                    Training Ahli K3 Umum &amp; K3 – <span class="text-orange-400">Kec. {{ $district['name'] }}</span>
                </h1>
                <p class="mt-4 text-base text-concrete-300 leading-relaxed">
                    Halaman ini adalah halaman referensi wilayah untuk <strong class="text-white">Kecamatan {{ $district['name'] }}</strong>, <a href="{{ route('regional.city', $district['city_slug']) }}" class="text-teal-400 hover:text-teal-300 underline">{{ $district['city_name'] }}</a>, Provinsi {{ $district['province'] }}.
                    Untuk konsultasi pembinaan kompetensi K3 atau penerapan SMK3, hubungi representasi resmi kami.
                </p>
                <div class="mt-6">
                    <x-wa-cta variant="primary" size="md" :message="$waMessage" label="Konsultasi Layanan K3" class="bg-orange-500 hover:bg-orange-600 text-white font-bold" />
                </div>
            </div>
        </div>
    </section>

    {{-- Thin-content notice --}}
    <section class="py-8 bg-concrete-100 border-b border-concrete-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-start gap-4">
                <svg class="w-5 h-5 text-slate-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm text-slate-700 leading-relaxed">
                    Halaman ini menyediakan informasi awal tingkat kecamatan. Penyelenggaraan pelatihan tatap muka, in-house training perusahaan, dan konsultansi penyusunan dokumen SMK3 dikonfirmasi langsung melalui representasi resmi kami.
                </p>
            </div>
        </div>
    </section>

    {{-- Program Links --}}
    <section class="py-14 sm:py-20 bg-concrete-50 border-b border-concrete-200" aria-labelledby="dist-program-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="dist-program-heading" class="text-xl font-extrabold text-navy-950 mb-8">Layanan Pembinaan K3 &amp; Ahli K3 Umum</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($programs as $prog)
                <a href="{{ route('city.program.detail', ['city' => $district['city_slug'], 'program' => $prog['slug']]) }}" class="group flex flex-col bg-white rounded-xl border border-concrete-200 hover:border-teal-500 hover:shadow-md transition-all overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    <div class="h-1.5 {{ ($prog['category'] ?? 'training') === 'training' ? 'bg-teal-600' : 'bg-navy-900' }}"></div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="text-xs font-bold uppercase tracking-wider text-teal-700 mb-1">{{ $prog['category_label'] ?? 'Layanan' }}</div>
                        <h3 class="text-base font-bold text-navy-950 mb-2 group-hover:text-teal-700 transition-colors">{{ $prog['title'] }}</h3>
                        <p class="text-xs text-slate-700 flex-1 leading-relaxed line-clamp-3">{{ $prog['hero_subheading'] }}</p>
                        <div class="mt-4 pt-4 border-t border-concrete-100 text-xs font-bold text-teal-700 flex items-center justify-between">
                            <span>Detail Layanan</span>
                            <span>&rarr;</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Sibling Districts --}}
    @if(isset($district['sibling_districts']) && count($district['sibling_districts']) > 0)
    <section class="py-10 bg-white border-b border-concrete-200" aria-labelledby="dist-sibling-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="dist-sibling-heading" class="text-lg font-bold text-navy-950 mb-5">
                Kecamatan Lain di {{ $district['city_name'] }}
            </h2>
            <div class="flex flex-wrap gap-2">
                @foreach(array_slice($district['sibling_districts'], 0, 12) as $sib)
                <a href="{{ route('regional.district', [$district['city_slug'], $sib['slug']]) }}" class="inline-flex px-3 py-1.5 rounded-full bg-concrete-50 border border-concrete-200 hover:border-teal-500 text-sm text-navy-800 hover:text-teal-700 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    {{ $sib['name'] }}
                </a>
                @endforeach
                <a href="{{ route('regional.city', $district['city_slug']) }}" class="inline-flex px-3 py-1.5 rounded-full bg-teal-soft border border-teal-300 text-sm font-semibold text-teal-800 hover:bg-teal-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    Lihat semua kecamatan {{ $district['city_name'] }} &rarr;
                </a>
            </div>
        </div>
    </section>
    @endif

    <x-regional-map :citySlug="$district['city_slug']" :districtSlug="$district['slug']" :regionName="'Kecamatan ' . $district['name']" />

    {{-- Articles --}}
    @if(isset($articles) && count($articles) > 0)
    <section id="artikel" class="py-14 sm:py-20 bg-white border-b border-concrete-200" aria-labelledby="dist-article-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="dist-article-heading" class="text-xl font-extrabold text-navy-950 mb-2">
                Artikel &amp; Panduan di Kecamatan {{ $district['name'] }}
            </h2>
            <p class="text-sm text-slate-600 mb-8">Kumpulan artikel edukatif terkait keselamatan kerja &amp; SMK3 untuk wilayah {{ $district['city_name'] }}.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $art)
                <a href="{{ route('articles.show', $art->slug) }}" class="group flex flex-col bg-concrete-50 rounded-xl border border-concrete-200 hover:border-teal-500 hover:shadow-md transition-all overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    {{-- Featured Image --}}
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
                            <svg class="w-10 h-10 text-orange-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-base font-bold text-navy-950 mb-2 group-hover:text-teal-700 transition-colors line-clamp-2">{{ $art->title }}</h3>
                        <p class="text-xs text-slate-700 flex-1 leading-relaxed line-clamp-3">{{ $art->excerpt }}</p>
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

    {{-- Final CTA --}}
    <section class="py-14 sm:py-20 bg-navy-950 text-white" aria-labelledby="dist-cta-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-2xl mx-auto">
                <h2 id="dist-cta-heading" class="text-xl sm:text-2xl font-extrabold uppercase tracking-tight">
                    Konsultasi Layanan K3<br><span class="text-orange-400">Kecamatan {{ $district['name'] }}</span>
                </h2>
                <p class="mt-4 text-sm text-concrete-300 leading-relaxed">
                    Hubungi konsultan kami untuk informasi silabus resmi, pendaftaran batch pelatihan K3, atau konsultansi persiapan audit SMK3.
                </p>
                <div class="mt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <x-wa-cta variant="primary" size="lg" :message="$waMessage" label="Konsultasi Sekarang" class="bg-orange-500 hover:bg-orange-600 text-white font-bold shadow-lg" />
                    <x-button :href="route('regional.city', $district['city_slug'])" variant="outline" size="lg" class="text-white border-concrete-300 hover:bg-navy-900">{{ $district['city_name'] }}</x-button>
                </div>
            </div>
        </div>
    </section>
@endsection
