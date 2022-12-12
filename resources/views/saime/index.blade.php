@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'Saime', 'title' => __('Listado de AVV')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="rows">
            <div class="col-sm-3">
                <form method="get" class="form-inline pull-left" action="/avv/public/saime/">
                    <div class="form-group">
                        <input type="number" name="cedula" placeholder="Buscar por Cedula" class="form-control">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <a class="btn btn-success btn-simple" href="{{ route('saime.crear') }}">Nuevo Registro</a>
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title text-center">NUEVO REGISTRO</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-danger">
                            <th class="">NACIONALIDAD</th>
                            <th class="">CEDULA</th>
                            <th class="">NOMBRE</th>
                            <th class="">APELLIDO</th>
                            <th class="">GENERO</th>
                            <th>OPCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($saimes as $saime)
                            <tr>
                                <td>{{ $saime->letra }}</td>
                                <td>{{ $saime->cedula }}</td>
                                <td>{{ $saime->nombrecompleto }}</td>
                                <td>{{ $saime->apellidocompleto }}</td>
                                <td>{{ $saime->genero->nombre }}</td>
                                <td class="td-actions text-left">
                                    <form method="POST" action="{{ url('/saime/'. $saime->id) }}">
                                      {{ csrf_field() }}
                                      {{ method_field('DELETE') }}
                                      <a href="{{ url('/saime/'. $saime->id .'/edit') }}" rel="tooltip" title="Editar Integrante" class="btn btn-success btn-simple"><i class="fa fa-edit"></i></a>
                                      <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $saimes->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>        
    </div>
</div>    
@endsection

@section('js')
  <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
@endsection