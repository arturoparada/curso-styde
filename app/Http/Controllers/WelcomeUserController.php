<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{

  public function home()
  {
    return view('welcome');
  }

    public function saludo($name)
    {
      $name= ucfirst($name);

      return "¡Bienvenido {$name}!";
    }

    public function with_nickname($name, $nickname)
    {
      $name= ucfirst($name);

      return "Bienvenido {$name}, aka: {$nickname}";
    }
}
