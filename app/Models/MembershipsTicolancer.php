<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipsTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sellers_users_ticolancers_id',
        'membership_cateogries_ticolancers_id',
        'status',
        'paymentDate',
        'trialExpirationDate',
        'created_at'
    ];


    public function membershipCategories()
    {
        return $this->belongsTo(MembershipCategoriesTicolancer::class, 'membership_cateogries_ticolancers_id');
    }
    
}
