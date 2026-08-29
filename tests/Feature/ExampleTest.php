<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test that the homepage loads successfully and renders Kost Putri Ibu Idah branding.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Kost Putri Ibu Idah');
        $response->assertSee('Pilihan Kamar');
    }
}
