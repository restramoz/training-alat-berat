<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityProgramDetailTest extends TestCase
{
    /**
     * Ensure all nine SIO programs render with city context.
     */
    public function test_all_nine_programs_render_canonical_content_with_city_context(): void
    {
        $programs = config('programs', []);
        $this->assertCount(9, $programs, 'There must be exactly 9 approved SIO programs.');

        $cities = [
            'bandung' => 'Kota Bandung',
            'malang' => 'Kota Malang',
            'surabaya' => 'Kota Surabaya',
        ];
        $citySlugs = array_keys($cities);

        foreach (array_values($programs) as $index => $program) {
            $citySlug = $citySlugs[$index % count($citySlugs)];
            $cityName = $cities[$citySlug];

            $response = $this->get(route('city.program.detail', [
                'city' => $citySlug,
                'program' => $program['slug'],
            ]));

            $response->assertStatus(200);
            $response->assertSee($program['title'] . ' di ' . $cityName);
            $response->assertSee($program['title']);
            $response->assertSee($cityName);
            $response->assertSee('Informasi Penyelenggaraan di ' . $cityName);
            $response->assertSee('Durasi Pembinaan');
            $response->assertSee('Investasi Biaya');

            // Should not show placeholder text
            $this->assertFalse(strpos($response->getContent(), 'Konten detail program belum tersedia.') !== false);
        }
    }

    /**
     * Ensure canonical program slugs resolve to a valid program.
     */
    public function test_full_program_slugs_resolve_correctly(): void
    {
        $response = $this->get(route('city.program.detail', ['city' => 'bandung', 'program' => 'sio-dump-truck']));
        $response->assertStatus(200);
        $response->assertSee('SIO Dump Truck');
        $response->assertSee('Kota Bandung');
    }

    /**
     * Invalid city slug should return 404.
     */
    public function test_invalid_city_returns_404(): void
    {
        $response = $this->get(route('city.program.detail', ['city' => 'nonexistent-city', 'program' => 'sio-excavator']));
        $response->assertStatus(404);
    }

    /**
     * Invalid program slug should return 404.
     */
    public function test_invalid_program_returns_404(): void
    {
        $response = $this->get(route('city.program.detail', ['city' => 'bandung', 'program' => 'invalid']));
        $response->assertStatus(404);
    }
}
