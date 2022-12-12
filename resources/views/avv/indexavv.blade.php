@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'avv', 'title' => __('Registro AVV')])

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">


    <style>

        table.dataTable thead{
            background-color: rgb(74, 198, 123);
            color: azure;
            height: 60px;
        }

        .page-item.active .page-link{
            background-color: rgb(74, 198, 123) !important;
            color:azure !important;
        }
        .page-link {
            margin-top: -15px;
            color: black !important;
        }

    </style>

</head>


<body>
    <div class="content">
        <div class="container-fluid">
            <div class="rows">
                <div class="col-sm-4">
                    <form method="get" class="form-inline pull-left" action="/avv/public/avv/">
                        <div class="form-group">
                            <input type="proyecto" name="proyecto" placeholder="Buscar nombre proyecto" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <a class="btn btn-success btn-simple btn-xs" href="{{ route('avv.create') }}">Nuevo Registro</a>
                <a class="btn btn-danger btn-simple btn-xs" href="/avv/excel">Exportar Excel</a>
                <div class="card">
                    <div class="card-header card-header-danger">
                        <h4 class="card-title text-center">LISTA DE AVV</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="">ESTADO</th>
                                    <th class="">MUNICIPIO</th>
                                    <th class="">PARROQUIA</th>
                                    <th class="">AVV</th>
                                    <th class="">CODIGO</th>
                                    <th class="">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avvs as $avv)
                                <tr style="height: 40px">
                                    <td>{{ $avv->estado->nombre }}</td>
                                    <td>{{ $avv->municipio->nombre }}</td>
                                    <td>{{ $avv->parroquia->nombre }}</td>
                                    <td>{{ $avv->nombre }}</td>
                                    <td>{{ $avv->codigoregistro }}</td>
                                    @if (auth()->user()->rol_id == 4)
                                        <td>
                                            <input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel4 ? 'checked' : '' }}>
                                        </td>
                                    @endif
                                    @if (auth()->user()->rol_id == 2)
                                        <td>
                                            <input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel1 ? 'checked' : '' }}>
                                        </td>
                                    @endif
                                    @if (auth()->user()->rol_id == 3 && auth()->user()->nivel2)
                                        <td>
                                            <input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel2 ? 'checked' : '' }}>
                                        </td>
                                    @endif
                                    @if (auth()->user()->rol_id == 3 && auth()->user()->nivel3)
                                        <td>
                                            <input disabled data-id="{{$avv->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" {{ $avv->nivel3 ? 'checked' : '' }}>
                                        </td>
                                    @endif                                
                                    <td class="td-actions" style="width: 140px">
                                        <form method="POST" action="{{ url('/avv/'. $avv->id) }}">
                                          {{ csrf_field() }}
                                          {{ method_field('DELETE') }}
                                          <a style="height: 30px" href="{{ url('/avv/'. $avv->id .'/show') }}" rel="tooltip" title="VER FICHA" class="btn btn-warning"><i class="material-icons" style="margin-block: auto">visibility</i></a>
                                          <a style="height: 30px" href="{{ url('/avv/'. $avv->id .'/pdf') }}" rel="tooltip" title="Descargar Ficha" class="btn btn-info"><i style="margin-block: auto" class="material-icons">download</i></a>
                                          @if (auth()->user()->rol_id == 2 && auth()->user()->estado_id == 25)
                                            <a href="{{ url('/avv/'. $avv->id .'/edit') }}" rel="tooltip" title="Editar AVV" class="btn btn-success btn-simple"><i class="material-icons">edit</i></a>
                                            <button type="submit" rel="tooltip" title="Eliminar AVV" class="btn btn-danger btn-simple"><i class="material-icons">delete</i></button>
                                          @endif
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

@endsection

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js" integrity="sha512-xcHCGC5tQ0SHlRX8Anbz6oy/OullASJkEhb4gjkneVpGE3/QGYejf14CUO5n5q5paiHfRFTa9HKgByxzidw2Bw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    dom: "Bftip",
                    buttons:{
                        dom:{
                            button:{
                                className: 'btn'
                            }
                        },
                        buttons:[
                            {
                                extend: 'excel',
                                text: 'Exportar a Excel',
                                className: 'btn btn-outline-success',
                                exportOptions:
                                {
                                    columns: [0, 1, 2]
                                }
                            }
                        ],
                        columnDefs:
                        [
                            {
                                targets: -1,
                                visible: false
                            }
                        ]
                    }
                });
        });
    </script>    
</body>
</html>
