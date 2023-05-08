<?php

namespace Database\Seeders;
use App\Imports\MenuImport;
use App\Rol;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //todo lo administrativo
        $data = new Rol; 
        $data->rol = 'admin';
        $data->save();

        //todo lo inscripciones, gestion de pagos
        $data = new Rol;
        $data->rol = 'secretario';
        $data->save();

        //todo lo financiero
        $data = new Rol;
        $data->rol = 'financiero';
        $data->save();

        //reportes
        $data = new Rol;
        $data->rol = 'reportes';
        $data->save();

        $data = new Rol; 
        $data->rol = 'profesor';
        $data->save();

        $data = new Rol; 
        $data->rol = 'alumno';
        $data->save();

        $data = new Rol; 
        $data->rol = 'apoderado';
        $data->save();

        Excel::import(new MenuImport, 'database/seeders/Menu.xlsx');
    }
}
