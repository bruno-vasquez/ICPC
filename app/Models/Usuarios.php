<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellidos','contraseña','ci', 'fecha_Nacimiento','telefono', 
                            'email', 'carrera','codSIS']; 
}
