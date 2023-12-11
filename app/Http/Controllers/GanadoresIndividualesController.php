<?php

// app/Http/Controllers/competenciasparticipantesController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\Participantes;
use Illuminate\Support\Facades\DB;


class GanadoresIndividualesController extends Controller
{
    public function addParticipanteToCompetencia($competencia_id, $participante_id1, $participante_id2, $participante_id3 )
    {
        $competencias = Competencias::find($competencia_id);
        $participante1 = Participantes::where('id', $participante_id1)->first();
        $participante2 = Participantes::where('id', $participante_id2)->first();
        $participante3 = Participantes::where('id', $participante_id3)->first();

        if ($competencias && $participante1 && $participante2 && $participante3) 
        {
            //$competencias->participantes()->attach($participantes->id);
            $competencias->ganadores()->attach($participante1->id, ['participante_id2' => $participante2->id, 'participante_id3' => $participante3->id]);
            return response()->json(['message' => 'Ganador añadido a la competencia']);
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
    public function getGanadoresForCompetencia($competencia_id)
    {
            //$competencias = Competencias::find(1);
            $competencias = Competencias::with('ganadoresIndividual')->find($competencia_id);
            if ($competencias) {
            $ganadoresIndividual = $competencias->ganadoresIndividual;
            return $ganadoresIndividual;
        }
        return response()->json(['error' => 'No se pudo encontrar el Competencia'], 404);
    }

    public function addGanadorToCompetencia($competencia_id, $participante_id)
    {
        $competencias = Competencias::find($competencia_id);
        $participantes = Participantes::where('id', $participante_id)->first();
        if ($competencias && $participantes) 
        {
            $competencias->ganadoresIndividual()->attach($participantes->id);
            return response()->json(['message' => 'Ganador añadido a la competencia']);
        }

    return response()->json(['error' => 'No se pudo encontrar la competencia o el participante'], 404);
    }
}