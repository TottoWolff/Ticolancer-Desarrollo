<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LanguagesTicolancer as Languages;

class LanguageLevelsTicolancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
    ];

    public function language()
    {
        return $this->belongsTo(Languages::class, 'languages_ticolancers_id');
    }
}
