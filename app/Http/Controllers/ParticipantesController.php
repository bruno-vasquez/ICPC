<?php

namespace App\Http\Controllers;

use App\Models\Participantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantes=Participantes::all();
        return $participantes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nombre' => 'required | min:3 | max:30' ,
            'apellidos' => 'required | min:3 | max:30' ,
            'fecha_Nacimiento' => 'required' ,
            'ci' => 'required' ,
            'telefono' => 'required | max:8' ,
            'email' => 'required' ,
            'carrera' => 'min:3 | max:20',
        ]);
        $participantes = new Participantes ();
        $participantes->nombre = $request->nombre;
        $participantes->apellidos = $request->apellidos;
        $participantes->semestre = $request->semestre;
        $participantes->fecha_Nacimiento = $request->fecha_Nacimiento;
        $participantes->ci = $request->ci;
        $participantes->telefono = $request->telefono;
        $participantes->email = $request->email;
        $participantes->carrera = $request->carrera;
        $participantes->codSIS = $request->codSIS;

        $participantes->save();
        return $participantes;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participantes=Participantes::find($id);
        return $participantes;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function edit(Participantes $participantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participantes $participantes)
    {
        $validation = $request->validate([
            'nombre' => 'required | min:3 | max:30' ,
            'apellidos' => 'required | min:3 | max:30' ,
            'fecha_Nacimiento' => 'required' ,
            'ci' => 'required' ,
            'telefono' => 'required | max:8' ,
            'email' => 'required' ,
            'carrera' => 'min:3 | max:20',
        ]);
        $participantes = Participantes::findOrFail ($request->id);
        $participantes = new Participantes ();
        $participantes->nombre = $request->nombre;
        $participantes->apellidos = $request->apellidos;
        $participantes->semestre = $request->semestre;
        $participantes->fecha_Nacimiento = $request->fecha_Nacimiento;
        $participantes->ci = $request->ci;
        $participantes->telefono = $request->telefono;
        $participantes->email = $request->email;
        $participantes->carrera = $request->carrera;
        $participantes->codSIS = $request->codSIS;

        $participantes->save();
        return $participantes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Participantes  $participantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participantes = Participantes::destroy($id);
        return $participantes;
    }
}