@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Crear AVV')])

@section('content')
    <div class="content">
      <div class="container card bg-white">
        <div class="section">
          <br><br>
          <div class="row bg-info">
            <div class="col-sm-12">
              <h2 class="text-center"><b>ACTUALIZAR AVV</b></h2>
            </div>
          </div>
          <div class="team">
            <b><h3 class="title">ESTATUS DE LA AVV</h3></b>
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
            <br><br>

            @if (auth()->user()->rol_id == 2 && auth()->user()->estado_id == 25 || auth()->user()->rol_id == 1)
              <form action="{{ url('/avv/'.$avvs->id.'/update') }}" method="POST">
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
                      <label>NOMBRE DE LA AVV:</label>
                      <input class="form-control" type="text" name="nombre" value="{{ $avvs->nombre }}" id="nombre" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>NOMBRE DEL TERRENO:</label>
                      <input class="form-control" type="text" name="nombre_terreno" value="{{$avvs->nombre_terreno }}" id="nombre_terreno" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>DIRECCION</label>
                      <input type="text" class="form-control" id="direccion" value="{{ $avvs->direccion }}" name="direccion" onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>FAMILIAS:</label>
                      <input type="number" class="form-control" id="fammilias" value="{{ $avvs->familias }}" name="familias">
                    </div>
                  </div>                
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>PERSONAS:</label>
                      <input type="number" class="form-control" id="personas" value="{{ $avvs->cant_personas }}" name="personas">
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>COMUNA</label>
                      <input class="form-control" type="text" value="{{ $avvs->comuna }}" name="comuna" id="comuna" required onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>CONSEJO COMUNAL</label>
                      <input class="form-control" type="text" value="{{ $avvs->consejo_comunal }}" name="consejo_comunal" id="consejo_comunal" required onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                  </div>
                </div>   
                
                <br>

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group label-floating">
                      <label class="bmd-label-floating">CEDULA</label>
                      <input class="form-control" type="number" value="{{ (isset($avvs->saime->cedula)) ? $avvs->saime->cedula : ''}}" name="cedula" id="cedula" required>
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
                      <label>NOMBRES:</label>
                      <label style="margin-top: 25px" id="labelNombreCompleto" name="labelNombreCompleto" class="text-dark">{{ (isset($avvs->saime->nombreapellidocompleto)) ? $avvs->saime->nombreapellidocompleto : '' }}</label>
                      <input type="text" class="form-control" value="{{ (isset($avvs->saime->nombreapellidocompleto)) ? $avvs->saime->nombreapellidocompleto : '' }}" id="nombre_completo" name="nombre_completo" required readonly hidden>
                      <input type="number" value="{{ $avvs->saime_id }}" name="saime_id" id="saime_id" hidden>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>FECHA DE NACIMIENTO:</label>
                      <input type="date" class="form-control" value="{{ (isset($avvs->saime->fecha_nac)) ? $avvs->saime->fecha_nac : '' }}" id="fecha_nac" name="fecha_nac" required readonly hidden>
                      <label style="margin-top: 25px" id="labelFechaNac" name="labelFechaNac" class="text-dark">{{ (isset($avvs->saime->fecha_nac)) ? $avvs->saime->fecha_nac : '' }}</label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group label-floating">
                      <label class="bmd-label-floating">TELEFONO:</label>
                      <input type="text" class="form-control" value="{{ $avvs->telefono }}" name="telefono" pattern="[0-9]{11}" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" required>
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
                  <div class="col-sm-6">
                    <div class="form-group">
                      {{-- <a class="btn btn-success" target="_blank" href="{{asset('/implantacion/'.$avvs->implantacion)}}">INFORME DE IMPLANTACION</a> --}}
                      @if ($avvs->acta_avv)
                        <iframe width="500" height="600" src="{{asset('/acta-avv/'.$avvs->acta_avv)}}" frameborder="0"></iframe>  
                      @else
                        <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                      @endif
                    </div>
                  </div>                
                </div>

                <div class="rows">
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
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <a href="{{ route('avv.index') }}" class="btn btn-success">Regresar</a>
                    </div>
                  </div>
                </div>
                
                <br><br>

              </form>
            @endif
            
            @if (auth()->user()->rol_id == 4 || auth()->user()->rol_id == 3)
              <form action="{{ url('/avv/'.$avvs->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label><b>ESTADO:</b></label><br>
                      <label class="text-dark"><h4>{{ (isset($avvs->estado->nombre)) ? $avvs->estado->nombre : ''}}</h4></label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label><b>MUNICIPIO:</b></label><br>
                      <label class="text-dark"><h4>{{ (isset($avvs->municipio->nombre)) ? $avvs->municipio->nombre : '' }}</h4></label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label><b>PARROQUIA:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->parroquia->nombre }}</h4></label>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label><b>NOMBRE DE LA AVV:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->nombre }}</h4></label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label><b>NOMBRE DEL TERRENO:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->nombre_terreno }}</h4></label>
                    </div>
                  </div>                        
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label><b>DIRECCION:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->direccion }}</h4></label>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label><b>FAMILIAS:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->familias }}</h4></label>
                    </div>
                  </div>                
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label><b>PERSONAS:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->cant_personas }}</h4></label>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label><b>COMUNA:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->comuna }}</h4></label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label><b>CONSEJO COMUNAL:</b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->consejo_comunal }}</h4></label>
                    </div>
                  </div>
                </div>   
                
                <br>

                <div class="rows">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label><b>CEDULA:</b></label><br>
                      <label class="text-dark"><h4>{{ (isset($avvs->saime->cedula)) ? $avvs->saime->cedula : '' }}</h4></label>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label><b>NOMBRES:</b></label><br>
                      <label class="text-dark"><h4>{{ (isset($avvs->saime->nombreapellidocompleto)) ? $avvs->saime->nombreapellidocompleto : '' }}</h4></label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label><b>FECHA DE NACIMIENTO:</b></label><br>
                      <label class="text-dark"><h4>{{ (isset($avvs->saime->fecha_nac)) ? $avvs->saime->fecha_nac : '' }}</h4></label>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label><b>TELEFONO:<b></label><br>
                      <label class="text-dark"><h4>{{ $avvs->telefono }}</h4></label>
                    </div>
                  </div>
                </div>

                <br>

                <div class="rows">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label><b>ORGANO RESPONSABLE:</b></label><br>
                      <label class="text-dark"><h4>{{ (isset($avvs->organo->nombre)) ? $avvs->organo->nombre : '' }}</h4></label>
                    </div>
                  </div>
                </div>
              
                @if (auth()->user()->rol_id == 3 && auth()->user()->nivel2)
                  {{-- ===================== MODIFICACION DE INTU NIVEL 2  ================= --}}

                  <div class="row bg-info">
                    <div class="col-sm-12"><h2 class="text-center"><b>NIVEL 2</b></h2></div><br>
                  </div><br>
                  @if (auth()->user()->estado_id == 25)
                    <div class="rows">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label><b>CERTIFICAR POR INTU:</b></label><br>
                          <input type="hidden" name="nivel2" id="nivel2" value="0">
                          <td><input class="form-control toggle-class" name="nivel2" id="nivel2" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel2 ? 'checked' : '' }}></td><p class="text-danger">SOLO DESPUES DE COMPLETAR TODOS LOS DATOS</p>
                        </div>
                      </div>
                    </div>                      
                  @endif
                  <br>
                  <div class="rows">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label><b>MATRIZ INTU:</b></label>
                        <input type="number" name="matriz_intu" id="matriz_intu" class="form-control" value="{{$avvs->matriz_intu}}">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label><b>CODIGO INTU:</b></label>
                        <input type="number" name="codigo_intu" id="codigo_intu" class="form-control" value="{{$avvs->codigo_intu}}">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label><b>AREA DEL TERRENO EN HECTAREAS:</b></label>
                        <input type="number" name="area_terreno" step="0.01" id="area_terreno" class="form-control" placeholder="12.45" value="{{$avvs->area_terreno}}">
                      </div>
                    </div>
                  </div><br>

                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label><b>SERVICIOS CERCANOS:</b></label>
                        <select class="form-control" name="servicios_cercanos_id" id="servicios_cercanos_id" required>
                          <option value="">Seleccione</option>
                            @if ($servicioscercanos->count())
                                @foreach( $servicioscercanos as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->servicios_cercanos_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
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
                        <label><b>INFORME DE PREFACTIBILIDAD:</b></label>
                        <select class="form-control" name="prefactibilidad_id" id="prefactibilidad_id" required>
                          <option value="">Seleccione</option>
                            @if ($prefactibilidad->count())
                                @foreach( $prefactibilidad as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->prefactibilidad_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>FACTIBILIDAD DE SERVICIOS:</b></label>
                        <select class="form-control" name="factibilidad_servicio_id" id="factibilidad_servicio_id" required>
                          <option value="">Seleccione</option>
                            @if ($factibilidad_servicios->count())
                                @foreach( $factibilidad_servicios as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->factibilidad_servicio_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
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
                        @if ($avvs->prefactibilidad2)
                          <iframe width="500" height="600" src="{{asset('/prefactibilidad/'.$avvs->prefactibilidad2)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        @if ($avvs->factibilidad_servicio)
                          <iframe width="500" height="600" src="{{asset('/factibilidad_servicio/'.$avvs->factibilidad_servicio)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">SUBIR PREFACTIBILIDAD TECNICA:</span>
                          <input type="file" name="prefactibilidad" id="prefactibilidad" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">SUBIR FACTIBILIDAD DE SERVICIOS</span>
                          <input type="file" name="factibilidad_servicio" id="factibilidad_servicio" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>SALIDA CARTOGRAFICA:</b></label>
                        <select class="form-control" name="salida_cartografica_id" id="salida_cartografica_id" required>
                          <option value="">Seleccione</option>
                            @if ($salidacartografica->count())
                                @foreach( $salidacartografica as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->salida_cartografica_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>LEVANTAMIENTO TOPOGRAFICO:</b></label>
                        <select class="form-control" name="levantamiento_topografico_id" id="levantamiento_topografico_id" required>
                          <option value="">Seleccione</option>
                            @if ($levantamiento_topografico->count())
                                @foreach( $levantamiento_topografico as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->levantamiento_topografico_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
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
                        @if ($avvs->salida_cartografica)
                          <iframe width="500" height="600" src="{{asset('/salida_cartografica/'.$avvs->salida_cartografica)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        @if ($avvs->levantamiento_topografico)
                          <iframe width="500" height="600" src="{{asset('/levantamiento_topografico/'.$avvs->levantamiento_topografico)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">SUBIR SALIDA CARTOGRAFICA:</span>
                          <input type="file" name="salida_cartografica" id="salida_cartografica" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">SUBIR LEVANTAMIENTO TOPOGRAFICO:</span>
                          <input type="file" name="levantamiento_topografico" id="levantamiento_topografico" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>ESTUDIO DE SUELOS:</b></label>
                        <select class="form-control" name="estudio_suelo_id" id="estudio_suelo_id" required>
                          <option value="">Seleccione</option>
                            @if ($estudio_suelo->count())
                                @foreach( $estudio_suelo as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->estudio_suelo_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
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
                        @if ($avvs->estudio_suelo)
                          <iframe width="500" height="600" src="{{asset('/estudio_suelo/'.$avvs->estudio_suelo)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">ESTUDIO DE SUELOS:</span>
                          <input type="file" name="estudio_suelo" id="estudio_suelo" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                  </div>

                  <br><br>
                  <div class="rows">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label><b>OBSERVACION:</b></label>
                        <textarea class="form-control" name="observacion_intu2" id="observacion_intu2" cols="30" rows="10" onkeyup="this.value = this.value.toUpperCase();">{{$avvs->observacion_intu2}}</textarea>
                      </div>
                    </div>
                  </div>
                    
                @endif

                @if (auth()->user()->rol_id == 3 && auth()->user()->nivel3)
                  {{-- ===================== MODIFICACION DE INTU NIVEL 3  ================= --}}

                  <div class="row bg-info">
                    <div class="col-sm-12"><h2 class="text-center"><b>NIVEL 3</b></h2></div><br>
                  </div><br>
                    
                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label><b>CERTIFICAR POR INTU:</b></label><br>
                        <input type="hidden" name="nivel3" id="nivel3" value="0">
                        <td><input class="form-control toggle-class" name="nivel3" id="nivel3" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel3 ? 'checked' : '' }}></td><p class="text-danger">SOLO DESPUES DE COMPLETAR TODOS LOS DATOS</p>
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label><b>GACETA OFICIAL:</b></label>
                        <input class="form-control" type="number" name="gaceta_oficial" id="gaceta_oficial" value="{{$avvs->gaceta_oficial}}">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label><b>DECRETO 3330:</b></label>
                        <input class="form-control" type="number" name="decreto_3330" id="decreto_3330" value="{{$avvs->decreto_3330}}">
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label><b>PROPIEDAD DEL TERRENO:</b></label>
                        <select class="form-control" name="propiedad_terreno_id" id="propiedad_terreno_id" required>
                          <option value="">Seleccione</option>
                            @if ($propiedad_terreno->count())
                                @foreach( $propiedad_terreno as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->propiedad_terreno_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
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
                        @if ($avvs->docu_catastral)
                          <iframe width="500" height="600" src="{{asset('/documento_catastral/'.$avvs->docu_catastral)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                  </div>
                  <br>

                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">SUBIR DOCUMENTO CATASTRAL:</span>
                          <input type="file" name="documento_catastral" id="documento_catastral" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                  </div>
                  <br><br>

                  <div class="rows">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label><b>OBSERVACION:</b></label>
                        <textarea class="form-control" name="observacion_intu3" id="observacion_intu3" cols="30" rows="10" onkeyup="this.value = this.value.toUpperCase();">{{$avvs->observacion_intu3}}</textarea>
                      </div>
                    </div>
                  </div><br>
                  
                @endif


                @if (auth()->user()->rol_id == 4)
                  {{-- ===================== MODIFICACION DEL NIVEL 4 ================= --}}
                  <div class="row bg-info">
                    <div class="col-sm-12"><h2 class="text-center"><b>NIVEL 4</b></h2></div><br>
                  </div>

                  <div class="rows">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>CERTIFICAR POR FMH:</b></label><br>
                        <input type="hidden" name="nivel4" id="nivel4" value="0">
                        <td><input class="form-control toggle-class" name="nivel4" id="nivel4" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1" {{ $avvs->nivel4 ? 'checked' : '' }}></td><p class="text-danger">SOLO DESPUES DE COMPLETAR TODOS LOS DATOS</p>
                      </div>
                    </div>
                  </div>
                  <div class="rows">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label><b>NOMBRE DEL PROYECTO:</b></label>
                        <input class="form-control" type="text" name="nombre_proyecto" value="{{$avvs->nombre_proyecto }}" id="nombre_proyecto" onkeyup="this.value = this.value.toUpperCase();">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label>VIVIENDAS:</label>
                        <input type="number" class="form-control" id="viviendas" value="{{ $avvs->cant_viviendas }}" name="viviendas">
                      </div>
                    </div>
                  </div>
                  <div class="rows">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label><b>IMPLANTACION:</b></label>
                        <select class="form-control" name="implantacion_id" id="implantacion_id" required>
                          <option value="">Seleccione</option>
                            @if ($implantaciones->count())
                                @foreach( $implantaciones as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->implantacion_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label><b>PROYECTO:</b></label>
                        <select class="form-control" name="proyecto_id" id="proyecto_id" required>
                          <option value="">Seleccione</option>
                            @if ($proyectos->count())
                                @foreach( $proyectos as $key => $value )
                                  <option value="{{ $key }}" {{ $avvs->proyecto_id == $key ? 'selected = "selected"' : '' }}>{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                    </div>                
                  </div>

                  <br>
                  <div class="rows">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label><b>OBSERVACION:</b></label>
                        <textarea class="form-control" name="descripcionFMH" id="descripcionFMH" cols="30" rows="10" onkeyup="this.value = this.value.toUpperCase();">{{$avvs->descripcionFMH}}</textarea>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="rows">
                    <div class="col-sm-6">
                      <div class="form-group">
                        {{-- <a class="btn btn-success" target="_blank" href="{{asset('/implantacion/'.$avvs->implantacion)}}">INFORME DE IMPLANTACION</a> --}}
                        @if ($avvs->implantacion2)
                          <iframe width="500" height="600" src="{{asset('/implantacion/'.$avvs->implantacion2)}}" frameborder="0"></iframe>  
                        @else
                          <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        {{-- <a class="btn btn-success" target="_blank" href="{{asset('/implantacion/'.$avvs->implantacion)}}">INFORME DE IMPLANTACION</a> --}}
                      @if ($avvs->proyecto2)
                        <iframe width="500" height="600" src="{{asset('/proyecto/'.$avvs->proyecto2)}}" frameborder="0"></iframe> 
                      @else
                        <img class="image" src="{{ asset('/img/pdf.svg') }}" style="width: 200px; height: 200px; margin:30%;">
                      @endif
                      </div>
                    </div>
                  </div>

                  <div class="rows">
                    <div class="col-sm-6">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">SUBIR DOCUMENTO DE IMPLANTACION:</span>
                          <input type="file" name="implantacion" id="implantacion" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <span class="btn btn-raised btn-round btn-primary btn-file">
                          <span class="fileinput-new">CERTIFICACION DE PROYECTO</span>
                          <input type="file" name="proyecto" id="proyecto" accept="application/pdf, .pdf">
                        </span>
                      </div>
                    </div>           
                  </div><br>

                  <table class="table table-hover table-striped" border="1">
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA I – ESTUDIOS PREVIOS Y ANALISIS DEL SITIO</th></tr>
                      <tr class="rows">
                          <td class="col-sm-1 text-center">1.1</td>
                          <td class="col-sm-9 text-center">PLANO DE TOPOGRAFÍA ORIGINAL. ESCALA MANEJABLE/LEGIBLE. (VALIDADO POR EL INTU).</td>
                          <td class="col-sm-1 text-center">2.00%</td>
                          <td class="col-sm-1">
                              <input class="form-control" type="text" name="req_01" id="req_01"  value="{{ $avvs->requerimientos_fmh->req_01 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">1.2</td>
                        <td class="col-sm-9 text-center">ESTUDIO DE SUELO (DEBE INCLUIR EL INFORME DE RECOMENDACIONES EN FUNCIÓN DE LOS RESULTADOS OBTENIDOS).</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_02" id="req_02" step="0.01" onblur="return validar02(this)" value="{{ $avvs->requerimientos_fmh->req_02 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">1.3</td>
                        <td class="col-sm-9 text-center">VARIABLES URBANAS FUNDAMENTALES Y CERTIFICACIÓN DE USO DEL TERRENO (ZONIFICACIÓN) EMITIDO POR LA AUTORIDAD LOCAL.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_03" id="req_03" step="0.01" onblur="return validar02(this)" value="{{ $avvs->requerimientos_fmh->req_03 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">1.4</td>
                        <td class="col-sm-9 text-center">ESQUEMAS  Y/O PLANIMETRIA BASICA DE IMPLANTACIÓN, A ESCALA ADECUADA PARA SU COMPRENSION.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_04" id="req_04" step="0.01" onblur="return validar02(this)" value="{{ $avvs->requerimientos_fmh->req_04 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">1.5</td>
                        <td class="col-sm-9 text-center">ESTIMACIONES DE DEMANDAS DE SERVICIOS / PREFACTIBILIDAD DE SERVICIOS.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_05" id="req_05" step="0.01" onblur="return validar02(this)" value="{{ $avvs->requerimientos_fmh->req_05 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA I: <button class="form-control btn btn-fab btn-round btn-info" id="etapa1" name="etapa1" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa1" id="totalEtapa1" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa1 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA II – INGENIERIA DE DETALLES</th></tr>
                      <tr class="rows">
                          <td class="col-sm-1 text-center">2.1</td>
                          <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DEL URBANISMO (DEBE DESCRIBIR LAS CONSIDERACIONES Y DISEÑO DEL URBANISMO: PAISAJISMO, PLAZAS, PARQUES, EQUIPAMIENTO, MOBILIARIO URBANO, VIALIDAD, BROCALES, ÁREAS VERDES, ESTACIONAMIENTOS, CANTIDAD DE VIVIENDAS, RETORNOS VIALES, BOULEVARES, CICLOVÍA, RAMPAS DE ACCESO, ACABADOS DE ACERAS Y MOBILIARIO URBANO, ENTRE OTROS).</td>
                          <td class="col-sm-1 text-center">1.00%</td>
                          <td class="col-sm-1">
                              <input class="form-control" type="number" name="req_06" id="req_06" step="0.01" onblur="return validar01(this)" value="{{ $avvs->requerimientos_fmh->req_06 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.2</td>
                        <td class="col-sm-9 text-center">PLANO DEL CONJUNTO URBANO A ESCALA ADECUADA (INDICANDO USOS, VIALIDAD, PAISAJISMO). </td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_07" id="req_07" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_07 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.3</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DE URBANISMO.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_08" id="req_08" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_08 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <th class="col-sm-1 text-center">2.4</th>
                        <th class="col-sm-11 text-center">PROYECTO INTEGRAL DE MOVIMIENTO DE TIERRA</th>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.4.1</td>
                        <td class="col-sm-9 text-center">PLAN DE TOPOGRAFIA GENERAL.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_09" id="req_09" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_09 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.4.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE TOPOGRAFÍA MODIFICADA. ESCALA MANEJABLE/LEGIBLE.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_10" id="req_10" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_10 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.4.3</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DE MOVIMIENTO DE TIERRA.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_11" id="req_11" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_11 }}"></td>
                      </tr>
                      <tr class="rows">
                        <th class="col-sm-1 text-center">2.5</th>
                        <th class="col-sm-11 text-center">PROYECTO INTEGRAL DE PAISAJISMO.</th>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.5.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DE PAISAJISMO (DEBE ESPECIFICAR LAS CONSIDERACIONES SOBRE EL DISEÑO DE LOS SECTORES O DIFERENTES ESPACIOS ABIERTOS: JARDINES, COMINERÍAS Y DEMÁS ELEMENTOS DE PAISAJISMO Y LAS ESPECIFICACIÓN DE LOS REQUERIMIENTOS DE PLANTACIÓN Y MANTENIMIENTO DE LAS PLANTAS.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_12" id="req_12" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_12 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.5.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS CON UBICACIÓN Y ESPECIFICACIONES.  ESCALA MANEJABLE/LEGIBLE.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_13" id="req_13" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_13 }}"></td>
                      </tr>
                      <tr class="rows">
                        <th class="col-sm-1 text-center">2.6</th>
                        <th class="col-sm-11 text-center">"PROYECTO INTEGRAL DE OBRAS COMPLEMENTARIAS (DISEÑO DE INGENIERÍA DE DETALLE DE CUALQUIER OBRA NECESARIA PARA EL ACONDICIONAMIENTO Y RESGUARDO DE LAS EDIFICACIONES TALES COMO OBRAS DE ESTABILIZACIÓN, TORRENTERAS, CANALIZACIONES, ENTRE OTROS.)"</th>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.6.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DE LOS ELEMENTOS ESTRUCTURALES.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_14" id="req_14" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_14 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">2.6.2</td>
                        <td class="col-sm-9 text-center">PLANOS CONSTRUCTIVOS Y DE DETALLES.  ESCALA MANEJABLE/LEGIBLE.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_15" id="req_15" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_15 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA II:<button class="form-control btn btn-fab btn-round btn-info" id="etapa2" name="etapa2" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa2" id="totalEtapa2" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa2 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA III - PROYECTO INTEGRAL DE ARQUITECTURA (EDIFICACIONES)</th></tr>
                      <tr class="rows">
                          <td class="col-sm-1 text-center">3.1</td>
                          <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA (DETALLANDO LA PROPUESTA ARQUITECTONICA, CONCEPTO GENERADOR, LAS CONSIDERACIONES AMBIENTALES, GEOGRAFICAS Y SOCIOCULTURALES DE LA PROPUESTA, LOS MATERIALES CONSIDERADOS Y SUS ACABADOS, ENTRE OTRAS CONSIDERACIONES DE CARÁCTER ARQUITECTONICO Y ESPACIAL.</td>
                          <td class="col-sm-1 text-center">1.36%</td>
                          <td class="col-sm-1">
                              <input class="form-control" type="number" name="req_16" id="req_16" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_16 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS, ACOTADOS (INDICANDO EJES ESTRUCTURALES Y SISTEMA ESTRUCTURAL). ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_17" id="req_17" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_17 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS, MOBILIARIO. ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_18" id="req_18" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_18 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.4</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS, ACABADOS. ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_19" id="req_19" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_19 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.5</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS TECHO ACOTADOS. ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_20" id="req_20" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_20 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.6</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS TECHO ACABADOS. ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_21" id="req_21" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_21 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.7</td>
                        <td class="col-sm-9 text-center">PLANOS DE SECCIONES / CORTES - LONGITUDINALES Y TRANSVERSALES DE LAS EDIFICACIONES (ARQUITECTURA Y ACABADOS). ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_22" id="req_22" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_22 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.8</td>
                        <td class="col-sm-9 text-center">PLANOS DE FACHADAS (ARQUITECTURA Y ACABADOS). ESCALA 1/50 O 1/100, SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_23" id="req_23" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_23 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.9</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES ARQUITECTÓNICOS (ESCALERAS, HALL DE ASCENSORES, DETALLES CONSTRUCTIVOS, CARPINTERÍA, HERRERÍA, ENTRE OTROS). ESCALAS 1/20, 1/25, 1/50 U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_24" id="req_24" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_24 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.10</td>
                        <td class="col-sm-9 text-center">CUADRO GENERAL DE ACABADOS (PUEDE ESTAR DENTRO DEL “PLANO DE DETALLES ARQUITECTÓNICOS”)</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_25" id="req_25" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_25 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">3.11</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DE ARQUITECTURA.</td>
                        <td class="col-sm-1 text-center">1.40%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_26" id="req_26" step="0.01" onblur="return validar140(this)" value="{{ $avvs->requerimientos_fmh->req_26 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA III:<button class="form-control btn btn-fab btn-round btn-info" id="etapa3" name="etapa3" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa3" id="totalEtapa3" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa3 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA IV - DISEÑO Y CÁLCULO ESTRUCTURAL (EDIFICACIONES)</th></tr>
                      <tr class="rows">
                          <td class="col-sm-1 text-center">4.1</td>
                          <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA DEL SISTEMA CONSTRUCTIVO</td>
                          <td class="col-sm-1 text-center">1.36%</td>
                          <td class="col-sm-1">
                              <input class="form-control" type="number" name="req_27" id="req_27" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_27 }}">
                        </td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">4.2</th><th class="col-sm-11 text-center">INFRAESTRUCTURA</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.2.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y MEMORIA DE CALCULO INFRAESTRUCTURA</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_28" id="req_28" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_28 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.2.2</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES ESTRUCTURALES DE FUNDACIONES.  ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_29" id="req_29" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_29 }}">
                        </td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">4.3</th><th class="col-sm-11 text-center">SUPERESTRUCTURA</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y MEMORIA CDE CALCULO SUPERESTRUCTURA</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_30" id="req_30" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_30 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.2</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES DE LOSAS DE PISO. ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_31" id="req_31" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_31 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.3</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES DE VIGAS, COLUMNAS Y/O MUROS ESTRUCTURALES, SEGÚN EL SISTEMA CONSTRUCTIVO PROPUESTO. ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_32" id="req_32" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_32 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.4</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES DE LOSAS DE ENTREPISOS ( SI APLICA). ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_33" id="req_33" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_33 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.5</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES ESTRUCTURALES DE ESCALERAS (SI APLICA). ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_34" id="req_34" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_34 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.6</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES DE LOSAS DE TECHO. ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_35" id="req_35" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_35 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.7</td>
                        <td class="col-sm-9 text-center">PLANOS Y DETALLES DE PORTICOS. ESCALAS 1/20, 1/25, 1/50  U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">1.36%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_36" id="req_36" step="0.01" onblur="return validar136(this)" value="{{ $avvs->requerimientos_fmh->req_36 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">4.3.8</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS</td>
                        <td class="col-sm-1 text-center">1.40%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_37" id="req_37" step="0.01" onblur="return validar140(this)" value="{{ $avvs->requerimientos_fmh->req_37 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA IV:<button class="form-control btn btn-fab btn-round btn-info" id="etapa4" name="etapa4" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa4" id="totalEtapa4" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa4 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA V - DISEÑO Y CÁLCULO DE LAS INSTALACIONES SANITARIAS</th></tr>
                      <tr class="rows"><th class="col-sm-1 text-center">5.1</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LOS SISTEMAS DE DISTRIBUCIÓN DE AGUAS CLARAS (AGUA POTABLE)</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA  DEL SISTEMA DE DISTRIBUCIÓN DE AGUA POTABLE Y MEMORIA DE CALCULO DE DOTACION Y CONSUMO DE AGUA POTABLE</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_38" id="req_38" step="0.01" onblur="return validar080(this)" value="{{ $avvs->requerimientos_fmh->req_38 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS DEL SISTEMA DE DISTRIBUCIÓN DE AGUA POTABLE. ESCALA 1/50.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_39" id="req_39" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_39 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DEL SISTEMA DE DISTRIBUCIÓN DE AGUA POTABLE. ESCALA 1/20, 1/25, U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_40" id="req_40" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_40 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.4</td>
                        <td class="col-sm-9 text-center">PLANOS DE ISOMETRÍAS Y DIAGRAMAS VERTICALES DEL SISTEMA DE DISTRIBUCIÓN DE AGUA POTABLE. ESCALA MANEJABLE.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_41" id="req_41" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_41 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.5</td>
                        <td class="col-sm-9 text-center">CÁLCULO DEL SISTEMA DE HIDRONEUMÁTICO (SI APLICA).</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_42" id="req_42" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_42 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.6</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DEL SISTEMA HIDRONEUMÁTICO. ESCALA 1/20, 1/25, 1/50 U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_43" id="req_43" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_43 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.1.7</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DEL SISTEMA DE DISTRIBUCIÓN DE AGUA POTABLE.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_44" id="req_44" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_44 }}"></td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">5.2</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LOS SISTEMAS DE RECOLECCIÓN DE AGUAS SERVIDAS</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.2.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA DEL SISTEMA DE RECOLECCIÓN DE AGUAS SERVIDAS Y MEMORIA DEL SISTEMA DE RECOLECIONDE AGUA SERVIDAS </td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_45" id="req_45" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_45 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.2.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS, DEL SISTEMA DE RECOLECCIÓN DE AGUAS SERVIDAS. ESCALA 1/50.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_46" id="req_46" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_46 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.2.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DEL SISTEMA DE RECOLECCIÓN DE AGUAS SERVIDAS (RECINTOS SANITARIOS, TANQUILLAS, ENTRE OTROS). ESCALA 1/20, 1/25, U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_47" id="req_47" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_47 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.2.4</td>
                        <td class="col-sm-9 text-center">PLANOS DE ISOMETRÍA DEL SISTEMA DE RECOLECCIÓN DE AGUAS SERVIDAS. ESCALA MANEJABLE.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_48" id="req_48" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_48 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.2.5</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DEL SISTEMA DE RECOLECCIÓN DE AGUAS SERVIDAS.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_49" id="req_49" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_49 }}"></td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">5.3</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LOS SISTEMAS DE RECOLECCIÓN Y DISPOSICIÓN DE AGUAS PLUVIALES</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.3.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA DEL SISTEMA DE RECOLECCIÓN Y DISPOSICIÓN DE AGUAS PLUVIALES /LLUVIAS Y COMPUTOS METRICOS DEL SISTEMA DE RECOLECION Y DISPOSICION DE AGUA PLUVIALES.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_50" id="req_50" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_50 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.3.2</td>
                        <td class="col-sm-9 text-center">CÁLCULO DEL SISTEMA DE RECOLECCIÓN Y DISPOSICIÓN DE AGUAS PLUVIALES.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_51" id="req_51" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_51 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">5.3.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS DEL SISTEMA DE RECOLECCIÓN Y DISPOSICIÓN DE AGUAS PLUVIALES. ESCALA 1/50.</td>
                        <td class="col-sm-1 text-center">0.80%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_52" id="req_52" step="0.01" onblur="return validar080(this)"value="{{ $avvs->requerimientos_fmh->req_52 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA V:<button class="form-control btn btn-fab btn-round btn-info" id="etapa5" name="etapa5" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa5" id="totalEtapa5" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa5 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA VI - DISEÑO Y CÁLCULO DE LAS INSTALACIONES ELECTRICAS Y TELEFONIA (EDIFICACIONES)</th></tr>
                      <tr class="rows"><th class="col-sm-1 text-center">6.1</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LAS INSTALACIONES ELECTRICAS</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES TECNICAS DE LAS INSTALACIONES ELECTRICAS.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_53" id="req_53" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_53 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.2</td>
                        <td class="col-sm-9 text-center">MEMORIA DE CÁLCULO DEL SISTEMA ELECTRICO / FUERZA (TOMACORRIENTES) E ILUMINACIÓN.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_54" id="req_54" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_54 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS DEL SISTEMA ELECTRICO / FUERZA (TOMACORRIENTES) E ILUMINACIÓN (INTERIOR Y EXTERIOR). ESCALA 1/50.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_55" id="req_55" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_55 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.4</td>
                        <td class="col-sm-9 text-center">PLANOS DE TOMACORRIENTES Y CARGAS ESPECIALES (SI APLICA). ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_56" id="req_56" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_56 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.5</td>
                        <td class="col-sm-9 text-center">TABLAS DE CARGAS Y DIAGRAMAS DE TABLEROS.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_57" id="req_57" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_57 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.6</td>
                        <td class="col-sm-9 text-center">PLANOS DE DIAGRAMAS UNIFILARES Y VERTICALES. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_58" id="req_58" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_58 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.1.7</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DE LAS INSTALACIONES ELECTRICAS.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_59" id="req_59" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_59 }}"></td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">6.2</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LAS INSTALACIONES DE TELEFONIA (VOZ Y DATA)</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.2.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES TECNICAS DE LAS INSTALACIONES DE TELEFONIA (VOZ Y DATA).</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_60" id="req_60" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_60 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.2.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS, DE LAS INSTALACIONES DE TELEFONÍA. ESCALA 1/50.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_61" id="req_61" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_61 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">6.2.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE DIAGRAMAS UNIFILARES Y VERTICALES. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">1.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_62" id="req_62" step="0.01" onblur="return validar01(this)"value="{{ $avvs->requerimientos_fmh->req_62 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA VI:<button class="form-control btn btn-fab btn-round btn-info" id="etapa6" name="etapa6" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa6" id="totalEtapa6" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa6 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA VII - PROYECTO INTEGRAL DE LAS INSTALACIONES DEL SISTEMA DE DETECCION, CONTROL Y EXTINCION DE INCENDIOS</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">7.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA, DISEÑO Y CALCULO Y ESPECIFICACIONES DEL SISTEMA DE DETECCIÓN Y EXTINCIÓN DE INCENDIOS.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_63" id="req_63" step="0.01" onblur="return validar02(this)"value="{{ $avvs->requerimientos_fmh->req_63 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">7.2</td>
                        <td class="col-sm-9 text-center">PLANOS DE PLANTAS DE DETECCIÓN DE INCENDIOS. ESCALA 1/50.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_64" id="req_64" step="0.01" onblur="return validar02(this)"value="{{ $avvs->requerimientos_fmh->req_64 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">7.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DE DETECCIÓN. ESCALA 1/20, 1/25, U OTRA SEGÚN EL CASO.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_65" id="req_65" step="0.01" onblur="return validar02(this)"value="{{ $avvs->requerimientos_fmh->req_65 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">7.4</td>
                        <td class="col-sm-9 text-center">DISEÑO Y CÁLCULO DE SISTEMA DE EXTINCIÓN</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_66" id="req_66" step="0.01" onblur="return validar02(this)"value="{{ $avvs->requerimientos_fmh->req_66 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">7.5</td>
                        <td class="col-sm-9 text-center">DISEÑO Y CÁLCULO DE SISTEMA DE ALARMA</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_67" id="req_67" step="0.01" onblur="return validar02(this)"value="{{ $avvs->requerimientos_fmh->req_67 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">7.6</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DE LAS INSTALACIONES DEL SISTEMA DE DETECCIÓN, CONTROL Y EXTINCIÓN DE INCENDIOS.</td>
                        <td class="col-sm-1 text-center">2.00%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_68" id="req_68" step="0.01" onblur="return validar02(this)"value="{{ $avvs->requerimientos_fmh->req_68 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA VII:<button class="form-control btn btn-fab btn-round btn-info" id="etapa7" name="etapa7" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa7" id="totalEtapa7" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa7 }}"></td>
                      </tr>
                    </tbody>
                    <thead class="text-center">
                      <tr class="rows">
                          <th class="col-sm-1">ID</th>
                          <th class="col-sm-9">REQUISITO</th>
                          <th class="col-sm-1">META</th>
                          <th class="col-sm-1">AVANCE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="rows"><th class="col-sm-12 text-center">ETAPA VIII - DISEÑO Y CÁLCULO DE LAS REDES DEL URBANISMO</th></tr>
                      <tr class="rows"><th class="col-sm-1 text-center">8.1</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LA RED DE ACUEDUCTOS</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.1.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DEL SISTEMA DE CAPTACIÓN/ADUCCIÓN, ALMACENAMIENTO Y DISTRIBUCIÓN DE AGUA POTABLE DEL CONJUNTO (DEBE CONTENER EL PLANTEAMIENTO DE HIPÓTESIS DEL CONSUMO, CRECIMIENTO POBLACIONAL, ETC.).</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_69" id="req_69" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_69 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.1.2</td>
                        <td class="col-sm-9 text-center">MEMORIA DE CÁLCULO DEL SISTEMA DE CAPTACIÓN/ADUCCIÓN, ALMACENAMIENTO Y DISTRIBUCIÓN DE AGUA POTABLE DEL CONJUNTO.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_70" id="req_70" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_70 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.1.3</td>
                        <td class="col-sm-9 text-center">PLANOS DEL SISTEMA DE CAPTACIÓN/ADUCCIÓN, ALMACENAMIENTO Y DISTRIBUCIÓN DE AGUA POTABLE DEL CONJUNTO. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_71" id="req_71" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_71 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.1.4</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DEL SISTEMA DE CAPTACIÓN/ADUCCIÓN. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_72" id="req_72" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_72 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.1.5</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DEL SISTEMA DE ALMACENAMIENTO Y DISTRIBUCION DE AGUA POTABLE DEL CONJUNTO.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_73" id="req_73" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_73 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.1.6</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS SISTEMA DE CAPTACIÓN/ADUCCIÓN, ALMACENAMIENTO Y DISTRIBUCION DE AGUA POTABLE DEL CONJUNTO.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_74" id="req_74" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_74 }}"></td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">8.2</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LA RED DE CLOACAS</th></tr>
                      <tr class="rows">
                          <td class="col-sm-1 text-center">8.2.1</td>
                          <td class="col-sm-9 text-center">PLANO DE PLANTA DE ACUEDUCTO</td>
                          <td class="col-sm-1 text-center">0.66%</td>
                          <td class="col-sm-1">
                            <input class="form-control" type="number" name="req_75" id="req_75" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_75 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.2.2</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DEL SISTEMA DE RECOLECCIÓN, TRATAMIENTO Y DESCARGA DE LAS AGUAS SERVIDAS DEL CONJUNTO (DEBE CONTENER EL PLANTEAMIENTO DE HIPÓTESIS PARA LA DETERMINACIÓN DE LOS CAUDALES DE DESCARGAS, ETC.).</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_76" id="req_76" step="0.01" onblur="return validar057(this)"value="{{ $avvs->requerimientos_fmh->req_76 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.2.3</td>
                        <td class="col-sm-9 text-center">MEMORIA DE CÁLCULO DEL SISTEMA DE RECOLECCIÓN, TRATAMIENTO Y DESCARGA DE LAS AGUAS SERVIDAS DEL CONJUNTO.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_77" id="req_77" step="0.01" onblur="return validar057(this)"value="{{ $avvs->requerimientos_fmh->req_77 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.2.4</td>
                        <td class="col-sm-9 text-center">PLANOS DEL SISTEMA DE RECOLECCIÓN DE LAS AGUAS SERVIDAS /CLOACAS DEL CONJUNTO. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_78" id="req_78" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_78 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.2.5</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DEL SISTEMA DE RECOLECCIÓN DE LAS AGUAS SERVIDAS /CLOACAS DEL CONJUNTO. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_79" id="req_79" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_79 }}"></td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">8.3</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DE LA RED DE DRENAJES</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.3.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DEL SISTEMA DE RECOLECCIÓN/DRENAJES, ALMACENAMIENTO Y REUTILIZACIÓN/DESCARGA DE LAS AGUAS PLUVIALES/GRISES DEL CONJUNTO (DEBE DETERMINACIÓN DE LA INTENSIDAD Y DURACIÓN DE LOS PERIODOS PLUVIALES, CAUDALES, METODO DE CAPTACION, ALMACENAMIENTO Y REUTILIZACIÓN, ETC.).</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_80" id="req_80" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_80 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.3.2</td>
                        <td class="col-sm-9 text-center">MEMORIA DE CÁLCULO DEL SISTEMA DE RECOLECCIÓN/DRENAJES, ALMACENAMIENTO Y REUTILIZACIÓN/DESCARGA DE LAS AGUAS PLUVIALES/GRISES DEL CONJUNTO.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_81" id="req_81" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_81 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.3.3</td>
                        <td class="col-sm-9 text-center">PLANOS DEL SISTEMA DE RECOLECCIÓN/DRENAJES DE LAS AGUAS PLUVIALES/GRISES DEL CONJUNTO. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_82" id="req_82" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_82 }}">
                        </td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">8.4</th><th class="col-sm-11 text-center">PROYECTO INTEGRAL DEL SISTEMA DE ELECTRIFICACIÓN DEL CONJUNTO</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.4.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DEL SISTEMA DE ELECTRIFICACIÓN DEL CONJUNTO (DEBE INCLUIR LA DESCRIPCION Y CONSIDERACIONES DE LAS REDES DE ALTA, MEDIA Y BAJA TENSIÓN, ASI COMO DEL ALUMBRADO PÚBLICO INTERNO DEL CONJUNTO).</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_83" id="req_83" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_83 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.4.2</td>
                        <td class="col-sm-9 text-center">MEMORIA DE CÁLCULO DEL SISTEMA DE ELECTRIFICACIÓN DEL CONJUNTO (DEBE INCLUIR EL CALCULO DE LAS REDES DE ALTA, MEDIA Y BAJA TENSIÓN, BANCADAS, BANCO DE TRANSFORMADORES, ALUMBRADO PÚBLICO INTERNO DEL CONJUNTO, PARARRAYOS, ENTRE OTROS).</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_84" id="req_84" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_84 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.4.3</td>
                        <td class="col-sm-9 text-center">ESPECIFICACIONES TÉCNICAS DEL SISTEMA DE ELECTRIFICACIÓN DEL CONJUNTO, PROYECTO PROPUESTO POR CORPOELEC.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_85" id="req_85" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_85 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.4.4</td>
                        <td class="col-sm-9 text-center">PLANOS DEL SISTEMA DE ELECTRIFICACIÓN DEL CONJUNTO. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_86" id="req_86" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_86 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.4.5</td>
                        <td class="col-sm-9 text-center">PLANOS DEL SISTEMA DE ALUMBRADO PÚBLICO DEL CONJUNTO. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_87" id="req_87" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_87 }}"></td>
                      </tr>
                      <tr class="rows"><th class="col-sm-1 text-center">8.5</th><th class="col-sm-11 text-center">ACOMETIDA ELECTRICA</th></tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.5.1</td>
                        <td class="col-sm-9 text-center">MEMORIA DESCRIPTIVA Y ESPECIFICACIONES DE LA ACOMETIDA ELECTRICA PRINCIPAL.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_88" id="req_88" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_88 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.5.2</td>
                        <td class="col-sm-9 text-center">MEMORIA DE CÁLCULO  DE LA ACOMETIDA ELECTRICA PRINCIPAL.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_89" id="req_89" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_89 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.5.3</td>
                        <td class="col-sm-9 text-center">PLANOS DE LA ACOMETIDA ELECTRICA PRINCIPAL. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_90" id="req_90" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_90 }}">
                        </td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.5.4</td>
                        <td class="col-sm-9 text-center">PLANOS DE DETALLES DE LA ACOMETIDA ELECTRICA PRINCIPAL. ESCALA ADECUADA.</td>
                        <td class="col-sm-1 text-center">0.66%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_91" id="req_91" step="0.01" onblur="return validar066(this)"value="{{ $avvs->requerimientos_fmh->req_91 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-1 text-center">8.5.5</td>
                        <td class="col-sm-9 text-center">CÓMPUTOS MÉTRICOS DE LA ACOMETIDA ELECTRICA PRINCIPAL DEL CONJUNTO.</td>
                        <td class="col-sm-1 text-center">0.82%</td>
                        <td class="col-sm-1">
                          <input class="form-control" type="number" name="req_92" id="req_92" step="0.01" onblur="return validar082(this)"value="{{ $avvs->requerimientos_fmh->req_92 }}"></td>
                      </tr>
                      <tr class="rows">
                        <td class="col-sm-11 text-right">TOTAL ETAPA VIII:<button class="form-control btn btn-fab btn-round btn-info" id="etapa8" name="etapa8" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalEtapa8" id="totalEtapa8" class="form-control" value="{{ $avvs->requerimientos_fmh->total_etapa8 }}"></td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="table" border="1">
                    <thead class="text-right">
                      <tr><td class="col-sm-11 text-right font-weight-bold">TOTAL DE AVANCE:     <button class="form-control btn btn-fab btn-round btn-warning" id="avance_total" name="avance_total" type="button"><i class="material-icons">search</i></button></td><td class="col-sm-1"><input step="0.01" type="number" name="totalAvance" id="totalAvance" class="form-control" value="{{ $avvs->requerimientos_fmh->avance_total }}"></td></tr>
                    </thead>
                  </table>
                @endif
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
                      <input type="submit" value="ACTUALIZAR" name="enviar" id="enviar" class="btn btn-danger">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <a href="{{ route('avv.index') }}" class="btn btn-success">Regresar</a>
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
      function validar02(elemento) {
        if (elemento.value > 2) {
          alert('[ERROR] El campo no puede ser mayor que la meta!!');
          elemento.value = "";
          return false;
        }
      }

      function validar01(elemento) {
        if (elemento.value > 1) {
          alert('[ERROR] El campo no puede ser mayor que la meta!!');
          elemento.value = "";
          return false;
        }
      }

      function validar136(elemento) {
        if (elemento.value > 1.36) {
          alert('[ERROR] El campo no puede ser mayor que la meta!!');
          elemento.value = "";
          return false;
        }
      }

      function validar140(elemento) {
        if (elemento.value > 1.40) {
          alert('[ERROR] El campo no puede ser mayor que la meta!!');
          elemento.value = "";
          return false;
        }
      }

      function validar080(elemento) {
        if (elemento.value > 0.80) {
          alert('[ERROR] El campo no puede ser mayor que la meta!!');
          elemento.value = "";
          return false;
        }
      }

      function validar066(elemento) {
        if (elemento.value > 0.66) {
          alert('[ERROR] El campo no puede ser mayor que la meta!!');
          elemento.value = "";
          return false;
        }
      }
    </script>


    @if (auth()->user()->rol_id == 2)
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
            center:new google.maps.LatLng({{$avvs->latitud ?: '7.735217273856046'}},{{$avvs->longitud ?: '-65.326115365625'}}),
          });
          marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng({{$avvs->latitud ?: '7.735217273856046'}},{{$avvs->longitud ?: '-65.326115365625'}}),
    
          });
          marker.addListener( 'dragend', function (event)
          {
            document.getElementById("latitud").value = this.getPosition().lat();
            document.getElementById("longitud").value = this.getPosition().lng();
          });
        }
      </script>        
    @else
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
            center:new google.maps.LatLng({{$avvs->latitud ? : '7.735217273856046'}},{{$avvs->longitud ?: '-65.326115365625'}}),
          });
          marker = new google.maps.Marker({
            map: map,
            draggable: false,
            animation: google.maps.Animation.DROP,
            position: new google.maps.LatLng({{$avvs->latitud ?: '7.735217273856046'}},{{$avvs->longitud ?: '-65.326115365625'}}),
    
          });
          marker.addListener( 'dragend', function (event)
          {
            document.getElementById("latitud").value = this.getPosition().lat();
            document.getElementById("longitud").value = this.getPosition().lng();
          });
        }
      </script>

    @endif
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>
