<?php

namespace Tests\Feature;

use App\Support\WhatsApp;
use Tests\TestCase;

class ProgramPagesTest extends TestCase
{
    /**
     * The nine approved Training Alat Berat SIO programs, in canonical order.
     */
    private const PROGRAM_SLUGS = [
        'sio-excavator',
        'sio-wheel-loader',
        'sio-bulldozer',
        'sio-compactor',
        'sio-motor-grader',
        'sio-rig-drilling',
        'sio-telehandler',
        'sio-vibro',
        'sio-dump-truck',
    ];

    /**
     * Test that all nine approved programs render successfully.
     */
    public function test_all_nine_services_render_successfully(): void
    {
        $programs = config('programs', []);

        $this->assertCount(9, $programs, 'There must be exactly 9 approved Training Alat Berat SIO programs.');
        $this->assertSame(self::PROGRAM_SLUGS, array_keys($programs));

        foreach ($programs as $slug => $data) {
            $url = route('program.show', $slug);
            $response = $this->get($url);

            $response->assertStatus(200);
            $response->assertSee($data['title']);
            $response->assertSee($data['hero_heading']);
            $response->assertSee($data['hero_highlight']);
        }
    }

    /**
     * Test canonical and legacy route aliases for programs.
     */
    public function test_program_routes_have_expected_url_paths(): void
    {
        foreach (self::PROGRAM_SLUGS as $slug) {
            $this->assertEquals('/layanan/' . $slug, parse_url(route('program.show', $slug), PHP_URL_PATH));
            $this->assertEquals('/program/' . $slug, parse_url(route('program.legacy.show', $slug), PHP_URL_PATH));

            $response = $this->get('/program/' . $slug);
            $response->assertStatus(200);
            $response->assertSee(config("programs.{$slug}.title"));
        }
    }

    /**
     * Test distinct meta titles and meta descriptions for all programs.
     */
    public function test_each_program_has_distinct_page_title_and_meta_description(): void
    {
        $programs = config('programs', []);
        $metaTitles = [];
        $metaDescriptions = [];

        foreach ($programs as $slug => $program) {
            $response = $this->get(route('program.show', $slug));
            $response->assertStatus(200);

            $response->assertSee($program['meta_title']);
            $response->assertSee($program['meta_description']);

            $this->assertNotSame('', trim($program['meta_title']));
            $this->assertNotSame('', trim($program['meta_description']));
            $this->assertStringContainsString('SIO', $program['meta_title']);

            $metaTitles[] = $program['meta_title'];
            $metaDescriptions[] = $program['meta_description'];
        }

        $this->assertCount(9, array_unique($metaTitles), 'Each program must have a distinct meta title.');
        $this->assertCount(9, array_unique($metaDescriptions), 'Each program must have a distinct meta description.');
    }

    /**
     * Test accessible breadcrumb markup on program detail page.
     */
    public function test_program_pages_include_accessible_breadcrumbs(): void
    {
        $response = $this->get(route('program.show', 'sio-excavator'));

        $response->assertStatus(200);
        $response->assertSee('aria-label="Breadcrumb"', false);
        $response->assertSee('itemtype="https://schema.org/BreadcrumbList"', false);
        $response->assertSee('href="' . route('home') . '"', false);
        $response->assertSee('Beranda', false);
        $response->assertSee('aria-current="page"', false);
    }

    /**
     * Test information card sections including duration and investment.
     */
    public function test_program_pages_display_transparent_unverified_info_notice(): void
    {
        foreach (config('programs', []) as $slug => $program) {
            $this->assertArrayHasKey('durasi', $program['training_info']);
            $this->assertArrayHasKey('investasi', $program['training_info']);

            $response = $this->get(route('program.show', $slug));

            $response->assertStatus(200);
            $response->assertSee('Informasi Penyelenggaraan &amp; Pelaksanaan', false);
            $response->assertSee('Jadwal Pelatihan');
            $response->assertSee('Durasi Pembinaan');
            $response->assertSee('Investasi Biaya');
        }
    }

    /**
     * Test WhatsApp CTA formatting and prefilled message.
     */
    public function test_whatsapp_cta_prefills_specific_program_message(): void
    {
        config(['services.whatsapp.phone' => '089988776655']);

        $response = $this->get(route('program.show', 'sio-excavator'));
        $response->assertStatus(200);

        $expectedMsg = rawurlencode(config('programs.sio-excavator.wa_message'));
        $normalizedPhone = WhatsApp::normalizePhone(config('services.whatsapp.phone'));

        $this->assertNotNull($normalizedPhone);
        $response->assertSee('https://wa.me/' . $normalizedPhone . '?text=' . $expectedMsg, false);
    }

    /**
     * Test fallback when phone is empty.
     */
    public function test_whatsapp_cta_falls_back_when_phone_is_empty(): void
    {
        config(['services.whatsapp.phone' => '']);

        $response = $this->get(route('program.show', 'sio-excavator'));
        $response->assertStatus(200);

        $expectedText = rawurlencode(config('programs.sio-excavator.wa_message'));
        $response->assertSee('https://wa.me/?text=' . $expectedText, false);
    }

    /**
     * Test related services links on every detail page.
     */
    public function test_each_program_page_links_to_other_programs(): void
    {
        foreach (self::PROGRAM_SLUGS as $slug) {
            $otherSlug = $slug === 'sio-excavator' ? 'sio-wheel-loader' : 'sio-excavator';

            $response = $this->get(route('program.show', $slug));
            $response->assertStatus(200);
            $response->assertSee(route('program.show', $otherSlug), false);
        }
    }

    /**
     * Test responsive FAQ accordion on program pages.
     */
    public function test_program_pages_have_responsive_faq_section(): void
    {
        $response = $this->get(route('program.show', 'sio-excavator'));

        $response->assertStatus(200);
        $response->assertSee('<details', false);
        $response->assertSee('<summary', false);
        $response->assertSee('Pertanyaan Umum Seputar ' . config('programs.sio-excavator.title'));
    }

    /**
     * Test safety rule: no fabricated claims or non-alat-berat contamination.
     */
    public function test_program_pages_have_no_invented_claims(): void
    {
        foreach (self::PROGRAM_SLUGS as $slug) {
            $response = $this->get(route('program.show', $slug));
            $response->assertStatus(200);

            // No guaranteed outcomes
            $response->assertDontSee('100% garansi lulus');
            $response->assertDontSee('pasti lulus');
            $response->assertDontSee('tanpa tes');
            $response->assertDontSee('Jaminan Lulus 100%');

            // No old K3 Umum or B3/environmental contamination
            $response->assertDontSee('Training Ahli K3 Umum');
            $response->assertDontSee('Pengelolaan Limbah B3');
            $response->assertDontSee('FESTRONIK');
            $response->assertDontSee('air limbah industri');
        }
    }

    /**
     * Test homepage and footer link to all nine Training Alat Berat programs.
     */
    public function test_homepage_and_footer_link_to_programs(): void
    {
        $home = $this->get(route('home'));

        $home->assertStatus(200);

        foreach (self::PROGRAM_SLUGS as $slug) {
            $home->assertSee(route('program.show', $slug), false);
        }
    }
}
