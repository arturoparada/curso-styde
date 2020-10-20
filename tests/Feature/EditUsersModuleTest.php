<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EditUsersModuleTest extends TestCase
{
    /** @test */
    function it_loads_the_edit_users_page_test()
    {
      $this->get('/usuarios/5/edit')
      ->assertStatus(200)
      ->assertSee('Modificando usuario: 5');
    }

    /** @test */
    function solo_enteros_en_id()
    {
      $this->get('/usuarios/texto/edit')
      ->assertStatus(404);
    }
}
