<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUsersTest extends TestCase
{
  /** @test */
  function it_welcomes_users_with_nickname()
  {
    $this->get('/saludo/arturo/R2D2')
    ->assertStatus(200)
    ->assertSee('Bienvenido Arturo, aka: R2D2');
  }

  /** @test */
  function it_welcomes_users_without_nickname()
  {
    $this->get('/saludo/arturo')
    ->assertStatus(200)
    ->assertSee('¡Bienvenido Arturo!');
  }
}
