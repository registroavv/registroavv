/*$("#municipio").change(event => {
  $.get(`/municipio/${event.target.value}`, function(res, sta){
    //console.log(res);
    $("#parroquia").empty();
    res.forEach(element => {
      $("#parroquia").append(`<option value=${element.id}> ${element.nombre} </option>`);
    });
  });
});*/

$("#estado").change(event => {
  $.get(`/avv/estado/municipio/${event.target.value}`, function(res, sta){
  //  console.log(res);
    $("#municipio").empty();
    $("#parroquia").empty();
    $("#municipio").append(`<option value="">Seleccione</option>`)
    res.forEach(element => {
      $("#municipio").append(`<option value=${element.id}> ${element.nombre} </option>`);
    });
  });
});

$("#municipio").change(event => {
  $.get(`/avv/municipio/parroquia/${event.target.value}`, function(res, sta){
    $("#parroquia").empty();
    //console.log(res);
    $("#parroquia").append(`<option value="">Seleccione</option>`)
    res.forEach(element => {
      $("#parroquia").append(`<option value=${element.id}> ${element.nombre} </option>`);
    });
  });
});

$.ajaxSetup({
 headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 }
});

$('#buscar').click(function(e){
  e.preventDefault();

  var cedula = $("input[name=cedula]").val();

  $('#nombre_completo').val('');

  $.ajax({
    url:'/avv/buscarcedula',
    data:{'cedula':cedula},
    type:'post',
    success:  function (response) {
        if (response.mensaje == 'Fallido')
        {
          alert("Esta Cédula no se encuentra en nuestra base del saime")
        }
        else
        {
          $('#nombre_completo').val(response.nombre);
          //$('#labelNombreCompleto').html(response.nombre);
          // document.getElementById('labelNombreCompleto').innerHTML= 'Nuevo valor';
          // document.querySelector('#labelNombreCompleto').innerText = 'Tu Valor';
          $("#labelNombreCompleto").text(response.nombre);
          $("#labelFechaNac").text(response.fecha_nac);
          $('#fecha_nac').val(response.fecha_nac);
          $('#saime_id').val(response.saime_id);
          // $('#genero').val(response.genero);
          // $("#genero").append(`<option value=${responde.id}> ${response.generos} </option>`);
          // $('#sexo').append($('<option>').text(response.generos).attr('value', response.id));
        }
    },
    statusCode: {
        404: function() {
          alert('web no encontrada');
        }
    },
    error:function(x,xs,xt){
        
        alert ("Error intente de nuevo");
    }
  });
});





$('#buscaravv').click(function(e){
  e.preventDefault();

  var codigo = $("input[name=codigo]").val();

  $('#nombre').val('');

$.ajax({
   url:'/avv/buscaravv',
   data:{'codigo':codigo},
   type:'post',
   success:  function (response) {
      if (response.mensaje == 'Fallido')
      {
        alert("Esta AVV no se encuentra en nuestros registros")
      }
      else
      {
        $('#nombre').text(response.nombre);
        $('#estado').text(response.estado);
        $('#municipio').text(response.municipio);
        $('#parroquia').text(response.parroquia);
        $('#nombre_terreno').text(response.nombre_terreno);
        $('#direccion').text(response.direccion);
        $('#familias').text(response.familias);
        $('#personas').text(response.personas);
        $('#comuna').text(response.comunas);
        $('#consejo_comunal').text(response.consejo_comunal);
        $('#cedula').text(response.cedula);
        $('#vocero').text(response.vocero);
        $('#telefono').text(response.telefono);
        $('#organo').text(response.organo);
        $('#observacionREDES').text(response.observacionREDES);
        $('#prefactibilidad').text(response.prefactibilidad);
        $('#salida_cartografica').text(response.salida_cartografica);
        $('#estudio_suelo').text(response.estudio_suelo);
        $('#factibilidad_servicio').text(response.factibilidad_servicio);
        $('#levantamiento_topografico').text(response.levantamiento_topografico);
        $('#observacionINTU2').text(response.observacionINTU2);
        $('#propiedad_terreno').text(response.propiedad_terreno);
        $('#observacionINTU3').text(response.observacionINTU3);
        $('#implantacion').text(response.implantacion);
        $('#proyecto').text(response.proyecto);
        $('#observacionFMH').text(response.observacionFMH);

        $('#latitud').text(response.latitud);
        $('#longitud').text(response.longitud);
        $('#metodologia_ejecucion').text(response.metodologia_ejecucion);
        $('#tipologia_constructiva').text(response.tipologia_constructiva);
        $('#cmg_nombre').text(response.cmg_nombre);
        $('#nombre_cmg').text(response.nombre_cmg);
        $('#tpm_nombre').text(response.tpm_nombre);
        $('#tmp_codigo').text(response.tmp_codigo);
        $('#sigevih_nombre').text(response.sigevih_nombre);
        $('#sigevih_codigo').text(response.sigevih_codigo);
        $('#protocolizacion').text(response.protocolizacion);

        $("#preregistro").prop("checked", response.preregistro);
        $("#nivel1").prop("checked", response.nivel1);
        $("#nivel2").prop("checked", response.nivel2);
        $("#nivel3").prop("checked", response.nivel3);
        $("#nivel4").prop("checked", response.nivel4);
        $("#nivel5").prop("checked", response.nivel5);
        $("#nivel6").prop("checked", response.nivel6);
        $("#nivel7").prop("checked", response.nivel7);
        $("#nivel8").prop("checked", response.nivel8);
        $("#nivel9").prop("checked", response.nivel9);

        var x = document.getElementById("res");
        x.style.display = "contents";
      }
   },
   statusCode: {
      404: function() {
         alert('web no encontrada');
      }
   },
   error:function(x,xs,xt){
      
      alert ("Error intente de nuevo");
   }
});
 });

