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
        $eventos=Eventos::all();
        return $eventos;
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
            'descripcion' => 'required  | min:4 | max:100' ,
            'fechaIni' => 'required' ,
            'fechaFin' => 'required' ,
            'requisitos' => 'required' ,
            'encargado' => 'required | alpha | min:3 | max:40' ,
            'lugar' => 'required | min:3 | max:20' ,
        ]);
        
        $eventos = new Eventos ();
        $eventos -> nombre = $request -> nombre;
        $eventos -> descripcion = $request -> descripcion;
        $eventos -> fechaIni = $request -> fechaIni;
        $eventos -> fechaFin = $request -> fechaFin;
        $eventos -> requisitos = $request -> requisitos;
        $eventos -> encargado = $request -> encargado;
        $eventos -> lugar = $request -> lugar;
        $eventos -> id_tipoEventos = $request -> id_tipoEventos;

        $eventos -> save();
        return $eventos;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventos=Eventos::find($id);
        return $eventos;
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
        $eventos -> descripcion = $request -> descripcion;
        $eventos -> fechaIni = $request -> fechaIni;
        $eventos -> fechaFin = $request -> fechaFin;
        $eventos -> requisitos = $request -> requisitos;
        $eventos -> encargado = $request -> encargado;
        $eventos -> lugar = $request -> lugar;
        $eventos -> id_tipoEventos = $request -> id_tipoEventos;

        $eventos -> save();
        return $eventos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventos = Eventos::destroy($id);
        return $eventos;
    }
}
