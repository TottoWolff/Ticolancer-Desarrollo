<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SellersUsersTicolancer as SellersUsers;
use App\Models\BuyersUsersTicolancer as BuyersUsers;
use Carbon\Carbon;

class SellersUsersTicolancer extends Model
{
    use HasFactory;

    protected $table = 'sellers_users_ticolancers';

    protected $fillable = [
        'birthdate',
        'description',
        'residence_address',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'website',
        'created_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function user()
    {
        return $this->belongsTo(SellersUsers::class, 'sellers_users_ticolancers_id');
    }

    public function buyers()
    {
        return $this->belongsTo(BuyersUsers::class, 'buyers_users_ticolancers_id');
    }
}
