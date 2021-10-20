<?php

namespace Utilities;

class Context
{
    static $_context = array();
    public static function getContext()
    {
        return self::$_context;
    }
    public static function setContext($key, $value)
    {
        self::$_context[$key] = $value;
    }
    public static function getContextByKey($key)
    {
        $value = "";
        if (isset(self::$_context[$key])) {
            $value = self::$_context[$key];
        }
        return $value;
    }
    public static function setArrayToContext(Array $contextValues)
    {
        foreach ($contextValues as $name=>$value) {
            self::$_context[$name] = $value;
        }
    }
    private function __construct()
    {

    }
}

?>
