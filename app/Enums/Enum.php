<?php

namespace App\Enums;

abstract class Enum
{
    private static $constCacheArray = null;

    public static function getConstants()
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }

        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }

        return self::$constCacheArray[$calledClass];
    }

    public static function getConstantsKeys()
    {
        return array_keys(self::getConstants());
    }

    public static function getConstantsValues()
    {
        return array_values(self::getConstants());
    }
}
