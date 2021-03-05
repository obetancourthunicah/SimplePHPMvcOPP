<?php

namespace Dao\Security;

/*
usercod     bigint(10) AI PK
useremail   varchar(80)
username    varchar(80)
userpswd    varchar(128)
userfching  datetime
userpswdest char(3)
userpswdexp datetime
userest     char(3)
useractcod  varchar(128)
userpswdchg varchar(128)
usertipo    char(3)

 */

use Exception;

class Security extends \Dao\Table
{
    static public function newUsuario($email, $password)
    {
        if (!\Utilities\Validator::IsValidEmail($email)) {
            throw new Exception("Correo no es válido");
        }
        if (!\Utilities\Validator::IsValidPassword($password)) {
            throw new Exception("Contraseña debe ser almenos 8 caracteres, 1 número, 1 mayúscula, 1 símbolo especial");
        }

        $newUser = self::_usuarioStruct();

        $newUser["userfching"] = date("Y-m-d H:i:s");
        //Tratamiento de la Contraseña
        $saltedPassword = self::_saltPassword($password, $newUser["userfching"]);
        
    }
    static private function _saltPassword($password, $salt)
    {
        if ($salt % 2 == 0) {
            return $password . $salt;
        }
        return $salt . $password
    }

    static private function _usuarioStruct()
    {
        return array(
            "usercod"      => "",
            "useremail"    => "",
            "username"     => "",
            "userpswd"     => "",
            "userfching"   => "",
            "userpswdest"  => "",
            "userpswdexp"  => "",
            "userest"      => "",
            "useractcod"   => "",
            "userpswdchg"  => "",
            "usertipo"     => "",
        )
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}


?>
