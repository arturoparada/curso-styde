@extends('layout')

@section('title', "Alta de usuarios")

@section('content')
  <div class="cad">
    <h4 class="card-header">Editar usuario</h4>
    <div class="card-body">  @if ($errors->any())
        <div class="alert alert-danger">
          <h6>Por favor corrige los errores del formulario</h6>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
          {{ method_field('PUT')}}
          {!! csrf_field() !!}

          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nompre Apellido" value="{{ old('name', $user->name) }}">
          </div>

          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="correo@example.com" value="{{ old('email', $user->email) }}">
          </div>

          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 10 caracteres">
          </div>

          <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="10 digitos" value="{{ old('phone', $user->phone) }}">
          </div>

          <br>

          <button type="submit" class="btn btn-primary">Aceptar</button>
          <a href="{{ url('usuarios') }}" class="btn btn-link">Volver al listado</a>
      </form>
    </div>
  </div>
@endsection
