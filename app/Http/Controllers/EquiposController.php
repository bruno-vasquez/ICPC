<?php
// app/Http/Controllers/EquiposController.php

namespace App\Http\Controllers;

use App\Models\Equipos;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    public function index()
    {
        $equipos = Equipos::all();
        return $equipos;
    }

  
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombreEquipo' => 'required | max:30',

            'nombreCoach' => 'required | min:3 | max:30' ,
            'edadCoach' => 'required' ,
            'carreraCoach' => 'required | min:3 | max:50' ,
            'emailCoach' => 'required' ,
            'numeroCoach' => 'required' ,
            'universidadCoach' => 'required' ,
            'semestreCoach' => 'required' ,

            'nombre1' => 'required | min:3 | max:30' ,
            'edad1' => 'required' ,
            'carrera1' => 'required | min:3 | max:50' ,
            'universidad1' => 'required' ,

            'nombre2' => 'required | min:3 | max:30' ,
            'edad2' => 'required' ,
            'carrera2' => 'required | min:3 | max:50' ,
            'universidad2' => 'required',
    ]);
    $equipos = new Equipos();
    $equipos->nombreEquipo = $request->nombreEquipo;

    $equipos->nombreCoach = $request->nombreCoach;
    $equipos->edadCoach = $request->edadCoach;
    $equipos->carreraCoach = $request->carreraCoach;
    $equipos->codSISCoach = $request->codSISCoach;
    $equipos->emailCoach = $request->emailCoach;
    $equipos->numeroCoach = $request->numeroCoach;
    $equipos->universidadCoach = $request->universidadCoach;
    $equipos->semestreCoach = $request->semestreCoach;

    $equipos->nombre1 = $request->nombre1;
    $equipos->edad1 = $request->edad1;
    $equipos->carrera1 = $request->carrera1;
    $equipos->codSIS1 = $request->codSIS1;
    $equipos->universidad1 = $request->universidad1;

    $equipos->nombre2 = $request->nombre2;
    $equipos->edad2 = $request->edad2;
    $equipos->carrera2 = $request->carrera2;
    $equipos->codSIS2 = $request->codSIS2;
    $equipos->universidad2 = $request->universidad2;

    $equipos->nombre3 = $request->nombre3;
    $equipos->edad3 = $request->edad3;
    $equipos->carrera3 = $request->carrera3;
    $equipos->codSIS3 = $request->codSIS3;
    $equipos->universidad3 = $request->universidad3;

    $equipos->nombre4 = $request->nombre4;
    $equipos->edad4 = $request->edad4;
    $equipos->carrera4 = $request->carrera4;
    $equipos->codSIS4 = $request->codSIS4;
    $equipos->universidad4 = $request->universidad4;

    $equipos->nombre5 = $request->nombre5;
    $equipos->edad5 = $request->edad5;
    $equipos->carrera5 = $request->carrera5;
    $equipos->codSIS5 = $request->codSIS5;
    $equipos->universidad5 = $request->universidad5;

    $equipos->nombre6 = $request->nombre6;
    $equipos->edad6 = $request->edad6;
    $equipos->carrera6 = $request->carrera6;
    $equipos->codSIS6 = $request->codSIS6;
    $equipos->universidad6 = $request->universidad6;
    
    $equipos->save();
    return $equipos;
    }

    public function show($id)
    {
        $equipos=Equipos::find($id);
        return $equipos;
    }
    public function destroy($id)
    {
        $equipos = Equipos::destroy($id);
        return $equipos;
    }
}
