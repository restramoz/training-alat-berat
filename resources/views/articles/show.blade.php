@extends('layouts.app')

@section('title', $article->seo_title ?: $article->title)
@section('meta_description', $article->meta_description ?: ($article->excerpt ?: Str::limit(strip_tags($article->content), 155)))

@push('schema')
{{-- Article Structured Data --}}
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": {{ json_encode($article->title) }},
  "description": {{ json_encode($article->meta_description ?: $article->excerpt) }},
  "datePublished": "{{ ($article->published_at ?? $article->created_at)->toIso8601String() }}",
  "dateModified": "{{ $article->updated_at->toIso8601String() }}",
  @if($article->featured_image)
  "image": ["{{ url('/' . ltrim($article->featured_image, '/')) }}"],
  @endif
  "author": {
    "@type": "Organization",
    "name": "Tim Instruktur Alat Berat & SIO"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ config('app.name', 'Training Alat Berat') }}",
    "url": "{{ url('/') }}"
  }
}
</script>

@if(!empty($article->faqs) && is_array($article->faqs))
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($article->faqs as $i => $faq)
    {
      "@type": "Question",
      "name": {{ json_encode($faq['q'] ?? '') }},
      "acceptedAnswer": {
        "@type": "Answer",
        "text": {{ json_encode($faq['a'] ?? '') }}
      }
    }{{ !$loop->last ? ',' : '' }}
    @endforeach
  ]
}
</script>
@endif
@endpush

@section('content')
{{-- Breadcrumbs --}}
<nav class="bg-white border-b border-concrete-200 py-3 text-xs text-slate-500" aria-label="Breadcrumb">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <ol class="flex items-center flex-wrap gap-x-2 gap-y-1" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="{{ route('home') }}" class="hover:text-navy-950 transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-teal-500 rounded" itemprop="item">
                    <span itemprop="name">Beranda</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <li aria-hidden="true" class="text-concrete-300">/</li>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="{{ route('articles.index') }}" class="hover:text-navy-950 transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-teal-500 rounded" itemprop="item">
                    <span itemprop="name">Artikel</span>
                </a>
                <meta itemprop="position" content="2">
            </li>
            <li aria-hidden="true" class="text-concrete-300">/</li>
            <li class="text-navy-950 font-semibold truncate max-w-xs" aria-current="page">{{ $article->title }}</li>
        </ol>
    </div>
</nav>

