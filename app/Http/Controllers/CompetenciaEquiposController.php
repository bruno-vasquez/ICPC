<?php

// app/Http/Controllers/competenciasequiposController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\Equipos;
use Illuminate\Support\Facades\DB;


class CompetenciaEquiposController extends Controller
{
    public function addEquipoToCompetencia($competencia_id, $equipo_id)
    {
        $competencias = Competencias::find($competencia_id);
        $equipos = Equipos::where('id', $equipo_id)->first();
        if ($competencias && $equipos) 
        {
            $competencias->equipos()->attach($equipos->id);
            return response()->json(['message' => 'Equipo añadido a la competencia']);
        }

    return response()->json(['error' => 'No se pudo encontrar la competencia o el equipo'], 404);
    }
/*
    public function removeEquipoFromCompetencia($competencia_Id, $equipo_Id)
    {
        $competencias = Competencias::find($competencia_Id);
        $equipos = Equipos::find($equipo_Id);

        if ($competencias && $equipos) {
            $competencias->equipos()->detach($equipos->id);
            return response()->json(['message' => 'Equipo eliminado de la competencia']);
        }
        return response()->json(['error' => 'No se pudo encontrar la competencia o el equipo'], 404);
    }
    */
    public function getEquiposForCompetencia($competencia_id)
    {
        $competencias = Competencias::with('equipos')->find($competencia_id);

        if ($competencias) {
            $equipos = $competencias->equipos;
            return $equipos;
        }

        return response()->json(['error' => 'No se pudo encontrar el Competencia'], 404);
    }
    public function getEmailsEquipos($competencia_id)
    {
        // Obtener el competencia con los participantes relacionados
        $competencias = Competencias::with('equipos')->find($competencia_id);

        // Verificar si el competencia existe
        if ($competencias) 
        {
            // Obtener la colección de participantes
            $equipos = $competencias->equipos;

            // Obtener los correos electrónicos de los participantes
            $emails = $equipos->pluck('emailCoach');

            return $emails;
        }
        // Si el competencia no se encuentra, devolver un error
        return response()->json(['error' => 'No se pudo encontrar el competencia'], 404);
    }  
}

