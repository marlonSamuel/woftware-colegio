<?php

namespace Database\Seeders;
use App\TipoApoderado;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoApoderadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new TipoApoderado();
        $data->nombre = "padre";
        $data->save();

        $data = new TipoApoderado();
        $data->nombre = "madre";
        $data->save();

        $data = new TipoApoderado();
        $data->nombre = "tutor";
        $data->save();
    }
}
