<?php

namespace Utilities;

class Validator {

    static public function IsEmpty($valor)
    {
        return preg_match("/^\s*$/", $valor) && true;
    }

    static public function IsValidEmail($valor)
    {
        return preg_match("/^([a-z0-9_\.-]+\@[\da-z\.-]+\.[a-z\.]{2,6})$/", $valor) && true;
    }

    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
}

?>
