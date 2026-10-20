@extends('layouts.app')

@section('title', 'Training Ahli K3 Umum — Sertifikasi & Pembinaan K3 Nasional')
@section('meta_description', 'Portal resmi layanan informasi Training Ahli K3 Umum, spesialisasi K3, dan jasa konsultansi SMK3 PP No. 50/2012 untuk industri di seluruh Indonesia.')

@section('content')
@php
    $regionalService = resolve(App\Services\RegionalService::class);
    $provinces = $regionalService->getAllProvinces();
    $allPrograms = config('programs', []);

    $trainings = collect($allPrograms)->filter(fn($p) => ($p['category'] ?? '') === 'training')->all();
    $services = collect($allPrograms)->filter(fn($p) => ($p['category'] ?? '') === 'service')->all();
@endphp

    <!-- HERO SECTION -->
    <section class="relative bg-navy-950 text-white overflow-hidden border-b border-navy-800" aria-labelledby="hero-heading">
        <!-- Subtle Grid Pattern Accent -->
        <div class="absolute inset-0 opacity-10 pointer-events-none" aria-hidden="true">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#FFFFFF" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-pattern)" />
            </svg>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 lg:py-28">
            <div class="max-w-3xl">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-900 border border-teal-500/40 text-teal-400 text-xs sm:text-sm font-semibold mb-6 shadow-inner">
                    <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                    Landasan Regulasi UU No. 1/1970 &amp; PP No. 50/2012 (SMK3)
                </div>

                <!-- Main Heading -->
                <h1 id="hero-heading" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight uppercase">
                    Pembinaan Kompetensi &amp; <span class="text-orange-400">Training Ahli K3 Umum</span>
                </h1>

                <!-- Subheading -->
                <p class="mt-6 text-base sm:text-lg lg:text-xl text-concrete-300 leading-relaxed">
                    Tingkatkan kompetensi keselamatan dan kesehatan kerja personil Anda melalui pembinaan terstruktur, persiapan uji kompetensi, dan kepatuhan Sistem Manajemen K3 (SMK3) terintegrasi di tempat kerja.
                </p>

                <!-- Actions -->
                <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                    <x-wa-cta variant="primary" size="lg" label="Konsultasi Program via WhatsApp" class="shadow-md bg-orange-500 hover:bg-orange-600 text-white font-bold" />
                    <x-button href="#pelatihan" variant="outline" size="lg" class="text-white border-concrete-300 hover:bg-navy-900">
                        Lihat Program Pelatihan K3
                    </x-button>
                </div>

                <!-- Value Highlights Grid -->
                <div class="mt-12 pt-8 border-t border-navy-800/80 grid grid-cols-2 sm:grid-cols-4 gap-6">
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-orange-400">{{ count($trainings) }} Pelatihan</div>
                        <div class="text-xs sm:text-sm text-concrete-300 mt-1 font-medium">Ahli K3, Konstruksi, Kimia</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">{{ count($services) }} Jasa K3</div>
                        <div class="text-xs sm:text-sm text-concrete-300 mt-1 font-medium">Audit SMK3, HIRADC, SOP</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-teal-400">Standar Resmi</div>
                        <div class="text-xs sm:text-sm text-concrete-300 mt-1 font-medium">Regulasi Kemnaker / BNSP</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">Nasional</div>
                        <div class="text-xs sm:text-sm text-concrete-300 mt-1 font-medium">Jangkauan 38 Provinsi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 1: SERTIFIKASI & PELATIHAN -->
    <section id="pelatihan" class="py-16 sm:py-24 bg-concrete-50" aria-labelledby="pelatihan-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">
                    Sertifikasi &amp; Pelatihan
                </span>
                <h2 id="pelatihan-heading" class="mt-3 text-2xl sm:text-3xl lg:text-4xl font-extrabold text-navy-950 tracking-tight">
                    Program Pelatihan Kompetensi K3
                </h2>
                <p class="mt-4 text-base text-slate-700">
                    Program pembinaan teknis dan persiapan uji kompetensi profesi bidang Keselamatan dan Kesehatan Kerja (K3) sesuai peraturan perundangan yang berlaku.
                </p>
            </div>

            <!-- Training Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
                @foreach($trainings as $slug => $item)
                    <div class="flex flex-col bg-white rounded-xl border border-concrete-200 shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
                        <div class="h-2 bg-teal-700"></div>
                        <div class="p-6 sm:p-7 flex-1 flex flex-col">
                            <div class="flex items-center justify-between text-xs font-bold uppercase tracking-wider text-teal-700 mb-2">
                                <span>{{ $item['level'] }}</span>
                                <span class="text-[10px] bg-concrete-100 text-slate-700 px-2 py-0.5 rounded font-semibold">{{ $item['badge'] ?? 'K3' }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-navy-950 mb-3 group-hover:text-teal-700 transition-colors">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-sm text-slate-700 leading-relaxed mb-6">
                                {{ Str::limit($item['introduction'], 140) }}
                            </p>
                            
                            @if(!empty($item['curriculum_topics']) && count($item['curriculum_topics']) > 0)
                            <div class="mt-auto pt-4 border-t border-concrete-100 space-y-2 mb-6">
                                <div class="text-xs font-semibold text-navy-900 uppercase tracking-wider">Cakupan Materi Utama:</div>
                                <ul class="text-xs text-slate-700 space-y-1.5" role="list">
                                    @foreach(array_slice($item['curriculum_topics'], 0, 3) as $topic)
                                        <li class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-teal-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            <span>{{ Str::limit($topic, 50) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="space-y-2.5 mt-auto">
                                <x-wa-cta variant="secondary" size="md" :message="$item['wa_message']" :label="'Konsultasi ' . explode('(', $item['title'])[0]" class="w-full justify-center" />
                                <a href="{{ route('program.show', $slug) }}" class="inline-flex items-center justify-center w-full text-xs font-bold text-navy-900 hover:text-teal-700 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                                    Detail Silabus &amp; Persyaratan &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 2: JASA KONSULTANSI & PENGUJIAN K3 -->
    <section id="jasa" class="py-16 sm:py-24 bg-white border-t border-concrete-200" aria-labelledby="jasa-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">
                    Layanan Konsultansi &amp; Teknis
                </span>
                <h2 id="jasa-heading" class="mt-3 text-2xl sm:text-3xl lg:text-4xl font-extrabold text-navy-950 tracking-tight">
                    Jasa Konsultansi &amp; Penerapan K3
                </h2>
                <p class="mt-4 text-base text-slate-700">
                    Pendampingan penyusunan Sistem Manajemen K3 (SMK3), penilaian risiko HIRADC, pengukuran lingkungan kerja, dan penguatan budaya keselamatan industri.
                </p>
            </div>

            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
                @foreach($services as $slug => $item)
                    <div class="flex flex-col bg-concrete-50 rounded-xl border border-concrete-200 shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
                        <div class="h-2 bg-navy-900"></div>
                        <div class="p-6 sm:p-7 flex-1 flex flex-col">
                            <div class="text-xs font-bold uppercase tracking-wider text-navy-700 mb-2">
                                {{ $item['level'] }}
                            </div>
                            <h3 class="text-xl font-bold text-navy-950 mb-3 group-hover:text-teal-700 transition-colors">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-sm text-slate-700 leading-relaxed mb-6">
                                {{ Str::limit($item['introduction'], 140) }}
                            </p>
                            
                            @if(!empty($item['roles_and_responsibilities']) && count($item['roles_and_responsibilities']) > 0)
                            <div class="mt-auto pt-4 border-t border-concrete-200 space-y-2 mb-6">
                                <div class="text-xs font-semibold text-navy-900 uppercase tracking-wider">Ruang Lingkup Kerja:</div>
                                <ul class="text-xs text-slate-700 space-y-1.5" role="list">
                                    @foreach(array_slice($item['roles_and_responsibilities'], 0, 3) as $deliverable)
                                        <li class="flex items-start gap-2">
                                            <svg class="w-4 h-4 text-teal-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/></svg>
                                            <span>{{ $deliverable['title'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="space-y-2.5 mt-auto">
                                <x-wa-cta variant="primary" size="md" :message="$item['wa_message']" label="Minta Proposal Penawaran" class="w-full justify-center bg-orange-500 hover:bg-orange-600 text-white font-bold" />
                                <a href="{{ route('program.show', $slug) }}" class="inline-flex items-center justify-center w-full text-xs font-bold text-navy-900 hover:text-teal-700 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                                    Lihat Detail Layanan &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN SECTION -->
    <section id="keunggulan" class="py-16 sm:py-24 bg-concrete-100 border-t border-concrete-200" aria-labelledby="keunggulan-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">
                    Mengapa Memilih Kami
                </span>
                <h2 id="keunggulan-heading" class="mt-3 text-2xl sm:text-3xl lg:text-4xl font-extrabold text-navy-950 tracking-tight">
                    Keunggulan Layanan Training &amp; Konsultansi K3
                </h2>
                <p class="mt-4 text-base text-slate-700">
                    Pengalaman mendampingi kepatuhan keselamatan kerja industri, instruktur bersertifikasi resmi, dan kurikulum yang aplikatif.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Pillar 1 -->
                <div class="p-6 rounded-xl bg-white border border-concrete-200 shadow-sm">
                    <div class="w-12 h-12 rounded-lg bg-navy-950 text-orange-400 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-navy-950 mb-2">Dasar Regulasi Resmi</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Materi pelatihan dan acuan teknis mengacu pada UU No. 1/1970, PP No. 50/2012 (SMK3), dan regulasi Kemnaker RI.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="p-6 rounded-xl bg-white border border-concrete-200 shadow-sm">
                    <div class="w-12 h-12 rounded-lg bg-navy-950 text-teal-400 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-navy-950 mb-2">Instruktur Berpengalaman</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Didukung tenaga pengajar dan praktisi K3 senior yang berpengalaman dalam audit dan penerapan sistem di berbagai sektor industri.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="p-6 rounded-xl bg-white border border-concrete-200 shadow-sm">
                    <div class="w-12 h-12 rounded-lg bg-navy-950 text-orange-400 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-navy-950 mb-2">Materi Praktis &amp; Terstruktur</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Kurikulum mengombinasikan pemahaman regulasi, identifikasi bahaya lapangan (HIRADC), dan studi kasus nyata di tempat kerja.
                    </p>
                </div>

                <!-- Pillar 4 -->
                <div class="p-6 rounded-xl bg-white border border-concrete-200 shadow-sm">
                    <div class="w-12 h-12 rounded-lg bg-navy-950 text-teal-400 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-navy-950 mb-2">Konsultasi Responsif</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Layanan konsultasi cepat dan transparan mengenai persyaratan pendaftaran, jadwal batch, dan in-house training via WhatsApp.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section id="faq" class="py-16 sm:py-24 bg-white border-t border-concrete-200" aria-labelledby="faq-heading">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">
                    Tanya Jawab
                </span>
                <h2 id="faq-heading" class="mt-3 text-2xl sm:text-3xl font-extrabold text-navy-950 tracking-tight">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="mt-3 text-sm sm:text-base text-slate-700">
                    Seputar program pelatihan kompetensi K3 dan jasa konsultansi SMK3.
                </p>
            </div>

            <div class="space-y-4">
                <details class="group bg-concrete-50 rounded-lg border border-concrete-200 p-5 open:ring-1 open:ring-navy-900 transition-all">
                    <summary class="font-bold text-navy-950 cursor-pointer list-none flex items-center justify-between focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                        <span>Apakah setiap perusahaan wajib memiliki Ahli K3 Umum?</span>
                        <svg class="w-5 h-5 text-slate-500 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <p class="mt-3 text-sm text-slate-700 leading-relaxed">
                        Berdasarkan UU No. 1 Tahun 1970 dan Permenaker No. 2/1992, perusahaan yang mempekerjakan 100 orang atau lebih, atau yang memiliki tingkat potensi bahaya tinggi, diwajibkan memiliki Ahli K3 Umum. Konsultasikan kewajiban spesifik ke Disnaker setempat untuk memastikan kepatuhan organisasi Anda.
                    </p>
                </details>

                <details class="group bg-concrete-50 rounded-lg border border-concrete-200 p-5 open:ring-1 open:ring-navy-900 transition-all">
                    <summary class="font-bold text-navy-950 cursor-pointer list-none flex items-center justify-between focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                        <span>Apa dasar hukum penerapan Sistem Manajemen K3 (SMK3)?</span>
                        <svg class="w-5 h-5 text-slate-500 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <p class="mt-3 text-sm text-slate-700 leading-relaxed">
                        Penerapan SMK3 diatur dalam Peraturan Pemerintah No. 50 Tahun 2012. Perusahaan yang mempekerjakan minimal 100 orang pekerja atau mempunyai potensi bahaya tinggi wajib menerapkan SMK3 yang dibuktikan melalui audit internal maupun eksternal.
                    </p>
                </details>

                <details class="group bg-concrete-50 rounded-lg border border-concrete-200 p-5 open:ring-1 open:ring-navy-900 transition-all">
                    <summary class="font-bold text-navy-950 cursor-pointer list-none flex items-center justify-between focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                        <span>Apa perbedaan antara pelatihan K3 dan penunjukan resmi Ahli K3?</span>
                        <svg class="w-5 h-5 text-slate-500 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <p class="mt-3 text-sm text-slate-700 leading-relaxed">
                        Pelatihan K3 adalah pembinaan kompetensi teknis dan manajerial. Penunjukan resmi Ahli K3 Umum merupakan keputusan administratif yang diterbitkan oleh Kementerian Ketenagakerjaan RI berdasarkan pemenuhan seluruh persyaratan yang diatur dalam Permenaker No. 2/1992.
                    </p>
                </details>

                <details class="group bg-concrete-50 rounded-lg border border-concrete-200 p-5 open:ring-1 open:ring-navy-900 transition-all">
                    <summary class="font-bold text-navy-950 cursor-pointer list-none flex items-center justify-between focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                        <span>Bagaimana cara mendaftar in-house training K3 untuk perusahaan?</span>
                        <svg class="w-5 h-5 text-slate-500 group-open:rotate-180 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <p class="mt-3 text-sm text-slate-700 leading-relaxed">
                        Hubungi konsultan kami melalui WhatsApp. Tim kami akan melakukan asesmen awal kebutuhan pelatihan, menganalisis profil risiko kerja, dan menyusun proposal penawaran serta opsi jadwal yang fleksibel bagi operasional perusahaan Anda.
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- FINAL CTA BANNER -->
    <section id="kontak" class="bg-navy-950 text-white py-16 sm:py-20 border-t border-navy-800 relative overflow-hidden" aria-labelledby="cta-heading">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider text-orange-400 bg-navy-900 rounded-full border border-navy-700 mb-4">
                Konsultasi &amp; Pendaftaran Program
            </span>
            <h2 id="cta-heading" class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight uppercase">
                Pastikan Kepatuhan K3 &amp; Keselamatan Kerja di Tempat Anda
            </h2>
            <p class="mt-4 text-base sm:text-lg text-concrete-300 max-w-2xl mx-auto leading-relaxed">
                Hubungi tim konsultan kami via WhatsApp untuk konsultasi jadwal batch pelatihan, penawaran in-house training, atau pendampingan penerapan SMK3.
            </p>
            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                <x-wa-cta variant="primary" size="lg" label="Konsultasi via WhatsApp Sekarang" class="shadow-lg bg-orange-500 hover:bg-orange-600 text-white font-bold" />
            </div>
        </div>
    </section>

    <!-- REGION DIRECTORY SECTION -->
    <section id="wilayah" class="py-14 bg-concrete-50 border-t border-concrete-200" aria-label="Jelajahi Wilayah">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">
                    Jangkauan Wilayah
                </span>
                <h2 class="text-2xl font-extrabold text-navy-950 mt-2">Layanan Pembinaan K3 di 38 Provinsi</h2>
                <p class="text-sm text-slate-700 mt-1">Kami melayani pelatihan publik daring dan bimbingan teknis on-site di seluruh Indonesia.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($provinces as $prov)
                    <a href="{{ route('regional.province', $prov['slug']) }}" class="block p-4 bg-white rounded-lg border border-concrete-200 hover:border-teal-500 hover:shadow-sm transition group">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-sm text-navy-950 group-hover:text-teal-700 transition-colors">{{ $prov['name'] }}</span>
                            @if(!empty($prov['total_cities']))
                                <span class="text-[11px] text-slate-500 bg-concrete-100 px-2 py-0.5 rounded">{{ $prov['total_cities'] }} Kab/Kota</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
