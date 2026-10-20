<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProgramPagesTest extends TestCase
{
    /**
     * Test that all 13 K3 Umum programs render successfully.
     */
    public function test_all_thirteen_services_render_successfully(): void
    {
        $programs = config('programs', []);
        $this->assertCount(13, $programs, 'There must be exactly 13 approved K3 Umum programs.');

        foreach ($programs as $slug => $data) {
            $url = route('program.show', $slug);
            $response = $this->get($url);

            $response->assertStatus(200);
            $response->assertSee($data['hero_heading']);
            $response->assertSee($data['hero_highlight']);
        }
    }

    /**
     * Test canonical and legacy route aliases for programs.
     */
    public function test_program_routes_have_expected_url_paths(): void
    {
        $this->assertEquals('/layanan/training-ahli-k3-umum', parse_url(route('program.show', 'training-ahli-k3-umum'), PHP_URL_PATH));
        $this->assertEquals('/program/training-ahli-k3-umum', parse_url(route('program.legacy.show', 'training-ahli-k3-umum'), PHP_URL_PATH));

        // Legacy route returns 200
        $response = $this->get('/program/training-ahli-k3-umum');
        $response->assertStatus(200);
        $response->assertSee('Ahli K3 Umum');
    }

    /**
     * Test distinct meta titles and meta descriptions for programs.
     */
    public function test_each_program_has_distinct_page_title_and_meta_description(): void
    {
        $k3umum    = $this->get(route('program.show', 'training-ahli-k3-umum'));
        $k3kimia   = $this->get(route('program.show', 'training-k3-kimia'));
        $auditSmk3 = $this->get(route('program.show', 'jasa-audit-smk3'));

        $k3umum->assertStatus(200);
        $k3kimia->assertStatus(200);
        $auditSmk3->assertStatus(200);

        $k3umumConfig  = config('programs.training-ahli-k3-umum');
        $k3kimiaConfig = config('programs.training-k3-kimia');
        $auditConfig   = config('programs.jasa-audit-smk3');

        $k3umum->assertSee($k3umumConfig['meta_title']);
        $k3kimia->assertSee($k3kimiaConfig['meta_title']);
        $auditSmk3->assertSee($auditConfig['meta_title']);

        $this->assertNotEquals($k3umumConfig['meta_description'], $k3kimiaConfig['meta_description']);
        $this->assertNotEquals($k3kimiaConfig['meta_description'], $auditConfig['meta_description']);
    }

    /**
     * Test accessible breadcrumb markup on program detail page.
     */
    public function test_program_pages_include_accessible_breadcrumbs(): void
    {
        $response = $this->get(route('program.show', 'training-ahli-k3-umum'));

        $response->assertStatus(200);
        $response->assertSee('aria-label="Breadcrumb"', false);
        $response->assertSee('itemtype="https://schema.org/BreadcrumbList"', false);
        $response->assertSee('href="' . route('home') . '"', false);
        $response->assertSee('Beranda', false);
        $response->assertSee('aria-current="page"', false);
    }

    /**
     * Test information card sections.
     */
    public function test_program_pages_display_transparent_unverified_info_notice(): void
    {
        $response = $this->get(route('program.show', 'training-ahli-k3-umum'));

        $response->assertStatus(200);
        $response->assertSee('Informasi Penyelenggaraan &amp; Pelaksanaan', false);
        $response->assertSee('Jadwal Pelatihan');
        $response->assertSee('Durasi Program');
        $response->assertSee('Investasi Biaya');
    }

    /**
     * Test WhatsApp CTA formatting and prefilled message.
     */
    public function test_whatsapp_cta_prefills_specific_program_message(): void
    {
        config(['services.whatsapp.phone' => '089988776655']);

        $response = $this->get(route('program.show', 'training-ahli-k3-umum'));
        $response->assertStatus(200);
        $expectedMsg = rawurlencode(config('programs.training-ahli-k3-umum.wa_message'));
        $response->assertSee('https://wa.me/6289988776655?text=' . $expectedMsg, false);
    }

    /**
     * Test fallback when phone is empty.
     */
    public function test_whatsapp_cta_falls_back_when_phone_is_empty(): void
    {
        config(['services.whatsapp.phone' => '']);

        $response = $this->get(route('program.show', 'training-ahli-k3-umum'));
        $response->assertStatus(200);

        $expectedText = rawurlencode(config('programs.training-ahli-k3-umum.wa_message'));
        $response->assertSee('https://wa.me/?text=' . $expectedText, false);
    }

    /**
     * Test related services links on detail page.
     */
    public function test_each_program_page_links_to_other_programs(): void
    {
        $response = $this->get(route('program.show', 'training-ahli-k3-umum'));
        $response->assertStatus(200);
        $response->assertSee(route('program.show', 'training-k3-konstruksi'), false);
    }

    /**
     * Test responsive FAQ accordion on program pages.
     */
    public function test_program_pages_have_responsive_faq_section(): void
    {
        $response = $this->get(route('program.show', 'training-ahli-k3-umum'));

        $response->assertStatus(200);
        $response->assertSee('<details', false);
        $response->assertSee('<summary', false);
        $response->assertSee('Pertanyaan Umum Seputar');
    }

    /**
     * Test safety rule: no fabricated claims or non-K3 contamination.
     */
    public function test_program_pages_have_no_invented_claims(): void
    {
        foreach (['training-ahli-k3-umum', 'training-k3-konstruksi', 'jasa-audit-smk3'] as $slug) {
            $response = $this->get(route('program.show', $slug));
            $response->assertStatus(200);

            // No guaranteed outcomes
            $response->assertDontSee('100% garansi lulus');
            $response->assertDontSee('pasti lulus');
            $response->assertDontSee('tanpa tes');
            // No B3/environmental contamination on K3 Umum pages
            $response->assertDontSee('Pengelolaan Limbah B3');
            $response->assertDontSee('FESTRONIK');
            $response->assertDontSee('air limbah industri');
        }
    }

    /**
     * Test homepage and footer link to K3 Umum programs.
     */
    public function test_homepage_and_footer_link_to_programs(): void
    {
        $home = $this->get(route('home'));

        $home->assertStatus(200);
        $home->assertSee(route('program.show', 'training-ahli-k3-umum'), false);
        $home->assertSee(route('program.show', 'training-k3-konstruksi'), false);
        $home->assertSee(route('program.show', 'jasa-audit-smk3'), false);
    }
}
