<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityProgramDetailTest extends TestCase
{
    /**
     * Ensure the main K3 Umum program renders with city context.
     */
    public function test_all_three_programs_render_canonical_content_with_city_context(): void
    {
        // 1. Training Ahli K3 Umum in Bandung
        $response = $this->get(route('city.program.detail', ['city' => 'bandung', 'program' => 'training-ahli-k3-umum']));
        $response->assertStatus(200);
        $response->assertSee('Training Ahli K3 Umum');
        $response->assertSee('Ahli K3 Umum');
        $content = $response->getContent();
        // Should not show placeholder text
        $this->assertFalse(strpos($content, 'Konten detail program belum tersedia.') !== false);

        // 2. Training K3 Konstruksi in Malang
        $response2 = $this->get(route('city.program.detail', ['city' => 'malang', 'program' => 'training-k3-konstruksi']));
        $response2->assertStatus(200);
        $response2->assertSee('Training K3');
        $response2->assertSee('Konstruksi');

        // 3. Jasa Audit SMK3 in Surabaya
        $response3 = $this->get(route('city.program.detail', ['city' => 'surabaya', 'program' => 'jasa-audit-smk3']));
        $response3->assertStatus(200);
        $response3->assertSee('Jasa Audit');
        $response3->assertSee('Penyusunan SMK3');
    }

    /**
     * Ensure legacy alias slugs resolve to a valid program.
     */
    public function test_full_program_slugs_resolve_correctly(): void
    {
        $response = $this->get(route('city.program.detail', ['city' => 'bandung', 'program' => 'training-ahli-k3-umum']));
        $response->assertStatus(200);
        $response->assertSee('Training');
    }

    /**
     * Invalid city slug should return 404.
     */
    public function test_invalid_city_returns_404(): void
    {
        $response = $this->get(route('city.program.detail', ['city' => 'nonexistent-city', 'program' => 'training-ahli-k3-umum']));
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
