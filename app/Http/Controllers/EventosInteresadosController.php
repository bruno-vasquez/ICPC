<?php

// app/Http/Controllers/EventosInteresadosController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Eventos;
use App\Models\Interesados;


class EventosInteresadosController extends Controller
{
    public function addInteresadoToEvento($eventoId, $interesadoId)
    {
        $eventos = Eventos::where('id', $eventoId)->first();
        $interesados = Interesados::where('id', $interesadoId)->first();
        info($eventos);
        if ($eventos && $interesados) 
        {
            $eventos->interesados()->attach($interesados->id);
            return response()->json(['message' => 'Usuario añadido a la competencia']);
        }

    return response()->json(['error' => 'No se pudo encontrar la competencia o el usuario'], 404);
    }

    public function removeInteresadoFromEvento($eventoId, $interesadoId)
    {
        $eventos = Eventos::find($eventoId);
        $interesados = Interesados::find($interesadoId);

        if ($eventos && $interesados) {
            $eventos->interesado()->detach($interesados->id);
            return response()->json(['message' => 'Usuario eliminado de la competencia']);
        }
        return response()->json(['error' => 'No se pudo encontrar la competencia o el usuario'], 404);
    }
}

