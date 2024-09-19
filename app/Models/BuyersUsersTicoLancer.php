<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
