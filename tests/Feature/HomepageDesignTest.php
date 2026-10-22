<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageDesignTest extends TestCase
{
    public function test_homepage_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Training Alat Berat');
        $response->assertSee('9 Layanan SIO &amp; Operator Alat Berat', false);
    }

    public function test_homepage_includes_accessible_landmarks(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Skip link
        $response->assertSee('href="#main-content"', false);
        $response->assertSee('Lewati ke konten utama', false);
        // Semantic main landmark
        $response->assertSee('id="main-content"', false);
        // Header and Footer landmarks
        $response->assertSee('<header', false);
        $response->assertSee('<footer', false);
        $response->assertSee('role="navigation"', false);
    }

    public function test_homepage_displays_services_without_invented_claims(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        foreach (config('programs', []) as $program) {
            $response->assertSee($program['title']);
        }

        $response->assertSee('9 Layanan SIO &amp; Operator Alat Berat', false);

        // Verify no stale K3 Umum or B3 references on homepage
        $response->assertDontSee('Training Ahli K3 Umum');
        $response->assertDontSee('Training K3 Konstruksi');
        $response->assertDontSee('Jasa Audit &amp; Penyusunan SMK3', false);
        $response->assertDontSee('Jasa Identifikasi Bahaya &amp; HIRADC', false);
        $response->assertDontSee('Training Limbah B3');
        $response->assertDontSee('Training PPPA');
        $response->assertDontSee('Training PLB3');
        $response->assertDontSee('Jasa Uji Emisi Lingkungan');
        $response->assertDontSee('Jasa UKL-UPL');

        // Verify no invented claims
        $response->assertDontSee('Jaminan Lulus 100%');
        $response->assertDontSee('Pasti Terbit Sertifikat');
    }

    public function test_whatsapp_cta_uses_configurable_format(): void
    {
        // When WHATSAPP_PHONE is configured via env
        config(['services.whatsapp.phone' => '081234567890']);
        config(['services.whatsapp.default_message' => 'Halo, saya ingin konsultasi.']);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('https://wa.me/6281234567890', false);

        // Verify no hardcoded reference project phone
        $response->assertDontSee('8118500177');
    }

    public function test_whatsapp_cta_falls_back_gracefully_when_no_phone_configured(): void
    {
        config(['services.whatsapp.phone' => '']);
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('https://wa.me/?text=', false);
    }
}
