<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\GigsCategoriesTicolancer;

class GigsTicolancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'gig_name',
        'gig_image',
        'gig_price',
        'gig_description',
        'published_at',
        'gigs_categories_ticolancers_id',
        'sellers_id',
    ];

    //relation 

    public function categories()
    {
        return $this->belongsTo(GigsCategoriesTicolancer::class, 'gigs_categories_ticolancers_id');
    }

    
}