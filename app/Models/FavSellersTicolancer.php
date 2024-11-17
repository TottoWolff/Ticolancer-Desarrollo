<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BuyersUsersTicoLancer as Buyer;
use App\Models\SellersUsersTicoLancer as Seller;

class FavSellersTicolancer extends Model
{
    use HasFactory;
    protected $fillable =
    [
    'buyers_users_ticolancers_id',
    'sellers_users_ticolancers_id',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyers_users_ticolancers_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_users_ticolancers_id');
    }
}
