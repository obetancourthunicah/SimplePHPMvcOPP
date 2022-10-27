<?php
namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;

class Quote extends PublicController {
    private $arrModeDsc = array(
        "INS" => "Agregar nueva Cita",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminando %s %s",
        "DSP" => "Detalle de %s %s"
    );
    private $viewData = array(
        "mode" => "",
        "mode_dsc" => "",
        "quoteId" => -1,
        "quote" => "",
        "author" => "",
        "status" => "ACT",
        "act_selected" => true,
        "ina_selected" => false
    );
    public function run():void
    {
        $this->onForm_loaded();
        if($this->isPostBack()){ // isset($_POST["btnGuardar"])
            $this->viewData["quote"] = $_POST["quote"];
            $this->viewData["author"] = $_POST["author"];
            $this->viewData["status"] = $_POST["status"];
            \Dao\Mnt\Quotes::AgregarQuote(
                $this->viewData["quote"],
                $this->viewData["author"],
                $this->viewData["status"]
            );
        }
        $this->pre_render();
        Renderer::render("mnt/quote", $this->viewData);
    }

    private function onForm_loaded()
    {
        if(!isset($_GET["mode"])){
            $this->errorRedir();
        }
        $this->viewData["mode"] = $_GET["mode"];
        if(!isset($this->arrModeDsc[$this->viewData["mode"]])){
            $this->errorRedir();
        }
        if($this->viewData["mode"]!=="INS"){
            if(!isset($_GET["quoteId"])){
                $this->errorRedir();
            }
            $quoteId = intval($_GET["quoteId"]);
            $dbQuote = \Dao\Mnt\Quotes::getById($quoteId);
            \Utilities\ArrUtils::mergeFullArrayTo($dbQuote, $this->viewData);
        }
    }
    private function on_update_clicked(){

    }
    private function on_delete_clicked(){

    }
    private function on_insert_clicked(){

    }
    private function pre_render(){
        $this->viewData["act_selected"] = $this->viewData["status"] === "ACT";
        $this->viewData["ina_selected"] = $this->viewData["status"] === "INA";
    }

    /// Utilities
    private function errorRedir(){
        \Utilities\Site::redirectToWithMsg(
                "index.php?page=Mnt-Quotes",
                "¡Algo Inesperado sucedió!"
            );
    }
}

?>
