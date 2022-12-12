@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Editar AVV')])

@section('content')
    <div class="content">
      <div class="container card bg-white">
        <div class="section">
          <h2 class="title text-center">EDITAR AVV</h2>
          <div class="team">

            @if (auth()->user()->rol_id == 4 && auth()->user()->estado_id <> 25 )
              <form action="{{ url('/redes/avv/'.$avvs->id.'/update') }}" method="POST">
                {{ csrf_field() }}

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>ESTADO:</label>
                      <select class="form-control" name="estado" id="estado" required readonly>
                        <option value="">Seleccione</option>
                          @if ($estados->count())
                              @foreach( $estados as $key => $value )
                                <option value="{{ $key }}" {{ $avvs->estado_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>MUNICIPIO:</label>
                      <select class="form-control" name="municipio" id="municipio" required readonly>
                        <option value="">Seleccione</option>
                          @if ($municipios->count())
                              @foreach( $municipios as $key => $value )
                                <option value="{{ $key }}" {{ $avvs->municipio_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                        <label>PARROQUIA:</label>
                        <select class="form-control" name="parroquia" id="parroquia" required readonly>
                          <option value="">Seleccione</option>
                            @if ($parroquias->count())
                                @foreach( $parroquias as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->parroquia_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NOMBRE DE LA AVV</label>
                      <input class="form-control" type="text" name="nombre" value="{{ $avvs->nombre }}" id="nombre" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NOMBRE DEL PROYECTO</label>
                      <input class="form-control" type="text" name="proyecto" value="{{$avvs->proyecto }}" id="proyecto" readonly>
                    </div>
                  </div>                        
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>DIRECCION</label>
                      <input type="text" class="form-control" id="direccion" value="{{ $avvs->direccion }}" name="direccion" readonly>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>CANTIDAD DE VIVIENDAS</label>
                      <input type="number" class="form-control" id="viviendas" value="{{ $avvs->cant_viviendas }}" name="viviendas" readonly>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>PERSONAS</label>
                      <input type="number" class="form-control" id="personas" value="{{ $avvs->cant_personas }}" name="personas" readonly>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>CODIGO</label>
                      <input type="number" class="form-control" id="codigo" value="{{ $avvs->codigo }}" name="codigo" readonly>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>ORGANO RESPONSABLE</label>
                      <select class="form-control" name="organo" id="organo" required readonly>
                        <option value="">Seleccione</option>
                          @if ($organos->count())
                              @foreach( $organos as $key => $value )
                                <option value="{{ $key }}" {{ $avvs->organo_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
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
                    <label>coordenadas</label>
                    <input style="width: 500px;" type="text" name="latitud" value="{{ $avvs->latitud }}" id="latitud" class="form-control" readonly>
                    <input style="width: 500px;" type="text" name="longitud" value="{{ $avvs->longitud }}" id="longitud" class="form-control" readonly>
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
            @endif
            
            @if (auth()->user()->rol_id == 2 && auth()->user()->estado_id == 25)
              <form action="{{ url('/redes/avv/'.$avvs->id.'/update') }}" method="POST">
                {{ csrf_field() }}

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>ESTADO:</label>
                      <select class="form-control" name="estado" id="estado" required>
                        <option value="">Seleccione</option>
                          @if ($estados->count())
                              @foreach( $estados as $key => $value )
                                <option value="{{ $key }}" {{ $avvs->estado_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>MUNICIPIO:</label>
                      <select class="form-control" name="municipio" id="municipio" required>
                        <option value="">Seleccione</option>
                          @if ($municipios->count())
                              @foreach( $municipios as $key => $value )
                                <option value="{{ $key }}" {{ $avvs->municipio_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                        <label>PARROQUIA:</label>
                        <select class="form-control" name="parroquia" id="parroquia" required>
                          <option value="">Seleccione</option>
                            @if ($parroquias->count())
                                @foreach( $parroquias as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->parroquia_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NOMBRE DE LA AVV</label>
                      <input class="form-control" type="text" name="nombre" value="{{ $avvs->nombre }}" id="nombre">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NOMBRE DEL PROYECTO</label>
                      <input class="form-control" type="text" name="proyecto" value="{{$avvs->proyecto }}" id="proyecto">
                    </div>
                  </div>                        
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>DIRECCION</label>
                      <input type="text" class="form-control" id="direccion" value="{{ $avvs->direccion }}" name="direccion">
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>CANTIDAD DE VIVIENDAS</label>
                      <input type="number" class="form-control" id="viviendas" value="{{ $avvs->cant_viviendas }}" name="viviendas">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>PERSONAS</label>
                      <input type="number" class="form-control" id="personas" value="{{ $avvs->cant_personas }}" name="personas">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>CODIGO</label>
                      <input type="number" class="form-control" id="codigo" value="{{ $avvs->codigo }}" name="codigo">
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
                          @if ($organos->count())
                              @foreach( $organos as $key => $value )
                                <option value="{{ $key }}" {{ $avvs->organo_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
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
                    <label>coordenadas</label>
                    <input style="width: 500px;" type="text" name="latitud" value="{{ $avvs->latitud }}" id="latitud" class="form-control">
                    <input style="width: 500px;" type="text" name="longitud" value="{{ $avvs->longitud }}" id="longitud" class="form-control">
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
            @endif

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
          var map = new google.maps.Map(document.getElementById('map'),
          {
            zoom: 17,
            center:new google.maps.LatLng({{$avvs->latitud}},{{$avvs->longitud}}),
          });

          const contentString =
            '<div id="content" style="color:black;">' +
              '<div id="siteNotice">' +
              "</div>" +
              '<h2 id="firstHeading" class="firstHeading">{{ $avvs->nombre }}</h2>' +
              '<div id="bodyContent">'+
                '<p><b>ESTADO: </b>{{ $avvs->estado->nombre }}'+
                '<p><b>MUNICIPIO: </b>{{ $avvs->municipio->nombre }}'+
                '<p><b>PARROQUIA: </b>{{ $avvs->parroquia->nombre }}'+
                '<p><b>DIRECCION: </b>{{ $avvs->direccion }}'+
                '<p><b>CANTIDAD DE VIVIENDAS: </b>{{ $avvs->cant_viviendas }}'+
                '<p><b>CANTIDAD DE PERSONAS: </b>{{ $avvs->cant_personas }}'+
                '<p><b>ORGANO RESPONSABLE: </b>{{ $avvs->organo->nombre }}'+
              "</div>" +
            "</div>";
            const infowindow = new google.maps.InfoWindow({
              content: contentString,
            });
            marker = new google.maps.Marker({
              map: map,
              animation: google.maps.Animation.DROP,
              draggable: true,
              position: new google.maps.LatLng({{$avvs->latitud}},{{$avvs->longitud}}),
              title: '{{ $avvs->nombre }}',
            });

            marker.addListener( 'dragend', function (event)
            {
              //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
              document.getElementById("latitud").value = this.getPosition().lat();
              document.getElementById("longitud").value = this.getPosition().lng();
            });
            marker.addListener("click", () => {
              infowindow.open({
                anchor: marker,
                map,
                shouldFocus: false,
              });
            });                    
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>
