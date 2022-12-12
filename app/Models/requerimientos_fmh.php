<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requerimientos_fmh extends Model
{
    public function avvs()
    {
        return $this->belongsTo(avvs::class);
    }
}
