<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competencias;
use App\Models\TipoCompetencias;

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

            'nombre' => 'required | min:3 | max:30' ,
            'descripcion' => 'required | min:4 | max:100' ,
            'fechaIni' => 'required' ,
            'fechaFin' => 'required' ,
            'requisitos' => 'required' ,
            'encargado' => 'required | min:3 | max:40' ,
            'email' => 'required' ,
            'lugar' => 'required | min:3 | max:20' ,
            'costo' => 'required',
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
      $competencias -> estado = $request -> estado;
      if($imagen = $request->file('imagen'))
      {
          $rutaGuardarImg = 'imagen/';
          $imagenCompetencia = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
          $imagen->move($rutaGuardarImg, $imagenCompetencia);
          $competencias['imagen'] = "$imagenCompetencia";
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
    public function update(Request $request, $id)
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
        $competencias -> id_tipoCompetencias = $request -> id_tipoCompetencias;
        if($imagen = $request->file('imagen'))
        {
            $rutaGuardarImg = 'imagen/';
            $imagenCompetencia = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenCompetencia);
            $competencias['imagen'] = "$imagenCompetencia";
        }
        else
        {
            unset($prod['imagen']);
        }
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
}