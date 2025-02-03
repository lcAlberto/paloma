<?php

namespace App\Models;

use App\Models\Models\Address\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address_id',
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
