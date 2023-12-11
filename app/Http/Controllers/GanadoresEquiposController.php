<?php

// app/Http/Controllers/competenciasparticipantesController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\Equipos;
use Illuminate\Support\Facades\DB;


class GanadoresEquiposController extends Controller
{
    public function getGanadoresForCompetencia($competencia_id)
    {
            $competencias = Competencias::with('ganadoresEquipos')->find($competencia_id);
            if ($competencias) {
            $ganadoresEquipos = $competencias->ganadoresEquipos;
            return $ganadoresEquipos;
        }
        return response()->json(['error' => 'No se pudo encontrar el Competencia'], 404);
    }

    public function addGanadorToCompetencia($competencia_id, $equipo_id)
    {
        $competencias = Competencias::find($competencia_id);
        $equipos = Equipos::where('id', $equipo_id)->first();
        if ($competencias && $equipos) 
        {
            $competencias->ganadoresEquipos()->attach($equipos->id);
            return response()->json(['message' => 'Ganador añadido a la competencia']);
        }

    return response()->json(['error' => 'No se pudo encontrar la competencia o el participante'], 404);
    }
}