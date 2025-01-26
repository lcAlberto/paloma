<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class AnimalFiltersRepository implements BaseRepository
{
    public function filter(Builder $query, array $filters): Builder
    {
        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['code'])) {
            $query->where('code', 'like', '%' . $filters['code'] . '%');
        }

        if (isset($filters['sex'])) {
            $query->where('sex', $filters['sex']);
        }

        if (isset($filters['classification'])) {
            $query->where('classification', $filters['classification']);
        }

        if (isset($filters['age'])) {
            $query->whereDate('born_date', '<=', Carbon::now()->subYears($filters['age'])->toDateString());
        }

        if (isset($filters['born_date'])) {
            $date = Carbon::createFromFormat('Y-m-d', $filters['born_date']);
            $query->whereDate('born_date', '=', $date);
        }

        if (isset($filters['born_date_from']) && isset($filters['born_date_to'])) {
            $fromDate = Carbon::parse($filters['born_date_from']);
            $toDate = Carbon::parse($filters['born_date_to']);

            $query->whereBetween('born_date', [$toDate->startOfDay()->toDateString(), $fromDate->endOfDay()->toDateString()]);
        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['mother_id'])) {
            $query->where('mother_id', $filters['mother_id']);
        }

        if (isset($filters['father_id'])) {
            $query->where('father_id', $filters['father_id']);
        }

        return $query;
    }
}
