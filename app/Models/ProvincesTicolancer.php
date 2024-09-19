<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CitiesTicolancer;

class ProvincesTicolancer extends Model
{
    use HasFactory;

    public function cities()
{
    return $this->hasMany(CitiesTicolancer::class, 'cities_ticolancers_id');
}
}
