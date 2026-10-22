@extends('layouts.app')

@section('title', 'Artikel & Panduan Training Alat Berat')
@section('meta_description', 'Kumpulan artikel dan panduan teknis operasional, keselamatan kerja, dan sertifikasi SIO alat berat.')

@section('content')
{{-- Hero Section --}}
<section class="py-14 lg:py-20 bg-navy-950 border-b border-navy-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-5">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-navy-900 border border-teal-500/40 text-teal-400 text-xs font-bold uppercase tracking-wider">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Edukasi &amp; Regulasi Alat Berat
            </span>
            <h1 class="font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white leading-tight">
                Artikel &amp; Panduan
                <span class="text-teal-400 block">Operasional &amp; SIO Alat Berat</span>
            </h1>
            <p class="text-base text-concrete-300 leading-relaxed max-w-2xl">
                Panduan komprehensif mengenai keselamatan pengoperasian pesawat angkat dan angkut, pemenuhan Permenaker No. 8 Tahun 2020, prosedur inspeksi harian, dan pembinaan kompetensi operator alat berat.
            </p>
        </div>
    </div>
</section>

{{-- Articles Grid Section --}}
<section class="py-14 bg-concrete-50" aria-label="Daftar artikel alat berat dan SIO">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
                <article class="bg-white rounded-2xl border border-concrete-200 shadow-sm overflow-hidden flex flex-col hover:border-teal-500 transition-all duration-200">
                    <div class="flex-grow">
                        @if($article->featured_image)
                            <a href="{{ route('articles.show', $article->slug) }}" class="block h-48 overflow-hidden bg-concrete-100" tabindex="-1" aria-hidden="true">
                                <img
                                    src="/{{ ltrim($article->featured_image, '/') }}"
                                    alt="{{ $article->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                                    loading="lazy"
                                    width="600" height="400"
                                >
                            </a>
                        @else
                            <div class="h-32 bg-gradient-to-br from-navy-900 to-navy-800 border-b border-concrete-200 flex items-center justify-center" aria-hidden="true">
                                <svg class="w-10 h-10 text-teal-400/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z"/></svg>
                            </div>
                        @endif

                        <div class="p-6 space-y-3">
                            <div class="flex items-center justify-between text-xs text-slate-500">
                                <time datetime="{{ ($article->published_at ?? $article->created_at)->toDateString() }}">
                                    {{ ($article->published_at ?? $article->created_at)->format('d M Y') }}
                                </time>
                                @if($article->target_city_slug)
                                    <span class="px-2 py-0.5 rounded-full bg-teal-soft border border-teal-500/30 text-teal-700 font-bold">
                                        {{ ucwords(str_replace('-', ' ', $article->target_city_slug)) }}
                                    </span>
                                @endif
                            </div>

                            <h2 class="font-bold text-lg text-navy-950 leading-snug hover:text-teal-700 transition-colors">
                                <a href="{{ route('articles.show', $article->slug) }}" class="focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                                    {{ $article->title }}
                                </a>
                            </h2>

                            @if($article->excerpt)
                                <p class="text-sm text-slate-700 leading-relaxed line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>
                            @endif
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2 border-t border-concrete-100">
                        <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-teal-700 hover:text-teal-600 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-3 py-20 text-center space-y-4">
                    <div class="w-16 h-16 mx-auto rounded-full bg-teal-soft border border-teal-500/30 flex items-center justify-center" aria-hidden="true">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <p class="font-bold text-navy-950">Belum ada artikel yang diterbitkan.</p>
                    <p class="text-sm text-slate-700">Panduan teknis dan informasi regulasi pengoperasian alat berat serta lisensi SIO akan segera hadir.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-lg bg-muted hover:bg-muted-dark text-navy-950 font-bold text-sm transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            @endforelse
        </div>

        @if($articles->hasPages())
            <div class="mt-12">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
