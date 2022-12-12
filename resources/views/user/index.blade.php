@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'profile', 'title' => __('Listado de Usuarios')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            <a class="btn btn-success btn-simple" href="{{ route('user.create') }}">Nuevo Usuario</a>
            <div class="card">
                <div class="card-header card-header-danger">
                    <h4 class="card-title text-center">LISTA DE USUARIOS</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-danger">
                            <th class="">NOMBRE</th>
                            <th class="">CORREO</th>
                            <th class="">ROL</th>
                            <th>OPCIONES</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->rol->nombre }}</td>
                                <td class="td-actions text-left">
                                    <form method="POST" action="{{ url('/user/'. $user->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="{{ url('/user/'. $user->id .'/edit') }}" rel="tooltip" title="Editar Integrante" class="btn btn-success btn-simple"><i class="fa fa-edit"></i></a>
                                        <button type="submit" rel="tooltip" title="Eliminar Usuario" class="btn btn-danger btn-simple"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('js')
  <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
@endsection