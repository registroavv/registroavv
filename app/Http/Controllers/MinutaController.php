<?php

namespace App\Http\Controllers;
use App\Models\minuta;

use Illuminate\Http\Request;

class MinutaController extends Controller
{
    public function buscarminuta(Request $request, $id)
    {
    	if ($request->ajax()){
    		$minutas = minuta::minutas($id);
            //dd($minutas);
    		return response()->json($minutas);
    	}
    }
}