<?php

namespace App\Models\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso3',
        'iso2',
        'phonecode',
        'capital',
        'currency',
        'currency_symbol',
        'tld',
        'native',
        'region',
        'subregion',
        'timezones',
        'translations',
        'latitude',
        'longitude',
        'emoji',
        'emojiU',
        'flag',
        'wikiDataId'
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
