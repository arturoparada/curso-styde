@extends('layout')

@section('title', "Inicio")

@section('content')

  <div class="card" style="width: 60rem;">
  <h5 class="card-header">Ventas</h5>
  <div class="card-body">
  <form>
    <label for="cliente">Cliente</label>
    <select class="form-control">
      <option>Seleccione...</option>
      @foreach ($users as $user)
        <option value="{{ $user->name }}">{{ $user->name }}</option>
      @endforeach
    </select>
    <br>

    <div class="row">
      <div class="col">
        <label>Articulo / Servicio</label>
      <select class="form-control" name="articulo">
        <option>Seleccione</option>
      </select>
      </div>

    <div class="col">
        <label for="formGroupExampleInput2">Cantidad</label>
        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="0">
    </div>

    {{-- <fieldset disabled> --}}
    <div class="col">
        <label for="formGroupExampleInput2">Precio unitario</label>
        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="$0">
    </div>
    {{-- </fieldset> --}}
    <fieldset disabled>
    <div class="col">
        <label for="formGroupExampleInput2">Sub total</label>
        <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="$0" value="formGroupExampleInput2+formGroupExampleInput2">
    </div>
    </fieldset>
    </div>
    <br>
    <div class="row">
      <div class="col">
          <label for="formGroupExampleInput2"></label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
      </div>
    </div>

  </form>
    <br>
    <a href="#" class="btn btn-primary">Aceptar</a>
  </div>
</div>
@endsection
