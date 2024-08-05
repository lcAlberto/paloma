<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'born_date',
        'farm_id'
    ];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