$('#etapa1').click(function(e){
  e.preventDefault();

    var req_01 = parseFloat($("input[name=req_01]").val());
    var req_02 = parseFloat($("input[name=req_02]").val());
    var req_03 = parseFloat($("input[name=req_03]").val());
    var req_04 = parseFloat($("input[name=req_04]").val());
    var req_05 = parseFloat($("input[name=req_05]").val());

    // $('#total_etapa1').val('');

    var total_etapa1 = req_01+req_02+req_03+req_04+req_05;

    $('#totalEtapa1').val(total_etapa1);

    if (total_etapa1 > 10) {

      alert('[ERROR] El total supera el valor de 10%');
      $('#totalEtapa1').val('');
      return false;
    }

  });

$('#etapa2').click(function(e){
  e.preventDefault();

    var req_06 = parseFloat($("input[name=req_06]").val());
    var req_07 = parseFloat($("input[name=req_07]").val());
    var req_08 = parseFloat($("input[name=req_08]").val());
    var req_09 = parseFloat($("input[name=req_09]").val());
    var req_10 = parseFloat($("input[name=req_10]").val());
    var req_11 = parseFloat($("input[name=req_11]").val());
    var req_12 = parseFloat($("input[name=req_12]").val());
    var req_13 = parseFloat($("input[name=req_13]").val());
    var req_14 = parseFloat($("input[name=req_14]").val());
    var req_15 = parseFloat($("input[name=req_15]").val());

    // $('#total_etapa1').val('');

    var total_etapa2 = req_06+req_07+req_08+req_09+req_10+req_11+req_12+req_13+req_14+req_15;

    $('#totalEtapa2').val(total_etapa2);

    if (total_etapa2 > 10) {

      alert('[ERROR] El total supera el valor de 10%');
      $('#totalEtapa2').val('');
      return false;
    }

  });

$('#etapa3').click(function(e){
  e.preventDefault();

    var req_16 = parseFloat($("input[name=req_16]").val());
    var req_17 = parseFloat($("input[name=req_17]").val());
    var req_18 = parseFloat($("input[name=req_18]").val());
    var req_19 = parseFloat($("input[name=req_19]").val());
    var req_20 = parseFloat($("input[name=req_20]").val());
    var req_21 = parseFloat($("input[name=req_21]").val());
    var req_22 = parseFloat($("input[name=req_22]").val());
    var req_23 = parseFloat($("input[name=req_23]").val());
    var req_24 = parseFloat($("input[name=req_24]").val());
    var req_25 = parseFloat($("input[name=req_25]").val());
    var req_26 = parseFloat($("input[name=req_26]").val());

    // $('#total_etapa1').val('');

    var total_etapa3 = req_16+req_17+req_18+req_19+req_20+req_21+req_22+req_23+req_24+req_25+req_26;

    $('#totalEtapa3').val(total_etapa3);

    if (total_etapa3 > 15) {

      alert('[ERROR] El total supera el valor de 15%');
      $('#totalEtapa3').val('');
      return false;
    }

  });

