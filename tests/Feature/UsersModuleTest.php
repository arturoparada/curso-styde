<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{

  use RefreshDatabase;

  /** @test */
    function it_loads_the_users_list_page()
    {
        factory(User::class)->create([
          'name' => 'Alan',
        ]);

        factory(User::class)->create([
          'name' => 'Ada',
        ]);

        $this->get('/usuarios')
        ->assertStatus(200)
        ->assertSee('Listado de usuarios')
        ->assertSee('Alan')
        ->assertSee('Ada');
    }

    /** @test */
    function it_displays_the_users_details()
    {

      $user = factory(User::class)->create([
        'name' => 'Arturo Parada'
      ]);

      $this->get('/usuarios/.$user->id') //usuarios/5
      ->assertStatus(200)
      ->assertSee('Arturo Parada');
    }

    /** @test */

    function it_loads_the_new_users()
    {

      $this->get('/usuarios/nuevo')
      ->assertStatus(200)
      ->assertSee('Crear nuevo usuario');
  }
}
