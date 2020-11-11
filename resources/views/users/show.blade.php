@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')
  <h1>Usuario #{{ $user->id }}</h1>

 <!-- Mostrando detalles del usuario: {{ $user->id }} -->
  <p>Nombre: {{ $user->name }}</p>
  <p>Correo: {{ $user->email }}</p>
  <p>Telefono: {{ $user->phone }}</p>

  <p>
    <a href="{{ url('/usuarios') }}">Volver al listado</a>
  </p>

  <!--<p>
    <a href="{{ url()->previous() }}">URL anterior</a>
  </p>

   <p>
    <a href="{{ action('UserController@index') }}">Index</a>
  </p> -->
@endsection
