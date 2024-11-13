<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
use App\Models\SellersUsersTicolancer as SellerUser;

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

    public function reviews()
    {
        return $this->hasMany(GigsReviewsTicolancer::class, 'gigs_ticolancers_id', 'id');
    }

    public function buyer()
    {
        return $this->belongsTo(BuyersUsers::class, 'buyers_users_ticolancers_id');
    }

    public function seller()
    {
        return $this->belongsTo(SellerUser::class, 'sellers_users_ticolancers_id');
    }
}
