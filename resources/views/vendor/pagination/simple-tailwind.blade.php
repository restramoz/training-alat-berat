@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-between items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-xs font-semibold text-slate-400 bg-concrete-50 border border-concrete-300 cursor-not-allowed rounded-lg">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-xs font-semibold text-teal-700 bg-white border border-concrete-300 rounded-lg hover:bg-teal-soft transition focus:outline-none focus:ring-1 focus:ring-teal-500">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-xs font-semibold text-teal-700 bg-white border border-concrete-300 rounded-lg hover:bg-teal-soft transition focus:outline-none focus:ring-1 focus:ring-teal-500">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-xs font-semibold text-slate-400 bg-concrete-50 border border-concrete-300 cursor-not-allowed rounded-lg">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
