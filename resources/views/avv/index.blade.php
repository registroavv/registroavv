@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Registro AVV')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <form action="">
            <div class="rows">
                <div class="col-sm-2">
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" placeholder="Buscar AVV" class="form-control">
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="form-group">
                        <button class="form-control btn btn-fab btn-round btn-danger" id="search" name="search" type="submit" title="BUSCAR"><i class="material-icons">search</i></button>
                    </div>
                </div>
            </div>
                <div class="rows">
                    @if (auth()->user()->estado_id == 25 || auth()->user()->admin)
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control" name="estado" id="estado">
                                    <option value="">ESTADO</option>
                                    @foreach( $estados as $key => $value )
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control" name="municipio" id="municipio">
                                    <option value="">MUNICIPIO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control" name="parroquia" id="parroquia">
                                    <option value="">PARROQUIA</option>
                                </select>
                            </div>
                        </div>
                    @else
                        @if (auth()->user()->estado_id == 10 || auth()->user()->estado_id == 13)
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-control" name="municipio" id="municipio">
                                        <option value="">PARROQUIA</option>
                                        @foreach( $estados as $municipio)
                                            <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        @else
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-control" name="municipio" id="municipio">
                                        <option value="">MUNICIPIO</option>
                                        @foreach( $estados as $municipio)
                                            <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <select class="form-control" name="parroquia" id="parroquia">
                                        <option value="">PARROQUIA</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            @if (auth()->user()->rol_id == 4 || auth()->user()->admin)
                <div class="rows">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <select class="form-control" name="implantacion_id" id="implantacion_id">
                                <option value="">IMPLANTACION</option>
                                @if ($implantaciones->count())
                                    @foreach( $implantaciones as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="proyecto_id" id="proyecto_id">
                                <option value="">PROYECTO</option>
                                @if ($proyectos->count())
                                    @foreach( $proyectos as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <select name="nivel4" id="nivel4" class="form-control">
                                    <option value="">NIVEL4</option>
                                    <option value="1">CERTIFICADA</option>
                                    <option value="0">NO CERTIFICADA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>                
            @endif
            @if (auth()->user()->rol_id == 2)
            @endif
            @if (auth()->user()->rol_id == 3 || auth()->user()->admin)
            <div class="rows">
                <div class="col-sm-2">
                    <div class="form-group">
                        <select name="nivel2" id="nivel2" class="form-control">
                            <option value="">NIVEL 2</option>
                            <option value="1">CERTIFICADA</option>
                            <option value="0">NO CERTTIFICADA</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select name="nivel3" id="nivel2" class="form-control">
                            <option value="">NIVEL 3</option>
                            <option value="1">CERTIFICADA</option>
                            <option value="0">NO CERTTIFICADA</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="rows">
                <div class="col-sm-2">
                    <div class="form-group">
                    <select class="form-control" name="propiedad_terreno_id" id="propiedad_terreno_id">
                        <option value="">PROPIEDAD DEL TERRENO</option>
                        @if ($propiedad_terreno->count())
                            @foreach( $propiedad_terreno as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        @endif
                    </select>                      
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control" name="servicios_cercanos_id" id="servicios_cercanos_id">
                            <option value="">SERVICIOS CERCANOS</option>
                            @if ($servicioscercanos->count())
                                @foreach( $servicioscercanos as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control" name="prefactibilidad_id" id="prefactibilidad_id">
                            <option value="">INFORME DE PREFACTIBILIDAD</option>
                            @if ($prefactibilidad->count())
                                @foreach( $prefactibilidad as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control" name="factibilidad_servicio_id" id="factibilidad_servicio_id">
                            <option value="">FACTIBILIDAD DE SERVICIOS</option>
                            @if ($factibilidad_servicios->count())
                                @foreach( $factibilidad_servicios as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control" name="salida_cartografica_id" id="salida_cartografica_id">
                            <option value="">SALIDA CARTOGRAFICA</option>
                            @if ($salidacartografica->count())
                                @foreach( $salidacartografica as $key => $value )
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                      <select class="form-control" name="levantamiento_topografico_id" id="levantamiento_topografico_id">
                        <option value="">LEVANTAMIENTO TOPOGRAFICO</option>
                          @if ($levantamiento_topografico->count())
                              @foreach( $levantamiento_topografico as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
                    </div>
                </div>
            </div>
            <div class="rows">
                <div class="col-sm-2">
                    <div class="form-group">
                      <select class="form-control" name="estudio_suelo_id" id="estudio_suelo_id">
                        <option value="">ESTUDIO DE SUELOS</option>
                          @if ($estudio_suelo->count())
                              @foreach( $estudio_suelo as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                          @endif
                      </select>
                    </div>
                  </div>
            </div>
            @endif
        </form>
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title text-center">LISTA DE AVV</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped">
                        @if (auth()->user()->rol_id == 2)
                            <a class="btn btn-outline-info" href="{{ route('avv.create') }}">Nuevo Registro</a>                            
                        @endif
                        @if (auth()->user()->estado_id == 25 && auth()->user()->rol_id <> '5')
                            <a class="btn btn-outline-success" href="{{route('avv.excel')}}">Exportar Excel Nacional</a>
                        @endif
                        @if (Auth::user()->estado_id <> '25' && auth()->user()->rol_id <> '5')
                            <a class="btn btn-outline-success" href="{{route('avv.excelestado')}}">Exportar Excel Estado</a>
                        @endif
                        <thead class="text-danger">
                            <th>ESTADO</th>
                            <th>MUNICIPIO</th>
                            <th>PARROQUIA</th>
                            <th>AVV</th>
                            @if (auth()->user()->rol_id == 4)
                                <th>AVANCE</th>
                            @else
                                <th>CODIGO</th>
                            @endif
                            @if (!auth()->user()->admin)
                                <th>CERTIFICADA</th>
                            @endif
                            <th>OPCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($avvs as $avv)
                            <tr>
                                <td>{{ (isset($avv->estado->nombre)) ? $avv->estado->nombre : '' }}</td>
                                <td>{{ (isset($avv->municipio->nombre)) ? $avv->municipio->nombre : '' }}</td>
                                <td>{{ (isset($avv->parroquia->nombre)) ? $avv->parroquia->nombre : '' }}</td>
                                <td>{{ $avv->nombre }}</td>
                                <td>{{ $avv->codigoregistro }}</td>
                                @if (auth()->user()->rol_id == 4)
                                    <td>{{ (isset($avv->requerimientos_fmh->avance_total) ? $avv->requerimientos_fmh->avance_total : "0.00") }} %</td>
                                    <td><input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel4 ? 'checked' : '' }}></td>
                                @endif
                                {{-- @if (auth()->user()->admin)
                                    <td>{{ $avv->codigo_intu }}</td>
                                @endif --}}
                                @if (auth()->user()->rol_id == 2)
                                    {{-- <td>{{ $avv->codigo_intu }}</td> --}}
                                    <td><input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel1 ? 'checked' : '' }}></td>
                                @endif
                                @if (auth()->user()->rol_id == 3 && auth()->user()->nivel2)
                                    {{-- <td>{{ $avv->codigo_intu }}</td> --}}
                                    <td><input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel2 ? 'checked' : '' }}></td>
                                @endif
                                @if (auth()->user()->rol_id == 3 && auth()->user()->nivel3)
                                    {{-- <td>{{ $avv->codigo_intu }}</td> --}}
                                    <td><input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel3 ? 'checked' : '' }}></td>
                                @endif                                
                                <td class="td-actions" style="width: 140px">
                                    <form method="POST" action="{{ url('/avv/'. $avv->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{ url('/avv/'. $avv->id .'/show') }}" rel="tooltip" title="VER FICHA" class="btn btn-warning"><i class="material-icons">visibility</i></a>
                                        <a href="{{ url('/avv/'. $avv->id .'/pdf') }}" rel="tooltip" title="Descargar Ficha" class="btn btn-info"><i class="material-icons">download</i></a>
                                        @if (auth()->user()->estado_id == 25 || auth()->user()->rol_id != 2)
                                            <a href="{{ url('/avv/'. $avv->id .'/edit') }}" rel="tooltip" title="Editar AVV" class="btn btn-success btn-simple"><i class="material-icons">edit</i></a>
                                        @endif
                                        @if (auth()->user()->admin || auth()->user()->estado_id == 25 && auth()->user()->rol_id == 2 )
                                            <button type="submit" rel="tooltip" title="Eliminar AVV" class="btn btn-danger btn-simple"><i class="material-icons">delete</i></button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $avvs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins.BootstrapSwitch', true)
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('js')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
@endsection