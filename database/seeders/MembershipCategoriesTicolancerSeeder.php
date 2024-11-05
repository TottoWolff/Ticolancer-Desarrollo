<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MembershipCategoriesTicolancer;

class MembershipCategoriesTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definir los planes de membresía
        $membershipCategories = [
            [
                'category_name' => 'Plan Mensual',
                'description' => 'Acceso a todas las características del servicio por un mes.',
                'price' => 5000, // Precio mensual
            ],
            [
                'category_name' => 'Plan Semestral',
                'description' => 'Acceso a todas las características del servicio por seis meses con un 10% de descuento.',
                'price' => 25000, // Precio semestral (10% descuento sobre $120)
            ],
            [
                'category_name' => 'Plan Anual',
                'description' => 'Acceso a todas las características del servicio por un año con un 20% de descuento.',
                'price' => 45000, // Precio anual (20% descuento sobre $240)
            ],
        ];

        // Insertar los planes en la base de datos
        foreach ($membershipCategories as $category) {
            MembershipCategoriesTicolancer::create($category);
        }
    }
}
