@extends('layouts.main', ['activePage' => 'avv', 'title' => __('FICHA AVV')])

@section('content')

<div class="content">
    <div class="container card bg-white">
      <div class="section">
        <img src="{{asset('/img/cintilloazul.png')}}" width="100%" alt="">
        <br><br>
        <h2 class="title text-center font-weight-bold">HOJA DE OBSERVACIONES</h2>
        <div class="team">
          <h3 class="title"><b>ESTATUS DE LA AVV</b></h3>
          <div class="rows">
            <table>
              <thead>
                <th>REGISTRO</th>
                <th>NIVEL 1</th>
                <th>NIVEL 2</th>
                <th>NIVEL 3</th>
                <th>NIVEL 4</th>
                <th>NIVEL 5</th>
                <th>NIVEL 6</th>
                <th>NIVEL 7</th>
                <th>NIVEL 8</th>
                <th>NIVEL 9</th>
              </thead>
              <tbody>
                <tr>
                  <td><input disabled class="toggle-class" name="preregistro" id="preregistro" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->preregistro ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel1" id="nivel1" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel1 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel2" id="nivel2" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel2 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel3" id="nivel3" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel3 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel4" id="nivel4" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel4 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel5" id="nivel5" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel5 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel6" id="nivel6" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel6 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel7" id="nivel7" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel7 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel8" id="nivel8" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel8 ? 'checked' : '' }}></td>
                  <td><input disabled class="toggle-class" name="nivel9" id="nivel9" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel9 ? 'checked' : '' }}></td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>

          <div class="rows">
            <table style="width: 100%" border="1">
                <tr>
                  <td colspan="2" style="background-color: #D9D9D9"><b>ESTADO:</b></td>
                  <td colspan="2" style="background-color: #D9D9D9"><b>MUNICIPIO:</b></td>
                  <td colspan="2" style="background-color: #D9D9D9"><b>PARROQUIA:</b></td>
                </tr>
                <tr>
                  <td colspan="2">{{ (isset($avvs->estado->nombre)) ? $avvs->estado->nombre : '' }}</td>
                  <td colspan="2">{{ (isset($avvs->municipio->nombre)) ? $avvs->municipio->nombre : '' }}</td>
                  <td colspan="2">{{ (isset($avvs->parroquia->nombre)) ? $avvs->parroquia->nombre : '' }}</td>
                </tr>
                <tr>
                  <td colspan="3" style="background-color: #D9D9D9"><b>VOCERO:</b></td>
                  <td style="background-color: #D9D9D9"><b>CEDULA:</b></td>
                  <td colspan="2" style="background-color: #D9D9D9"><b>TELEFONO:</b></td>
                </tr>
                <tr>
                  <td colspan="3">{{ (isset($avvs->saime->nombreapellidocompleto)) ? $avvs->saime->nombreapellidocompleto : ''}}</td>
                  <td>{{ (isset($avvs->saime->cedula)) ? $avvs->saime->cedula : ''}}</td>
                  <td colspan="2">{{$avvs->telefono}}</td>
                </tr>
                <tr>
                  <td colspan="6" style="background-color: #D9D9D9"><b>NOMBRE DE LA AVV:</b></td>
                </tr>
                <tr>
                  <td colspan="6" style="width: 825px">{{ $avvs->nombre }}</td>
                </tr>
                <tr>
                  <td colspan="6" style="background-color: #D9D9D9"><b>NOMBRE DEL TERRENO:</b></td>
                </tr>
                <tr>
                  <td colspan="6" style="width: 825px">{{ $avvs->nombre_terreno }}</td>
                </tr>
                <tr>
                  <td colspan="6" style="background-color: #D9D9D9"><b>DIRECCION:</b></td>
                </tr>
                <tr>
                  <td colspan="6" style="width: 825px">{{ $avvs->direccion }}</td>
                </tr>
                <tr>
                  <td style="background-color: #D9D9D9"><b>FAMILIAS:</b></td>
                  <td style="background-color: #D9D9D9"><b>PERSONAS:</b></td>
                  <td colspan="2" style="background-color: #D9D9D9"><b>LATITUD:</b></td>
                  <td colspan="2" style="background-color: #D9D9D9"><b>LONGITUD:</b></td>
                </tr>
                <tr>
                  <td>{{$avvs->familias}}</td>
                  <td>{{ $avvs->cant_personas}}</td>
                  <td colspan="2">{{ $avvs->latitud}}</td>
                  <td colspan="2">{{ $avvs->longitud}}</td>
                </tr>
                <tr>
                  <td colspan="6" style="background-color: #D9D9D9"><b>ORGANO EJECUTOR:</b></td>
                </tr>
                <tr>
                  <td colspan="6">{{ (isset($avvs->organo->nombre)) ? $avvs->organo->nombre : ''}}</td>
                </tr>
                <tr>
                  <td colspan="2" style="background-color: #D9D9D9"><b>CMG:</b></td>
                  <td colspan="4" style="background-color: #D9D9D9"><b>NOMBRE DEL CMG:</b></td>
                </tr>
                <tr>
                  <td colspan="2">{{ (isset($avvs->cmg->nombre)) ? $avvs->cmg->nombre : ''}}</td>
                  <td colspan="4">{{$avvs->nombre_cmg}}</td>
                </tr>
                <tr>
                  <td colspan="3" style="background-color: #D9D9D9"><b>COMUNA:</b></td>
                  <td colspan="3" style="background-color: #D9D9D9"><b>CONSEJO COMUNAL:</b></td>
                </tr>
                <tr>
                    <td colspan="3">{{$avvs->comuna}}</td>
                    <td colspan="3">{{ $avvs->consejo_comunal}}</td>
                </tr>
                <tr>
                  <td colspan="2" style="background-color: #D9D9D9"><b>INSCRITA EN EL SIGEVIH:</b></td>
                  <td style="background-color: #D9D9D9"><b>ID DEL SIGEVIH:</b></td>
                  <td colspan="3" style="background-color: #D9D9D9"><b>EL URBANISMO ESTA PROTOCOLIZADO?</b></td>
                </tr>
                <tr>
                  <td colspan="2">{{ (isset($avvs->sigevih->nombre)) ? $avvs->sigevih->nombre : ''}}</td>
                  <td>{{ $avvs->sigevih_codigo}}</td>
                  <td colspan="3">{{$avvs->protocolizacion}}</td>
                </tr>
                <tr>
                  <td colspan="3" style="background-color: #D9D9D9"><b>METODOLOGIA DE EJECUCION:</b></td>
                  <td colspan="3" style="background-color: #D9D9D9"><b>TIPOLOGIA DE CONSTRUCCION:</b></td>
                </tr>
                <tr>
                  <td colspan="3">{{ $avvs->metodologia_ejecucion}}</td>
                  <td colspan="3">{{$avvs->tipologia_constructiva}}</td>
                </tr>
                <tr>
                  <td colspan="4" style="background-color: #D9D9D9"><b>TITULO DE PROPIEDAD MULTIFAMILIAR:</b></td>
                  <td colspan="2" style="background-color: #D9D9D9"><b>Nro DE FOLIO TPM:</b></td>
                </tr>
                <tr>
                  <td colspan="4">{{ (isset($avvs->tpm->nombre)) ? $avvs->tpm->nombre : ''}}</td>
                  <td colspan="2">{{$avvs->tmp_codigo}}</td>
                </tr>
                <tr>
                  <td colspan="6" class="font-weight-bold text-center" style="background-color: #726f6f; color: white; height:40px">NIVEL 1</td>
                </tr>
                <tr>
                  <td colspan="6" style="height: 100px">
                    <ul>
                      <li><b>OBSERVACION:</b> {{$avvs->observacion_redes}}</li>
                    </ul>
                  </td>
                </tr>
                <tr><td colspan="3" class="text-center">ACTA AVV</td></tr>
                <tr>
                  <td colspan="3">
                    @if ($avvs->acta_avv)
                    <iframe width="500" height="600" src="{{asset('/acta-avv/'.$avvs->acta_avv)}}" frameborder="0"></iframe>  
                  @else
                    <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                  @endif
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-center" colspan="6" style="background-color: #726f6f; color: white; height:40px">NIVEL 2</td>
                </tr>
                <tr>
                  <td colspan="6" style="height: 100px">
                    <ul>
                      <li><b>INFORME DE PREFACTIBILIDAD:</b> {{ (isset($avvs->prefactibilidad->nombre)) ? $avvs->prefactibilidad->nombre : "" }}</li>
                      <li><b>SALIDA CARTOGRAFICA:</b> {{ (isset($avvs->salidaCartografica->nombre)) ? $avvs->salidaCartografica->nombre : ""}} </li>
                      <li><b>ESTUDIO DE SUELO:</b> {{(isset($avvs->estudioSuelo->nombre)) ? $avvs->estudioSuelo->nombre : ""}} </li>
                      <li><b>FACTIBILIDAD DE SERVICIOS:</b> {{(isset($avvs->factibilidadServicio->nombre) ? $avvs->factibilidadServicio->nombre : "")}}</li>
                      <li><b>LEVANTAMIENTO TOPOGRAFICO:</b> {{(isset($avvs->levantamientoTopografico->nombre)) ? $avvs->levantamientoTopografico->nombre : ""}}</li>
                      <p><b>OBSERVACIONES:</b> {{$avvs->observacion_intu2}}</p>
                     </ul>
                  </td>
                </tr>
                <tr><td class="text-center" colspan="3">INFORME DE PREFACTIBILIDAD</td><td class="text-center" colspan="2">FACTIBILIDAD DE SERVICIOS</td></tr>
                <tr>
                  <td colspan="3" class="">
                    @if ($avvs->prefactibilidad2)
                      <iframe width="500" height="600" src="{{asset('/prefactibilidad/'.$avvs->prefactibilidad2)}}" frameborder="0"></iframe>  
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                  <td colspan="3">
                    @if ($avvs->factibilidad_servicio)
                      <iframe width="500" height="600" src="{{asset('/factibilidad_servicio/'.$avvs->factibilidad_servicio)}}" frameborder="0"></iframe>  
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                </tr>
                <tr><td class="text-center" colspan="3">SALIDA CARTOGRAFICA</td><td class="text-center" colspan="2">LEVANTAMIENTO TOPOGRAFICO</td></tr>
                <tr>
                  <td colspan="3">
                    @if ($avvs->salida_cartografica)
                      <iframe width="500" height="600" src="{{asset('/salida_cartografica/'.$avvs->salida_cartografica)}}" frameborder="0"></iframe>  
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                  <td colspan="3">
                    @if ($avvs->levantamiento_topografico)
                      <iframe width="500" height="600" src="{{asset('/levantamiento_topografico/'.$avvs->levantamiento_topografico)}}" frameborder="0"></iframe>  
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                </tr>
                <tr><td class="text-center" colspan="3">ESTUDIO DE SUELOS</td></tr>
                <tr>
                  <td colspan="3">
                    @if ($avvs->estudio_suelo)
                      <iframe width="500" height="600" src="{{asset('/estudio_suelo/'.$avvs->estudio_suelo)}}" frameborder="0"></iframe>  
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-center" colspan="6" style="background-color: #726f6f; color: white; height:40px">NIVEL 3</td>
                </tr>
                <tr>
                  <td colspan="6" style="height: 100px">
                    <ul>
                      <li><b>PROPIEDAD DEL TERRENO:</b> {{ (isset($avvs->propiedad_terreno->nombre)) ? $avvs->propiedad_terreno->nombre : '' }}</li>
                      <p><b>OBSERVACIONES: </b>{{$avvs->observacion_intu3}}</p>
                    </ul>
                  </td>
                </tr>
                <tr><td class="text-center" colspan="3">PROPIEDAD DEL TERRENO</td></tr>
                <tr>
                  <td colspan="3">
                    @if ($avvs->docu_catastral)
                    <iframe width="500" height="600" src="{{asset('/documento_catastral/'.$avvs->docu_catastral)}}" frameborder="0"></iframe>  
                  @else
                    <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                  @endif
                  </td>
                </tr>
                <tr>
                  <td class="font-weight-bold text-center" colspan="6" style="background-color: #726f6f; color: white; height:40px">NIVEL 4</td>
                </tr>
                <tr>
                  <td colspan="6" style="height: 100px">
                    <ul>
                      <li><b>CANT. DE VIVIENDAS:</b> {{$avvs->cant_viviendas}}</li>
                      <li><b>NOMBRE DEL PROYECTO:</b>{{ $avvs->nombre_proyecto }}</li>
                      <li><b>IMPLANTACION:</b>{{ (isset($avvs->implantacion->nombre)) ? $avvs->implantacion->nombre : '' }}</li>
                      <li><b>PROYECTO:</b>{{ (isset($avvs->proyecto->nombre)) ? $avvs->proyecto->nombre : ''}}</li>
                      <p><b>OBSERVACIONES:</b>{{$avvs->observacion_fmh}}</p>
                    </ul>
                  </td>
                </tr>
                <tr>
                  <td class="text-center" colspan="3">IMPLANTACION</td><td class="text-center" colspan="2">PROYECTO</td>
                </tr>
                <tr>
                  <td colspan="3">
                    @if ($avvs->implantacion2)
                      <iframe width="500" height="600" src="{{asset('/implantacion/'.$avvs->implantacion2)}}" frameborder="0"></iframe>  
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                  <td colspan="3">
                    @if ($avvs->proyecto2)
                      <iframe width="500" height="600" src="{{asset('/proyecto/'.$avvs->proyecto2)}}" frameborder="0"></iframe> 
                    @else
                      <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                    @endif
                  </td>
                </tr>
            </table>
            <table class="table table-hover table-striped">
              <tr>
                <td class="font-weight-bold text-center" colspan="6" style="background-color: #726f6f; color: white; height:40px">MINUTAS</td>
              </tr>
              @foreach ($minutas as $minuta)
              <tr>
              <td colspan="1">{{ $minuta->created_at}}</td>
              <td colspan="5">{{ $minuta->nombre }}</td>
              </tr>
              @endforeach
            </table>
            {{ $minutas->links('pagination::bootstrap-4') }}
          </div>

          <br><br>

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
                  <a href="{{ route('avv.index') }}" class="btn btn-success">Regresar</a>
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
        var map = new google.maps.Map(document.getElementById('map'),
        {
          zoom: 17,
          center:new google.maps.LatLng({{ $avvs->latitud }},{{ $avvs->longitud }}),
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
              '<p><a href="{{ url('/avv/'. $avvs->id .'/show') }}" rel="tooltip"><b>VER FICHA</b></a></p>'+
            "</div>" +
          "</div>";
          const infowindow = new google.maps.InfoWindow({
            content: contentString,
          });
          marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            draggable: false,
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