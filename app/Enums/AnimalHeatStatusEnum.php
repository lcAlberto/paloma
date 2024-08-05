<?php

namespace App\Enums;

abstract class AnimalHeatStatusEnum extends Enum
{
    const SUCCESS = 'success';
    const  ABORTION = 'abortion';
    const PENDING  = 'pending';
    const  CLEANING = 'cleaning';
}
