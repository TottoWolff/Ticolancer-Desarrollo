<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LanguagesTicolancer as Languages;
use App\Models\LanguageLevelsTicolancer as LanguageLevels;

class BuyersLangTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyers_users_ticolancers_id',
        'languages_ticolancers_id',
        'language_levels_ticolancers_id',
    ];

    public function language()
    {
        return $this->belongsTo(Languages::class, 'languages_ticolancers_id');
    }

    public function level()
    {
        return $this->belongsTo(LanguageLevels::class, 'language_levels_ticolancers_id');
    }
}
