<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','fechaIni', 'fechaFin','requisitos', 
                            'encargado', 'email', 'lugar', 'costo','estado','umss','horarios','imagen'];
    public function tipoCompetencias()
    { 
        return $this->belongsTo(TipoCompetencias::class, 'id_tipoCompetencias');
    }
    public function participantes()
    {
        return $this->belongsToMany(Participantes::class, 'competencia_participantes' ,'competencia_id', 'participante_id');
    } 
    public function equipos()
    {
        return $this->belongsToMany(Equipos::class, 'competencia_equipos', 'competencia_id', 'equipo_id');
    } 
    public function ganadoresIndividual()
    {
        return $this->belongsToMany(Participantes::class, 'comp_individual_ganadores', 'competencia_id', 'participante_id');
        //return $this->belongsToMany(Participantes::class, 'comp_individual_ganadores', 'competencia_id', 'participante_id1')->withPivot('participante_id1', 'participante_id2', 'participante_id3');
    }
    public function ganadoresEquipos()
    {
        return $this->belongsToMany(Equipos::class, 'comp_equipos_ganadores', 'competencia_id', 'equipo_id');
    }
}