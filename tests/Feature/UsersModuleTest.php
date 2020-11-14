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

      $this->get('/usuarios/'.$user->id) //usuarios/5
      ->assertStatus(200)
      ->assertSee('Arturo Parada');
    }

    /** @test */
    function it_displays_error_404_if_user_not_found()
    {
      $this->get('usuarios/999')
      ->assertStatus(404)
      ->assertSee('Página no encontrada');
    }

    /** @test */
    function it_loads_the_new_users()
    {
      $this->get('/usuarios/nuevo')
      ->assertStatus(200)
      ->assertSee('Crear usuario');
    }

    /** @test */
    function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();

        $this->post('/usuarios/', [
            'name' => 'Arturo',
            'email' => 'user@example.com',
            'password' => '123456',
            'phone' => '1122334455'
        ])->assertRedirect('usuarios');

        $this->assertCredentials([
            'name' => 'Arturo',
            'email' => 'user@example.com',
            'password' => '123456',
            'phone' => '1122334455'
        ]);
    }

       /** @test */
        function the_name_is_required()
        {
            $this->from('usuarios/nuevo')
                  ->post('/usuarios/', [
                      'name' => '',
                      'email' => 'user@example.com',
                      'password' => 'laravel123',
                      'phone' => '1122334455'
                ])
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['name' => 'Necesitamos saber tu nombre']);

           $this->assertEquals(0, User::count());
    }

       /** @test */
        function the_email_is_required()
        {

            $this->from('usuarios/nuevo')
                  ->post('/usuarios/', [
                    'name' => 'Arturo',
                    'email' => '',
                    'password' => 'laravel123',
                    'phone' => '1122334455'
                ])
                ->assertRedirect('usuarios/nuevo')
                ->assertSessionHasErrors(['email']);

           $this->assertEquals(0, User::count());
    }

    /** @test */
     function the_email_must_be_valid()
     {
       //$this->withoutExceptionHandling();

         $this->from('usuarios/nuevo')
               ->post('/usuarios/', [
                 'name' => 'Arturo',
                 'email' => 'correo-no_valido',
                 'password' => 'laravel123',
                 'phone' => '1122334455'
             ])
             ->assertRedirect('usuarios/nuevo')
             ->assertSessionHasErrors(['email']);

        $this->assertEquals(0, User::count());
 }

 /** @test */
  function the_email_must_be_unique()
  {

    factory(User::class)->create([
      'email' => 'user@example.com'
    ]);

      $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
              'name' => 'Arturo',
              'email' => 'user@example.com',
              'password' => 'laravel123',
              'phone' => '1122334455'
          ])
          ->assertRedirect('usuarios/nuevo')
          ->assertSessionHasErrors(['email']);

     $this->assertEquals(1, User::count());
}

    /** @test */
     function the_password_is_required()
     {

         $this->from('usuarios/nuevo')
               ->post('/usuarios/', [
                 'name' => 'Arturo',
                 'email' => 'user@example.com',
                 'password' => '',
                 'phone' => '1122334455'
             ])
             ->assertRedirect('usuarios/nuevo')
             ->assertSessionHasErrors(['password']);

        $this->assertEquals(0, User::count());
 }

 /** @test */
  function password_check_min_size()
  {

      $this->from('usuarios/nuevo')
            ->post('/usuarios/', [
              'name' => 'Arturo',
              'email' => 'user@example.com',
              'password' => '',
              'phone' => '1122334455'
          ])
          ->assertRedirect('usuarios/nuevo')
          ->assertSessionHasErrors(['password']);

     $this->assertEquals(0, User::count());
}

     /** @test */
      function the_phone_is_required()
      {

          $this->from('usuarios/nuevo')
                ->post('/usuarios/', [
                  'name' => 'Arturo',
                  'email' => 'user@example.com',
                  'password' => 'laravel123',
                  'phone' => ''
              ])
              ->assertRedirect('usuarios/nuevo')
              ->assertSessionHasErrors(['phone']);

         $this->assertEquals(0, User::count());
  }

}
