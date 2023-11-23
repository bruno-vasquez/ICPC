<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios=Usuarios::all();
        return $usuarios;
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
        $usuarios = new Usuarios ();
        $usuarios->nombre = $request->nombre;
        $usuarios->apellidos = $request->apellidos;
        $usuarios->contraseña = $request->contraseña;
        $usuarios->fecha_Nacimiento = $request->fecha_Nacimiento;
        $usuarios->ci = $request->ci;
        $usuarios->telefono = $request->telefono;
        $usuarios->email = $request->email;
        $usuarios->carrera = $request->carrera;
        $usuarios->codSIS = $request->codSIS;

        $usuarios->save();
        return $usuarios;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarios=Usuarios::find($id);
        return $usuarios;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        $usuarios = Usuarios::findOrFail ($request->id);
        $usuarios = new Usuarios ();
        $usuarios->nombre = $request->nombre;
        $usuarios->apellidos = $request->apellidos;
        $usuarios->contraseña = $request->contraseña;
        $usuarios->fecha_Nacimiento = $request->fecha_Nacimiento;
        $usuarios->ci = $request->ci;
        $usuarios->telefono = $request->telefono;
        $usuarios->email = $request->email;
        $usuarios->carrera = $request->carrera;
        $usuarios->codSIS = $request->codSIS;

        $usuarios->save();
        return $usuarios;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuarios = Usuarios::destroy($id);
        return $usuarios;
    }
}