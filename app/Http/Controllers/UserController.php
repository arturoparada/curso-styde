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

    public function show(User $user)
    {
      return view('users.show', compact('user'));

    }

    public function create()
    {
      return view('users.create');
    }

    public function store()
      {
          $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required'
          ], [
            'name.required' => 'El campo nombre es obligatorio'
          ]);

//        if (empty($data['name'])) {
  //         return redirect('usuarios/nuevo')->withErrors([
  //           'name' => 'El campo nombre es obligatorio'
  //         ]);
  //       }

          User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'phone' => $data['phone']
          ]);

          return redirect()->route('users.index');
      }

    public function edit($id)
    {
      return "Modificando usuario: {$id}";
    }
}
