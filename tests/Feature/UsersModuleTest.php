<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    function it_loads_the_users_list_page()
    {
        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Listado de usuarios')
        ->assertSee('Alan')
        ->assertSee('Ada');
    }

    /** @test */
    function it_loads_the_users_details_page()
    {
      $this->get('/usuarios/5')
      ->assertStatus(200)
      ->assertSee('Mostrando detalles del usuario: 5');
    }

    /** @test */

    function it_loads_the_new_users()
    {

      $this->get('/usuarios/nuevo')
      ->assertStatus(200)
      ->assertSee('Crear nuevo usuario');
  }
}
