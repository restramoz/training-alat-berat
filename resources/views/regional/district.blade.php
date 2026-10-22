@extends('layouts.app')

{{-- District pages are intentionally noindex: content is thin until meaningful local detail is available --}}
@section('robots', 'noindex, follow')

@section('title', 'Training Alat Berat & SIO — Kecamatan ' . $district['name'] . ', ' . $district['city_name'])
@section('meta_description', 'Halaman referensi wilayah administratif Kecamatan ' . $district['name'] . ' di ' . $district['city_name'] . '. Konsultasi pembinaan operator alat berat dan pengurusan SIO resmi Kemnaker RI.')
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
                    <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                    Halaman Referensi Wilayah
                </div>
                <h1 id="dist-hero-heading" class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-white leading-tight uppercase">
                    Training Alat Berat &amp; SIO – <span class="text-teal-400">Kec. {{ $district['name'] }}</span>
                </h1>
                <p class="mt-4 text-base text-concrete-300 leading-relaxed">
                    Halaman ini adalah referensi wilayah administratif untuk <strong class="text-white">Kecamatan {{ $district['name'] }}</strong>, <a href="{{ route('regional.city', $district['city_slug']) }}" class="text-teal-400 hover:text-white underline font-semibold transition-colors">{{ $district['city_name'] }}</a>, Provinsi {{ $district['province'] }}.
                    Untuk konsultasi pembinaan operator alat berat atau permohonan sertifikasi SIO, hubungi representasi resmi kami.
                </p>
                <div class="mt-6">
                    <x-wa-cta variant="primary" size="md" :message="$waMessage" label="Konsultasi Layanan SIO" class="font-bold" />
                </div>
            </div>
        </div>
    </section>

    {{-- Thin-content notice --}}
    <section class="py-8 bg-safety-soft border-b border-safety-400/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-start gap-4">
                <svg class="w-5 h-5 text-safety-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="text-sm text-slate-700 leading-relaxed">
                    Halaman ini menyediakan informasi awal tingkat kecamatan. Penyelenggaraan pembinaan operator di lapangan, in-house training perusahaan, dan asesmen sertifikasi SIO dikoordinasikan secara terpusat melalui tim representasi resmi kami.
                </p>
            </div>
        </div>
    </section>

    {{-- Program Links: 9 SIO Categories --}}
    <section class="py-14 sm:py-20 bg-concrete-50 border-b border-concrete-200" aria-labelledby="dist-program-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="dist-program-heading" class="text-xl font-extrabold text-navy-950 mb-8">Layanan Pembinaan &amp; SIO Alat Berat</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($programs as $prog)
                <a href="{{ route('city.program.detail', ['city' => $district['city_slug'], 'program' => $prog['slug']]) }}" class="group flex flex-col bg-white rounded-xl border border-concrete-200 hover:border-teal-500 hover:shadow-md transition-all overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    <div class="h-1.5 bg-teal-600 group-hover:bg-teal-500 transition-colors"></div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="text-xs font-bold uppercase tracking-wider text-teal-700 mb-1">{{ $prog['category_label'] ?? 'Layanan SIO' }}</div>
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
                <a href="{{ route('regional.city', $district['city_slug']) }}" class="inline-flex px-3 py-1.5 rounded-full bg-teal-soft border border-teal-500/30 text-sm font-semibold text-teal-700 hover:bg-teal-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    Lihat semua kecamatan {{ $district['city_name'] }} &rarr;
                </a>
            </div>
        </div>
    </section>
    @endif
@endsection
