<footer class="bg-navy-950 text-concrete-300 border-t border-navy-800" role="contentinfo" aria-label="Informasi Kaki Halaman">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-24 sm:py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Col 1: Identity -->
            <div class="space-y-4 md:col-span-1">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-900 border border-navy-700 flex items-center justify-center text-teal-400 shadow-inner">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M2 18h20"/>
                            <path d="M5 18V9l5-5h7l2 5v9"/>
                            <path d="M10 4v5h7"/>
                            <circle cx="7" cy="18" r="2"/>
                            <circle cx="17" cy="18" r="2"/>
                        </svg>
                    </div>
                    <span class="text-base font-bold text-white tracking-tight uppercase">
                        Training <span class="text-teal-400">Alat Berat</span>
                    </span>
                </div>
                <p class="text-sm text-concrete-300 leading-relaxed">
                    Portal informasi pembinaan kompetensi operator alat berat dan sertifikasi Surat Izin Alat (SIO / Lisensi K3) resmi sesuai Permenaker No. 8/2020.
                </p>
                <div class="pt-1">
                    <x-wa-cta variant="wa" size="sm" label="Konsultasi WhatsApp" />
                </div>
            </div>

            <!-- Col 2: SIO Categories (Part 1) -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">
                    Layanan SIO Alat Berat (1)
                </h3>
                <ul class="space-y-2 text-xs sm:text-sm" role="list">
                    <li>
                        <a href="{{ route('program.show', 'sio-excavator') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Excavator
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-wheel-loader') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Wheel Loader
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-bulldozer') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Bulldozer
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-compactor') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Compactor
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-motor-grader') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Motor Grader
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 3: SIO Categories (Part 2) & Navigation -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider">
                    Layanan SIO Alat Berat (2)
                </h3>
                <ul class="space-y-2 text-xs sm:text-sm" role="list">
                    <li>
                        <a href="{{ route('program.show', 'sio-rig-drilling') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Rig Drilling
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-telehandler') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Telehandler
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-vibro') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Vibro
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program.show', 'sio-dump-truck') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                            SIO Dump Truck
                        </a>
                    </li>
                    <li class="pt-2 border-t border-navy-800">
                        <a href="{{ route('articles.index') }}" class="text-concrete-300 hover:text-teal-400 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded font-semibold">
                            Artikel &amp; Panduan Alat Berat &rarr;
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="mt-12 pt-8 border-t border-navy-900 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-concrete-300">
            <p>
                &copy; {{ date('Y') }} Training Alat Berat. Seluruh hak cipta dilindungi.
            </p>
            <p class="text-concrete-300">
                Peta wilayah menampilkan konteks administratif operasional, bukan lokasi tetap training ground.
            </p>
        </div>
    </div>
</footer>
