@extends('layouts.app')

@section('title', 'Training Alat Berat & Layanan SIO Provinsi ' . $province['name'] . ' — Konsultasi Resmi')
@section('meta_description', 'Informasi pembinaan Training Alat Berat dan sertifikasi SIO operator untuk wilayah Provinsi ' . $province['name'] . '.')
@section('wa_message', $waMessage)

@section('content')
    {{-- Breadcrumb --}}
    <div class="bg-navy-950 border-b border-navy-900">
        <x-breadcrumb :items="[
            ['label' => 'Wilayah', 'url' => null],
            ['label' => $province['name'], 'url' => null],
        ]" />
    </div>

    {{-- Hero --}}
    <section class="relative bg-navy-950 text-white overflow-hidden border-b border-navy-800" aria-labelledby="prov-hero-heading">
        <div class="absolute inset-0 opacity-10 pointer-events-none" aria-hidden="true">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid-p" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="#FFF" stroke-width="1"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-p)" />
            </svg>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-900 border border-teal-500/40 text-teal-400 text-xs sm:text-sm font-semibold mb-6">
                    <span class="w-2 h-2 rounded-full bg-teal-400 animate-pulse"></span>
                    Layanan Informasi &amp; Pembinaan Operator SIO
                </div>
                <h1 id="prov-hero-heading" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight uppercase">
                    Training Alat Berat &amp; Layanan SIO<br><span class="text-teal-400">Provinsi {{ $province['name'] }}</span>
                </h1>
                <p class="mt-6 text-base sm:text-lg text-concrete-300 leading-relaxed">
                    Pusat koordinasi informasi pembinaan kompetensi operator alat berat dan persiapan uji sertifikasi Lisensi K3 / SIO (Permenaker No. 8/2020) untuk kontraktor, perusahaan tambang, dan industri di <strong class="text-white">Provinsi {{ $province['name'] }}</strong>.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <x-wa-cta variant="primary" size="lg" :message="$waMessage" label="Konsultasi Wilayah {{ $province['name'] }}" class="font-bold shadow-lg" />
                </div>
                <div class="mt-10 pt-8 border-t border-navy-800/80 grid grid-cols-2 sm:grid-cols-4 gap-6">
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Pulau</div><div class="text-lg font-extrabold text-white mt-0.5">{{ $province['island'] }}</div></div>
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Kab/Kota</div><div class="text-lg font-extrabold text-white mt-0.5">{{ $province['total_cities'] }}</div></div>
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Layanan SIO</div><div class="text-lg font-extrabold text-teal-400 mt-0.5">{{ count($programs) }} Kategori</div></div>
                    <div><div class="text-xs text-concrete-300 uppercase tracking-wider font-semibold">Regulasi</div><div class="text-lg font-extrabold text-white mt-0.5">Permenaker 8/2020</div></div>
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
                    <strong class="text-navy-950">Catatan penting:</strong> Halaman ini adalah portal informasi dan koordinasi resmi. Penyelenggaraan pembinaan operator di kota/kabupaten dalam Provinsi {{ $province['name'] }}, jadwal batch, dan persyaratan administrasi dikoordinasikan secara langsung melalui tim konsultan kami.
                </p>
            </div>
        </div>
    </section>

    {{-- Program Links: 9 SIO Categories --}}
    <section id="program" class="py-14 sm:py-20 bg-concrete-50 border-b border-concrete-200" aria-labelledby="prov-program-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3.5 py-1 rounded-full border border-teal-500/20">Kategori Layanan SIO</span>
                <h2 id="prov-program-heading" class="mt-3 text-2xl sm:text-3xl font-extrabold text-navy-950 tracking-tight">
                    Program Pelatihan &amp; SIO Alat Berat di {{ $province['name'] }}
                </h2>
                <p class="mt-4 text-base text-slate-700">Pilih kategori pesawat angkat &amp; angkut sesuai kebutuhan operasional industri di Provinsi {{ $province['name'] }}.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($programs as $prog)
                <a href="{{ route('program.show', $prog['slug']) }}" class="group flex flex-col bg-white rounded-xl border border-concrete-200 hover:border-teal-500 hover:shadow-md transition-all overflow-hidden focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    <div class="h-1.5 bg-teal-600 group-hover:bg-teal-500 transition-colors"></div>
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="text-xs font-bold uppercase tracking-wider text-teal-700 mb-1">{{ $prog['category_label'] ?? 'Layanan SIO' }}</div>
                        <h3 class="text-lg font-bold text-navy-950 mb-2 group-hover:text-teal-700 transition-colors">{{ $prog['title'] }}</h3>
                        <p class="text-xs sm:text-sm text-slate-700 flex-1 leading-relaxed line-clamp-3">{{ $prog['hero_subheading'] }}</p>
                        <div class="mt-4 pt-4 border-t border-concrete-100 text-xs font-bold text-teal-700 flex items-center justify-between">
                            <span>Rincian Program</span>
                            <span>&rarr;</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Cities in Province --}}
    @if(count($province['cities']) > 0)
    <section id="kota" class="py-14 sm:py-20 bg-white border-b border-concrete-200" aria-labelledby="prov-kota-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 id="prov-kota-heading" class="text-2xl font-extrabold text-navy-950 mb-8">
                Kabupaten &amp; Kota di Provinsi {{ $province['name'] }}
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3">
                @foreach($province['cities'] as $c)
                <a href="{{ route('regional.city', $c['slug']) }}" class="block px-3.5 py-2.5 rounded-lg bg-concrete-50 border border-concrete-200 hover:border-teal-500 hover:bg-teal-soft text-sm font-medium text-navy-900 hover:text-teal-700 transition-colors truncate focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    {{ $c['name'] }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
