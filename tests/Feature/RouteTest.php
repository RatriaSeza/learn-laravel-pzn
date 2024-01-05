<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get(): void
    {
        $this->get('/hello')
            ->assertStatus(200)
            ->assertSeeText("Hello World!");
    }

    public function test_redirect(): void
    {
        $this->get('/yt')
            ->assertRedirect('/hello');
    }

    public function test_fallback(): void
    {
        $this->get('/entah')
            ->assertSeeText('Ga ada bang');
    }
}
