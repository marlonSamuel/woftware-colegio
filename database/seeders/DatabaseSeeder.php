<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



use Database\Seeders\MesSeeder;
use Database\Seeders\RolSeeder;
use Database\Seeders\GradoSeeder;
use Database\Seeders\CursoSeeder;
use Database\Seeders\SeccionSeeder;
use Database\Seeders\DepartamentoSeeder;
use Database\Seeders\MunicipioSeeder;
use Database\Seeders\InstitucionSeeder;
use Database\Seeders\NivelEducativoSeeder;
use Database\Seeders\AlumnoSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CicloSeeder;
use Database\Seeders\ConceptoPagoSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MesSeeder::class);
         $this->call(RolSeeder::class);
         $this->call(GradoSeeder::class);
         $this->call(CursoSeeder::class);
         $this->call(SeccionSeeder::class);
         $this->call(DepartamentoSeeder::class);
         $this->call(MunicipioSeeder::class);
         $this->call(InstitucionSeeder::class);
         $this->call(NivelEducativoSeeder::class);
         $this->call(AlumnoSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(CicloSeeder::class);
         $this->call(InscripcionSeeder::class);
         $this->call(ConceptoPagoSeeder::class);
    }
}
