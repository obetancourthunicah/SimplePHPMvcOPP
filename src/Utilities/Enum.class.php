<?php

namespace Utilities;

abstract class Enum
{
    const NONE = null;
    final private function __construct()
    {
        throw new NotSupportedException(); // 
    }
    final private function __clone()
    {
        throw new NotSupportedException();
    }
    final public static function toArray()
    {
        return (new ReflectionClass(static::class))->getConstants();
    }
    final public static function toFormatedArray()
    {
        $unFormated = (new ReflectionClass(static::class))->getConstants();
        $formated = array();
        foreach($unFormated as $key => $value) {
            $formated[] = array("code" => $key, "value" => $value);
        }
        return $formated;
    }
    
    final public static function isValid($value)
    {
        return in_array($value, static::toArray());
    }
}

?>
