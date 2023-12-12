<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_service_provider(): void
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertSame($foo1, $foo2);

        $bar1 = $this->app->make(Bar ::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);

        self::assertSame($foo1, $bar1->foo);
        self::assertSame($foo2, $bar2->foo);
    }

    public function test_property_singletons() : void
    {
        $hello1 = $this->app->make(HelloService::class);
        $hello2 = $this->app->make(HelloService::class);

        self::assertSame($hello1, $hello2);

        self::assertEquals('Halo Sat', $hello1->hello('Sat'));
    }
}
