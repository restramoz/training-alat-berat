@extends('admin.layout')

@section('title', 'Manajemen Artikel — Admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-navy-950 tracking-tight">
                Manajemen Artikel
            </h1>
            <p class="text-xs text-slate-500">
                Kelola artikel edukasi &amp; panduan Training Alat Berat &amp; SIO
            </p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="px-4 py-2.5 rounded-lg bg-muted hover:bg-muted-dark text-navy-950 font-bold text-xs shadow-sm inline-flex items-center gap-1.5 transition">
            <span>+ Buat Artikel Baru</span>
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-xl border border-concrete-200 shadow-sm">
        <form method="GET" action="{{ route('admin.articles.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            <div class="sm:col-span-6">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari judul, slug, atau kota..."
                    class="w-full px-3.5 py-2 text-xs rounded-lg border border-concrete-300 bg-concrete-50 text-navy-950 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500"
                >
            </div>
            <div class="sm:col-span-4">
                <select name="status" class="w-full px-3.5 py-2 text-xs rounded-lg border border-concrete-300 bg-concrete-50 text-navy-950 focus:bg-white focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <option value="">Semua Status</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
            <div class="sm:col-span-2 flex gap-2">
                <button type="submit" class="w-full px-4 py-2 bg-muted hover:bg-muted-dark text-navy-950 text-xs font-bold rounded-lg transition cursor-pointer">
                    Filter
                </button>
                @if(request()->hasAny(['q', 'status']))
                    <a href="{{ route('admin.articles.index') }}" class="px-3 py-2 bg-white text-slate-700 hover:bg-concrete-50 text-xs font-semibold rounded-lg transition flex items-center justify-center border border-concrete-300">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl border border-concrete-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-concrete-50 border-b border-concrete-200 text-[11px] font-bold text-slate-600 uppercase tracking-wider">
                    <tr>
                        <th class="py-3 px-4">Artikel</th>
                        <th class="py-3 px-4">Wilayah Target</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Tanggal Buat</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-concrete-200">
                    @forelse($articles as $article)
                        <tr class="hover:bg-concrete-50 transition">
                            <td class="py-3.5 px-4 max-w-md">
                                <div class="font-bold text-sm text-navy-950 mb-0.5">
                                    {{ $article->title }}
                                </div>
                                <div class="text-[11px] text-slate-500 font-mono">
                                    /artikel/{{ $article->slug }}
                                </div>
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                @if($article->target_city_slug)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-teal-soft border border-teal-500/30 text-teal-700">
                                        {{ $article->target_city_slug }}
                                    </span>
                                @else
                                    <span class="text-[11px] text-slate-500">Nasional / Global</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap">
                                @if($article->status === 'published')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-teal-soft text-teal-700 border border-teal-500/30">
                                        <span class="w-1.5 h-1.5 rounded-full bg-teal-600"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-concrete-50 text-slate-600 border border-concrete-300">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap text-slate-500">
                                {{ $article->created_at->format('d M Y, H:i') }}
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap text-right">
                                <div class="inline-flex items-center gap-2">
                                    @if($article->status === 'published')
                                        <a href="{{ route('articles.show', $article->slug) }}" target="_blank" class="px-2.5 py-1 text-[11px] font-semibold text-teal-700 bg-concrete-50 border border-concrete-300 hover:bg-teal-soft rounded-lg transition" title="Lihat di publik">
                                            Lihat
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="px-2.5 py-1 text-[11px] font-semibold text-teal-700 bg-concrete-50 border border-concrete-300 hover:bg-teal-soft rounded-lg transition">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1 text-[11px] font-semibold text-white bg-red-600 hover:bg-red-700 rounded-lg transition cursor-pointer">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-500">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <p class="text-sm">Belum ada artikel yang tersimpan.</p>
                                    <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 rounded-lg bg-muted hover:bg-muted-dark text-navy-950 font-bold text-xs inline-block">
                                        Buat Artikel Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
            <div class="p-4 border-t border-concrete-200">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
