<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')->insert([
            'nombreEquipo' => 'Dinamita',

            'nombreCoach' => 'NombreCoach1',
            'edadCoach' => 25,
            'carreraCoach' => 'CarreraCoach1',
            'codSISCoach' => 12345,
            'emailCoach' => 'brunojoel444@gmail.com',
            'numeroCoach' => 123456789,
            'universidadCoach' => 'UniversidadCoach1',
            'semestreCoach' => 5,

            'nombre1' => 'Nombre1',
            'edad1' => 22,
            'carrera1' => 'Carrera1',
            'codSIS1' => 54321,
            'universidad1' => 'Universidad1',

            'nombre2' => 'Nombre2',
            'edad2' => 23,
            'carrera2' => 'Carrera2',
            'codSIS2' => 202000737, 
            'universidad2' => 'Universidad2',

            'nombre3' => null,
            'edad3' => null,
            'carrera3' => null,
            'codSIS3' => null,
            'universidad3' => null,

            'nombre4' => null,
            'edad4' => null,
            'carrera4' => null,
            'codSIS4' => null,
            'universidad4' => null,

            'nombre5' => null,
            'edad5' => null,
            'carrera5' => null,
            'codSIS5' => null,
            'universidad5' => null,
        ]);
    }
}