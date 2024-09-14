<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProvincesTicolancer as Provinces;

class ProvincesTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Provinces::create(['province' => 'San Jose']);
        Provinces::create(['province' => 'Alajuela']);
        Provinces::create(['province' => 'Cartago']);
        Provinces::create(['province' => 'Heredia']);
        Provinces::create(['province' => 'Guanacaste']);
        Provinces::create(['province' => 'Puntarenas']);
        Provinces::create(['province' => 'Limon']);
    }
}
