<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompetenciasSeeder extends Seeder
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
                        'nombre' => 'Competencias regional 2023',
                        'descripcion'=> 'Competencia interuniversitaria 2023, ven y demuestra tus habilidades',
                        'fechaIni'=> '2023-02-15',
                        'fechaFin'=> '2023-02-17',
                        'requisitos'=> 'Inscripción previa, Ci, Foto Carnet',
                        'encargado'=> 'Corina Justina Flores Villarroel',
                        'email'=> 'corinaflores.v@fcyt.umss.edu.bo',
                        'lugar'=> 'MEMI UMSS',
                        'costo' => 100,
                        'id_tipoCompetencias'=> 1,
                    ],
                ];
                \DB::table('competencias')->insert($data);  
    }
}

