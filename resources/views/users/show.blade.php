@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')
  <h1>Usuario #{{ $user->id }}</h1>

 <!-- Mostrando detalles del usuario: {{ $user->id }} -->
  <p>Nombre: {{ $user->name }}</p>
  <p>Correo: {{ $user->email }}</p>
  <p>Telefono: {{ $user->phone }}</p>

@endsection
