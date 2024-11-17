<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\CitiesTicolancer as Cities;
use App\Models\BuyersLangTicolancer as BuyersLanguages;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
use App\Models\SellersUsersTicolancer as SellersUsers;
use App\Models\FavoritesGigsTicolancer as FavoritesGigs;
use App\Models\FavSellersTicolancer as FavoritesSellers;

class BuyersUsersTicoLancer extends Authenticatable
{
    use HasFactory;

    protected $table = 'buyers_users_ticolancers';

    protected $fillable = [
        'name',
        'username',
        'lastname',
        'email',
        'password',
        'phone',
        'provinces_ticolancers_id',
        'cities_ticolancers_id',
        'picture',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'cities_ticolancers_id');
    }

    public function languages()
    {
        return $this->hasMany(BuyersLanguages::class, 'buyers_users_ticolancers_id');
    }

    public function sellers()
    {
        return $this->belongsTo(SellersUsers::class, 'buyers_users_ticolancers_id');
    }

    public function sellerApplication()
    {
        return $this->hasOne(SellerApplication::class, 'buyers_users_ticolancers_id');
    }


    public function hasLikedGigs($gigId)
    {
        return $this->favoritesGigs()->where('gigs_ticolancers_id', $gigId)->exists();
    }

    
    // Relación con los favoritos de gigs
    public function favoritesGigs()
    {
        return $this->hasMany(FavoritesGigs::class, 'buyers_users_ticolancers_id');
    }




    public function hasLikedSeller($sellerId)
    {
        return $this->favoritesSellers()->where('sellers_users_ticolancers_id', $sellerId)->exists();
    }

    
    // Relación con los favoritos de freelancers
    public function favoritesSellers()
    {
        return $this->hasMany(FavoritesSellers::class, 'buyers_users_ticolancers_id');
    }
    
}