$('#etapa4').click(function(e){
  e.preventDefault();

    var req_27 = parseFloat($("input[name=req_27]").val());
    var req_28 = parseFloat($("input[name=req_28]").val());
    var req_29 = parseFloat($("input[name=req_29]").val());
    var req_30 = parseFloat($("input[name=req_30]").val());
    var req_31 = parseFloat($("input[name=req_31]").val());
    var req_32 = parseFloat($("input[name=req_32]").val());
    var req_33 = parseFloat($("input[name=req_33]").val());
    var req_34 = parseFloat($("input[name=req_34]").val());
    var req_35 = parseFloat($("input[name=req_35]").val());
    var req_36 = parseFloat($("input[name=req_36]").val());
    var req_37 = parseFloat($("input[name=req_37]").val());

    // $('#total_etapa1').val('');

    var total_etapa4 = req_27+req_28+req_29+req_30+req_31+req_32+req_33+req_34+req_35+req_36+req_37;

    $('#totalEtapa4').val(total_etapa4);

    if (total_etapa4 > 15) {

      alert('[ERROR] El total supera el valor de 15%');
      $('#totalEtapa4').val('');
      return false;
    }

  });

$('#etapa5').click(function(e){
  e.preventDefault();

    var req_38 = parseFloat($("input[name=req_38]").val());
    var req_39 = parseFloat($("input[name=req_39]").val());
    var req_40 = parseFloat($("input[name=req_40]").val());
    var req_41 = parseFloat($("input[name=req_41]").val());
    var req_42 = parseFloat($("input[name=req_42]").val());
    var req_43 = parseFloat($("input[name=req_43]").val());
    var req_44 = parseFloat($("input[name=req_44]").val());
    var req_45 = parseFloat($("input[name=req_45]").val());
    var req_46 = parseFloat($("input[name=req_46]").val());
    var req_47 = parseFloat($("input[name=req_47]").val());
    var req_48 = parseFloat($("input[name=req_48]").val());
    var req_49 = parseFloat($("input[name=req_49]").val());
    var req_50 = parseFloat($("input[name=req_50]").val());
    var req_51 = parseFloat($("input[name=req_51]").val());
    var req_52 = parseFloat($("input[name=req_52]").val());

    // $('#total_etapa1').val('');

    var total_etapa5 = req_38+req_39+req_40+req_41+req_42+req_43+req_44+req_45+req_46+req_47+req_48+req_49+req_50+req_51+req_52;

    $('#totalEtapa5').val(total_etapa5);

    if (total_etapa5 > 12.000000000000002) {

      alert('[ERROR] El total supera el valor de 12%');
      $('#totalEtapa5').val('');
      return false;
    }
  });

$('#etapa6').click(function(e){
  e.preventDefault();

    var req_53 = parseFloat($("input[name=req_53]").val());
    var req_54 = parseFloat($("input[name=req_54]").val());
    var req_55 = parseFloat($("input[name=req_55]").val());
    var req_56 = parseFloat($("input[name=req_56]").val());
    var req_57 = parseFloat($("input[name=req_57]").val());
    var req_58 = parseFloat($("input[name=req_58]").val());
    var req_59 = parseFloat($("input[name=req_59]").val());
    var req_60 = parseFloat($("input[name=req_60]").val());
    var req_61 = parseFloat($("input[name=req_61]").val());
    var req_62 = parseFloat($("input[name=req_62]").val());

    // $('#total_etapa1').val('');

    var total_etapa6 = req_53+req_54+req_55+req_56+req_57+req_58+req_59+req_60+req_61+req_62;

    $('#totalEtapa6').val(total_etapa6);

    if (total_etapa6 > 10) {

      alert('[ERROR] El total supera el valor de 9%');
      $('#totalEtapa6').val('');
      return false;
    }
  });

$('#etapa7').click(function(e){
  e.preventDefault();

    var req_63 = parseFloat($("input[name=req_63]").val());
    var req_64 = parseFloat($("input[name=req_64]").val());
    var req_65 = parseFloat($("input[name=req_65]").val());
    var req_66 = parseFloat($("input[name=req_66]").val());
    var req_67 = parseFloat($("input[name=req_67]").val());
    var req_68 = parseFloat($("input[name=req_68]").val());

    // $('#total_etapa1').val('');

    var total_etapa7 = req_63+req_64+req_65+req_66+req_67+req_68;

    $('#totalEtapa7').val(total_etapa7);

    if (total_etapa7 > 12) {

      alert('[ERROR] El total supera el valor de 12%');
      $('#totalEtapa7').val('');
      return false;
    }
  });

