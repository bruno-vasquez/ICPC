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
            'nombre' => 'required|min:3|max:50',
            'descripcion' => 'required|min:4|max:300',
            'fechaIni' => 'required',
            'fechaFin' => 'required',
            'requisitos' => 'required',
            'encargado' => 'required|min:3|max:70',
            'lugar' => 'required|min:3|max:60',
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

            // Construir la URL completa utilizando asset()
            $urlImagen = asset("storage/{$rutaGuardarImg}{$imagenEvento}");

            // Asignar la URL completa a la propiedad en el modelo
            $eventos->imagen = $urlImagen;
        }

        $eventos->id_tipoEventos = $request->id_tipoEventos;

        $eventos->save();

        // Devolver la URL completa si se proporcionó una imagen
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
         // Validar los datos de la solicitud
         $validation = $request->validate([
             'nombre' => 'required|min:3|max:50',
             'descripcion' => 'required|min:4|max:300',
             'fechaIni' => 'required',
             'fechaFin' => 'required',
             'requisitos' => 'required',
             'encargado' => 'required|min:3|max:70',
             'lugar' => 'required|min:3|max:60',
             'estado' => 'required',
             'imagen' => 'image|mimes:jpeg,png,jpg,svg'
         ]);
     
         // Buscar el evento por ID
         $eventos = Eventos::findOrFail($eventos->id);
     
         // Actualizar los atributos del evento con los datos de la solicitud
         $eventos->nombre = $request->nombre;
         $eventos->descripcion = $request->descripcion;
         $eventos->fechaIni = $request->fechaIni;
         $eventos->fechaFin = $request->fechaFin;
         $eventos->requisitos = $request->requisitos;
         $eventos->encargado = $request->encargado;
         $eventos->lugar = $request->lugar;
         $eventos->estado = $request->estado;
     
         // Si se proporciona una nueva imagen, actualizarla
         if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($eventos->imagen) {
                $rutaImagenAnterior = str_replace(asset('storage/'), 'public/', $eventos->imagen);
                Storage::disk('public')->delete($rutaImagenAnterior);
            }
             $rutaGuardarImg = 'imagen/';
             $imagenEvento = uniqid() . '_' . date('YmdHis') . "." . $request->file('imagen')->getClientOriginalExtension();
             Storage::disk('public')->putFileAs($rutaGuardarImg, $request->file('imagen'), $imagenEvento);
     
             // Construir la URL completa utilizando asset()
             $urlImagen = asset("storage/{$rutaGuardarImg}{$imagenEvento}");
     
             // Asignar la URL completa a la propiedad en el modelo
             $eventos->imagen = $urlImagen;
         }

         // Asignar el id_tipoEventos desde la solicitud
         $eventos->id_tipoEventos = $request->id_tipoEventos;
     
         // Guardar los cambios en la base de datos
         $eventos->save();
     
         // Devolver la respuesta
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