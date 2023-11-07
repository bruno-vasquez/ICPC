<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','fechaIni', 'fechaFin','requisitos', 
                            'encargado', 'email', 'lugar', 'costo','estado','imagen'];
    public function tipoCompetencias()
    { 
        return $this->belongsTo(TipoCompetencias::class, 'id_tipoCompetencias');
    }
}
