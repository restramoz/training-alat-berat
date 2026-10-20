@props([
    'citySlug' => null,
    'districtSlug' => null,
    'regionName' => null,
])

@php
    $mapService = resolve(\App\Services\RegionalMapService::class);
    $coordinate = null;
    $isDistrict = ! empty($districtSlug);

    if ($isDistrict) {
        $coordinate = $mapService->getDistrictCoordinate((string) $citySlug, (string) $districtSlug);
    } elseif ($citySlug) {
        $coordinate = $mapService->getCityCoordinate((string) $citySlug);
    }

    $mapId = 'regional-map-' . md5((string) $citySlug . '/' . (string) $districtSlug);
    $label = $regionName ?: ($isDistrict ? 'Kecamatan' : 'Wilayah');
    $zoomLevel = $isDistrict ? 13 : 11;
@endphp

<section class="py-12 bg-white border-b border-concrete-200" aria-labelledby="{{ $mapId }}-heading">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mb-6">
            <span class="text-xs font-bold uppercase tracking-wider text-teal-700 bg-teal-soft px-3 py-1 rounded-full border border-teal-500/20">
                Peta Wilayah
            </span>
            <h2 id="{{ $mapId }}-heading" class="text-xl sm:text-2xl font-extrabold text-navy-950 mt-2">
                Konteks Administratif {{ $label }}
            </h2>
            <p class="text-sm text-slate-700 mt-2 leading-relaxed">
                Peta menampilkan konteks administratif wilayah berdasarkan koordinat geospasial terbuka. Titik pada peta menunjukkan pusat administratif wilayah dan <strong class="text-navy-900">bukan lokasi kantor atau tempat pelaksanaan training K3 terkonfirmasi</strong>.
            </p>
        </div>

        @if ($coordinate)
            <div class="relative rounded-2xl overflow-hidden border border-concrete-200 shadow-sm bg-concrete-50">
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrxJpFTl5LMZjbxmL4GMjAFv0E=" crossorigin="">
                <div id="{{ $mapId }}" class="h-80 sm:h-96 w-full z-0" role="application" aria-label="Peta interaktif {{ $label }}"></div>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZk=" crossorigin="" defer></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        if (typeof L === 'undefined') return;
                        var map = L.map(@json($mapId), {
                            scrollWheelZoom: false
                        }).setView([{{ $coordinate['lat'] }}, {{ $coordinate['lng'] }}], {{ $zoomLevel }});

                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        var marker = L.marker([{{ $coordinate['lat'] }}, {{ $coordinate['lng'] }}]).addTo(map);
                        marker.bindPopup(
                            '<div style="font-family: sans-serif; font-size: 13px; line-height: 1.4;">' +
                            '<strong style="color: #142B4A;">' + @json($label) + '</strong><br>' +
                            '<span style="color: #64748B; font-size: 11px;">Pusat Administratif Wilayah</span><br>' +
                            '<span style="color: #D97A1A; font-size: 10px; font-weight: 600;">*Bukan lokasi venue pelatihan</span>' +
                            '</div>'
                        );
                    });
                </script>
            </div>
            <div class="mt-3 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-500">
                <span>Sumber data: {{ $coordinate['source'] ?? 'Open Admin Data (CC BY 4.0)' }}</span>
                <span>Koordinat: {{ number_format($coordinate['lat'], 4) }}, {{ number_format($coordinate['lng'], 4) }} (Perkiraan Centroid)</span>
            </div>
        @else
            <div class="rounded-2xl border border-concrete-300 bg-concrete-50 p-6 text-sm text-slate-700" role="status">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-teal-700 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="font-bold text-navy-950">Koordinat Belum Dikonfigurasi</p>
                        <p class="mt-1 text-slate-600">
                            Peta untuk {{ $label }} belum memiliki koordinat terverifikasi dalam basis data geospasial kami. Pelaksanaan pelatihan tatap muka, in-house, maupun daring untuk wilayah ini tetap dapat dikoordinasikan langsung melalui konsultasi resmi WhatsApp.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
