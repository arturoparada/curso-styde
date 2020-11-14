@extends('layout')

@section('title', "Alta de usuarios")

@section('content')
  <h1>Editar usuario</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <h6>Por favor corrige los errores del formulario</h6>
      {{-- <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul> --}}
    </div>
  @endif

  <form method="POST" action="{{ url('usuarios') }}">
      {!! csrf_field() !!}

      <label for="name">Nombre:</label>
      <input type="text" name="name" id="name" placeholder="Nompre Apellido" value="{{ old('name', $user->name) }}">
      @if ($errors->has('name'))
        <p>{{ $errors->first('name') }}</p>
      @endif
      <br>

      <label for="email">Correo electrónico:</label>
      <input type="email" name="email" id="email" placeholder="correo@example.com" value="{{ old('email', $user->email) }}">
      @if ($errors->has('email'))
        <p>{{ $errors->first('email') }}</p>
      @endif
      <br>
      <br>

      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" placeholder="Mayor a 10 caracteres">
      @if ($errors->has('password'))
        <p>{{ $errors->first('password') }}</p>
      @endif
      <br>

      <label for="phone">Telefono</label>
      <input type="text" name="phone" id="phone" placeholder="10 digitos" value="{{ old('phone', $user->phone) }}">
      @if ($errors->has('phone'))
        <p>{{ $errors->first('phone') }}</p>
      @endif

      <br>
      <button type="submit">Aceptar</button>
  </form>

  <p>
    <a href="{{ url('/usuarios') }}">Volver al listado</a>
  </p>

@endsection
