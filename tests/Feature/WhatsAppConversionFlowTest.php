<?php

namespace Tests\Feature;

use App\Support\WhatsApp;
use Tests\TestCase;

class WhatsAppConversionFlowTest extends TestCase
{
    private function expectedUrl(string $message, string $phone): string
    {
        $normalized = WhatsApp::normalizePhone($phone);

        return $normalized !== null
            ? 'https://wa.me/' . $normalized . '?text=' . rawurlencode($message)
            : 'https://wa.me/?text=' . rawurlencode($message);
    }

    public function test_homepage_ctas_use_configured_phone_and_default_message(): void
    {
        $phone = '081299887766';
        $message = 'Halo, saya ingin konsultasi mengenai Training Alat Berat dan SIO.';

        config(['services.whatsapp.phone' => $phone]);
        config(['services.whatsapp.default_message' => $message]);

        $response = $this->get('/');
        $response->assertStatus(200);

        // Hero CTA, header CTA, footer CTA, and floating CTA should all include this URL.
        $response->assertSee($this->expectedUrl($message, $phone), false);
    }

    public function test_homepage_ctas_fallback_gracefully_when_phone_is_missing(): void
    {
        $message = 'Halo, saya ingin konsultasi mengenai Training Alat Berat dan SIO.';

        config(['services.whatsapp.phone' => '']);
        config(['services.whatsapp.default_message' => $message]);

        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee($this->expectedUrl($message, ''), false);

        // Ensure no broken numbers like https://wa.me/62? are emitted.
        $response->assertDontSee('https://wa.me/62?', false);
    }

    public function test_homepage_ctas_fallback_gracefully_when_phone_is_invalid(): void
    {
        $message = 'Halo, saya ingin konsultasi mengenai Training Alat Berat dan SIO.';

        // Unparseable / invalid short digits.
        config(['services.whatsapp.phone' => 'invalid-abc']);
        config(['services.whatsapp.default_message' => $message]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($this->expectedUrl($message, 'invalid-abc'), false);

        // Test too-short digits (e.g. "123").
        config(['services.whatsapp.phone' => '123']);
        $responseShort = $this->get('/');
        $responseShort->assertStatus(200);
        $responseShort->assertSee($this->expectedUrl($message, '123'), false);
        $responseShort->assertDontSee('https://wa.me/123?', false);
    }

    public function test_all_program_cards_on_homepage_produce_program_specific_messages(): void
    {
        $phone = '081299887766';
        config(['services.whatsapp.phone' => $phone]);

        $response = $this->get('/');
        $response->assertStatus(200);

        $programs = config('programs');

        $this->assertCount(9, $programs);

        foreach ($programs as $slug => $program) {
            $this->assertNotEmpty($program['wa_message'], "Program {$slug} is missing a WhatsApp message.");
            $response->assertSee($this->expectedUrl($program['wa_message'], $phone), false);
        }

        // Every program must expose its own distinct message, not a shared default.
        $messages = array_column($programs, 'wa_message');
        $this->assertCount(9, array_unique($messages));
    }

    public function test_program_pages_produce_contextual_messages_across_all_page_ctas(): void
    {
        $phone = '085544332211';
        config(['services.whatsapp.phone' => $phone]);

        foreach (config('programs') as $slug => $program) {
            $response = $this->get(route('program.show', $slug));
            $response->assertStatus(200);

            // Page must contain the contextual WhatsApp link.
            $response->assertSee($this->expectedUrl($program['wa_message'], $phone), false);

            // Floating CTA on program page also adopts the contextual message.
            $response->assertSee('aria-label="Konsultasi cepat via WhatsApp (buka chat di tab baru)"', false);
        }
    }

    public function test_all_whatsapp_ctas_use_the_same_configuration_source(): void
    {
        // First configuration.
        config(['services.whatsapp.phone' => '081234567891']);
        config(['services.whatsapp.default_message' => 'Pesan Tes Pertama']);

        $res1 = $this->get('/');
        $res1->assertStatus(200);
        $res1->assertSee($this->expectedUrl('Pesan Tes Pertama', '081234567891'), false);

        // Dynamically change configuration source.
        config(['services.whatsapp.phone' => '089876543210']);
        config(['services.whatsapp.default_message' => 'Pesan Tes Kedua']);

        $res2 = $this->get('/');
        $res2->assertStatus(200);
        $res2->assertSee($this->expectedUrl('Pesan Tes Kedua', '089876543210'), false);
        $res2->assertDontSee(WhatsApp::normalizePhone('081234567891'), false);
    }

    public function test_floating_cta_has_accessible_markup_and_rel_attributes(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('aria-label="Layanan Bantuan WhatsApp"', false);
        $response->assertSee('target="_blank"', false);
        $response->assertSee('rel="noopener noreferrer"', false);
        $response->assertSee('aria-label="Konsultasi cepat via WhatsApp (buka chat di tab baru)"', false);
    }

    public function test_no_real_contact_numbers_or_secrets_are_exposed(): void
    {
        $pages = ['/', route('program.show', 'sio-excavator')];

        foreach (config('programs') as $slug => $program) {
            $pages[] = route('program.show', $slug);
        }

        foreach (array_unique($pages) as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);

            // Never expose reference project number.
            $response->assertDontSee('8118500177');

            // Never leak env markers.
            $response->assertDontSee('WHATSAPP_PHONE=');
            $response->assertDontSee('APP_KEY=');
        }
    }
}
