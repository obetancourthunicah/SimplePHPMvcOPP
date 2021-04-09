<?php

namespace Controllers\Checkout;

use Controllers\PublicController;
class Accept extends PublicController{
    public function run():void
    {
        $token = $_GET["token"] ?: "";
        $session_token = $_SESSION["orderid"] ?: "";
        if ($token !== "" && $token == $session_token) {
            $result = \Utilities\Paypal\PayPalCapture::captureOrder($session_token);
            var_dump($result);
        } else {
            echo "<br/>No hay Orden";
        }
        die();
    }
}

?>
