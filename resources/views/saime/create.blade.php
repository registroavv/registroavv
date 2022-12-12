@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'Saime', 'title' => __('Listado de AVV')])

@section('content')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  
<div class="content">
  <div class="container card bg-white">
    <div class="section">
      <h2 class="title text-center">NUEVO REGISTRO SAIME</h2>
      <div class="team">
        <form method="POST" action="{{ url('/saime/guardar')}}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="rows">
            <div class="col-sm-4">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Cedula:</label>
                <input type="number" class="form-control" name="cedula" required>
              </div>
            </div>
          </div>
          <div class="rows">
            <div class="col-sm-4">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Nacionalidad:</label>
                <select class="form-control" name="letra" id="letra" required>
                  <option value="">Seleccione</option>
                  <option value="V">VENEZOLANO</option>
                  <option value="E">EXTRANJERO</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Genero:</label>
                <select class="form-control" name="genero" id="genero" required>
                  <option value="">Seleccione</option>
                  <option value="2">FEMENINA</option>
                  <option value="1">MASCULINO</option>
                </select>
              </div>
            </div>
          </div>

          <div class="rows">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Primer Nombre:</label>
                <input type="text" class="form-control" id="nombre1" name="nombre1" onkeyup="this.value = this.value.toUpperCase();">
              </div>  
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Segundo Nombre:</label>
                <input type="text" class="form-control" name="nombre2" id="nombre2" onkeyup="this.value = this.value.toUpperCase();">
              </div>
            </div>
          </div>

          <div class="rows">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Primer Apellido:</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" onkeyup="this.value = this.value.toUpperCase();">
              </div>  
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label class="bmd-label-floating">Segundo Apellido:</label>
                <input type="text" class="form-control" name="apellido2" name="apellido2" onkeyup="this.value = this.value.toUpperCase();">
              </div>
            </div>
          </div><br>

          <div class="rows">
            <div class="col-sm-4">
              <div class="form-group">
                <label>Fecha de Nacimiento:</label>
                <input type="date" class="form-control" name="fecha_nac">
              </div>
            </div>
          </div>

          <div class="rows">
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary">Registrar</button>
              <a href="{{url('admin/saime')}}" class="btn btn-default">Cancelar</a>
            </div>
          </div><br>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection