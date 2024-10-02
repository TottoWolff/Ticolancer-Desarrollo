<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SellersUsersTicolancer as SellersUsers;

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
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    public function user()
    {
        return $this->belongsTo(SellersUsers::class, 'sellers_users_ticolancers_id');
    }
}
