<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritesGigsTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyers_users_ticolancers_id',
        'gigs_ticolancers_id',
    ];
}


