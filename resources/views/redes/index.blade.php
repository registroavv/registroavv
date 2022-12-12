@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Registro AVV')])

@section('content')

<div class="content">
    <div class="container card bg-white">
        <div class="rows">
            <div class="section">
                <h2 class="title text-center">LISTADO DE AVVS</h2>
                <div class="team">
                  <div class="rows">
                    <a class="btn btn-success btn-simple btn-xs" href="{{ Route('redes.create') }}">Nuevo Registro</a>
                    <!--a class="btn btn-danger btn-simple btn-xs" href="/admin/empresa/exportarpdf">Exportar PDF</a-->
                    <a class="btn btn-danger btn-simple btn-xs" href="/admin/avv/excel">Exportar Excel</a>
                    <table class="table">
                        <thead class="bg-danger">
                            <tr>
                                <th class="">ESTADO</th>
                                <th class="">MUNICIPIO</th>
                                <th class="">PARROQUIA</th>
                                <th class="">AVV</th>
                                <th class="">CODIGO</th>
                                <th class="">APROBADO</th>
                                <th class="">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avvs as $avv)
                            <tr style="color: black">
                                <td>{{ $avv->estado->nombre }}</td>
                                <td>{{ $avv->municipio->nombre }}</td>
                                <td>{{ $avv->parroquia->nombre }}</td>
                                <td>{{ $avv->nombre }}</td>
                                <td>{{ $avv->codigo }}</td>
                                <td>
                                    <input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->aprobado ? 'checked' : '' }}>
                                </td>
                                <td class="td-actions text-left">
                                    <form method="POST" action="{{ url('/redes/avv/'. $avv->id) }}">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <a href="{{ url('/redes/avv/'. $avv->id .'/edit') }}" rel="tooltip" title="Editar AVV" class="btn btn-success btn-simple"><i class="fa fa-edit"></i></a>
                                      <button type="submit" rel="tooltip" title="Eliminar AVV" class="btn btn-danger btn-simple"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
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