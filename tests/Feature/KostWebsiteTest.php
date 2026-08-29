<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KostWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Test homepage loads successfully and displays verified brand and facts.
     */
    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Kost Putri Ibu Idah');
        $response->assertSee('Kos Khusus Putri');
        $response->assertSee('Kamar dengan Kamar Mandi Dalam');
        $response->assertSee('Kamar dengan Kamar Mandi Sharing');
        $response->assertSee('22.00 WIB');
    }

    /**
     * Test dedicated rooms listing page.
     */
    public function test_rooms_page_loads_successfully(): void
    {
        $response = $this->get('/kamar');

        $response->assertStatus(200);
        $response->assertSee('Pilihan Tipe Kamar');
        $response->assertSee('Kamar dengan Kamar Mandi Dalam');
        $response->assertSee('Kamar dengan Kamar Mandi Sharing');
    }

    /**
     * Test single room detail page.
     */
    public function test_room_detail_page_loads_successfully(): void
    {
        $response = $this->get('/kamar/kamar-mandi-dalam');

        $response->assertStatus(200);
        $response->assertSee('Kamar dengan Kamar Mandi Dalam');
        $response->assertSee('Tanyakan Kamar Ini via WhatsApp');
    }

    /**
     * Test dedicated facilities page.
     */
    public function test_facilities_page_loads_successfully(): void
    {
        $response = $this->get('/fasilitas');

        $response->assertStatus(200);
        $response->assertSee('Fasilitas Lengkap');
        $response->assertSee('Kasur');
        $response->assertSee('Wi-Fi');
        $response->assertSee('Dapur Sharing');
        $response->assertSee('Garasi Motor');
    }

    /**
     * Test dedicated gallery page.
     */
    public function test_gallery_page_loads_successfully(): void
    {
        $response = $this->get('/galeri');

        $response->assertStatus(200);
        $response->assertSee('Galeri Kost Putri Ibu Idah');
        $response->assertSee('Tampilan Kamar');
    }

    /**
     * Test location page.
     */
    public function test_location_page_loads_successfully(): void
    {
        $response = $this->get('/lokasi');

        $response->assertStatus(200);
        $response->assertSee('Alamat Resmi Kos');
        $response->assertSee('Buka di Google Maps');
        $response->assertSee('Salin Alamat');
        $response->assertSee('Lokasi kos ditunjukkan oleh penanda pada peta.');
        $response->assertSee('22.00 WIB');
    }

    /**
     * Test FAQ page.
     */
    public function test_faq_page_loads_successfully(): void
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
        $response->assertSee('Pertanyaan yang Sering Diajukan');
        $response->assertSee('Apakah kos ini khusus putri?');
        $response->assertSee('Apakah listrik termasuk?');
    }

    /**
     * Test Filament admin login page is accessible.
     */
    public function test_filament_admin_login_page_is_accessible(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
    }

    /**
     * Test Tanya Kost AI API provides grounded answers.
     */
    public function test_ai_assistant_provides_grounded_answer_for_electricity(): void
    {
        $response = $this->postJson('/api/tanya-kost', [
            'question' => 'Apakah biaya listrik sudah termasuk?',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $this->assertStringContainsString('listrik sudah termasuk', $response->json('answer'));
    }

    /**
     * Test Tanya Kost Guardrail blocks out-of-scope math questions.
     */
    public function test_ai_assistant_blocks_math_and_irrelevant_questions(): void
    {
        $response = $this->postJson('/api/tanya-kost', [
            'question' => '10 + 10',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $response->assertJsonPath('show_wa_cta', false);
        $this->assertStringContainsString('khusus Kost Putri Ibu Idah', $response->json('answer'));
    }

    /**
     * Test Tanya Kost provides WhatsApp fallback for specific kos-related questions.
     */
    public function test_ai_assistant_handles_specific_kost_question_safely(): void
    {
        $response = $this->postJson('/api/tanya-kost', [
            'question' => 'Apakah boleh membawa kasur busa tambahan ke dalam kamar kos?',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $this->assertStringContainsString('kasur', mb_strtolower($response->json('answer')));
    }

    /**
     * Test Tanya Kost explains reason for women-only policy.
     */
    public function test_ai_assistant_explains_why_women_only(): void
    {
        $response = $this->postJson('/api/tanya-kost', [
            'question' => 'kenapa cuma wanita saja',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $this->assertStringContainsString('keamanan', mb_strtolower($response->json('answer')));
        $this->assertStringContainsString('privasi', mb_strtolower($response->json('answer')));
    }

    /**
     * Test Tanya Kost answers wall nailing with Ibu Idah permission.
     */
    public function test_ai_assistant_answers_permission_to_nail_walls(): void
    {
        $response = $this->postJson('/api/tanya-kost', [
            'question' => 'apakah boleh memaku dinding',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $this->assertStringContainsString('izin', mb_strtolower($response->json('answer')));
        $this->assertStringContainsString('ibu idah', mb_strtolower($response->json('answer')));
        $response->assertJsonPath('show_wa_cta', true);
    }

    /**
     * Test Tanya Kost answers where to wash clothes in available bathrooms.
     */
    public function test_ai_assistant_answers_where_to_wash_clothes(): void
    {
        $response = $this->postJson('/api/tanya-kost', [
            'question' => 'mencuci baju dimana?',
        ]);

        $response->assertStatus(200);
        $response->assertJsonPath('success', true);
        $this->assertStringContainsString('kamar mandi yang tersedia', mb_strtolower($response->json('answer')));
        $this->assertStringContainsString('area jemur', mb_strtolower($response->json('answer')));
    }
}
