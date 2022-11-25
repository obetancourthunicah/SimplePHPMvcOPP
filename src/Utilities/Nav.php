<?php

namespace Utilities;

class Nav {

    public static function setNavContext(){
        $tmpNAVIGATION = array();
        $userID = \Utilities\Security::getUserId();
        if (\Utilities\Security::isAuthorized($userID, "Menu_MntUsuarios")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=mnt_usuarios",
                "nav_label" => "Usuarios"
            );
        }
        if (\Utilities\Security::isAuthorized($userID, "Menu_MntQuotes")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=Mnt_Quotes",
                "nav_label" => "Citas"
            );
        }

        if (\Utilities\Security::isAuthorized($userID, "Menu_PaymentCheckout")) {
            $tmpNAVIGATION[] = array(
                "nav_url" => "index.php?page=Checkout_Checkout",
                "nav_label" => "Pagar"
            );
        }
        \Utilities\Context::setContext("NAVIGATION", $tmpNAVIGATION);
    }


    private function __construct()
    {
        
    }
    private function __clone()
    {
        
    }
}
?>
