<?php
namespace Controllers\Mnt\Almacenes;

//use Controllers\PrivateController;
use Controllers\PublicController;
use Views\Renderer;

class Almacen extends PublicController
{
    private $_modeStrings = array(
        "INS" => "Nuevo Almacen",
        "UPD" => "Editar %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando %s (%s)"
    );
    private $_almestOptions = array(
        "ACT" => "Activo",
        "INA" => "Inactivo"
    );
    private $_almtipOptions = array(
        "ALM" => "Bodega",
        "TMP" => "Almacen Temporal",
        "DIS" => "Almacen Distribución"
    );
    private $_viewData = array(
        "mode"=>"INS",
        "almcod"=>0,
        "almdsc"=>"",
        "almest"=>"ACT",
        "almtip"=>"ALM",
        "modeDsc"=>"",
        "readonly"=>false,
        "isInsert"=>false,
        "almestOptions"=>[],
        "almtipOptions" => [],
        "crsxToken"=>""
    );
    private function init(){
        if (isset($_GET["mode"])) {
            $this->_viewData["mode"] = $_GET["mode"];
        }
        if (isset($_GET["almcod"])) {
            $this->_viewData["almcod"] = $_GET["almcod"];
        }
        if (!isset($this->_modeStrings[$this->_viewData["mode"]])) {
            error_log(
                $this->toString() . " Mode not valid " . $this->_viewData["mode"],
                0
            );
            \Utilities\Site::redirectToWithMsg(
                'index.php?page=mnt.almacenes.almacenes',
                'Sucedio un error al procesar la página.'
            );
        }
        if ($this->_viewData["mode"] !== "INS" && intval($this->_viewData["almcod"], 10) !== 0) {
            $this->_viewData["mode"] !== "DSP";
        }
    }
    private function handlePost()
    {
        \Utilities\ArrUtils::mergeFullArrayTo($_POST, $this->_viewData);
        print_r($_SESSION);
        print_r($this->_viewData);
        die();
        if (!(isset($_SESSION["almacen_crsxToken"])
            && $_SESSION["almacen_crsxToken"] == $this->_viewData["crsxToken"] )
        ) {
            $_SESSION["almacen_crsxToken"] = "";
            \Utilities\Site::redirectToWithMsg(
                'index.php?page=mnt.almacenes.almacenes',
                'Ocurrio un error, no se puede procesar el formulario.'
            );
        }


        $this->_viewData["almcod"] = intval($this->_viewData["almcod"], 10);
        if (!\Utilities\Validators::isMatch(
            $this->_viewData["almest"],
            "/^(ACT)|(INA)$/"
        )
        ) {
            $this->_viewData["errors"][] = "Estado de Almacen debe ser ACT o INA";
        }

        if (isset($this->_viewData["errors"]) && count($this->_viewData["errors"]) > 0 ) {

        } else {
            unset($_SESSION["categoria_crsxToken"]);
            switch ($this->_viewData["mode"]) {
            case 'INS':
                # code...
                $result = \Dao\Mnt\Almacenes\Almacenes::nuevoAlmacen(
                    $this->_viewData["almdsc"],
                    $this->_viewData["almest"],
                    $this->_viewData["almtip"]
                );
                if ($result) {
                    $_SESSION["almacen_crsxToken"] = "";
                    \Utilities\Site::redirectToWithMsg(
                        'index.php?page=mnt.almacenes.almacenes',
                        "¡Almacen guardada satisfactoriamente!"
                    );
                }
                break;
            case 'UPD':
                $result = \Dao\Mnt\Almacenes\Almacenes::actualizarAlmacen(
                    $this->_viewData["almdsc"],
                    $this->_viewData["almest"],
                    $this->_viewData["almtip"],
                    $this->_viewData["almcod"]
                );
                if ($result) {
                    $_SESSION["almacen_crsxToken"] = "";
                    \Utilities\Site::redirectToWithMsg(
                        'index.php?page=mnt.almacenes.almacenes',
                        "¡Almacen actualizada satisfactoriamente!"
                    );
                }
                break;
            case 'DEL':
                $result = \Dao\Mnt\Almacenes\Almacenes::eliminarAlmacen(
                    $this->_viewData["almcod"]
                );
                if ($result) {
                    $_SESSION["almacen_crsxToken"] = "";
                    \Utilities\Site::redirectToWithMsg(
                        'index.php?page=mnt.almacenes.almacenes',
                        "¡Almacen eliminada satisfactoriamente!"
                    );
                }
                break;
            default:
                # code...
                break;
            }
        }
    }
    private function prepareViewData()
    {
        if ($this->_viewData["mode"] == "INS") {
             $this->_viewData["modeDsc"]
                 = $this->_modeStrings[$this->_viewData["mode"]];
        } else {
            $tmpCategoria =\Dao\Mnt\Almacenes\Almacenes::obtenerPorAlmId(
                intval($this->_viewData["almcod"], 10)
            );
            \Utilities\ArrUtils::mergeFullArrayTo($tmpCategoria, $this->_viewData);
            $this->_viewData["modeDsc"] = sprintf(
                $this->_modeStrings[$this->_viewData["mode"]],
                $this->_viewData["almdsc"],
                $this->_viewData["almcod"]
            );
        }
        $this->_viewData["almestOptions"]
            = \Utilities\ArrUtils::toOptionsArray(
                $this->_almestOptions,
                'value',
                'text',
                'selected',
                $this->_viewData['almest']
            );
        $this->_viewData["almtipOptions"]
            = \Utilities\ArrUtils::toOptionsArray(
                $this->_almtipOptions,
                'value',
                'text',
                'selected',
                $this->_viewData['almtip']
            );

        $this->_viewData["crsxToken"] = md5(time()."almacen");
        $_SESSION["almacen_crsxToken"] = $this->_viewData["crsxToken"];
    }
    public function run(): void
    {
        $this->init();
        if ($this->isPostBack()) {
            $this->handlePost();
        }
        $this->prepareViewData();
        Renderer::render('mnt/almacenes/almacen', $this->_viewData);
    }
}
