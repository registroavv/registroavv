<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    public function municipio()
    {
        return $this->hasMany(municipio::class);
    }
    public function avv()
    {
        return $this->hasMany(avv::class);
    }
    public function user()
    {
        return $this->hasMany(user::class);
    }  
}
