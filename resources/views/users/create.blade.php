@extends('layout')

@section('title', "Alta de usuarios uarios")

@section('content')
  <h1>Crear usuario</h1>

  <form method="POST" action="{{ url('usuarios') }}">
      {!! csrf_field() !!}

      <label for="name">Nombre:</label>
      <input type="text" name="name" id="name" placeholder="Nompre Apellido">
      <br>

      <label for="email">Correo electrónico:</label>
      <input type="email" name="email" id="email" placeholder="correo@example.com">
      <br>

      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres">
      <br>

      <label for="phone">Telefono</label>
      <input type="text" name="phone" id="phone" placeholder="10 digitos">

      <button type="submit">Aceptar</button>
  </form>

  <p>
    <a href="{{ url('/usuarios') }}">Volver al listado</a>
  </p>

@endsection
