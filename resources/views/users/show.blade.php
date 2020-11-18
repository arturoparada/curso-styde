@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')

  <div class="card">
    <h4 class="card-header">Usuario #{{ $user->id }}</h4>
    <div class="card-body">
      <form>
        <fieldset disabled>

          <div class="form-group">
            <label for="disabledTextInput">Nombre</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $user->name}} ">
          </div>

          <div class="form-group">
            <label for="disabledTextInput">Correo electrónico</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $user->email}} ">
          </div>

          <div class="form-group">
            <label for="disabledTextInput">Telefono</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="{{ $user->phone}} ">
          </div>

        </fieldset>
        <a href="{{ url('usuarios') }}" class="btn btn-link">Volver al listado</a>
      </form>
    </div>
  </div>
@endsection
