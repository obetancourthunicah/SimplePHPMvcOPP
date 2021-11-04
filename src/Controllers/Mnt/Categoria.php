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
    private function yeah()
    {
        \Utilities\Site::redirectToWithMsg(
            "index.php?page=mnt_categorias",
            "Operación ejecutada Satisfactoriamente!"
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
            "Errors" => array(),
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
            $viewData["mode"] = $_POST["mode"];
            $viewData["catid"] = $_POST["catid"] ;
            $viewData["catnom"] = $_POST["catnom"];
            $viewData["catest"] = $_POST["catest"];
            $viewData["xsrftoken"] = $_POST["xsrftoken"];
            // Validate XSRF Token
            if (!isset($_SESSION["xsrftoken"]) || $viewData["xsrftoken"] != $_SESSION["xsrftoken"]) {
                $this->nope();
            }
            // Validaciones de Errores
            if (\Utilities\Validators::IsEmpty($viewData["catnom"])) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "El nombre no Puede Ir Vacio!";
            }
            if (($viewData["catest"] == "INA"
                || $viewData["catest"] == "ACT"
                || $viewData["catest"] == "PLN"
                ) == false
            ) {
                $viewData["hasErrors"] = true;
                $viewData["Errors"][] = "Estado de Categoria Incorrecto!";
            }

            
            if (!$viewData["hasErrors"]) {
                switch($viewData["mode"]) {
                case "INS":
                    if (\Dao\Mnt\Categorias::crearCategoria(
                        $viewData["catnom"],
                        $viewData["catest"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Categorias::editarCategoria(
                        $viewData["catnom"],
                        $viewData["catest"],
                        $viewData["catid"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Categorias::eliminarCategoria(
                        $viewData["catid"]
                    )
                    ) {
                        $this->yeah();
                    }
                    break;
                }
            }
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
        // Generar un token XSRF para evitar esos ataques
        $viewData["xsrftoken"] = md5($this->name . random_int(10000, 99999));
        $_SESSION["xsrftoken"] = $viewData["xsrftoken"];

        \Views\Renderer::render("mnt/categoria", $viewData);
    }
}


?>
