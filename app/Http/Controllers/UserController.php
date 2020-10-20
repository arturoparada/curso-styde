<?php

namespace App\Http\Controllers; //patron psr4

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      $users = [
        'Ada',
        'John',
        'Jane',
        'Alan',
        'Bill',
        '<script>alert("Hackeado")</script>'
      ];

      $title ='Listado de usuarios';
      //dd(compact('title', 'users'));

      return view('users.index', compact('title','users'));

        /*return view('users')
            ->with('users', $users)
            ->with('title', 'Listado de usuarios');*/
    }

    public function show($id)
    {
      return view('users.show', compact('id'));

    }

    public function create()
    {
      return "Crear nuevo usuario";
    }

    public function edit($id)
    {
      return "Modificando usuario: {$id}";
    }
}
