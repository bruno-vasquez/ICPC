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
        return $this->belongsToMany(Participantes::class, 'competencia_participantes', 'competencia_individual_ganadores' ,'competencia_id', 'participante_id');
    } 
    public function equipos()
    {
        return $this->belongsToMany(Equipos::class, 'competencia_equipos', 'competencia_id', 'equipo_id');
    } 
    
}
