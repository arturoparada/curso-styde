@extends('layout')

@section('title', 'Usuarios')

@section('content')

  <h1>{{ $title }}</h1>
  <p>
    <a href="{{ route('users.create') }}">Crear nuevo</a>
  </p>

  <ul>
    @forelse ($users as $user)
      <li>

      {{ $user->name }}

      <a href="{{ route('users.show', $user) }}">Detalles</a> |
      <a href="{{ route('users.edit', $user) }}">Editar</a> |
      <form action="{{ route('users.destroy', $user) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit">Eliminar</button>
      </form>

      </li>
    @empty
      <li>Sin usuarios registrados</li>
    @endforelse
  </ul>
@endsection