$('#etapa8').click(function(e){
  e.preventDefault();

    var req_69 = parseFloat($("input[name=req_69]").val());
    var req_70 = parseFloat($("input[name=req_70]").val());
    var req_71 = parseFloat($("input[name=req_71]").val());
    var req_72 = parseFloat($("input[name=req_72]").val());
    var req_73 = parseFloat($("input[name=req_73]").val());
    var req_74 = parseFloat($("input[name=req_74]").val());
    var req_75 = parseFloat($("input[name=req_75]").val());
    var req_76 = parseFloat($("input[name=req_76]").val());
    var req_77 = parseFloat($("input[name=req_77]").val());
    var req_78 = parseFloat($("input[name=req_78]").val());
    var req_79 = parseFloat($("input[name=req_79]").val());
    var req_80 = parseFloat($("input[name=req_80]").val());
    var req_81 = parseFloat($("input[name=req_81]").val());
    var req_82 = parseFloat($("input[name=req_82]").val());
    var req_83 = parseFloat($("input[name=req_83]").val());
    var req_84 = parseFloat($("input[name=req_84]").val());
    var req_85 = parseFloat($("input[name=req_85]").val());
    var req_86 = parseFloat($("input[name=req_86]").val());
    var req_87 = parseFloat($("input[name=req_87]").val());
    var req_88 = parseFloat($("input[name=req_88]").val());
    var req_89 = parseFloat($("input[name=req_89]").val());
    var req_90 = parseFloat($("input[name=req_90]").val());
    var req_91 = parseFloat($("input[name=req_91]").val());
    var req_92 = parseFloat($("input[name=req_92]").val());

    // $('#total_etapa1').val('');

    var total_etapa8 = req_69+req_70+req_71+req_72+req_73+req_74+req_75+req_76+req_77+req_78+req_79+req_80+req_81+req_82+req_83+req_84+req_85+req_86+req_87+req_88+req_89+req_90+req_91+req_92;

    $('#totalEtapa8').val(total_etapa8);

    if (total_etapa8 > 16) {

      alert('[ERROR] El total supera el valor de 16%');
      $('#totalEtapa8').val('');
      return false;
    }
  });

$('#avance_total').click(function(e){
  e.preventDefault();

    var total_etapa1 = parseFloat($("input[name=totalEtapa1]").val());
    var total_etapa2 = parseFloat($("input[name=totalEtapa2]").val());
    var total_etapa3 = parseFloat($("input[name=totalEtapa3]").val());
    var total_etapa4 = parseFloat($("input[name=totalEtapa4]").val());
    var total_etapa5 = parseFloat($("input[name=totalEtapa5]").val());
    var total_etapa6 = parseFloat($("input[name=totalEtapa6]").val());
    var total_etapa7 = parseFloat($("input[name=totalEtapa7]").val());
    var total_etapa8 = parseFloat($("input[name=totalEtapa8]").val());

    var avance_total = total_etapa1+total_etapa2+total_etapa3+total_etapa4+total_etapa5+total_etapa6+total_etapa7+total_etapa8;

    $('#totalAvance').val(avance_total);
  });

$("#buscarminuta").click(event => {
  var avv_id = $("input[name=codigo]").val();
    $.get(`/avv/minuta/${avv_id}`, function(res, sta){
      //console.log(avv_id);
      //console.log(res);
        res.forEach(element => {
          const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
          var fecha = new Date(element.created_at).toLocaleDateString('es-VE', opciones)
          $("#minuta").append(`<tr><td><b>${fecha}</b></td><td>${element.nombre}</td></tr>`);
        });
      });

      var btn_minuta = document.getElementById("buscarminuta");
      btn_minuta.style.display = "none";
});


$('#example').DataTable(
  {
    "ajax": '/datatable/avvs',
    "columns":[
      {data: 'estado_id'},
      {data: 'municipio_id'},
      {data: 'parroquia_id'},
      {data: 'nombre'},
      {data: 'codigoregistro'},
    ]
});