<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

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

    /** @test */
    function it_updates_a_user()
    {
      $user = factory(User::class)->create();

        $this->withoutExceptionHandling();

        $this->put("/usuarios/{$user->id}", [
            'name' => 'Arturo',
            'email' => 'user@example.com',
            'password' => '123456',
            'phone' => '1122334454'
        ])->assertRedirect("/usuarios/{$user->id}");

        $this->assertCredentials([
            'name' => 'Arturo',
            'email' => 'user@example.com',
            'password' => '123456',
            'phone' => '1122334454'
        ]);
    }

    /** @test */
     function the_name_is_required_when_updating_the_user()
     {
       $user = factory(User::class)->create();

         $this->from("usuarios/{$user->id}/edit")
              ->put("/usuarios/{$user->id}", [
                   'name' => '',
                   'email' => 'user_1@example.com',
                   'password' => 'laravel123',
                   'phone' => '1122334454'
             ])
             ->assertRedirect("/usuarios/{$user->id}/edit")
             ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('users', ['email' => 'user_1@example.com']);
 }

/** @test */
 function the_email_must_be_valid_when_updating_the_user()
 {
   $user = factory(User::class)->create(['name' => 'Nombre Inicial']);

     $this->from("usuarios/{$user->id}/edit")
          ->put("usuarios/{$user->id}", [
               'name' => 'Nombre Actualizado',
               'email' => 'correo_no-valido',
               'password' => 'laravel123',
               'phone' => '1122334454'
         ])
         ->assertRedirect("usuarios/{$user->id}/edit")
         ->assertSessionHasErrors(['email']);

    $this->assertDatabaseMissing('users', ['name' => 'Nombre Actualizado']);
}

/** @test */
 function the_email_must_be_unique_when_updating_the_user()
 {
   //$this->withoutExceptionHandling();

   factory(User::class)->create([
     'email' => 'existing-email@example.com'
   ]);

   $user = factory(User::class)->create([
     'email' => 'user_1@example.com'
   ]);

     $this->from("usuarios/{$user->id}/edit")
           ->put("usuarios/{$user->id}", [
             'name' => 'Arturo',
             'email' => 'existing-email@example.com',
             'password' => 'laravel123',
             'phone' => '1122334454'
         ])
         ->assertRedirect("usuarios/{$user->id}/edit")
         ->assertSessionHasErrors(['email']);

    //$this->assertEquals(1, User::count());
}

/** @test */
 function the_password_is_optional_when_updating_the_user()
 {
   //$this->withoutExceptionHandling();
   $oldPassword ='CLAVE_ANTERIOR';

   $user = factory(User::class)->create([
     'password' => bcrypt($oldPassword)
   ]);

     $this->from("usuarios/{$user->id}/edit")
           ->put("usuarios/{$user->id}", [
             'name' => 'Arturo',
             'email' => 'user_1@example.com.mx',
             'password' => '',
             'phone' => '6621469650'
         ])
         ->assertRedirect("usuarios/{$user->id}"); //users.show

         $this->assertCredentials([
           'name' => 'Arturo',
           'email' => 'user_1@example.com.mx',
           'password' => $oldPassword //importante
         ]);
}

/** @test */
 function the_email_can_stay_when_updating_the_user()
 {
   //$this->withoutExceptionHandling();

   $user = factory(User::class)->create([
     'email' => 'user_2@example.com.mx'
   ]);

     $this->from("usuarios/{$user->id}/edit")
           ->put("usuarios/{$user->id}", [
             'name' => 'Arturo Parada',
             'email' => 'user_2@example.com.mx',
             'password' => '12345678',
             'phone' => '6621469651'
         ])
         ->assertRedirect("usuarios/{$user->id}"); //users.show

         $this->assertDatabaseHas('users', [
           'name' => 'Arturo Parada',
           'email' => 'user_2@example.com.mx',
         ]);
}
}
