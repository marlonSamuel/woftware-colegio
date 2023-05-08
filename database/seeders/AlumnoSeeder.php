<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Alumno;
use App\Apoderado;
use App\TelefonoApoderado;
use App\ApoderadoAlumno;
use App\Imports\AlumnoImport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $datas = Excel::import(new AlumnoImport, 'database/seeders/Alumnos.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);
      /*  $data_p = new Apoderado();
        $data_p->cui = "5568978987999";
        $data_p->primer_nombre = "Faustino";
        $data_p->segundo_nombre = "";
        $data_p->primer_apellido = "Gonzalez";
        $data_p->segundo_apellido = "";
        $data_p->fecha_nac = "1990-03-25";
        $data_p->email = "faustino@gmail.com";
        $data_p->direccion = "Colonia los conacastes chiquimulilla";
        $data_p->municipio_id = 1;
        $data_p->nacionalidad = "Guatemalteco";
        $data_p->estado_civil = 'Casado';
        $data_p->nit = '789563-7';
        $data_p->save();

        TelefonoApoderado::create([
            'tipo_telefono' => 'P',
            'telefono' => "55776655",
            'apoderado_id' => $data_p->id
        ]);

        $data = new Alumno();
        $data->codigo = "1-2020-001";
        $data->primer_nombre = "Marlon";
        $data->segundo_nombre = "Samuel";
        $data->tercer_nombre = "";
        $data->primer_apellido = "Gonzalez";
        $data->segundo_apellido = "Flores";
        $data->fecha_nac = "1995-03-25";
        $data->genero = "M";
        $data->telefono = "58421615";
        $data->email = "marlon@gmail.com";
        $data->direccion = "Colonia los conacastes chiquimulilla";
        $data->save();

        ApoderadoAlumno::create([
            'apoderado_id' => $data_p->id,
            'alumno_id' => $data->id,
            'responsable' => true,
            'tipo_apoderado' => 'P'
        ]);

        $data = new Alumno();
        $data->codigo = "2-2020-001";
        $data->primer_nombre = "Juan";
        $data->segundo_nombre = "Pedro";
        $data->tercer_nombre = "";
        $data->primer_apellido = "Gonzalez";
        $data->segundo_apellido = "Flores";
        $data->fecha_nac = "1998-04-25";
        $data->genero = "M";
        $data->telefono = "58421616";
        $data->email = "juan@gmail.com";
        $data->direccion = "Colonia los conacastes chiquimulilla";
        $data->save();


        ApoderadoAlumno::create([
            'apoderado_id' => $data_p->id,
            'alumno_id' => $data->id,
            'responsable' => true,
            'tipo_apoderado' => 'P'
        ]);*/
    }
}
