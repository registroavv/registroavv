<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parroquia;
use App\Models\municipio;
use App\Models\estado;

class GeoController extends Controller
{
    public function municipio(Request $request, $id)
    {
    	if ($request->ajax()){
    		$municipios = municipio::municipios($id);
            //dd($parroquias);
    		return response()->json($municipios);
    	}
    }
    public function parroquia(Request $request, $id)
    {
    	if ($request->ajax()){
    		$parroquias = parroquia::parroquias($id);
            //dd($parroquias);
    		return response()->json($parroquias);
    	}
    }
}
