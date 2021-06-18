<?php

namespace Controllers\Mnt;

class Heroe extends \Controllers\PublicController 
{

    public function run():void
    {
        $viewData = array();
        $viewData["ModalTitle"] = "";
        $viewData["heroItemid"] = 0;
        $viewData["heroname"] = "";
        $viewData["heroimgurl"] = "/public/img/hero/";
        $viewData["heroaction"] = "<h1>Compra Ahora</h1>";
        $viewData["heroorder"] = 1;
        $viewData["heroest"] = 'ACT';
        $viewData["heroest_act"] = true;
        $viewData["heroest_ina"] = false;

        //if (isset($_POST["btnConfirmar"]))
        if ($this->isPostBack()) {
            $viewData["heroItemid"] = $_POST["heroItemid"];
            $viewData["heroname"] = $_POST["heroname"];
            $viewData["heroimgurl"] = $_POST["heroimgurl"];
            $viewData["heroaction"] = $_POST["heroaction"];
            $viewData["heroorder"] = $_POST["heroorder"];
            $viewData["heroest"] = $_POST["heroest"];
            $viewData["heroest_act"] = $viewData["heroest"] == "ACT";
            $viewData["heroest_ina"] = $viewData["heroest"] == "INA";
        }

        \Views\Renderer::render("mnt/hero", $viewData);
    }

}

/*
c#
import System.SQL.SqlConnection;

java

import java.utils.ArraList;

com.unicahiccnw.Main

com
 |- unicahiccnw
    |- Main.java

*/
?>
