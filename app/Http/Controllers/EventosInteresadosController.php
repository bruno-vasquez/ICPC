<?php

// app/Http/Controllers/EventosInteresadosController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Eventos;
use App\Models\Interesados;
use Illuminate\Support\Facades\DB;


class EventosInteresadosController extends Controller
{
    public function addInteresadoToEvento($evento_id, $interesado_id)
    {
        $eventos = Eventos::find($evento_id);
        $interesados = Interesados::where('id', $interesado_id)->first();
        
        if ($eventos && $interesados) 
        {
            info("hola");
            $eventos->interesados()->attach($interesados->id);
            return response()->json(['message' => 'Usuario añadido a la competencia']);
        }

    return response()->json(['error' => 'No se pudo encontrar la competencia o el usuario'], 404);
    }

    public function removeInteresadoFromEvento($evento_Id, $interesado_Id)
    {
        $eventos = Eventos::find($evento_Id);
        $interesados = Interesados::find($interesado_Id);

        if ($eventos && $interesados) {
            $eventos->interesados()->detach($interesados->id);
            return response()->json(['message' => 'Usuario eliminado de la competencia']);
        }
        return response()->json(['error' => 'No se pudo encontrar la competencia o el usuario'], 404);
    }
}

