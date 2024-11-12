<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function female(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'female_id');
    }

    public function male(): BelongsTo
    {
        return $this->belongsTo(Animal::class, 'male_id');
    }
}
