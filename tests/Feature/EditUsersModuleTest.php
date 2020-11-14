<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditUsersModuleTest extends TestCase
{
    /** @test */
    function it_loads_the_edit_users_page()
    {
      $user = factory(User::class)->create();

      $this->get("/usuarios/{$user->id}/edit")
      ->assertStatus(200)
      ->assertViewIs('users.edit')
      ->assertSee('Editar usuario')
      ->assertViewHas('user', function($viewUser) use ($user){
        return $viewUser->id == $user->id;
      });
    }

    /** @test */
    function solo_enteros_en_id()
    {
      $this->get('/usuarios/texto/edit')
      ->assertStatus(404);
    }
}
