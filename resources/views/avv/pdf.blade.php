<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <script type="text/css">

    th, td {
      width: 25%;
      text-align: left;
      vertical-align: top;
    }

  </script>

</head>
<body>

  <div class="section">
    <img src="img/cintilloazul.png" width="100%">
    <br><br>
    <h2><center>HOJA DE OBSERVACIONES</center></h2>
    <div class="team">
      <h3><b>ESTATUS DE LA AVV</b></h3>
      <div class="rows">
        <table style="width: 100%">
          <thead style="text-align: center; background-color:#D9D9D9">
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
          <tbody style=" text-align: center;">
            <tr>
              <td><input name="preregistro" id="preregistro" type="checkbox" {{ $avvs->preregistro ? 'checked' : '' }}></td>
              <td><input name="nivel1" id="nivel1" type="checkbox" {{ $avvs->nivel1 ? 'checked' : '' }}></td>
              <td><input name="nivel2" id="nivel2" type="checkbox" {{ $avvs->nivel2 ? 'checked' : '' }}></td>
              <td><input name="nivel3" id="nivel3" type="checkbox" {{ $avvs->nivel3 ? 'checked' : '' }}></td>
              <td><input name="nivel4" id="nivel4" type="checkbox" {{ $avvs->nivel4 ? 'checked' : '' }}></td>
              <td><input name="nivel5" id="nivel5" type="checkbox" {{ $avvs->nivel5 ? 'checked' : '' }}></td>
              <td><input name="nivel6" id="nivel6" type="checkbox" {{ $avvs->nivel6 ? 'checked' : '' }}></td>
              <td><input name="nivel7" id="nivel7" type="checkbox" {{ $avvs->nivel7 ? 'checked' : '' }}></td>
              <td><input name="nivel8" id="nivel8" type="checkbox" {{ $avvs->nivel8 ? 'checked' : '' }}></td>
              <td><input name="nivel9" id="nivel9" type="checkbox" {{ $avvs->nivel9 ? 'checked' : '' }}></td>
            </tr>
          </tbody>
        </table>
        <br>



        <table style="width: 100%" style="border-color: #000">
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
            <td colspan="6" style="text-align: center; text-size:20; background-color: #726f6f; color: white; height:40px">NIVEL 1</td>
          </tr>
          <tr>
            <td colspan="6" style="height: 100px">
              <ul>
                <li><b>OBSERVACION:</b> {{$avvs->observacion_redes}}</li>
              </ul>
            </td>
          </tr>
          <tr>
            <td  colspan="6" style="background-color: #726f6f; color: white; height:40px">NIVEL 2</td>
          </tr>
          <tr>
            <td colspan="6" style="height: 100px">
              <ul>
                <li><b>INFORME DE PREFACTIBILIDAD:</b> {{ (isset($avvs->prefactibilidad->nombre)) ? $avvs->prefactibilidad->nombre : ''}}</li>
                <li><b>SALIDA CARTOGRAFICA:</b> {{ (isset($avvs->salidaCartografica->nombre)) ? $avvs->salidaCartografica->nombre : ''}} </li>
                <li><b>ESTUDIO DE SUELO:</b> {{ (isset($avvs->estudioSuelo->nombre)) ? $avvs->estudioSuelo->nombre : ''}} </li>
                <li><b>FACTIBILIDAD DE SERVICIOS:</b> {{ (isset($avvs->factibilidadServicio->nombre)) ? $avvs->factibilidadServicio->nombre : ''}}</li>
                <li><b>LEVANTAMIENTO TOPOGRAFICO:</b> {{ (isset($avvs->levantamientoTopografico->nombre)) ? $avvs->levantamientoTopografico->nombre : ''}}</li>
                <p><b>OBSERVACIONES:</b> {{$avvs->observacion_intu2}}</p>
               </ul>
            </td>
          </tr>
          <tr>
            <td  colspan="6" style="background-color: #726f6f; color: white; height:40px">NIVEL 3</td>
          </tr>
          <tr>
            <td colspan="6" style="height: 100px">
              <ul>
                <li><b>PROPIEDAD DEL TERRENO:</b> {{ (isset($avvs->propiedad_terreno->nombre)) ? $avvs->propiedad_terreno->nombre : '' }}</li>
                <p><b>OBSERVACIONES: </b>{{$avvs->observacion_intu3}}</p>
              </ul>
            </td>
          </tr>
          <tr>
            <td  colspan="6" style="background-color: #726f6f; color: white; height:40px">NIVEL 4</td>
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
        </table>
      </div>
    </div>
  </div>  
</body>
</html>