<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\TipoCompetencias;
use Illuminate\Support\Facades\Storage;
use File;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competencias=Competencias::all();
        return $competencias;
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
            'descripcion' => 'required | min:4 | max:400' ,
            'fechaIni' => 'required' ,
            'fechaFin' => 'required' ,
            'requisitos' => 'required' ,
            'encargado' => 'required | min:3 | max:70' ,
            'email' => 'required' ,
            'lugar' => 'required | min:3 | max:60' ,
            'costo' => 'required',
            'estado' => 'required',
        ]);
       
      $competencias = new Competencias();
      $competencias -> nombre = $request -> nombre;
        $competencias -> descripcion = $request -> descripcion;
        $competencias -> fechaIni = $request -> fechaIni;
        $competencias -> fechaFin = $request -> fechaFin;
        $competencias -> requisitos = $request -> requisitos;
        $competencias -> encargado = $request -> encargado;
        $competencias -> email = $request -> email;
        $competencias -> lugar = $request -> lugar;
        $competencias -> costo = $request -> costo;
        $competencias -> horarios = $request -> horarios;
        $competencias -> estado = $request -> estado;
        $eventos->umss = $request->umss;

      
      if ($request->hasFile('imagen')) 
      {
        $rutaGuardarImg = 'imagen/';
        $imagenCompetencia = uniqid() . '_' . date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();

        // Utilizamos el disco "public" de Laravel para almacenar la imagen
        Storage::disk('public')->putFileAs($rutaGuardarImg, $request->file('imagen'), $imagenCompetencia);

        // Construir la URL completa utilizando asset()
        $urlImagen = asset("storage/{$rutaGuardarImg}{$imagenCompetencia}");

        // Asignar la URL completa a la propiedad en el modelo
        $competencias->imagen = $urlImagen;
    }
      $competencias -> id_tipoCompetencias = $request -> id_tipoCompetencias;

      $competencias -> save();
      return $competencias;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $competencias=Competencias::find($id);
        return $competencias;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competencias $competencias)
    {
        $competencias = Competencias::findOrFail ($request->id);
        $competencias -> nombre = $request -> nombre;
        $competencias -> descripcion = $request -> descripcion;
        $competencias -> fechaIni = $request -> fechaIni;
        $competencias -> fechaFin = $request -> fechaFin;
        $competencias -> requisitos = $request -> requisitos;
        $competencias -> encargado = $request -> encargado;
        $competencias -> email = $request -> email;
        $competencias -> lugar = $request -> lugar;
        $competencias -> costo = $request -> costo;
        $competencias -> horarios = $request -> horarios;
        $competencias -> estado = $request -> estado;
        $eventos->umss = $request->umss;


        if ($request->hasFile('imagen')) 
        {
            $rutaGuardarImg = 'imagen/';
            $imagenCompetencia = uniqid() . '_' . date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();
            Storage::disk('public')->putFileAs($rutaGuardarImg, $request->file('imagen'), $imagenCompetencia);
    
            // Construir la URL completa utilizando asset()
            $urlImagen = asset("storage/{$rutaGuardarImg}{$imagenCompetencia}");
    
            // Asignar la URL completa a la propiedad en el modelo
            $competencias->imagen = $urlImagen;
        }
        $competencias->id_tipoCompetencias = $request->id_tipoCompetencias;
        // Guardar los cambios en la base de datos    
        $competencias -> save();
        return $competencias;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $competencias = Competencias::destroy($id);
        return $competencias;
    }
    public function obtenerCompetenciasEnRangoDeFechas($fechaInicio, $fechaFin)
    {
        $competencias = Competencias::whereBetween('fechaIni', [$fechaInicio, $fechaFin])
                        ->orWhereBetween('fechaFin', [$fechaInicio, $fechaFin])
                        ->get();

        return $competencias;
    }
}