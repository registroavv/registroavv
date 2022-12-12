@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'welcome', 'title' => __('GMVV')])

@section('content')

<div class="container" style="height: auto;">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8">
            <h1 class="text-white text-center">{{ __('Bienvenidos al Sistema de Consulta de las Asambleas Viviendo Venezolanos') }}</h1>
        </div>
    </div>
    <br><br>
    <div class="rows justify-content-center">
        <div class="col-sm-2 col-md-3">
            <div class="form-group label-floating">
                <label class="bmd-label-floating text-white">BUSCAR AVV POR CODIGO</label>
                <input class="form-control text-white" type="search" value="190101611" name="codigo" id="codigo" required>
            </div>
        </div>
        <div class="col-sm-1">
            <button class="btn btn-fab btn-round btn-primary" id="buscaravv" name="buscaravv" type="button" title="BUSCAR"><i class="material-icons">search</i></button>
        </div>
    </div>
</div>
    <div class="content" id="res" style="display:none">
        <div class="container card bg-white">
            <h2 class="title text-center font-weight-bold">RESULTADO DE LA BUSQUEDA</h2>
            <h3 class="title font-weight-bold">ESTATUS DE LA AVV</h3>
            <div class="row">
                <table style="width: 100%">
                  <thead style="color: black" class="text-center">
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
                  <tbody class="text-center">
                    <tr>
                      <td><input disabled name="preregistro" id="preregistro" type="checkbox"></td>
                      <td><input disabled name="nivel1" id="nivel1" type="checkbox"></td>
                      <td><input disabled name="nivel2" id="nivel2" type="checkbox"></td>
                      <td><input disabled name="nivel3" id="nivel3" type="checkbox"></td>
                      <td><input disabled name="nivel4" id="nivel4" type="checkbox"></td>
                      <td><input disabled name="nivel5" id="nivel5" type="checkbox"></td>
                      <td><input disabled name="nivel6" id="nivel6" type="checkbox"></td>
                      <td><input disabled name="nivel7" id="nivel7" type="checkbox"></td>
                      <td><input disabled name="nivel8" id="nivel8" type="checkbox"></td>
                      <td><input disabled name="nivel9" id="nivel9" type="checkbox"></td>
                    </tr>
                  </tbody>
                </table>
            </div>
    
            <div class="row bg-info">
                <div class="col-sm-12"><h2 class="text-center text-white"><b>DATOS BASICOS</b></h2></div><br>
            </div>        
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="text-dark">ESTADO:</label><br>
                        <label id="estado" name="estado"></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="text-dark">MUNICIPIO:</label><br>
                        <label id="municipio" name="municipio"></label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="text-dark">PARROQUIA:</label><br>
                        <label id="parroquia" name="parroquia"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">NOMBRE:</label><br>
                        <label id="vocero" name="vocero"></label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-dark">CEDULA:</label><br>
                        <label id="cedula" name="cedula"></label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-dark">TELEFONO:</label><br>
                        <label id="telefono" name="telefono">MIRANDA</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">NOMBRE DE LA AVV:</label><br>
                        <label id="nombre" name="nombre"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">NOMBRE DEL TERRENO:</label><br>
                        <label id="nombre_terreno" name="nombre_terreno"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">DIRECCION:</label><br>
                        <label id="direccion" name="direccion"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-dark">CANTIDAD DE FAMILIAS:</label><br>
                        <label id="familias" name="familias"></label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-dark">TOTAL DE PERSONAS:</label><br>
                        <label id="personas" name="personas"></label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-dark">LATITUD:</label><br>
                        <label id="latitud" name="latitud"></label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="text-dark">LONGITUD:</label><br>
                        <label id="longitud" name="longitud"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">ORGANO RESPONSABLE:</label><br>
                        <label id="organo" name="organo"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">CMG:</label><br>
                        <label id="cmg_nombre" name="cmg_nombre"></label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">NOMBRE DEL CMG:</label><br>
                        <label id="nombre_cmg" name="nombre_cmg"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">COMUNA:</label><br>
                        <label id="comuna" name="comuna"></label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">CONSEJO COMUNAL:</label><br>
                        <label id="consejo_comunal" name="consejo_comunal"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="text-dark" for="sigevih_nombre">INSCRITA EN EL SIGEVIH:</label><br>
                        <label id="sigevih_nombre" name="sigevih_nombre"></label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label class="text-dark" for="sigevih_codigo">ID DEL SIGEVIH:</label><br>
                        <label id="sigevih_codigo" name="sigevih_codigo"></label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label class="text-dark" for="protocolizacion">EL URBANISMO ESTA PROTOCOLIZADO:</label><br>
                        <label id="protocolizacion" name="protocolizacion"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">METODOLOGIA DE EJECUCION:</label><br>
                        <label id="metodologia_ejecucion" name="metodologia_ejecucion"></label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">TIPOLOGIA DE CONSTRUCCION:</label><br>
                        <label id="tipologia_constructiva" name="tipologia_constructiva"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">TITULO DE PROPIEDAD MULTIFAMILIAR:</label><br>
                        <label id="tpm_nombre" name="tpm_nombre"></label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="text-dark">Nro DE FOLIO TPM:</label><br>
                        <label id="tmp_codigo" name="tmp_codigo"></label>
                    </div>
                </div>
            </div>

            <div class="row bg-info">
                <div class="col-sm-12"><h2 class="text-center text-white"><b>NIVEL 1</b></h2></div><br>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">OBSERVACION:</label><br>
                        <label id="descripcionREDES" name="descripcionREDES"></label>
                    </div>
                </div>
            </div>
            <div class="row bg-info">
                <div class="col-sm-12"><h2 class="text-center text-white"><b>NIVEL 2</b></h2></div><br>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">INFORME DE PREFACTIBILIDAD:</label>
                        <label id="prefactibilidad" name="prefactibilidad"></label><br>
                        <label class="text-dark">SALIDA CARTOGRAFICA:</label>
                        <label id="salida_cartografica" name="salida_cartografica"></label><br>
                        <label class="text-dark">ESTUDIO DE SUELO:</label>
                        <label id="estudio_suelo" name="estudio_suelo"></label><br>
                        <label class="text-dark">FACTIBILIDAD DE SERVICIOS:</label>
                        <label id="factibilidad_servicio" name="factibilidad_servicio"></label><br>
                        <label class="text-dark">LEVANTAMIENTO TOPOGRAFICO:</label>
                        <label id="levantamiento_topografico" name="levantamiento_topografico"></label><br>
                        <label class="text-dark">OBSERVACIONES:</label><br>
                        <label id="observacionINTU2" name="observacionINTU2"></label>  
                    </div>
                </div>
            </div>
            <div class="row bg-info">
                <div class="col-sm-12"><h2 class="text-center text-white"><b>NIVEL 3</b></h2></div><br>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">PROPIEDAD DEL TERRENO:</label>
                        <label id="propiedad_terreno" name="propiedad_terreno"></label><br>
                        <label class="text-dark">OBSERVACIONES:</label><br>
                        <label id="observacionINTU3" name="observacionINTU3"></label>
                    </div>
                </div>
            </div>
            <div class="row bg-info">
                <div class="col-sm-12"><h2 class="text-center text-white"><b>NIVEL 4</b></h2></div><br>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="text-dark">IMPLANTACION:</label>
                        <label id="implantacion" name="implantacion"></label><br>
                        <label class="text-dark">PROYECTO:</label>
                        <label id="proyecto" name="proyecto"></label><br>
                        <label class="text-dark">OBSERVACIONES:</label><br>
                        <label id="observacionFMH" name="observacionFMH"></label>
                    </div>
                </div>
            </div>
            <div class="row bg-info">
                <div class="col-sm-12"><h2 class="text-center text-white"><b>MINUTAS</b></h2></div><br>
            </div>
            <button class="btn btn-round btn-success" id="buscarminuta" name="buscarminuta" type="button" title="BUSCAR"><i class="material-icons">search</i>VER HISTORIAL DE MINUTAS</button>
            <table class="table text-dark" id="minuta" name="minuta">

            </table>
        </div>
    </div>
@endsection

