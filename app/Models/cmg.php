<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cmg extends Model
{
    public function avv()
    {
        return $this->hasMany(avv::class);
    }
}