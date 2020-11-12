@extends('layout')

@section('title', "Alta de usuarios uarios")

@section('content')
  <h1>Crear usuario</h1>

  <form method="POST" action="{{ url('/usuarios') }}">
      {!! csrf_field() !!}

      <button type="submit">Aceptar</button>  
  </form>

  <p>
    <a href="{{ url('/usuarios') }}">Volver al listado</a>
  </p>

@endsection
