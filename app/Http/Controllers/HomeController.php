<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\avv;
use App\Models\estado;
use App\Models\implantacion;
use App\Models\proyecto;
use App\Models\serviciosCercanos;
use App\Models\prefactibilidad;
use App\Models\factibilidad_servicio;
use App\Models\salidaCartografica;
use App\Models\levantamiento_topografico;
use App\Models\estudio_suelo;
use App\Models\propiedad_terreno;
use App\Models\parroquia;
use App\Models\municipio;
use App\Models\requerimientos_fmh;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->estado_id <> 25)
        {
            $avvs = avv::where('estado_id', '=', auth()->User()->estado_id)->orderBy('id', 'Asc')->paginate(10);
            $avv = avv::where('estado_id', '=', auth()->User()->estado_id)->get();
            if (auth()->User()->estado_id == 10 || auth()->User()->estado_id == 13) 
            {
                $mun_o_pq = DB::select('select COUNT(*) as avv_count, parroquias.nombre from avvs INNER JOIN parroquias on avvs.parroquia_id = parroquias.parroquia_id and avvs.estado_id = :id GROUP BY parroquias.nombre', ['id' => auth()->User()->estado_id]);
            }else
            {
                $mun_o_pq = DB::select('select COUNT(*) as avv_count, municipios.nombre from avvs INNER JOIN municipios on avvs.municipio_id = municipios.municipio_id and avvs.estado_id = :id GROUP BY municipios.nombre', ['id' => auth()->User()->estado_id]);
            }
            $servicios_cercanos = DB::select('select COUNT(*) as avv_count, servicios_cercanos.nombre from avvs INNER JOIN servicios_cercanos on avvs.servicios_cercanos_id = servicios_cercanos.id and avvs.estado_id = :id GROUP BY servicios_cercanos.nombre', ['id' => auth()->User()->estado_id]);
            $prefactibilidades = DB::select('select COUNT(*) as avv_count, prefactibilidads.nombre from avvs INNER JOIN prefactibilidads on avvs.prefactibilidad_id = prefactibilidads.id and avvs.estado_id = :id GROUP BY prefactibilidads.nombre', ['id' => auth()->User()->estado_id]);
            $factibilidad_servicios = DB::select('select COUNT(*) as avv_count, factibilidad_servicios.nombre from avvs INNER JOIN factibilidad_servicios on avvs.factibilidad_servicio_id = factibilidad_servicios.id and avvs.estado_id = :id GROUP BY factibilidad_servicios.nombre', ['id' => auth()->User()->estado_id]);
            $salida_cartograficas = DB::select('select COUNT(*) as avv_count, salida_cartograficas.nombre from avvs INNER JOIN salida_cartograficas on avvs.salida_cartografica_id = salida_cartograficas.id and avvs.estado_id = :id GROUP BY salida_cartograficas.nombre', ['id' => auth()->User()->estado_id]);
            $levantamiento_topograficos = DB::select('select COUNT(*) as avv_count, levantamiento_topograficos.nombre from avvs INNER JOIN levantamiento_topograficos on avvs.levantamiento_topografico_id = levantamiento_topograficos.id and avvs.estado_id = :id GROUP BY levantamiento_topograficos.nombre', ['id' => auth()->User()->estado_id]);
            $estudio_suelos = DB::select('select COUNT(*) as avv_count, estudio_suelos.nombre from avvs INNER JOIN estudio_suelos on avvs.estudio_suelo_id = estudio_suelos.id and avvs.estado_id = :id GROUP BY estudio_suelos.nombre', ['id' => auth()->User()->estado_id]);
            $propiedad_terrenos = DB::select('select COUNT(*) as avv_count, propiedad_terrenos.nombre from avvs INNER JOIN propiedad_terrenos on avvs.propiedad_terreno_id = propiedad_terrenos.id and avvs.estado_id = :id GROUP BY propiedad_terrenos.nombre', ['id' => auth()->User()->estado_id]);

            // variables FMH
            $implantaciones = DB::select('select COUNT(*) as avv_count, implantacions.nombre from avvs INNER JOIN implantacions on avvs.implantacion_id = implantacions.id and avvs.estado_id = :id GROUP BY implantacions.nombre', ['id' => auth()->User()->estado_id]);
            $proyectos = DB::select('select COUNT(*) as avv_count, proyectos.nombre from avvs INNER JOIN proyectos on avvs.proyecto_id = proyectos.id and avvs.estado_id = :id GROUP BY proyectos.nombre', ['id' => auth()->User()->estado_id]);
            $avance00a24 = DB::select('select avance_total from requerimientos_fmhs INNER JOIN avvs on requerimientos_fmhs.id = avvs.requerimientos_fmh_id where avance_total < 25 and avvs.estado_id = :id', ['id' => auth()->User()->estado_id]);
            $avance25a49 = DB::select('select  avance_total from requerimientos_fmhs INNER JOIN avvs on requerimientos_fmhs.id = avvs.requerimientos_fmh_id where avance_total BETWEEN 25 and 49 AND avvs.estado_id = :id', ['id' => auth()->User()->estado_id]);
            $avance50a74 = DB::select('select avance_total from requerimientos_fmhs INNER JOIN avvs on requerimientos_fmhs.id = avvs.requerimientos_fmh_id where avance_total BETWEEN 50 and 74 AND avvs.estado_id = :id', ['id' => auth()->User()->estado_id]);
            $avance75a100 = DB::select('select avance_total from requerimientos_fmhs INNER JOIN avvs on requerimientos_fmhs.id = avvs.requerimientos_fmh_id where avance_total > 75 and avvs.estado_id = :id', ['id' => auth()->User()->estado_id]);

            // dd($avance00a24);

            $preregistro = avv::where('preregistro', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel1 = avv::where('nivel1', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel2 = avv::where('nivel2', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel3 = avv::where('nivel3', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel4 = avv::where('nivel4', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel5 = avv::where('nivel5', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel6 = avv::where('nivel6', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            $nivel7 = avv::where('nivel7', 1)->where('estado_id', '=', auth()->User()->estado_id)->get();
            //$avvs = avv::orderBy('id', 'Asc')->paginate(10);
            return view('home')->with(compact('avvs',
                                              'avv',
                                              'nivel1',
                                              'nivel2',
                                              'nivel3',
                                              'nivel4',
                                              'nivel5',
                                              'nivel6',
                                              'nivel7',
                                              'preregistro',
                                              'mun_o_pq',
                                              'servicios_cercanos',
                                              'prefactibilidades',
                                              'factibilidad_servicios',
                                              'salida_cartograficas',
                                              'levantamiento_topograficos',
                                              'estudio_suelos',
                                              'propiedad_terrenos',
                                              'implantaciones',
                                              'proyectos',
                                              'avance00a24',
                                              'avance25a49',
                                              'avance50a74',
                                              'avance75a100'
                                            ));
        }
        if (auth()->user()->estado_id == 25 || auth()->user()->admin)
        {
            $avv = avv::all();
            $estados = DB::select('select COUNT(*) as avv_count, estados.nombre from avvs INNER JOIN estados on avvs.estado_id = estados.id GROUP BY estados.nombre');
            $preregistro = avv::where('preregistro', 1)->get();
            $nivel1 = avv::where('nivel1', 1)->get();
            $nivel2 = avv::where('nivel2', 1)->get();
            $nivel3 = avv::where('nivel3', 1)->get();
            $nivel4 = avv::where('nivel4', 1)->get();
            $nivel5 = avv::where('nivel5', 1)->get();
            $nivel6 = avv::where('nivel6', 1)->get();
            $nivel7 = avv::where('nivel7', 1)->get();

            $implantaciones = implantacion::select(['nombre'])->withCount('avv')->get();
            $proyectos = proyecto::select(['nombre'])->withCount('avv')->get();
            $avance00a24 = requerimientos_fmh::where('avance_total', '<', '25')->get();
            $avance25a49 = requerimientos_fmh::where('avance_total', '>', '24')->where('avance_total','<','50')->get();
            $avance50a74 = requerimientos_fmh::where('avance_total', '>', '49')->where('avance_total','<','75')->get();
            $avance75a100 = requerimientos_fmh::where('avance_total', '>', '74')->get();

            // dd($avance25a49);

            //GRAFICAS DE INTU
            $servicios_cercanos = serviciosCercanos::select(['nombre'])->withCount('avv')->get();
            $prefactibilidades = prefactibilidad::select(['nombre'])->withCount('avv')->get();
            $factibilidad_servicios = factibilidad_servicio::select(['nombre'])->withCount('avv')->get();
            $salida_cartograficas = salidaCartografica::select(['nombre'])->withCount('avv')->get();
            $levantamiento_topograficos = levantamiento_topografico::select(['nombre'])->withCount('avv')->get();
            $estudio_suelos = estudio_suelo::select(['nombre'])->withCount('avv')->get();
            $propiedad_terrenos = propiedad_terreno::select(['nombre'])->withCount('avv')->get();

            //dd($implantaciones);
            return view('home')->with(compact('avv', 
                                              'estados', 
                                              'implantaciones', 
                                              'factibilidad_servicios',
                                              'preregistro',
                                              'servicios_cercanos',
                                              'prefactibilidades',
                                              'proyectos',
                                              'salida_cartograficas',
                                              'levantamiento_topograficos',
                                              'estudio_suelos',
                                              'propiedad_terrenos',
                                              'nivel1',
                                              'nivel2',
                                              'nivel3',
                                              'nivel4',
                                              'nivel5',
                                              'nivel6',
                                              'nivel7',
                                              'avance00a24',
                                              'avance25a49',
                                              'avance50a74',
                                              'avance75a100'));
        }
    }
}
