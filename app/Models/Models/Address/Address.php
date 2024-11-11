<?php

namespace App\Models\Models\Address;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'farm_id',
        'country_id',
        'state_id',
        'city_id',
        'street',
        'number',
        'zipcode',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function farms()
    {
        return $this->belongsTo(Farm::class);
    }
}
