<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parroquia extends Model
{
    public function avv()
    {
        return $this->hasMany(avv::class);
    }
    public function municipios()
    {
        return $this->belongsTo(municipio::class);
    }

    public static function parroquias($id)
    {
        return parroquia::where('municipio_id','=',$id)->get();
    }    
    public static function paq()
    {
        return parroquia::select('nombre', 'id')->distinct('id')->get();
    }
}
