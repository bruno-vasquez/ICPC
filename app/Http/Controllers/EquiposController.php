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
    $equipos = new Equipos();

    $equipos->nombreLider = $request->nombreLider;
    $equipos->edadLider = $request->edadLider;
    $equipos->carreraLider = $request->carreraLider;
    $equipos->codSISLider = $request->codSISLider;
    $equipos->emailLider = $request->emailLider;
    $equipos->numeroLider = $request->numeroLider;
    $equipos->universidadLider = $request->universidadLider;
    $equipos->semestreLider = $request->semestreLider;

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
