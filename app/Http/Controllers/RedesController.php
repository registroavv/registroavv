<?php

namespace App\Http\Controllers;
use App\Models\avv;
use App\Models\estado;
use App\Models\municipio;
use App\Models\parroquia;
use App\Models\genero;
use App\Models\organo;
use Carbon\Carbon;

use Illuminate\Http\Request;

class RedesController extends Controller
{
    public function home()
    {
        $avvs = avv::where('estado_id', '=', auth()->User()->estado_id)->orderBy('id', 'Asc')->paginate(10);
        //$avvs = avv::orderBy('id', 'Asc')->paginate(10);
        return view('home')->with(compact('avvs'));
    }
    
    public function index()
    {
        $avvs = avv::where('estado_id', '=', auth()->User()->estado_id)->orderBy('id', 'Asc')->paginate(10);
        //$avvs = avv::orderBy('id', 'Asc')->paginate(10);
        return view('redes.index')->with(compact('avvs'));
    }
    public function create()
    {
        $estados = estado::where('estado_id', '=', auth()->User()->estado_id)->pluck('nombre', 'id');
        $municipios = municipio::pluck('nombre', 'id');
        $parroquias = parroquia::pluck('nombre','id');
        $generos = genero::pluck('nombre', 'id');
        $organos = organo::pluck('nombre', 'id');

        return view('redes.create')->with(compact('estados', 'generos', 'organos'));
    }
    public function edit($id)
    {
        $avvs = avv::find($id);
        $estados = estado::where('estado_id', '=', auth()->User()->estado_id)->pluck('nombre', 'id');
        $municipios = municipio::where('estado_id', '=', auth()->User()->estado_id)->pluck('nombre', 'id');
        $parroquias = parroquia::where('municipio_id', '=', $avvs->municipio_id)->pluck('nombre', 'id');
        $organos = organo::pluck('nombre', 'id');

        return view('redes.edit')->with(compact('estados', 'municipios', 'parroquias', 'organos','avvs'));
    }
    public function save(Request $request)
    {
        $avv = new avv();

        $avv->estado_id = $request->input('estado');
        $avv->municipio_id = $request->input('municipio');
        $avv->parroquia_id = $request->input('parroquia');

        $avv->nombre = $request->input('nombre');
        $avv->fecha = Carbon::now();
        $avv->direccion = $request->input('direccion');
        $avv->codigo = $request->input('codigo');
        $avv->latitud = $request->input('latitud');
        $avv->longitud = $request->input('longitud');
        $avv->cant_viviendas = $request->input('viviendas');
        $avv->cant_personas = $request->input('personas');
        $avv->organo_id = $request->input('organo');

        $avv->save();
        return redirect('avv');
    }
    public function update(Request $request, $id)
    {
        $avv = avv::find($id);

        $avv->estado_id = $request->input('estado');
        $avv->municipio_id = $request->input('municipio');
        $avv->parroquia_id = $request->input('parroquia');

        $avv->nombre = $request->input('nombre');
        $avv->fecha = Carbon::now();
        $avv->direccion = $request->input('direccion');
        $avv->codigo = $request->input('codigo');
        $avv->latitud = $request->input('latitud');
        $avv->longitud = $request->input('longitud');
        $avv->cant_viviendas = $request->input('viviendas');
        $avv->cant_personas = $request->input('personas');
        $avv->organo_id = $request->input('organo');

        $avv->save();
        return redirect('avv');
    }
    public function destroy($id)
    {
    	$avv = avv::find($id);
    	$avv->delete();
        
        $eliminado = 'LA LINEA DE PRODUCCION SE ELIMINO CON EXITO';
    	return redirect('avv');
    }
}
