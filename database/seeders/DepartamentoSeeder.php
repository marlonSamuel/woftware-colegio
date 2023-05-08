<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Imports\DepartamentoImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartamentoSeeder extends Seeder
{
    public function run()
    {
    	$datas = Excel::import(new DepartamentoImport, 'database/seeders/Departamento.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);
    }
}
