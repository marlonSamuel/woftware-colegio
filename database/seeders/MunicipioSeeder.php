<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Imports\MunicipioImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MunicipioSeeder extends Seeder
{
    public function run()
    {
        $datas = Excel::import(new MunicipioImport, 'database/seeders/Municipios.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);
    }
}
