<header class="sticky top-0 z-30 bg-navy-950/95 backdrop-blur-md border-b border-navy-800/80 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="group flex items-center gap-3.5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 focus-visible:ring-offset-2 focus-visible:ring-offset-navy-950 rounded-lg p-1 transition-transform" aria-label="Training Alat Berat - Beranda">
                <div class="w-11 h-11 rounded-lg bg-navy-900 border border-navy-700/80 flex items-center justify-center text-teal-400 shadow-inner group-hover:border-teal-400 transition-colors">
                    <!-- Industrial Heavy Equipment Icon -->
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 18h20"/>
                        <path d="M5 18V9l5-5h7l2 5v9"/>
                        <path d="M10 4v5h7"/>
                        <circle cx="7" cy="18" r="2"/>
                        <circle cx="17" cy="18" r="2"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-base sm:text-lg font-bold tracking-tight text-white group-hover:text-teal-400 transition-colors uppercase">
                        Training <span class="text-teal-400">Alat Berat</span>
                    </span>
                    <span class="text-xs text-concrete-300 font-medium tracking-wide">
                        Operator &amp; SIO Kemnaker
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-7" role="navigation" aria-label="Navigasi Utama Desktop">
                <a href="{{ route('home') }}#pelatihan" class="text-sm font-semibold text-concrete-200 hover:text-teal-400 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                    Layanan SIO
                </a>
                <a href="{{ route('home') }}#keunggulan" class="text-sm font-semibold text-concrete-200 hover:text-teal-400 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                    Keunggulan
                </a>
                <a href="{{ route('home') }}#faq" class="text-sm font-semibold text-concrete-200 hover:text-teal-400 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                    FAQ
                </a>
                <a href="{{ route('articles.index') }}" class="text-sm font-semibold text-concrete-200 hover:text-teal-400 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                    Artikel
                </a>
                <a href="{{ route('home') }}#wilayah" class="text-sm font-semibold text-concrete-200 hover:text-teal-400 transition-colors py-1 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400 rounded">
                    Wilayah
                </a>
            </nav>

            <!-- CTA Actions (Desktop) -->
            <div class="hidden sm:flex items-center gap-3">
                <x-wa-cta variant="primary" size="sm" label="Konsultasi WhatsApp" class="font-bold" />
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="flex lg:hidden items-center gap-2">
                <button type="button"
                        id="mobile-nav-toggle"
                        aria-controls="mobile-nav-drawer"
                        aria-expanded="false"
                        aria-label="Buka menu navigasi utama"
                        class="p-2.5 rounded-lg text-concrete-200 hover:text-white hover:bg-navy-900 border border-navy-800 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">
                    <!-- Icon Hamburger -->
                    <svg id="icon-menu-open" class="w-6 h-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon Close -->
                    <svg id="icon-menu-close" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-nav-drawer"
         class="hidden lg:hidden bg-navy-950 border-b border-navy-800 px-4 pt-2 pb-6 transition-all"
         role="navigation"
         aria-label="Navigasi Utama Seluler">
        <div class="flex flex-col space-y-3 pt-2">
            <a href="{{ route('home') }}#pelatihan" class="mobile-nav-link text-base font-semibold text-concrete-200 hover:text-teal-400 hover:bg-navy-900 px-3 py-2.5 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">
                Layanan SIO
            </a>
            <a href="{{ route('home') }}#keunggulan" class="mobile-nav-link text-base font-semibold text-concrete-200 hover:text-teal-400 hover:bg-navy-900 px-3 py-2.5 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">
                Keunggulan
            </a>
            <a href="{{ route('home') }}#faq" class="mobile-nav-link text-base font-semibold text-concrete-200 hover:text-teal-400 hover:bg-navy-900 px-3 py-2.5 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">
                FAQ
            </a>
            <a href="{{ route('articles.index') }}" class="mobile-nav-link text-base font-semibold text-concrete-200 hover:text-teal-400 hover:bg-navy-900 px-3 py-2.5 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">
                Artikel
            </a>
            <a href="{{ route('home') }}#wilayah" class="mobile-nav-link text-base font-semibold text-concrete-200 hover:text-teal-400 hover:bg-navy-900 px-3 py-2.5 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-400">
                Wilayah
            </a>
            <div class="pt-3 border-t border-navy-800">
                <x-wa-cta variant="primary" size="md" class="w-full justify-center font-bold" label="Konsultasi Cepat via WhatsApp" />
            </div>
        </div>
    </div>
</header>
<script>
    (function() {
        const toggleBtn = document.getElementById('mobile-nav-toggle');
        const drawer = document.getElementById('mobile-nav-drawer');
        const iconOpen = document.getElementById('icon-menu-open');
        const iconClose = document.getElementById('icon-menu-close');

        if (!toggleBtn || !drawer) return;

        function toggleMenu() {
            const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
            toggleBtn.setAttribute('aria-expanded', !isExpanded);
            drawer.classList.toggle('hidden');
            if (iconOpen && iconClose) {
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            }
        }

        toggleBtn.addEventListener('click', toggleMenu);

        const links = drawer.querySelectorAll('.mobile-nav-link');
        links.forEach(link => {
            link.addEventListener('click', () => {
                toggleBtn.setAttribute('aria-expanded', 'false');
                drawer.classList.add('hidden');
                if (iconOpen && iconClose) {
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                }
            });
        });
    })();
</script>
