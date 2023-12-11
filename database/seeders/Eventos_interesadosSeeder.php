<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\BD;

class Eventos_interesadosSeeder extends Seeder
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
                'evento_id' => 1,
                'interesado_id' => 1
            ],

        ];
        \DB::table('evento_interesados')->insert($data);  
    }
}
