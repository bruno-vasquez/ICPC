<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\BD;

class tipoEventosSeeder extends Seeder
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
                'nombre' => 'Entrenamiento'
            ],
            [
                'nombre' => 'Reclutamiento'
            ],
            [
                'nombre' => 'Clasificatorias internas'
            ],
            [
                'nombre' => 'Competencias de entrenamiento'
            ],

        ];
        \DB::table('tipoEventos')->insert($data);   
    }
}
