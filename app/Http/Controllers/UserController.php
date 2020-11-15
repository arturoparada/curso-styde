<?php

namespace App\Http\Controllers; //patron psr4

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        //return redirect('usuarios/nuevo')->withInput();
          $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'phone' => ['required', 'numeric', 'unique:users,phone', 'min:10, max:10']
            //'email' => 'regex:/^.+@.+$/i'   // ejemplo regex
          ], [
            'name.required' => 'Necesitamos saber tu nombre',
            'email.required' => 'Necesitamos saber tu correo!',
            'email.unique' => 'El correo ya se encuentra registrado',
            'password.required' => 'Por favor, ingresa una contraseña',
            'password.min' => 'Contraseña debe tener minimo 6 caracteres',
            'phone.required' => 'Necesitamos un número telefónico',
            'phone.min' => 'Número telefónico a 10 digitos',
            'phone.max' => 'Número telefónico a 10 digitos',
            'phone.numeric' => 'Solo números',
            'phone.unique' => "Ya existe un usuario registrado con ese número telefónico",
          ]);

          User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'phone' => $data['phone']
          ]);

          return redirect()->route('users.index');
      }

    public function edit(User $user)
    {
      return view('users.edit', ['user' => $user]);
      //return "Modificando usuario: {$id}";
    }

    public function update(User $user)
    {
      $data = request()->validate([
        'name' => 'required',
        //'email' => ['required', 'email', 'unique:users,email,'.$user->id],    //cambia a una mejor sintaxis
        'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        'password' => '',
        'phone' => 'required',
      ]);
      if ($data['password'] != null) {
      $data['password'] = bcrypt($data['password']);
    }else {
      unset($data['password']);
    }
      $user->update($data);

      return redirect()->route('users.show', ['user' => $user]);
    }
}
