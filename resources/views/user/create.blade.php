@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'profile', 'title' => __('Crear Usuario')])

@section('content')
<div class="content">
    <div class="container card">
        <div class="team">
            <h2 class="title text-center">CREAR USUARIO</h2>
            <form action="{{ route('user.save') }}" method="post">
                {{ csrf_field() }}
                <div class="rows">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ESTADO</label>
                            <select class="form-control" name="estado" id="estado" required>
                                <option value="">Seleccione</option>
                                @foreach( $estados as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ROL</label>
                            <select class="form-control" name="rol" id="rol" required>
                                <option value="">Seleccione</option>
                                @foreach( $rols as $key => $value )
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <br>

                <div class="rows">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>NOMBRE</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" required onkeyup="this.value = this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>CORREO</label>
                            <input class="form-control" type="email" name="email" id="email" required>
                        </div>
                    </div>
                </div>

                <br>

                <div class="rows">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="password">CONTRASEÑA</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                    </div>
                </div>

                <br>

                <div class="rows">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr style="text-align: center">
                                    <th>NIVEL 1</th>
                                    <th>NIVEL 2</th>
                                    <th>NIVEL 3</th>
                                    <th>NIVEL 4</th>
                                    <th>NIVEL 5</th>
                                    <th>NIVEL 6</th>
                                    <th>NIVEL 7</th>
                                    <th>NIVEL 8</th>
                                    <th>NIVEL 9</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="hidden" name="nivel1" id="nivel1" value="0">
                                        <input class="toggle-class" name="nivel1" id="nivel1" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel2" id="nivel2" value="0">
                                        <input class="toggle-class" name="nivel2" id="nivel2" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel3" id="nivel3" value="0">
                                        <input class="toggle-class" name="nivel3" id="nivel3" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel4" id="nivel4" value="0">
                                        <input class="toggle-class" name="nivel4" id="nivel4" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel5" id="nivel5" value="0">
                                        <input class="toggle-class" name="nivel5" id="nivel5" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel6" id="nivel6" value="0">
                                        <input class="toggle-class" name="nivel6" id="nivel6" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel7" id="nivel7" value="0">
                                        <input class="toggle-class" name="nivel7" id="nivel7" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel8" id="nivel8" value="0">
                                        <input class="toggle-class" name="nivel8" id="nivel8" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                    <td>
                                        <input type="hidden" name="nivel9" id="nivel9" value="0">
                                        <input class="toggle-class" name="nivel9" id="nivel9" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="SI" data-off="NO" value="1">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                        <a href="{{ route('user.index') }}" class="btn btn-success">Regresar</a>
                        {{-- <input type="button" value="REGRESAR" name="regresar" id="regresar" class="btn btn-success"> --}}
                      </div>
                    </div>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection