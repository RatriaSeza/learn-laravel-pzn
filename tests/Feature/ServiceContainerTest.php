<?php

namespace Tests\Feature;

use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_interface_to_container(): void
    {
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
        $helloService = $this->app->make(HelloService::class);

        self::assertEquals('Halo Sat', $helloService->hello('Sat'));
    }
}
