<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

interface BaseRepository
{
    public function filter(Builder $query, array $filters): Builder;
}
