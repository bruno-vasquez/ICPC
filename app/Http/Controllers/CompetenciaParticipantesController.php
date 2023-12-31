<?php

// app/Http/Controllers/competenciasparticipantesController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\Participantes;
use Illuminate\Support\Facades\DB;


class CompetenciaParticipantesController extends Controller
{
    public function addParticipanteToCompetencia($competencia_id, $participante_id)
    {
        $competencias = Competencias::find($competencia_id);
        $participantes = Participantes::where('id', $participante_id)->first();
        if ($competencias && $participantes) 
        {
            $competencias->participantes()->attach($participantes->id);
            return response()->json(['message' => 'Participante añadido a la competencia']);
        }

    return response()->json(['error' => 'No se pudo encontrar la competencia o el participante'], 404);
    }

   /* public function removeParticipanteFromCompetencia($competencia_Id, $participante_Id)
    {
        $competencias = Competencias::find($competencia_Id);
        $participantes = Participantes::find($participante_Id);

        if ($competencias && $participantes) {
            $competencias->participantes()->detach($participantes->id);
            return response()->json(['message' => 'Participante eliminado de la competencia']);
        }
        return response()->json(['error' => 'No se pudo encontrar la competencia o el participante'], 404);
    }
    */
    public function getParticipantesForCompetencia($competencia_id)
    {
        $competencias = Competencias::with('participantes')->find($competencia_id);

        if ($competencias) {
            $participantes = $competencias->participantes;
            return $participantes;
        }

        return response()->json(['error' => 'No se pudo encontrar el Competencia'], 404);
    }

    public function getEmailsParticipantes($competencia_id)
    {
        // Obtener el competencia con los participantes relacionados
        $competencias = Competencias::with('participantes')->find($competencia_id);

        // Verificar si el competencia existe
        if ($competencias) 
        {
            // Obtener la colección de participantes
            $participantes = $competencias->participantes;

            // Obtener los correos electrónicos de los participantes
            $emails = $participantes->pluck('email');

            return $emails;
        }
        // Si el competencia no se encuentra, devolver un error
        return response()->json(['error' => 'No se pudo encontrar el competencia'], 404);
    }  
}

