<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GigsImagesTicolancer extends Model
{
    use HasFactory;

    protected $fillable = ['gigs_ticolancers_id', 'image'];
}
