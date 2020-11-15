<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteUsersModuleTest extends TestCase
{
  /** @test */
  function it_deletes_a_user()
  {
    $this->withoutExceptionHandling();
    $user = factory(User::class)->create();
    $this->delete("usuarios/{$user->id}")
        ->assertRedirect('usuarios');

        $this->assertDatabaseMissing('users', [
          'id' => $user->id
        ]);

        //$this->assertSame(0, User::count());
  }


}
