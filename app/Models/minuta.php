<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class minuta extends Model
{
    public function avvs()
    {
        return $this->belongsTo(avvs::class);
    }
    public static function minutas($id)
    {
        return minuta::where('codigo_avv','=',$id)->orderBy('created_at', 'Desc')->get();
    }
}