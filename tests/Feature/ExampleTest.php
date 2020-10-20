<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
      /** @test */
    public function testBasicTest()
    {
      //simula una peticion http a la url de HOME y valida que obtenga el estado 200 que todo esta bien, url existe y cargo correctamente
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
