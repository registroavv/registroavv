@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Crear AVV')])

@section('content')
    <div class="content">
      <div class="container card bg-white">
        <div class="section">
          <br>
          <h2 class="title text-center">REGISTRAR AVV</h2>
          <div class="team">
            <form action="{{ url('/avv/save') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="rows">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>ESTADO:</label>
                    <select class="form-control" name="estado" id="estado" required>
                      <option value="">Seleccione</option>
                      @foreach( $estados as $key => $value )
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>MUNICIPIO:</label>
                    <select class="form-control" name="municipio" id="municipio" required>
                      <option value="">Seleccione</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                      <label>PARROQUIA:</label>
                      <select class="form-control" name="parroquia" id="parroquia" required>
                        <option value="">Seleccione</option>
                      </select>
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>NOMBRE DE LA AVV:</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>NOMBRE DEL TERRENO:</label>
                    <input class="form-control" type="text" name="nombre_terreno" id="nombre_terreno" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>DIRECCION</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>CANTIDAD DE FAMILIAS:</label>
                    <input type="number" class="form-control" id="familias" name="familias">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>TOTAL DE PERSONAS:</label>
                    <input type="number" class="form-control" id="personas" name="personas">
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>COMUNA</label>
                    <input class="form-control" type="text" name="comuna" id="comuna" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>CONSEJO COMUNAL</label>
                    <input class="form-control" type="text" name="consejo_comunal" id="consejo_comunal" onkeyup="this.value = this.value.toUpperCase();">
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-4">
                  <div class="form-group label-floating">
                    <label class="bmd-label-floating">CEDULA</label>
                    <input class="form-control" type="number" name="cedula" id="cedula" required>
                  </div>
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-fab btn-round btn-primary" id="buscar" name="buscar" type="button" title="BUSCAR"><i class="material-icons">search</i></button>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>NOMBRE:</label>
                    <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required readonly hidden>
                    <label style="margin-top: 25px" id="labelNombreCompleto" name="labelNombreCompleto" class="text-dark"></label>
                    <input type="hidden" name="saime_id" id="saime_id" >
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>FECHA DE NACIMIENTO:</label>
                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required readonly hidden>
                    <label style="margin-top: 25px" id="labelFechaNac" name="labelFechaNac" class="text-dark"></label>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>TELEFONO:</label>
                    <input type="number" class="form-control" name="telefono" pattern="[0-9]{11}" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" required>
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>ORGANO RESPONSABLE</label>
                    <select class="form-control" name="organo" id="organo" required>
                      <option value="">Seleccione</option>
                      @foreach( $organos as $key => $value )
                        <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                    <span class="btn btn-raised btn-round btn-primary btn-file">
                      <span class="fileinput-new">ACTA AVV:</span>
                      <input type="file" name="acta_avv" id="acta_avv" accept="application/pdf, .pdf">
                    </span>
                  </div>
                </div>
              </div>

              <br>

              <div class="rows">
                <div class="col-sm-12">
                  <div id="map" style= "width: 100%; height: 750px;"></div>
                </div>
              </div>
              <br>
              <div class="rows">
                <div class="col-sm-6">
                  <label>COORDENADA UTM</label>
                  <input style="width: 500px;" type="text" name="latitud" id="latitud" class="form-control">
                  <input style="width: 500px;" type="text" name="longitud" id="longitud" class="form-control">
                </div>
              </div>
              <br>

              <div class="rows">
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="submit" value="REGISTRAR" name="enviar" id="enviar" class="btn btn-danger">
                    {{-- <a href="{{ ('avv') }}" class="btn btn-danger">Regresar</a> --}}
                    {{-- <a href="{{url('solicitud')}}" class="btn btn-danger" icon="fas fa-lg fa-arrow-left"/>Regresar</a> --}}
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="form-group">
                    <input type="button" value="REGRESAR" name="regresar" id="regresar" class="btn btn-success">
                  </div>
                </div>
              </div>
              
              <br><br>

            </form>
          </div>
        </div>
      </div>
    </div>
    @endsection
    <script>
      var marker;
      var coords = {};
      initMap = function () 
      {
        navigator.geolocation.getCurrentPosition(
          function (position){
            coords =  {
              lng: position.coords.longitude,
              lat: position.coords.latitude
            };
            setMapa(coords);
          },function(error){console.log(error);});
      }
      function setMapa (coords)
      {
        var map = new google.maps.Map(document.getElementById('map'),
        {
          zoom: 13,
          center:new google.maps.LatLng(coords.lat,coords.lng),
        });
        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: new google.maps.LatLng(coords.lat,coords.lng),
  
        });
        marker.addListener( 'dragend', function (event)
        {
          document.getElementById("latitud").value = this.getPosition().lat();
          document.getElementById("longitud").value = this.getPosition().lng();
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>