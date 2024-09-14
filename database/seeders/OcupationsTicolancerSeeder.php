<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OcupationsTicolancer as Ocupations;

class OcupationsTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ocupations::create(['name' => 'Marketing Digital',]);
        Ocupations::create(['name' => 'Desarrolo Web',]);
        Ocupations::create(['name' => 'Diseño de Interiores',]);
        Ocupations::create(['name' => 'Arquitectura y Diseño',]);
        Ocupations::create(['name' => 'Desarrollo de Software',]);
        Ocupations::create(['name' => 'Edición de Video',]);
        Ocupations::create(['name' => 'Música y Audio',]);
        Ocupations::create(['name' => 'Fotografía',]);
        Ocupations::create(['name' => 'Traducción y escritura',]);
    }
}
