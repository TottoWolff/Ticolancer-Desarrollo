<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionsTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
    ];
}
