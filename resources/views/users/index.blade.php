@extends('layout')

@section('title', 'Usuarios')

@section('content')

  <h1>{{ $title }}</h1>

  <ul>
    @forelse ($users as $user)
      <li>

      {{ $user->name }}

      <a href="{{ route('users.show', ['id' => $user->id]) }}">Detalles </a>
      <a href="{{ route('users.edit', ['id' => $user->id]) }}">Editar </a>

      </li>
    @empty
      <li>Sin usuarios registrados</li>
    @endforelse
  </ul>
@endsection
