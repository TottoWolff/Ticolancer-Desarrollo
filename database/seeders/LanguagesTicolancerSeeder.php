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
        Languages::create(['language' => 'Alemán - Deutsch']);
        Languages::create(['language' => 'Italiano - Italiano']);
        Languages::create(['language' => 'Chino - 中文']);
        Languages::create(['language' => 'Japonés - 日本語']);
        Languages::create(['language' => 'Coreano - 한국어']);
        Languages::create(['language' => 'Árabe - العربية']);
        Languages::create(['language' => 'Ruso - Русский']);
        Languages::create(['language' => 'Turco - Türkçe']);
        Languages::create(['language' => 'Hindi - हिंदी']);
        Languages::create(['language' => 'Bengalí - বাংলা']);
        Languages::create(['language' => 'Vietnamita - Tiếng Việt']);
        Languages::create(['language' => 'Sueco - Svenska']);
        Languages::create(['language' => 'Neerlandés - Nederlands']);
        Languages::create(['language' => 'Polaco - Polski']);
        Languages::create(['language' => 'Checo - Čeština']);
        Languages::create(['language' => 'Húngaro - Magyar']);
        Languages::create(['language' => 'Griego - Ελληνικά']);
        Languages::create(['language' => 'Hebreo - עברית']);
        Languages::create(['language' => 'Tailandés - ภาษาไทย']);
        Languages::create(['language' => 'Indonesio - Bahasa Indonesia']);
        Languages::create(['language' => 'Malayo - Bahasa Melayu']);
        Languages::create(['language' => 'Filipino - Filipino']);
        Languages::create(['language' => 'Danés - Dansk']);
        Languages::create(['language' => 'Noruego - Norsk']);
        Languages::create(['language' => 'Finlandés - Suomi']);

    }
}
