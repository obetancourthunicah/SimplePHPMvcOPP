<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Quote extends PublicController {
    public function run():void
    {
        $viewData = array();
        $viewData["quote"] = "";
        $viewData["author"] = "";
        $viewData["status"] = "ACT";
        $viewData["act_selected"] = true;
        $viewData["ina_selected"] = false;

        if($this->isPostBack()){ // isset($_POST["btnGuardar"])
            $viewData["quote"] = $_POST["quote"];
            $viewData["author"] = $_POST["author"];
            $viewData["status"] = $_POST["status"];
            $viewData["act_selected"] = $viewData["status"] === "ACT";
            $viewData["ina_selected"] = $viewData["status"] === "INA";
            \Dao\Mnt\Quotes::AgregarQuote(
                $viewData["quote"],
                $viewData["author"],
                $viewData["status"]
            );
        }
        Renderer::render("mnt/quote", $viewData);
    }
}

?>
