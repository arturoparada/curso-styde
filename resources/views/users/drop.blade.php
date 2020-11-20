@extends('layout')

@section('title', "Eliminar usuario {$user->id}")

@section('content')

  <div class="card">
    <h4 class="card-header">Usuario #{{ $user->id }}</h4>
    <div class="card-body">
      <form>

        <fieldset disabled>
          <div class="form-group">
            <label for="disabledTextInput">Nombre</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder=" {{ $user->name }} ">
          </div>

          <div class="form-group">
            <label for="disabledTextInput">Correo electrónico</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder=" {{ $user->email }} ">
          </div>

          <div class="form-group">
            <label for="disabledTextInput">Telefono</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder=" {{ $user->phone }} ">
          </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Eliminar</button>

      </form>
    </div>
  </div>
@endsection
