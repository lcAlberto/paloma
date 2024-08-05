<?php

namespace App\Enums;

abstract class AnimalStatusEnum extends Enum
{
    const ALIVE = 'alive';
    const DEAD = 'dead';
    const SOLD = 'sold';
}
