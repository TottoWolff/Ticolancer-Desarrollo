<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyeyers_users_ticolancers_id',
        'picture',
        'birthdate',
        'description',
        'phone',
        'user_Type',
        'residence_address',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'website',
    ];

    // Relación con el buyer
    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }
}
