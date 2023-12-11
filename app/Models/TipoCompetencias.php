<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCompetencias extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function competencias()
    { 
        return $this->hasMany(Competencias::class, 'id');
    }
}
