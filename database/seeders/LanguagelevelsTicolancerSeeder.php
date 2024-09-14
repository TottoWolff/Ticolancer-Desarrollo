<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LanguageLevelsTicolancer as LanguageLevels;

class LanguagelevelsTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        LanguageLevels::create(['level' => 'Nativo',]);
        LanguageLevels::create(['level' => 'Basico',]);
        LanguageLevels::create(['level' => 'Intermedio',]);
        LanguageLevels::create(['level' => 'Avanzado',]);
    }
}
