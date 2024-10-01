<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigsTicolancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'gig_name',
        'gig_image',
        'gig_description',
        'gig_email',
        'gig_phone_number',
        'sellers_id',
        'province_id',
        'city_id'
    ];

    public function province()
    {
        return $this->belongsTo(ProvincesTicolancer::class);
    }

    public function city()
    {
        return $this->belongsTo(CitiesTicolancer::class);
    }
}