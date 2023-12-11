<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InteresadosSeeder extends Seeder
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
                'nombre' => 'Joel',
                'apellidos'=> ' Gonzales',
                'ci'=> 3521351,
                'fecha_Nacimiento'=> '2001-07-21',
                'telefono'=> 60747804,
                'email' => 'brunojoel444@gmail.com',
                'carrera' => 'Ingenieria de sistemas',
                'semestre' => '8',
                'codSIS'=> 42,
            ],    
                    [
                        'nombre' => 'Bruno',
                        'apellidos'=> 'Vasquez Gonzales',
                        'ci'=> 8853560,
                        'fecha_Nacimiento'=> '2001-07-21',
                        'telefono'=> 60747804,
                        'email' => 'brunojoel444@gmail.com',
                        'carrera' => 'Ingenieria de sistemas',
                        'semestre' => '8',
                        'codSIS'=> 202000737,
                    ],    
                ];
                \DB::table('interesados')->insert($data);  
    }
}
