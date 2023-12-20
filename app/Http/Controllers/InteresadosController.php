<?php

namespace App\Http\Controllers;

use App\Models\Interesados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class InteresadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interesados=Interesados::all();
        return $interesados;
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
            'nombre' => 'required | min:3 | max:50' ,
            'apellidos' => 'required | min:3 | max:50' ,
            'fecha_Nacimiento' => 'required' ,
            'ci' => 'required' ,
            'telefono' => 'required' ,
            'email' => 'required' ,
            'carrera' => 'required',
        ]);
        $interesados = new Interesados ();
        $interesados->nombre = $request->nombre;
        $interesados->apellidos = $request->apellidos;
        $interesados->semestre = $request->semestre;
        $interesados->fecha_Nacimiento = $request->fecha_Nacimiento;
        $interesados->ci = $request->ci;
        $interesados->telefono = $request->telefono;
        $interesados->email = $request->email;
        $interesados->carrera = $request->carrera;
        $interesados->codSIS = $request->codSIS;

        $interesados->save();
        return $interesados;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interesados  $interesados
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interesados=Interesados::find($id);
        return $interesados;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interesados  $interesados
     * @return \Illuminate\Http\Response
     */
    public function edit(Interesados $interesados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interesados  $interesados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interesados $interesados)
    { 
        $validation = $request->validate([
            'nombre' => 'required | min:3 | max:50' ,
            'apellidos' => 'required | min:3 | max:50' ,
            'fecha_Nacimiento' => 'required' ,
            'ci' => 'required' ,
            'telefono' => 'required' ,
            'email' => 'required' ,
            'carrera' => 'min:3 | max:50',
        ]);
        $interesados = Interesados::findOrFail ($request->id);
        $interesados->nombre = $request->nombre;
        $interesados->apellidos = $request->apellidos;
        $interesados->semestre = $request->semestre;
        $interesados->fecha_Nacimiento = $request->fecha_Nacimiento;
        $interesados->ci = $request->ci;
        $interesados->telefono = $request->telefono;
        $interesados->email = $request->email;
        $interesados->carrera = $request->carrera;
        $interesados->codSIS = $request->codSIS;

        $interesados->save();
        return $interesados;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interesados  $interesados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interesados = Interesados::destroy($id);
        return $interesados;
    }
}