<?php

namespace Utilities;

class Security {
    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
    public static function logout()
    {
        unset($_SESSION["login"]);
    }
    public static function login($userId, $userName, $userEmail)
    {
        $_SESSION["login"] = array(
            "isLogged" => true,
            "userId" => $userId,
            "userName" => $userName,
            "userEmail" => $userEmail
        );
    }
    public static function isLogged():bool
    {
        return isset($_SESSION["login"]) && $_SESSION["login"]["isLogged"];
    }
    public static function getUser()
    {
        if (isset($_SESSION["login"])) {
            return $_SESSION["login"];
        }
        return false;
    }
    public static function getUserId()
    {
        if (isset($_SESSION["login"])) {
            return $_SESSION["login"]["userId"];
        }
        return 0;
    }
    public static function isAuthorized($userId, $function):bool
    {
        return \Dao\Security\Security::getFeatureByUsuario($userId, $function);
    }
    public static function isInRol($userId, $rol):bool
    {
        return true;
    }
}


?>
