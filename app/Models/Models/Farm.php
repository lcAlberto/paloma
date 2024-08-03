<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
