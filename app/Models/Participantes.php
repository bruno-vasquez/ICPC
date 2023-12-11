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
    public function ganadoresIndividual()
    {
        return $this->belongsToMany(Competencia::class, 'comp_individual_ganadores', 'competencia_id', 'participante_id');
        //return $this->belongsToMany(Competencia::class, 'comp_individual_ganadores', 'participante_id', 'competencia_id')->withPivot('participante_id1', 'participante_id2', 'participante_id3');
    }
}
