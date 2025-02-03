<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class BreedingFiltersRepository implements BaseRepository
{
    public function filter(Builder $query, array $filters): Builder
    {
        if (isset($filters['occurrence_date'])) {
            $date = Carbon::createFromFormat('Y-m-d', $filters['occurrence_date']);
            $query->whereDate('occurrence_date', '=', $date);
        }

        if (isset($filters['coverage_date'])) {
            $date = Carbon::createFromFormat('Y-m-d', $filters['coverage_date']);
            $query->whereDate('coverage_date', '=', $date);
        }

        if (isset($filters['date_birth_prediction'])) {
            $date = Carbon::createFromFormat('Y-m-d', $filters['date_birth_prediction']);
            $query->whereDate('date_birth_prediction', '=', $date);
        }

        if (isset($filters['date_birth'])) {
            $date = Carbon::createFromFormat('Y-m-d', $filters['date_birth']);
            $query->whereDate('date_birth', '=', $date);
        }


//        if (isset($filters['born_date_from']) && isset($filters['born_date_to'])) {
//            $fromDate = Carbon::parse($filters['born_date_from']);
//            $toDate = Carbon::parse($filters['born_date_to']);
//
//            $query->whereBetween('born_date', [$toDate->startOfDay()->toDateString(), $fromDate->endOfDay()->toDateString()]);
//        }

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['cover_method'])) {
            $query->where('cover_method', $filters['cover_method']);
        }

        if (isset($filters['female_id'])) {
            $query->where('female_id', $filters['female_id']);
        }

        if (isset($filters['male_id'])) {
            $query->where('male_id', $filters['male_id']);
        }

        return $query;
    }
}