{{-- Article Header --}}
<article class="py-12 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <header class="space-y-5 mb-8">
            <div class="flex items-center gap-2 flex-wrap">
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-teal-soft text-teal-700 border border-teal-500/30 uppercase tracking-wider">
                    Kompetensi Alat Berat &amp; SIO
                </span>
                @if($targetCity)
                    <a
                        href="{{ route('regional.city', $targetCity['slug']) }}"
                        class="px-3 py-1 rounded-full text-xs font-bold bg-teal-soft text-teal-700 hover:text-teal-600 border border-teal-500/30 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500"
                    >
                        Wilayah {{ $targetCity['name'] }}
                    </a>
                @endif
            </div>

            <h1 class="font-extrabold text-2xl sm:text-4xl text-navy-950 leading-tight">
                {{ $article->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 border-b border-concrete-200 pb-5">
                <time datetime="{{ ($article->published_at ?? $article->created_at)->toDateString() }}">
                    Diterbitkan: <strong class="text-slate-900">{{ ($article->published_at ?? $article->created_at)->format('d F Y') }}</strong>
                </time>
                <span aria-hidden="true" class="text-concrete-300">&bull;</span>
                <span>Oleh: <strong class="text-slate-900">Instruktur &amp; Spesialis Alat Berat</strong></span>
            </div>

            @if($article->excerpt)
                <p class="text-sm sm:text-base text-slate-900 leading-relaxed bg-concrete-50 p-5 rounded-xl border-l-4 border-teal-600">
                    {{ $article->excerpt }}
                </p>
            @endif
        </header>

        {{-- Featured Image --}}
        @if($article->featured_image)
            <div class="mb-10 rounded-2xl overflow-hidden border border-concrete-200 shadow-sm bg-concrete-50">
                <img
                    src="/{{ ltrim($article->featured_image, '/') }}"
                    alt="{{ $article->title }}"
                    class="w-full h-auto max-h-[520px] object-cover"
                    loading="eager"
                >
            </div>
        @endif

        <style>
            .article-content {
                width: 100%;
                max-width: 100%;
                min-width: 0;
                overflow-wrap: anywhere;
                color: #1a3a43;
            }
            .article-content h1, .article-content h2, .article-content h3, .article-content h4 {
                color: #09637e;
                font-weight: 800;
            }
            .article-content p, .article-content li {
                color: #1a3a43;
                line-height: 1.75;
            }
            .article-content a {
                color: #088395;
                text-decoration: underline;
            }
            .article-content blockquote {
                border-left: 4px solid #088395;
                background-color: #ebf4f6;
                padding: 1rem;
                border-radius: 0 0.75rem 0.75rem 0;
                color: #1a3a43;
            }
            .article-content .article-table-scroll {
                display: block;
                width: 100%;
                max-width: 100%;
                min-width: 0;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                margin: 1rem 0;
            }
            .article-content .article-table-scroll table {
                width: max-content;
                min-width: 600px;
                max-width: none;
                border-collapse: collapse;
                table-layout: auto;
            }
            .article-content .article-table-scroll th,
            .article-content .article-table-scroll td {
                border: 1px solid #a8d0d0;
                padding: 10px 12px;
                text-align: left;
                vertical-align: top;
                white-space: normal;
                overflow-wrap: anywhere;
                color: #1a3a43;
            }
            .article-content .article-table-scroll th {
                background: #ebf4f6;
                font-weight: 700;
            }
            .article-content .article-table-scroll td {
                background: #ffffff;
            }
            /* Compatibility for stored article bodies written with the previous palette. */
            .article-content .bg-\[\#481E14\] { background-color: #ebf4f6; }
            .article-content .bg-\[\#0C0C0C\] { background-color: #ffffff; }
            .article-content .bg-\[\#F2613F\] { background-color: #7ab2b2; color: #042a37; }
            .article-content .text-\[\#F2613F\] { color: #09637e; }
            .article-content .hover\:text-\[\#F2613F\]:hover { color: #088395; }
            .article-content .text-\[\#0C0C0C\] { color: #042a37; }
            .article-content .border-\[\#9B3922\] { border-color: #a8d0d0; }
            .article-content .hover\:bg-\[\#9B3922\]:hover { background-color: #5a9494; }
        </style>

        {{-- Main Content (sanitized on write, safe to render) --}}
        <div class="article-content space-y-6 text-sm sm:text-base leading-relaxed">
            {!! $article->content !!}
        </div>

        <script>
            document.querySelectorAll('.article-content table').forEach(function (table) {
                if (table.parentElement.classList.contains('article-table-scroll')) return;

                const wrapper = document.createElement('div');
                wrapper.className = 'article-table-scroll';
                table.parentNode.insertBefore(wrapper, table);
                wrapper.appendChild(table);
            });
        </script>

        {{-- FAQ Section --}}
        @if(!empty($article->faqs) && is_array($article->faqs))
            <div class="mt-12 pt-8 border-t border-concrete-200 space-y-4">
                <h2 class="font-extrabold text-xl text-navy-950">
                    Pertanyaan Umum (FAQ)
                </h2>
                <div class="space-y-3" role="list">
                    @foreach($article->faqs as $i => $faq)
                        <details
                            class="group bg-concrete-50 border border-concrete-200 rounded-xl overflow-hidden"
                            @if($loop->first) open @endif
                        >
                            <summary class="flex items-center justify-between px-5 py-4 font-bold text-sm text-navy-950 cursor-pointer select-none list-none hover:bg-concrete-100 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-teal-500">
                                <span>{{ $faq['q'] ?? '' }}</span>
                                <svg class="w-4 h-4 text-slate-500 shrink-0 ml-3 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </summary>
                            <div class="px-5 pb-5 pt-2 text-sm text-slate-700 leading-relaxed border-t border-concrete-200">
                                {{ $faq['a'] ?? '' }}
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Consultation CTA --}}
        <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-navy-950 to-navy-900 text-white space-y-4">
            <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-teal-400 text-xs font-bold uppercase tracking-wider border border-teal-500/30">
                LAYANAN TRAINING ALAT BERAT &amp; SIO
            </span>
            <h3 class="font-extrabold text-xl sm:text-2xl text-white">
                Konsultasikan Pelatihan &amp; Uji Kompetensi SIO Operator Anda
            </h3>
            <p class="text-sm text-concrete-300 leading-relaxed max-w-2xl">
                Dapatkan informasi silabus pelatihan alat berat, persiapan uji sertifikasi BNSP / Kemnaker, dan persyaratan penerbitan SIO resmi.
            </p>
            <div class="pt-2 flex flex-wrap gap-3">
                <x-wa-cta variant="primary" label="Konsultasi Program Sekarang" />
                <a href="{{ route('articles.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg border border-white/20 text-white hover:bg-white/10 text-sm font-bold transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500">
                    &larr; Lihat Artikel Lainnya
                </a>
            </div>
        </div>
    </div>
</article>

{{-- Related Articles --}}
@if($relatedArticles->isNotEmpty())
<section class="py-12 bg-concrete-50 border-t border-concrete-200" aria-label="Artikel terkait">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-extrabold text-xl text-navy-950 mb-6">
            Artikel Pelatihan &amp; SIO Alat Berat Lainnya
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedArticles as $rel)
                <article class="bg-white rounded-2xl border border-concrete-200 p-5 space-y-2.5 flex flex-col justify-between shadow-sm hover:border-teal-500 transition-all">
                    <div>
                        <time class="text-xs text-slate-500 block" datetime="{{ ($rel->published_at ?? $rel->created_at)->toDateString() }}">
                            {{ ($rel->published_at ?? $rel->created_at)->format('d M Y') }}
                        </time>
                        <h3 class="font-bold text-sm text-navy-950 hover:text-teal-700 line-clamp-2 mt-1 transition-colors">
                            <a href="{{ route('articles.show', $rel->slug) }}" class="focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                                {{ $rel->title }}
                            </a>
                        </h3>
                        @if($rel->excerpt)
                            <p class="text-xs text-slate-700 line-clamp-2 mt-1">
                                {{ $rel->excerpt }}
                            </p>
                        @endif
                    </div>
                    <a href="{{ route('articles.show', $rel->slug) }}" class="text-xs font-bold text-teal-700 hover:text-teal-600 pt-2 inline-flex items-center gap-1 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 rounded">
                        <span>Baca Artikel &rarr;</span>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
