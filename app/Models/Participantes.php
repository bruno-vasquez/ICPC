<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellidos','semestre','ci', 'fecha_Nacimiento','telefono', 
                            'email', 'carrera','codSIS']; 
    public function competencias()
    {
        return $this->belongsToMany(Competencias::class, 'competencia_participantes', 'competencia_id','participante_id');
    }
}
