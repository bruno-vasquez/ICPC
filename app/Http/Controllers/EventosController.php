<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\TipoEventos;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evento=Evento::all();
        return $evento;
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

            'nombre' => 'required | alpha | min:3 | max:30' ,
            'descripción' => 'required  | min:4 | max:100' ,
            'fechaIni' => 'required' ,
            'fechaFin' => 'required' ,
            'requisitos' => 'required' ,
            'encargado' => 'required | alpha | min:3 | max:40' ,
            'lugar' => 'required | min:3 | max:20' ,
        ]);
        
        $eventos = new Eventos ();
        $eventos -> nombre = $request -> nombre;
        $eventos -> descripción = $request -> descripcion;
        $eventos -> fechaIni = $request -> fechaIni;
        $eventos -> fechaFin = $request -> fechaFin;
        $eventos -> requisitos = $request -> requisitos;
        $eventos -> encargado = $request -> encargado;
        $eventos -> lugar = $request -> lugar;

        $eventos -> save();
        return $evento;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        $evento=Eventos::find($id);
        return $evento;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventos $eventos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventos $eventos)
    {
        $eventos = Eventos::findOrFail ($request->id);
        $eventos -> nombre = $request -> nombre;
        $eventos -> descripción = $request -> descripcion;
        $eventos -> fechaIni = $request -> fechaIni;
        $eventos -> fechaFin = $request -> fechaFin;
        $eventos -> requisitos = $request -> requisitos;
        $eventos -> encargado = $request -> encargado;
        $eventos -> lugar = $request -> lugar;

        $eventos -> save();
        return $evento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventos $eventos)
    {
        $evento = Eventos::destroy($id);
        return evento;
    }
}
