<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesados extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellidos','semestre','ci', 'fecha_Nacimiento','telefono', 
                            'email', 'carrera','codSIS']; 
    public function eventos()
    {
        return $this->belongsToMany(Eventos::class, 'evento_interesados', 'evento_id','interesado_id');
    }
}
