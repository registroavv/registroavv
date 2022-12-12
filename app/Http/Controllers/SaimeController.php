<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\saime;
use App\Models\genero;

class SaimeController extends Controller
{
	public function index(Request $request)
    {
    	$cedula  = $request->get('cedula');

    	$saimes = saime::orderBy('id', 'Asc')
			->cedula($cedula)
    		->paginate(10);
    	return view('saime.index')->with(compact('saimes'));
    }
    public function crear(Request $request)
    {
    	return view('saime.create');
    }
    public function buscarcedula(Request $request)
        {

        if($request->isMethod('post')){   // preguntas si viene del post para dejar hacer cosas en ajax
           
            $cedula = $request->cedula; //el parametro que pasas en el ajax lo tomas aqui

            $saime = saime::where('cedula','=',$cedula)->get();

            if(count($saime))
            {
                $id = $saime[0]->id;
                $nombre = $saime[0]->nombreapellidocompleto;
                $fecha_nac = $saime[0]->fecha_nac;
                $genero = $saime[0]->genero;

                return response()->json([
                'mensaje' => 'Exito',
                'saime_id' => $id,
                'nombre' => $nombre,
                'fecha_nac' => $fecha_nac
                ]);
            }else
            {
                return response()->json([
                'mensaje' => 'Fallido',
                ]);
            }
        }
    }   
    public function guardar(Request $request)
    {
    	$saime = new saime();

        $saime->cedula = $request->input('cedula');
        $saime->letra = $request->input('letra');
        $saime->nombre1 = $request->input('nombre1');
        $saime->nombre2 = $request->input('nombre2');
        $saime->apellido1 = $request->input('apellido1');
        $saime->apellido2 = $request->input('apellido2');
        $saime->genero_id = $request->input('genero');
        $saime->fecha_nac = $request->input('fecha_nac');

        $saime->save();

        return redirect('saime');
    }
    public function editar($id)
    {
        $generos = genero::pluck('nombre','id');
    	$saimes = saime::find($id);
    	return view('saime.edit')->with(compact('saimes','generos'));
    }
    public function actualizar(Request $request, $id)
    {
        $saime = saime::find($id);

        $saime->cedula = $request->input('cedula');
        $saime->letra = $request->input('letra');
        $saime->nombre1 = $request->input('nombre1');
        $saime->nombre2 = $request->input('nombre2');
        $saime->apellido1 = $request->input('apellido1');
        $saime->apellido2 = $request->input('apellido2');
        $saime->genero_id = $request->input('genero');
        $saime->fecha_nac = $request->input('fecha_nac');

        $saime->save();

        return redirect('saime');
    }    
    public function destroy($id)
    {
    	$saime = saime::find($id);
    	$saime->delete();
    
    	return redirect('saime');
    }
    public function buscar()
    {
        # code...
    }
}
