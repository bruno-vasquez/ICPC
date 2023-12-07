<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
                    [
                        'nombre' => 'Reclutamiento para la ICPC',
                        'descripcion'=> 'Reclutamiento para la ICPC a realizarse en la umss con el apoyo de todas las universidades',
                        'fechaIni'=> '2023-03-15',
                        'fechaFin'=> '2023-04-17',
                        'requisitos'=> 'Inscripcion previa, estudiante universitario',
                        'encargado'=> 'Leticia Blanco',
                        'lugar'=> 'Infolab',
                        'estado' => 'inactivo',
                        'imagen' => null,
                        'email' => 'icpc@gmail.com',
                        'costo' => 'Gratis',
                        'umss' => 'si',
                        'reporte' => 'Siuuuuuuuuuuuuuuuuuuuu',
                        'horarios' => 'Inicia 17:00 termina 20:00',
                        'id_tipoEventos'=> 3,
                    ],    
                ];
                \DB::table('eventos')->insert($data);  
    }
}
