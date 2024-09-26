<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\CitiesTicolancer as Cities;
use App\Models\BuyersLangTicolancer as BuyersLanguages;
use App\Models\BuyersUsersTicolancer as BuyersUsers;

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

    public function user()
    {
        return $this->belongsTo(BuyersUsers::class, 'buyers_users_ticolancers_id');
    }
}
