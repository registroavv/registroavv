<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saime extends Model
{
    public function genero()
    {
        return $this->belongsTo(genero::class);
    }
	public function avv()
	{
		return $this->hasMany(avv::class);
	}
	public function getNombreCompletoAttribute() 
	{ 
 		return $this->attributes['nombre1'] .' '. $this->attributes['nombre2']; 
 	}
	public function getApellidoCompletoAttribute() 
	{ 
 		return $this->attributes['apellido1'] .' '. $this->attributes['apellido2']; 
 	}	
 	public function getNombreApellidoCompletoAttribute() 
	{ 
 		return$this->attributes['nombre1'] .' '. $this->attributes['nombre2'] .' '. $this->attributes['apellido1'] .' '. $this->attributes['apellido2'];
 	}
	public function scopecedula($query, $cedula)
	{
		if($cedula)
			return $query->where('cedula', 'like', "%$cedula%" );
	}    
}
