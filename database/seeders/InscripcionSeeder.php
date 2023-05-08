<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Inscripcion;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Inscripcion;
        $data->numero = "2019-1";
        $data->ciclo_id = 1;
        $data->grado_nivel_educativo_id = 1;
        $data->fecha = "2019-01-11";
    }
}
