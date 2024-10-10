<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GigsCategoriesTicolancer as GigsCategories;

class GigsCategoriesTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        GigsCategories::create(['category' => 'Programación y Tecnología']);
        GigsCategories::create(['category' => 'Marketing Digital']);
        GigsCategories::create(['category' => 'Video y Animación']);
        GigsCategories::create(['category' => 'Arquitectura']);
        GigsCategories::create(['category' => 'Diseño Gráfico']);
        GigsCategories::create(['category' => 'Música y Audio']);
        GigsCategories::create(['category' => 'Servicios de IA']);
        GigsCategories::create(['category' => 'Traducción y Escritura']);
        GigsCategories::create(['category' => 'Fotografía']);
    }
}
