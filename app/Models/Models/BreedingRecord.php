<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreedingRecord extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'occurrence_date',
        'coverage_date',
        'date_birth',
        'date_birth_prediction',
        'coverage_success',
        'cover_method',
        'status',

        'female_id',
        'male_id',
    ];

    public function female()
    {
        return $this->belongsTo(Animal::class, 'female_id');
    }

    public function male()
    {
        return $this->belongsTo(Animal::class, 'male_id');
    }
}
