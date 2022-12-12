<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    public function parroquia()
    {
        return $this->hasMany(parroquia::class);
    }
    public function avv()
    {
        return $this->hasMany(avv::class);
    }
    public function estado()
    {
        return $this->belongsTo(estado::class);
    }
    public static function municipios($id)
    {
        return municipio::where('estado_id','=',$id)->get();
    }
    public static function mun()
    {
        return municipio::select('nombre', 'id')->distinct('id')->get();
    }
}
