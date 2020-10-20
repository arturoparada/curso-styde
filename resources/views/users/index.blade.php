@extends('layout')

@section('title', 'Usuarios')

@section('content')

  <h1>{{ $title }}</h1>

  <ul>
    @forelse ($users as $user)
      <li>{{ $user }}</li>
    @empty
      <li>Sin usuarios registrados</li>
    @endforelse
  </ul>
@endsection

@section('sidebar')
  @parent
  <h2>Barra lateral personalizada t(-_-t)</h2>
@endsection
