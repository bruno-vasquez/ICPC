<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','fechaIni', 'fechaFin','requisitos', 
                            'encargado', 'lugar'];
    public function tipoEventos()
    { 
        return $this->belongsTo(TipoEventos::class, 'id_tipoEventos');
    }
}
