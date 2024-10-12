<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigsReviewsTicolancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'gigs_ticolancers_id',
        'buyers_users_ticolancers_id',
        'comment',
        'rating',
        'published_at'
    ];
}
