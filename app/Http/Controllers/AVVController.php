<?php

namespace App\Http\Controllers;
use App\Models\avv;
use App\Models\estado;
use App\Models\municipio;
use App\Models\parroquia;
use App\Models\genero;
use App\Models\organo;
use Carbon\Carbon;
use App\Models\implantacion;
use App\Models\proyecto;
use App\Models\estudio_suelo;
use App\Models\factibilidad_servicio;
use App\Models\levantamiento_topografico;
use App\Models\prefactibilidad;
use App\Models\propiedad_terreno;
use App\Models\salidaCartografica;
use App\Models\serviciosCercanos;
use App\Exports\AVVsExport;
use App\Exports\AVV_EstadoExport;
use App\Models\requerimientos_fmh;
use App\Models\minuta;
use DB;
use PDF;
use Excel;

use Illuminate\Http\Request;

class AVVController extends Controller
{
    public function avvs()
    {
        return view('avv.avvs');
    }
    public function avv()
    {
        $avvs = avv::paginate();
        return view('avv.avv')->with(compact('avvs'));
    }
    public function excel()
    {
        return Excel::download(new AVVsExport, 'avv.xlsx');
    }
    public function excelestado()
    {
        $estado = auth()->user()->estado_id;
        return Excel::download(new AVV_EstadoExport($estado), 'avv.xlsx');
        // return (new AVV_EstadoExport(2018))->download('AVV2018.xlsx');
    }
    public function index(Request $request)
    {
        $estudio_suelo = estudio_suelo::pluck('nombre', 'id');
        $factibilidad_servicios = factibilidad_servicio::pluck('nombre', 'id');
        $levantamiento_topografico = levantamiento_topografico::pluck('nombre', 'id');
        $prefactibilidad = prefactibilidad::pluck('nombre', 'id');
        $propiedad_terreno = propiedad_terreno::pluck('nombre', 'id');
        $salidacartografica = salidaCartografica::pluck('nombre', 'id');
        $servicioscercanos = serviciosCercanos::pluck('nombre', 'id');
        $implantaciones = implantacion::pluck('nombre', 'id');
        $proyectos = proyecto::pluck('nombre', 'id');

        

        if (auth()->user()->estado_id <> 25) {
            $avvs = avv::latest()->where('estado_id', '=', auth()->User()->estado_id)
                ->nombre($request->get('nombre'))
                ->estado($request->get('estado'))
                ->nivel1($request->get('nivel1'))
                ->nivel2($request->get('nivel2'))
                ->nivel3($request->get('nivel3'))
                ->nivel4($request->get('nivel4'))
                ->proyecto($request->get('proyecto_id'))
                ->implantacion($request->get('implantacion_id'))
                ->propiedad_terreno($request->get('propiedad_terreno_id'))
                ->servicios_cercanos($request->get('servicios_cercanos_id'))
                ->prefactibilidad($request->get('prefactibilidad_id'))
                ->factibilidad_servicio($request->get('factibilidad_servicio_id'))
                ->salida_cartografica($request->get('salida_cartografica_id'))
                ->estudio_suelo($request->get('estudio_suelo_id'))
                ->levantamiento_topografico($request->get('levantamiento_topografico_id'))
                ->paginate(10);
                if (auth()->user()->estado_id == 10 || auth()->user()->estado_id == 13) {
                    $estados = DB::select('select parroquias.id, parroquias.nombre from parroquias INNER JOIN municipios on parroquias.municipio_id = municipios.id where municipios.estado_id = :id order by parroquias.nombre', ['id' => auth()->User()->estado_id]);
                } else {
                    $estados = DB::select('select id, nombre from municipios where municipios.estado_id = :id order by municipios.nombre', ['id' => auth()->User()->estado_id]);
                }
        } else {
            $estados = estado::pluck('nombre', 'id')->take(24);
            $avvs = avv::latest()
                ->nombre($request->get('nombre'))
                ->estado($request->get('estado'))
                ->nivel1($request->get('nivel1'))
                ->nivel2($request->get('nivel2'))
                ->nivel3($request->get('nivel3'))
                ->nivel4($request->get('nivel4'))
                ->proyecto($request->get('proyecto_id'))
                ->implantacion($request->get('implantacion_id'))
                ->propiedad_terreno($request->get('propiedad_terreno_id'))
                ->servicios_cercanos($request->get('servicios_cercanos_id'))
                ->prefactibilidad($request->get('prefactibilidad_id'))
                ->factibilidad_servicio($request->get('factibilidad_servicio_id'))
                ->salida_cartografica($request->get('salida_cartografica_id'))
                ->estudio_suelo($request->get('estudio_suelo_id'))
                ->levantamiento_topografico($request->get('levantamiento_topografico_id'))
                ->paginate(10);
        }
        return view('avv.index')->with(compact('avvs',
            'estados',
            'implantaciones',
            'proyectos',
            'estudio_suelo',
            'factibilidad_servicios',
            'levantamiento_topografico',
            'prefactibilidad',
            'propiedad_terreno',
            'salidacartografica',
            'servicioscercanos',));
    }
    public function indexavv(Request $request)
    {
        $proyecto  = $request->get('proyecto');

        if (auth()->user()->estado_id <> 25) {
            $avvs = avv::where('estado_id', '=', auth()->User()->estado_id)
                     ->orderBy('created_at', 'desc')
                     ->proyecto($proyecto);
            //$avvs = avv::orderBy('id', 'Asc')->paginate(10);
            return view('avv.index')->with(compact('avvs'));
        } else {
            $avvs = avv::orderBy('created_at', 'desc')->get();
            return view('avv.indexavv')->with(compact('avvs'));
        }
    }    
    public function create()
    {
        if (auth()->user()->rol_id == 2 && auth()->user()->estado_id <> 25) {
            $estados = estado::where('estado_id', '=', auth()->User()->estado_id)->pluck('nombre', 'id');
        }else {
            $estados = estado::pluck('nombre', 'id')->take(24);
        }
        
        $municipios = municipio::pluck('nombre', 'id');
        $parroquias = parroquia::pluck('nombre','id');
        $generos = genero::pluck('nombre', 'id');
        $organos = organo::pluck('nombre', 'id');

        return view('avv.create')->with(compact('estados', 'municipios', 'parroquias', 'generos', 'organos'));
    }
    public function save(Request $request)
    {
        // dd($request->all());

        $requerimientos_fmh = new requerimientos_fmh;
        $requerimientos_fmh->save();

        $avv = new avv();

        $avv->nombre = $request->nombre;
        $avv->direccion = $request->direccion;
        $avv->latitud = $request->latitud;
        $avv->longitud = $request->longitud;
        $avv->familias = $request->familias;
        $avv->cant_personas = $request->personas;
        $avv->consejo_comunal = $request->consejo_comunal;
        $avv->comuna = $request->comuna;
        $avv->saime_id = $request->saime_id;
        $avv->organo_id = $request->organo;
        $avv->estado_id = $request->estado;
        $avv->municipio_id = $request->municipio;
        $avv->parroquia_id = $request->parroquia;
        $avv->telefono = $request->telefono;
        $avv->nombre_terreno = $request->nombre_terreno;
        $avv->requerimientos_fmh_id = $requerimientos_fmh->id;

        if ($request->file('acta_avv')) {
            $file = $request->file('acta_avv');
            $path = public_path() . '/acta-avv/';
            $filename = uniqid() . $file->getClientOriginalName();
            $avv->acta_avv = $filename;
            $file->move($path, $filename);
        }
        $avv->codigoregistro = '14871254';
        $avv->save();



        $codigoavv = avv::find($avv->id);
        $codigoavv->codigoregistro = $request->parroquia.$avv->id;
        $codigoavv->update();

        return redirect('avv');



        // $affected = DB::table('users')
        //       ->where('id', 1)
        //       ->update(['votes' => 1]);
    }
    public function show(Request $request, $id)
    {
        $avvs = avv::find($id);
        // $estados = estado::pluck('nombre', 'id');
        // $municipios = municipio::where('estado_id', '=', $avvs->estado_id)->pluck('nombre', 'id');
        // $parroquias = parroquia::where('municipio_id', '=', $avvs->municipio_id)->pluck('nombre','id');
        // $organos = organo::pluck('nombre', 'id');
        $minutas = minuta::where('avv_id', '=', $id)->orderBy('created_at', 'desc')->paginate(3);

        //return $result = $avvs->toArray();
        //dd($minutas);
        return view('avv.show')->with(compact('avvs','minutas'));
    }
    public function edit($id)
    {
        $avvs = avv::find($id);
        $estados = estado::pluck('nombre', 'id');
        $municipios = municipio::where('estado_id', '=', $avvs->estado_id)->pluck('nombre', 'id');
        $parroquias = parroquia::where('municipio_id', '=', $avvs->municipio_id)->pluck('nombre','id');
        $organos = organo::pluck('nombre', 'id');
        $implantaciones = implantacion::pluck('nombre', 'id');
        $proyectos = proyecto::pluck('nombre', 'id');
        $estudio_suelo = estudio_suelo::pluck('nombre', 'id');
        $factibilidad_servicios = factibilidad_servicio::pluck('nombre', 'id');
        $levantamiento_topografico = levantamiento_topografico::pluck('nombre', 'id');
        $prefactibilidad = prefactibilidad::pluck('nombre', 'id');
        $propiedad_terreno = propiedad_terreno::pluck('nombre', 'id');
        $salidacartografica = salidaCartografica::pluck('nombre', 'id');
        $servicioscercanos = serviciosCercanos::pluck('nombre', 'id');
        return view('avv.edit')->with(compact('estados',
                                              'municipios',
                                              'parroquias',
                                              'organos',
                                              'avvs',
                                              'implantaciones',
                                              'proyectos',
                                              'estudio_suelo',
                                              'factibilidad_servicios',
                                              'levantamiento_topografico',
                                              'prefactibilidad',
                                              'propiedad_terreno',
                                              'salidacartografica',
                                              'servicioscercanos'));
    }
    public function pdf($id)
    {
        $avvs = avv::find($id);
        $estados = estado::pluck('nombre', 'id');
        $municipios = municipio::where('estado_id', '=', $avvs->estado_id)->pluck('nombre', 'id');
        $parroquias = parroquia::where('municipio_id', '=', $avvs->municipio_id)->pluck('nombre','id');
        $organos = organo::pluck('nombre', 'id');

        // return view('avv.pdf')->with(compact('estados', 'municipios', 'parroquias', 'organos','avvs'));

        $pdf = PDF::loadView('avv.pdf', ['avvs'=>$avvs, 
                                         'estados'=>$estados, 
                                         'municipios'=>$municipios, 
                                         'parroquias'=>$parroquias, 
                                         'organos'=>$organos]);
        // return $pdf->download('archivo-pdf.pdf');        
        return $pdf->stream();
    }
    public function update(Request $request, $id)
    {

        $avv = avv::find($id);

        if (auth()->user()->rol_id == 2)
        {
            $avv->nombre = $request->nombre;
            $avv->direccion = $request->direccion;
            $avv->latitud = $request->latitud;
            $avv->longitud = $request->longitud;
            $avv->familias = $request->familias;
            $avv->cant_personas = $request->personas;
            $avv->consejo_comunal = $request->consejo_comunal;
            $avv->comuna = $request->comuna;
            $avv->saime_id = $request->saime_id;
            $avv->organo_id = $request->organo;
            $avv->estado_id = $request->estado;
            $avv->municipio_id = $request->municipio;
            $avv->parroquia_id = $request->parroquia;
            $avv->telefono = $request->telefono;
            $avv->nombre_terreno = $request->nombre_terreno;

            if ($request->file('acta_avv')) {
                $file = $request->file('acta_avv');
                $path = public_path() . '/acta-avv/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->acta_avv = $filename;
                $file->move($path, $filename);
            }
        }

        if (auth()->user()->rol_id == 4)
        {
            $avv->nivel4 = $request->nivel4;
            $avv->observacion_fmh = $request->observacion_fmh;
            $avv->cant_viviendas = $request->viviendas;
            $avv->nombre_proyecto = $request->nombre_proyecto;
            $avv->implantacion_id = $request->implantacion_id;
            $avv->proyecto_id = $request->proyecto_id;

            $requerimientos_fmh = requerimientos_fmh::find($avv->requerimientos_fmh->id);

            $requerimientos_fmh->req_01 = $request->req_01;
            $requerimientos_fmh->req_02 = $request->req_02;
            $requerimientos_fmh->req_03 = $request->req_03;
            $requerimientos_fmh->req_04 = $request->req_04;
            $requerimientos_fmh->req_05 = $request->req_05;
            $requerimientos_fmh->req_06 = $request->req_06;
            $requerimientos_fmh->req_07 = $request->req_07;
            $requerimientos_fmh->req_08 = $request->req_08;
            $requerimientos_fmh->req_09 = $request->req_09;
            $requerimientos_fmh->req_10 = $request->req_10;
            $requerimientos_fmh->req_11 = $request->req_11;
            $requerimientos_fmh->req_12 = $request->req_12;
            $requerimientos_fmh->req_13 = $request->req_13;
            $requerimientos_fmh->req_14 = $request->req_14;
            $requerimientos_fmh->req_15 = $request->req_15;
            $requerimientos_fmh->req_16 = $request->req_16;
            $requerimientos_fmh->req_17 = $request->req_17;
            $requerimientos_fmh->req_18 = $request->req_18;
            $requerimientos_fmh->req_19 = $request->req_19;
            $requerimientos_fmh->req_20 = $request->req_20;
            $requerimientos_fmh->req_21 = $request->req_21;
            $requerimientos_fmh->req_22 = $request->req_22;
            $requerimientos_fmh->req_23 = $request->req_23;
            $requerimientos_fmh->req_24 = $request->req_24;
            $requerimientos_fmh->req_25 = $request->req_25;
            $requerimientos_fmh->req_26 = $request->req_26;
            $requerimientos_fmh->req_27 = $request->req_27;
            $requerimientos_fmh->req_28 = $request->req_28;
            $requerimientos_fmh->req_29 = $request->req_29;
            $requerimientos_fmh->req_30 = $request->req_30;
            $requerimientos_fmh->req_31 = $request->req_31;
            $requerimientos_fmh->req_32 = $request->req_32;
            $requerimientos_fmh->req_33 = $request->req_33;
            $requerimientos_fmh->req_34 = $request->req_34;
            $requerimientos_fmh->req_35 = $request->req_35;
            $requerimientos_fmh->req_36 = $request->req_36;
            $requerimientos_fmh->req_37 = $request->req_37;
            $requerimientos_fmh->req_38 = $request->req_38;
            $requerimientos_fmh->req_39 = $request->req_39;
            $requerimientos_fmh->req_40 = $request->req_40;
            $requerimientos_fmh->req_41 = $request->req_41;
            $requerimientos_fmh->req_42 = $request->req_42;
            $requerimientos_fmh->req_43 = $request->req_43;
            $requerimientos_fmh->req_44 = $request->req_44;
            $requerimientos_fmh->req_45 = $request->req_45;
            $requerimientos_fmh->req_46 = $request->req_46;
            $requerimientos_fmh->req_47 = $request->req_47;
            $requerimientos_fmh->req_48 = $request->req_48;
            $requerimientos_fmh->req_49 = $request->req_49;
            $requerimientos_fmh->req_50 = $request->req_50;
            $requerimientos_fmh->req_51 = $request->req_51;
            $requerimientos_fmh->req_52 = $request->req_52;
            $requerimientos_fmh->req_53 = $request->req_53;
            $requerimientos_fmh->req_54 = $request->req_54;
            $requerimientos_fmh->req_55 = $request->req_55;
            $requerimientos_fmh->req_56 = $request->req_56;
            $requerimientos_fmh->req_57 = $request->req_57;
            $requerimientos_fmh->req_58 = $request->req_58;
            $requerimientos_fmh->req_59 = $request->req_59;
            $requerimientos_fmh->req_60 = $request->req_60;
            $requerimientos_fmh->req_61 = $request->req_61;
            $requerimientos_fmh->req_62 = $request->req_62;
            $requerimientos_fmh->req_63 = $request->req_63;
            $requerimientos_fmh->req_64 = $request->req_64;
            $requerimientos_fmh->req_65 = $request->req_65;
            $requerimientos_fmh->req_66 = $request->req_66;
            $requerimientos_fmh->req_67 = $request->req_67;
            $requerimientos_fmh->req_68 = $request->req_68;
            $requerimientos_fmh->req_69 = $request->req_69;
            $requerimientos_fmh->req_70 = $request->req_70;
            $requerimientos_fmh->req_71 = $request->req_71;
            $requerimientos_fmh->req_72 = $request->req_72;
            $requerimientos_fmh->req_73 = $request->req_73;
            $requerimientos_fmh->req_74 = $request->req_74;
            $requerimientos_fmh->req_75 = $request->req_75;
            $requerimientos_fmh->req_76 = $request->req_76;
            $requerimientos_fmh->req_77 = $request->req_77;
            $requerimientos_fmh->req_78 = $request->req_78;
            $requerimientos_fmh->req_79 = $request->req_79;
            $requerimientos_fmh->req_80 = $request->req_80;
            $requerimientos_fmh->req_81 = $request->req_81;
            $requerimientos_fmh->req_82 = $request->req_82;
            $requerimientos_fmh->req_83 = $request->req_83;
            $requerimientos_fmh->req_84 = $request->req_84;
            $requerimientos_fmh->req_85 = $request->req_85;
            $requerimientos_fmh->req_86 = $request->req_86;
            $requerimientos_fmh->req_87 = $request->req_87;
            $requerimientos_fmh->req_88 = $request->req_88;
            $requerimientos_fmh->req_89 = $request->req_89;
            $requerimientos_fmh->req_90 = $request->req_90;
            $requerimientos_fmh->req_91 = $request->req_91;
            $requerimientos_fmh->req_92 = $request->req_92;

            $requerimientos_fmh->total_etapa1 = $request->totalEtapa1;
            $requerimientos_fmh->total_etapa2 = $request->totalEtapa2;
            $requerimientos_fmh->total_etapa3 = $request->totalEtapa3;
            $requerimientos_fmh->total_etapa4 = $request->totalEtapa4;
            $requerimientos_fmh->total_etapa5 = $request->totalEtapa5;
            $requerimientos_fmh->total_etapa6 = $request->totalEtapa6;
            $requerimientos_fmh->total_etapa7 = $request->totalEtapa7;
            $requerimientos_fmh->total_etapa8 = $request->totalEtapa8;

            $requerimientos_fmh->avance_total = $request->totalAvance;

            $requerimientos_fmh->update();

            if ($request->file('implantacion')) {
                $file = $request->file('implantacion');
                $path = public_path() . '/implantacion/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->implantacion2 = $filename;
            
                $file->move($path, $filename);
            }
            if ($request->file('proyecto')) {
                $file = $request->file('proyecto');
                $path = public_path() . '/proyecto/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->proyecto2 = $filename;
            
                $file->move($path, $filename);                
            }
        }

        if (auth()->user()->rol_id == 3 && auth()->user()->nivel2) 
        {
            $avv->nivel2 = $request->nivel2;
            $avv->observacion_intu2 = $request->observacion_intu2;
            $avv->codigo_intu = $request->codigo_intu;
            $avv->matriz_intu = $request->matriz_intu;
            $avv->area_terreno = $request->area_terreno;
            $avv->prefactibilidad_id =$request->prefactibilidad_id;
            $avv->factibilidad_servicio_id =$request->factibilidad_servicio_id;
            $avv->salida_cartografica_id =$request->salida_cartografica_id;
            $avv->servicios_cercanos_id =$request->servicios_cercanos_id;
            $avv->levantamiento_topografico_id =$request->levantamiento_topografico_id;
            $avv->estudio_suelo_id =$request->estudio_suelo_id;

            if ($request->file('prefactibilidad')) {
                $file = $request->file('prefactibilidad');
                $path = public_path() . '/prefactibilidad/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->prefactibilidad2 = $filename;
            
                $file->move($path, $filename);                
            }
            if ($request->file('factibilidad_servicio')) {
                $file = $request->file('factibilidad_servicio');
                $path = public_path() . '/factibilidad_servicio/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->factibilidad_servicio = $filename;
            
                $file->move($path, $filename);                
            }
            if ($request->file('salida_cartografica')) {
                $file = $request->file('salida_cartografica');
                $path = public_path() . '/salida_cartografica/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->salida_cartografica = $filename;
            
                $file->move($path, $filename);                
            }
            if ($request->file('levantamiento_topografico')) {
                $file = $request->file('levantamiento_topografico');
                $path = public_path() . '/levantamiento_topografico/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->levantamiento_topografico = $filename;
            
                $file->move($path, $filename);                
            }
            if ($request->file('estudio_suelo')) {
                $file = $request->file('estudio_suelo');
                $path = public_path() . '/estudio_suelo/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->estudio_suelo = $filename;
            
                $file->move($path, $filename);                
            }
        }

        if (auth()->user()->rol_id == 3 && auth()->user()->nivel3) 
        {
            $avv->nivel3 = $request->nivel3;
            $avv->gaceta_oficial = $request->gaceta_oficial;
            $avv->decreto_3330 = $request->decreto_3330;
            $avv->propiedad_terreno_id = $request->propiedad_terreno_id;
            $avv->observacion_intu3 = $request->observacion_intu3;

            if ($request->file('documento_catastral')) {
                $file = $request->file('documento_catastral');
                $path = public_path() . '/documento_catastral/';
                $filename = uniqid() . $file->getClientOriginalName();
                $avv->docu_catastral = $filename;
            
                $file->move($path, $filename);                
            }

        }

        $avv->update();
        return redirect('avv');
    }
    public function maps()
    {
        // $avvs = DB::table('avvs')->select('latitud')->distinct()->get();

        // $avvs = DB::table('avvs')
        //      ->where('latitud', isnotnull)
        //      ->get();

        // $query = DB::table('users')->select('name');

        $avvs = avv::where('latitud', "<>", "")->get();

        //$avvs = avv::all();
        // dd($avvs);
        return view('avv.maps')->with(compact('avvs'));
    }
    public function destroy($id)
    {
    	$avv = avv::find($id);
    	$avv->delete();

        $requerimientos_fmh = requerimientos_fmh::find($avv->requerimientos_fmh->id);
        $requerimientos_fmh->delete();

        $minuta = minuta::find($avv->minuta->id);
        if ($minuta->count()) {
            $minuta->delete();
        }
        
        $eliminado = 'LA LINEA DE PRODUCCION SE ELIMINO CON EXITO';
    	return redirect('avv');
    }
    public function buscar()
    {
        return view('avv.buscar');
    }
    public function buscaravv(Request $request)
    {

        if($request->isMethod('post')){   // preguntas si viene del post para dejar hacer cosas en ajax
            $codigo = $request->codigo; //el parametro que pasas en el ajax lo tomas aqui
            $avv = avv::where('codigoregistro','=',$codigo)->get();

            if(count($avv))
            {
                $id = $avv[0]->id;
                $nombre = $avv[0]->nombre;
                $estado = $avv[0]->estado->nombre;
                $municipio = $avv[0]->municipio->nombre;
                $parroquia = $avv[0]->parroquia->nombre;
                $nombre_terreno = $avv[0]->nombre_terreno;
                $direccion = $avv[0]->direccion;
                $familias = $avv[0]->familias;
                $personas = $avv[0]->cant_personas;
                $comunas = $avv[0]->comuna;
                $consejo_comunal = $avv[0]->consejo_comunal;
                $cedula = $avv[0]->saime->cedula;
                $vocero = $avv[0]->saime->nombreapellidocompleto;
                $telefono = $avv[0]->telefono;
                $organo = $avv[0]->organo->nombre;
                $observacion_redes = $avv[0]->observacion_redes;
                $prefactibilidad = $avv[0]->prefactibilidad->nombre;
                $salida_cartografica = $avv[0]->salidaCartografica->nombre;
                $estudio_suelo = $avv[0]->estudioSuelo->nombre;
                $factibilidad_servicio = $avv[0]->factibilidadServicio->nombre;
                $levantamiento_topografico = $avv[0]->levantamientoTopografico->nombre;
                $observacion_intu2 = $avv[0]->observacion_intu2;
                $propiedad_terreno = $avv[0]->propiedad_terreno->nombre;
                $observacion_intu3 = $avv[0]->observacion_intu3;
                $implantacion = $avv[0]->implantacion->nombre;
                $proyecto = $avv[0]->proyecto->nombre;
                $observacion_fmh = $avv[0]->observacion_fmh;

                $latitud = $avv[0]->latitud;
                $longitud = $avv[0]->longitud;
                $metodologia_ejecucion = $avv[0]->metodologia_ejecucion;
                $tipologia_constructiva = $avv[0]->tipologia_constructiva;
                $cmg_nombre = $avv[0]->cmg->nombre;
                $nombre_cmg = $avv[0]->nombre_cmg;
                $tpm_nombre = $avv[0]->tpm->nombre;
                $tmp_codigo = $avv[0]->tpm->codigo;
                $sigevih_nombre = $avv[0]->sigevih->nombre;
                $sigevih_codigo = $avv[0]->sigevih_codigo;
                $protocolizacion = $avv[0]->protocolizacion;

                $preregistro = $avv[0]->preregistro;
                $nivel1 = $avv[0]->nivel1;
                $nivel2 = $avv[0]->nivel2;
                $nivel3 = $avv[0]->nivel3;
                $nivel4 = $avv[0]->nivel4;
                $nivel5 = $avv[0]->nivel5;
                $nivel6 = $avv[0]->nivel6;
                $nivel7 = $avv[0]->nivel7;
                $nivel8 = $avv[0]->nivel8;
                $nivel9 = $avv[0]->nivel9;



                return response()->json([
                'mensaje' => 'Exito',
                'id' => $id,
                'nombre' => $nombre,
                'estado' => $estado,
                'municipio' => $municipio,
                'parroquia' => $parroquia,
                'nombre_terreno' => $nombre_terreno,
                'direccion' => $direccion,
                'familias' => $familias,
                'personas' => $personas,
                'comunas' => $comunas,
                'consejo_comunal' => $consejo_comunal,
                'cedula' => $cedula,
                'vocero' => $vocero,
                'telefono' => $telefono,
                'organo' => $organo,
                'observacion_redes' => $observacion_redes,
                'prefactibilidad' => $prefactibilidad,
                'salida_cartografica' => $salida_cartografica,
                'estudio_suelo' => $estudio_suelo,
                'factibilidad_servicio' => $factibilidad_servicio,
                'levantamiento_topografico' => $levantamiento_topografico,
                'observacion_intu2' => $observacion_intu2,
                'propiedad_terreno' => $propiedad_terreno,
                'observacion_intu3' => $observacion_intu3,
                'implantacion' => $implantacion,
                'proyecto' => $proyecto,
                'observacion_fmh' => $observacion_fmh,
                'latitud' => $latitud,
                'longitud' => $longitud,
                'metodologia_ejecucion' => $metodologia_ejecucion,
                'tipologia_constructiva' => $tipologia_constructiva,
                'cmg_nombre' => $cmg_nombre,
                'nombre_cmg' => $nombre_cmg,
                'tpm_nombre' => $tpm_nombre,
                'tmp_codigo' => $tmp_codigo,
                'sigevih_nombre' => $sigevih_nombre,
                'sigevih_codigo' => $sigevih_codigo,
                'protocolizacion' => $protocolizacion,

                'preregistro' => $preregistro,
                'nivel1' => $nivel1,
                'nivel2' => $nivel2,
                'nivel3' => $nivel3,
                'nivel4' => $nivel4,
                'nivel5' => $nivel5,
                'nivel6' => $nivel6,
                'nivel7' => $nivel7,
                'nivel8' => $nivel8,
                'nivel9' => $nivel9

                ]);
            }else
            {
                return response()->json([
                'mensaje' => 'Fallido',
                ]);
            }
        }
    }   
}
