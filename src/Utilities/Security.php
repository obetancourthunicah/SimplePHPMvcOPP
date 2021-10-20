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
        if (\Utilities\Context::getContextByKey("DEVELOPMENT") == "1") {
            $functionInDb = \Dao\Security\Security::getFeature($function);
            if (!$functionInDb) {
                \Dao\Security\Security::addNewFeature($function, $function, "ACT", "CTR");
            }
        }
        return \Dao\Security\Security::getFeatureByUsuario($userId, $function);
    }
    public static function isInRol($userId, $rol):bool
    {
        if (\Utilities\Context::getContextByKey("DEVELOPMENT") == "1") {
            $rolInDb = \Dao\Security\Security::getRol($rol);
            if (!$rolInDb) {
                \Dao\Security\Security::addNewRol($rol, $rol, "ACT");
            }
        }
        return \Dao\Security\Security::isUsuarioInRol($userId, $rol);
    }
}


?>
