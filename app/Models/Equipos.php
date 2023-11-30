<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreLider', 'edadLider', 'carreraLider', 'codSISLider', 'emailLider', 'numeroLider', 'universidadLider', 'semestreLider',
        'nombre1', 'edad1', 'carrera1', 'codSIS1', 'universidad1',
        'nombre2', 'edad2', 'carrera2', 'codSIS2', 'universidad2',
        'nombre3', 'edad3', 'carrera3', 'codSIS3', 'universidad3',
        'nombre4', 'edad4', 'carrera4', 'codSIS4', 'universidad4',
        'nombre5', 'edad5', 'carrera5', 'codSIS5', 'universidad5',
        'nombre6', 'edad6', 'carrera6', 'codSIS6', 'universidad6',
    ];
    public function competencias()
    {
        return $this->belongsToMany(Competencia::class, 'competencia_equipos', 'competencia_id','equipo_id');
    }
    // Puedes agregar relaciones o métodos adicionales aquí según tus necesidades
}