<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsersTicolancer as Users;

class UsersTicolancerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Users::create(['name' => 'admin', 'lastname' => 'admin', 'email' => 'pHrjT@example.com', 'password' => bcrypt('admin123'), 'user_type' => 'B', 'provinces_ticolancers_id' => 1]);
    }
}
