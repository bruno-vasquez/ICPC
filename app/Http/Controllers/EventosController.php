<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Models\TipoEventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

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
            'nombre' => 'required|min:3|max:30',
            'descripcion' => 'required|min:4|max:100',
            'fechaIni' => 'required',
            'fechaFin' => 'required',
            'requisitos' => 'required',
            'encargado' => 'required|min:3|max:40',
            'lugar' => 'required|min:3|max:20',
            'estado' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,svg'
        ]);

        $eventos = new Eventos();
        $eventos->nombre = $request->nombre;
        $eventos->descripcion = $request->descripcion;
        $eventos->fechaIni = $request->fechaIni;
        $eventos->fechaFin = $request->fechaFin;
        $eventos->requisitos = $request->requisitos;
        $eventos->encargado = $request->encargado;
        $eventos->lugar = $request->lugar;
        $eventos->estado = $request->estado;

        // Verificar si se proporcionó una imagen
        if ($request->hasFile('imagen')) {
            $rutaGuardarImg = 'imagen/';

            $imagenEvento = uniqid() . '_' . date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();

            // Utilizamos el disco "public" de Laravel para almacenar la imagen
            Storage::disk('public')->putFileAs($rutaGuardarImg, $request->file('imagen'), $imagenEvento);

            // Almacenar solo el nombre del archivo en la base de datos
            $eventos->imagen = $imagenEvento;

            // Construir la URL completa utilizando asset()
            $urlImagen = asset("storage/{$rutaGuardarImg}{$imagenEvento}");
        }

        $eventos->id_tipoEventos = $request->id_tipoEventos;

        $eventos->save();

        // Devolver la URL completa si se proporcionó una imagen
        return response()->json(['eventos' => $eventos, 'urlImagen' => $urlImagen ?? null]);
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
        $eventos -> estado = $request -> estado;
        $eventos -> id_tipoEventos = $request -> id_tipoEventos;
        if ($request->file('imagen')) {
            // Eliminamos la imagen anterior (opcional)
            Storage::disk('public')->delete($eventos->imagen);
    
            // Directorio para almacenar las imágenes
            $rutaGuardarImg = 'imagen/';
    
            // Nombre de la nueva imagen
            $imagenEvento = date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();
    
            try {
                // Almacenamos la nueva imagen
                $request->file('imagen')->storeAs($rutaGuardarImg, $imagenEvento, 'public');
    
                // Actualizamos el campo de imagen en el modelo
                $eventos->update(['imagen' => "{$rutaGuardarImg}{$imagenEvento}"]);
    
            } catch (\Exception $e) {
                \Log::error('Error al actualizar la imagen: ' . $e->getMessage());
                return response()->json(['error' => 'Error al actualizar la imagen'], 500);
            }
        }
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