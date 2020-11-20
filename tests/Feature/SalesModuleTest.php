<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalesModuleTest extends TestCase
{
  /** @test */
    function it_loads_the_sales_page()
    {
        $this->get('/venta')
        ->assertStatus(200)
        ->assertSee('Ventas');
    }
}
