<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LanguageLevelsTicolancer as LanguageLevels;  

class LanguagesTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'language',
    ];

    public function levels()
    {
        return $this->hasMany(LanguageLevels::class, 'languages_levels_ticolancers_id');
    }
    
}
