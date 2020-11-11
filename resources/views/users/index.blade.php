@extends('layout')

@section('title', 'Usuarios')

@section('content')

  <h1>{{ $title }}</h1>

  <ul>
    @forelse ($users as $user)
      <li>
      
      {{ $user->name }}

      <a href="{{ route('users.show', ['id' => $user->id]) }}">Ver detalles</a>

      </li>
    @empty
      <li>Sin usuarios registrados</li>
    @endforelse
  </ul>
@endsection