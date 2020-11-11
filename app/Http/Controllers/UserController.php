<?php

namespace App\Http\Controllers; //patron psr4

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
      //$users = DB::table('users')->get();  //carga nombre de usuario a la pagina se modificó index.blade.php para imprimir el valor dentro del objeto usuario <li>{{ $user->name }}</li>

      $users = User::all();

      $title ='Listado de usuarios';

     /* return view('users.index')
      ->with('users', User::all())
      ->with('title', 'Listado de usuarios');*/

      return view('users.index', compact('title','users'));

        /*return view('users')
            ->with('users', $users)
            ->with('title', 'Listado de usuarios');*/
    }

    public function show($id)
    {

      $user = User::find($id);

      if($user == null){
        return response()->view('errors.404', [], 404);
      }
      
      return view('users.show', compact('user'));

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
