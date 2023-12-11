<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEventos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function eventos()
    { 
        return $this->hasMany(Eventos::class, 'id');
    }
}
