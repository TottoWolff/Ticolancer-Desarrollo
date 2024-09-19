<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProvincesTicolancer;

class CitiesTicolancer extends Model
{
    use HasFactory;

    public function province ()
    {
        return $this->belongsTo(ProvincesTicolancer::class, 'provinces_ticolancers_id');
    }
}
