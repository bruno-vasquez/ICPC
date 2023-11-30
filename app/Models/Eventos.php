<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','descripcion','email','fechaIni', 'fechaFin','requisitos', 
                            'encargado', 'lugar','estado','costo','horarios','imagen']; //añadir imagen

    public function tipoEventos()
    { 
        return $this->belongsTo(TipoEventos::class, 'id_tipoEventos');
    }
    public function interesados()
    {
        return $this->belongsToMany(Interesados::class, 'evento_interesados', 'evento_id', 'interesado_id');
    } 
}
