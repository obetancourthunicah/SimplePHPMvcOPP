<?php

namespace Controllers\Mnt;

use Utilities\ArrUtils;

class Heroe extends \Controllers\PrivateController
{
    public function run():void
    {
        $viewData = array();
        $ModalTitles = array(
            "INS" => "Nuevo Hero Panel",
            "UPD" => "Actualizando %s - %s",
            "DSP" => "Detalle de %s - %s",
            "DEL" => "Eliminado %s - %s"
        );

        $viewData["ModalTitle"] = "";
        $viewData["heroItemid"] = 0;
        $viewData["heroname"] = "";
        $viewData["heroimgurl"] = "/public/img/hero/";
        $viewData["heroaction"] = "<h1>Compra Ahora</h1>";
        $viewData["heroorder"] = 1;
        $viewData["heroest"] = 'ACT';
        $viewData["readonly"] = '';
        $viewData["showCommitBtn"] = true;
        $viewData["heroest_act"] = true;
        $viewData["heroest_ina"] = false;

        //if (isset($_POST["btnConfirmar"]))
        if ($this->isPostBack()) {
            $viewData["mode"] = $_POST["mode"];
            $viewData["heroItemid"] = $_POST["heroItemid"];
            $viewData["token"] = $_POST["token"];

            $this->verificarToken();
            if ($viewData["token"] != $_SESSION["heroes_xss_token"]) {
                $time = time();
                $token = md5("heroes" . $time);
                $_SESSION["heroes_xss_token"] = $token;
                $_SESSION["heroes_xss_token_tts"] = $time;
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_heroes",
                    "Algo sucedio mal intente de nuevo"
                );
            }

            if ($viewData["mode"] != "DEL") {
                $viewData["heroname"] = $_POST["heroname"];
                $viewData["heroimgurl"] = $_POST["heroimgurl"];
                $viewData["heroaction"] = $_POST["heroaction"];
                $viewData["heroorder"] = $_POST["heroorder"];
                $viewData["heroest"] = $_POST["heroest"];
            }
            switch($viewData["mode"]) {
            case "INS":
                $ok = \Dao\HeroPanel::addHero(
                    $viewData["heroname"],
                    $viewData["heroimgurl"],
                    $viewData["heroaction"],
                    $viewData["heroorder"],
                    $viewData["heroest"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_heroes",
                        "Hero Panel agregado Exitosamente"
                    );
                }
                break;
            case "UPD":
                $ok = \Dao\HeroPanel::updateHero(
                    $viewData["heroname"],
                    $viewData["heroimgurl"],
                    $viewData["heroaction"],
                    $viewData["heroorder"],
                    $viewData["heroest"],
                    $viewData["heroItemid"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_heroes",
                        "Hero Panel actualizado Exitosamente"
                    );
                }
                break;
            case "DEL":
                $ok = \Dao\HeroPanel::deleteHero(
                    $viewData["heroItemid"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_heroes",
                        "Hero Panel eliminado Exitosamente"
                    );
                }
                break;
            }


        } else {
            $viewData["mode"] = $_GET["mode"];
            $viewData["heroItemid"] = isset($_GET["id"])? $_GET["id"] : 0;
            $this->verificarToken();
            //$token = md5("heroes" . time());
            //$_SESSION["heroes_xss_token"] = $token;
        }

        //Visualizar los Datos
        if ($viewData["mode"] == "INS") {
            $viewData["ModalTitle"] = "Agregando nuevo Hero Panel";
        } else {
            //aqui obtenemos el registro por id.
            $heroItem = \Dao\HeroPanel::getHeroeById($viewData["heroItemid"]);
            /* $viewData["heroItemid"] = $heroItem["heroItemid"];
            $viewData["heroname"] = $heroItem["heroname"];
            $viewData["heroimgurl"] = $heroItem["heroimgurl"];
            $viewData["heroaction"] = $heroItem["heroaction"];
            $viewData["heroorder"] = $heroItem["heroorder"];
            $viewData["heroest"] = $heroItem["heroest"];
            */
            error_log(json_encode($heroItem));
            if (!$heroItem) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_heroes",
                    "No existe el registro"
                );
            }
            // Mas rapido lazy developers
            \Utilities\ArrUtils::mergeFullArrayTo($heroItem, $viewData);
            $viewData["ModalTitle"] = sprintf(
                $ModalTitles[$viewData["mode"]],
                $viewData["heroItemid"],
                $viewData["heroname"]
            );
            $viewData["heroest_act"] = $viewData["heroest"] == "ACT";
            $viewData["heroest_ina"] = $viewData["heroest"] == "INA";

            if ($viewData["mode"] == "DEL" || $viewData["mode"] == "DSP") {
                $viewData["readonly"] = "readonly";
                $viewData["showCommitBtn"]  = $viewData["mode"] == "DEL";
            }

        }

        \Views\Renderer::render("mnt/hero", $viewData);
    }

    private function verificarToken(){
        if (!isset($_SESSION["heroes_xss_token"])) {
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_heroes",
                "Algo sucedio mal intente de nuevo"
            );
        } else {
            $time = time();
            if ($time - $_SESSION["heroes_xss_token_tts"] > 86400) {
                //24 * 60 * 60  horas * minutos * segundo
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_heroes",
                    "Algo sucedio mal intente de nuevo"
                );
            }
        }
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
