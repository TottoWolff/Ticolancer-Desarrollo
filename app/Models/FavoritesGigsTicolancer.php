<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GigsTicolancer;
use App\Models\BuyersUsersTicoLancer;

class FavoritesGigsTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyers_users_ticolancers_id',
        'gigs_ticolancers_id',
    ];

    public function gig()
    {
        return $this->belongsTo(GigsTicolancer::class, 'gigs_ticolancers_id');
    }

    public function buyer()
    {
        return $this->belongsTo(BuyersUsersTicoLancer::class, 'buyers_users_ticolancers_id');
    }
}


