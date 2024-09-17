<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LanguagesTicolancer as Languages;

class LanguagesTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Languages::create(['language' => 'Español - Spanish']);
        Languages::create(['language' => 'Inglés - English']);
        Languages::create(['language' => 'Francés - Français']);
        Languages::create(['language' => 'Portugués - Português']);

    }
}
