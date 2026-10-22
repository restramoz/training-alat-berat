<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicArticleTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(bool $isAdmin = false): User
    {
        return User::factory()->create(['is_admin' => $isAdmin]);
    }

    private function publishedArticle(array $overrides = []): Article
    {
        return Article::create(array_merge([
            'title'        => 'Pemeriksaan Harian (P2H) Excavator sebelum Operasi',
            'slug'         => 'pemeriksaan-harian-p2h-excavator',
            'excerpt'      => 'Panduan pemeriksaan pra-operasi untuk operator alat berat.',
            'content'      => '<p>Konten artikel edukasi keselamatan alat berat.</p>',
            'status'       => 'published',
            'published_at' => now()->subDay(),
        ], $overrides));
    }

    private function draftArticle(array $overrides = []): Article
    {
        return Article::create(array_merge([
            'title'   => 'Draft: Prosedur Tipping Dump Truck yang Aman',
            'slug'    => 'draft-prosedur-tipping-dump-truck',
            'content' => '<p>Draft tidak boleh terlihat publik.</p>',
            'status'  => 'draft',
        ], $overrides));
    }

    // ─── Index Tests ──────────────────────────────────────────────────────────

    public function test_article_index_loads(): void
    {
        $this->get(route('articles.index'))
            ->assertOk()
            ->assertSee('Artikel');
    }

    public function test_article_index_shows_published_articles(): void
    {
        $article = $this->publishedArticle();

        $this->get(route('articles.index'))
            ->assertOk()
            ->assertSee($article->title);
    }

    public function test_article_index_does_not_show_drafts(): void
    {
        $draft = $this->draftArticle();

        $this->get(route('articles.index'))
            ->assertOk()
            ->assertDontSee($draft->title);
    }

    public function test_article_index_shows_program_links(): void
    {
        $response = $this->get(route('articles.index'));
        $response->assertOk();

        foreach (config('programs', []) as $slug => $program) {
            $response->assertSee(route('program.show', $slug), false);
            $response->assertSee($program['title']);
        }

        $response->assertDontSee(route('program.show', 'training-ahli-k3-umum'), false);
    }

    // ─── Show Tests ───────────────────────────────────────────────────────────

    public function test_article_show_loads_for_published(): void
    {
        $article = $this->publishedArticle();

        $this->get(route('articles.show', $article->slug))
            ->assertOk()
            ->assertSee($article->title);
    }

    public function test_article_show_returns_404_for_draft(): void
    {
        $draft = $this->draftArticle();

        $this->get(route('articles.show', $draft->slug))
            ->assertNotFound();
    }

    public function test_article_show_returns_404_for_unknown_slug(): void
    {
        $this->get(route('articles.show', 'tidak-ada-artikel-ini'))
            ->assertNotFound();
    }

    public function test_article_show_contains_seo_metadata(): void
    {
        $article = $this->publishedArticle([
            'seo_title'        => 'SEO Title SIO Excavator Khusus',
            'meta_description' => 'Deskripsi meta khusus artikel alat berat.',
        ]);

        $response = $this->get(route('articles.show', $article->slug));
        $response->assertOk();
        $response->assertSee('SEO Title SIO Excavator Khusus');
        $response->assertSee('Deskripsi meta khusus artikel alat berat.');
    }

    public function test_article_show_contains_breadcrumbs(): void
    {
        $article = $this->publishedArticle();

        $response = $this->get(route('articles.show', $article->slug));
        $response->assertOk();
        $response->assertSee('Beranda');
        $response->assertSee('Artikel');
        $response->assertSee($article->title);
    }

    public function test_article_show_renders_faq_section(): void
    {
        $article = $this->publishedArticle([
            'faqs' => [
                ['q' => 'Apa itu SIO Excavator?', 'a' => 'Lisensi K3 untuk operator excavator sesuai regulasi Kemnaker RI.'],
            ],
        ]);

        $response = $this->get(route('articles.show', $article->slug));
        $response->assertOk();
        $response->assertSee('Pertanyaan Umum');
        $response->assertSee('Apa itu SIO Excavator?');
    }

    public function test_article_show_does_not_leak_image_brief(): void
    {
        $article = $this->publishedArticle([
            'image_brief' => [
                'concept'         => 'Secret AI concept brief here',
                'english_prompt'  => 'Excavator operators in safety helmets, photorealistic',
                'recommended_alt' => 'Operators in safety gear',
            ],
        ]);

        $response = $this->get(route('articles.show', $article->slug));
        $response->assertOk();
        $response->assertDontSee('Secret AI concept brief here');
        $response->assertDontSee('english_prompt');
    }

    public function test_article_show_whatsapp_cta_uses_configured_phone(): void
    {
        config(['services.whatsapp.phone' => '081200000001']);
        config(['services.whatsapp.default_message' => 'Halo, saya ingin konsultasi mengenai Training Alat Berat dan SIO.']);

        $article = $this->publishedArticle();

        $response = $this->get(route('articles.show', $article->slug));
        $response->assertOk();

        $normalizedPhone = \App\Support\WhatsApp::normalizePhone(config('services.whatsapp.phone'));
        $expectedUrl = 'https://wa.me/' . $normalizedPhone . '?text=' . rawurlencode(config('services.whatsapp.default_message'));

        $response->assertSee($expectedUrl, false);
        $response->assertSee('wa.me', false);
        $response->assertDontSee('6281299887766', false);
    }

    public function test_article_show_contains_article_schema(): void
    {
        $article = $this->publishedArticle();

        $response = $this->get(route('articles.show', $article->slug));
        $response->assertOk();
        $response->assertSee('application/ld+json', false);
        $response->assertSee('Article', false);
    }
}
