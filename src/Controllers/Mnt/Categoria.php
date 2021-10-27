<?php
namespace Controllers\Mnt;

use Controllers\PublicController;

class Categoria extends PublicController
{
    private function nope()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_categorias",
            "Ocurrió algo inesperado. Intente Nuevamente."
        );
    }
    public function run() :void
    {
        $viewData = array(
            "mode_dsc"=>"",
            "mode" => "",
            "catid" => "",
            "catnom" => "",
            "catest_ACT"=>"",
            "catest_INA" => "",
            "catest_PLN"=>"",
            "hasErrors" => false,
            "aErrors" => array(),
            "showaction"=>true,
            "readonly" => false
        );
        $modeDscArr = array(
            "INS" => "Nueva Categoría",
            "UPD" => "Editando Categoría (%s) %s",
            "DEL" => "Eliminando Categoría (%s) %s",
            "DSP" => "Detalle de Categoría (%s) %s"
        );

        if ($this->isPostBack()) {
            // se ejecuta al dar click sobre guardar
            
        } else {
            // se ejecuta si se refresca o viene la peticion
            // desde la lista
            if (isset($_GET["mode"])) {
                if (!isset($modeDscArr[$_GET["mode"]])) {
                    $this->nope();
                }
                $viewData["mode"] = $_GET["mode"];
            } else {
                $this->nope();
            }
            if (isset($_GET["catid"])) {
                $viewData["catid"] = $_GET["catid"];
            } else {
                if ($viewData["mode"] !=="INS") {
                    $this->nope();
                }
            }
        }

        // Hacer elementos en comun
       
        if ($viewData["mode"] == "INS") {
            $viewData["mode_dsc"]  = $modeDscArr["INS"];
        } else {
            $tmpCategoria = \Dao\Mnt\Categorias::obtenerCategoria($viewData["catid"]);
            $viewData["catnom"] = $tmpCategoria["catnom"];
            $viewData["catest_ACT"] = $tmpCategoria["catest"] == "ACT" ? "selected": "";
            $viewData["catest_INA"] = $tmpCategoria["catest"] == "INA" ? "selected" : "";
            $viewData["catest_PLN"] = $tmpCategoria["catest"] == "PLN" ? "selected" : "";
            $viewData["mode_dsc"]  = sprintf(
                $modeDscArr[$viewData["mode"]],
                $viewData["catid"],
                $viewData["catnom"]
            );
            if ($viewData["mode"] == "DSP") {
                $viewData["showaction"]= false ;
                $viewData["readonly"] = "readonly";
            }
            if ($viewData["mode"] == "DEL") {
                $viewData["readonly"] = "readonly";
            }

        }


        \Views\Renderer::render("mnt/categoria", $viewData);
    }
}


?>
