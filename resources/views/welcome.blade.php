@extends('layouts.app')

@section('title', 'Training Alat Berat')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center bg-concrete-50 px-4">
    <div class="text-center space-y-4 max-w-md">
        <h1 class="text-3xl font-extrabold uppercase text-navy-950">Training Alat Berat</h1>
        <p class="text-sm text-slate-700">Pembinaan Kompetensi &amp; Sertifikasi SIO Kemnaker RI.</p>
        <div class="pt-4">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-lg bg-muted hover:bg-muted-light text-primary-darker font-bold text-sm transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2">
                Menuju Halaman Utama &rarr;
            </a>
        </div>
    </div>
</div>
@endsection
