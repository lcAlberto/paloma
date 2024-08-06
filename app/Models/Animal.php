<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'breed',
        'sex',
        'classification',
        'status',
        'image',
        'born_date',
        'mother_id',
        'father_id',
        'farm_id'
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }

    public function father()
    {
        return $this->belongsTo(Animal::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(Animal::class, 'mother_id');
    }

    public function children()
    {
        return $this->hasMany(Animal::class, 'father_id')->orWhere('mother_id', $this->id);
    }

    public function matingsAsFemale()
    {
        return $this->hasMany(BreedingRecord::class, 'female_id');
    }

    public function matingsAsMale()
    {
        return $this->hasMany(BreedingRecord::class, 'male_id');
    }
}
