@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'Saime', 'title' => __('Crear Registro Saime')])

@section('content')
<div class="content">
  <div class="container card">
    <div class="section">
      <h2 class="title text-center">EDITAR REGISTRO DE SAIME</h2>
      <div class="team">
        <form method="POST" action="{{ url('/saime/'.$saimes->id.'/update')}}">
          {{ csrf_field() }}
          <div class="rows">
            <div class="col-sm-4">
              <div class="form-group label-floating">
                <label>NACIONALIDAD:</label>
                <input type="text" class="form-control" name="letra" value="{{$saimes->letra}}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group label-floating">
                <label>CEDULA:</label>
                <input type="number" class="form-control" name="cedula" value="{{ $saimes->cedula }}">
              </div>
            </div>
          </div>

          <br>
      
          <div class="rows">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label>PRIMER NOMBRE:</label>
                <input type="text" class="form-control" name="nombre1" value="{{$saimes->nombre1}}" onkeyup="this.value = this.value.toUpperCase();">
              </div>  
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label>SEGUNDO NOMBRE:</label>
                <input type="text" class="form-control" name="nombre2" value="{{$saimes->nombre2}}" onkeyup="this.value = this.value.toUpperCase();">
              </div>
            </div>
          </div>

          <br>
      
          <div class="rows">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label>PRIMER APELLIDO:</label>
                <input type="text" class="form-control" name="apellido1" value="{{$saimes->apellido1}}" onkeyup="this.value = this.value.toUpperCase();">
              </div>  
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label>SEGUNDO APELLIDO:</label>
                <input type="text" class="form-control" name="apellido2" value="{{$saimes->apellido2}}" onkeyup="this.value = this.value.toUpperCase();">
              </div>
            </div>
          </div>

          <br>
      
          <div class="rows">
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label>FECHA DE NACIMIENTO:</label>
                <input type="date" class="form-control" name="fecha_nac" value="{{$saimes->fecha_nac}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group label-floating">
                <label>GENERO:</label>
                <select class="form-control" name="genero" required>
                  <option value="">Seleccione</option>
                  @foreach( $generos as $key => $value )
                    <option value="{{ $key }}" {{ $saimes->genero_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <br>
      
          <div class="rows">
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary">Actualizar</button>
              <a href="{{url('/saime/')}}" class="btn btn-default">Cancelar</a>
            </div>
          </div>
        </form>
      </div>    
    </div>
  </div>
</div>

@endsection