<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'farm_id'
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
}
