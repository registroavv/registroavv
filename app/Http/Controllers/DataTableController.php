<?php

namespace App\Http\Controllers;
use App\Models\avv;
use Datatables;


use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function avvs(){

        $avv = avv::all();

        return Datatables::of($avv)->make(true);
    }
}