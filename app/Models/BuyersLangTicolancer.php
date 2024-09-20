<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyersLangTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyers_users_ticolancers_id',
        'languages_ticolancers_id',
        'language_levels_ticolancers_id',
    ];
}
