<?php
/**
 * PHP Version 7.2
 * Mnt
 *
 * @category Controller
 * @package  Controllers\Mnt
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 * @version  CVS:1.0.0
 * @link     http://url.com
 */
 namespace Controllers\Mnt;

// ---------------------------------------------------------------
// Sección de imports
// ---------------------------------------------------------------
use Controllers\PublicController;
use Views\Renderer;
use Utilities\Validators;
use Dao\Mnt\Productos;

/**
 * Producto
 *
 * @category Public
 * @package  Controllers\Mnt;
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Producto extends PublicController
{
    private $viewData = array();
    private $arrProductoVendible = array();
    private $arrProductoTipo = array();
    private $arrModeDesc = array();
    private $arrEstados = array();

    /**
     * Runs the controller
     *
     * @return void
     */
    public function run():void
    {
        // code
        $this->init();
        // Cuando es método GET (se llama desde la lista)
        if (!$this->isPostBack()) {
            $this->procesarGet();
        }
        // Cuando es método POST (click en el botón)
        if ($this->isPostBack()) {
            $this->procesarPost();
        }
        // Ejecutar Siempre
        $this->processView();
        Renderer::render('mnt/producto', $this->viewData);
    }

    private function init()
    {
        $this->viewData = array();
        $this->viewData["mode"] = "";
        $this->viewData["mode_desc"] = "";
        $this->viewData["crsf_token"] = "";
        $this->viewData["invPrdId"] = "";
        $this->viewData["invPrdBrCod"] = "";
        $this->viewData["error_invPrdBrCod"] = array();
        $this->viewData["invPrdCodInt"] = "";
        $this->viewData["error_invPrdCodInt"] = array();
        $this->viewData["invPrdDsc"] = "";
        $this->viewData["error_invPrdDsc"] = array();
        $this->viewData["invPrdTip"] = "";
        $this->viewData["invPrdTipArr"] = array();
        $this->viewData["invPrdEst"] = "";
        $this->viewData["invPrdEstArr"] = array();
        $this->viewData["invPrdVnd"] = "";
        $this->viewData["invPrdVndArr"] = array();
        $this->viewData["btnEnviarText"] = "Guardar";
        $this->viewData["readonly"] = false;
        $this->viewData["showBtn"] = true;

        $this->arrModeDesc = array(
            "INS"=>"Nuevo Producto",
            "UPD"=>"Editando %s %s",
            "DSP"=>"Detalle de %s %s",
            "DEL"=>"Eliminado %s %s"
        );

        $this->arrEstados = array(
            array("value" => "ACT", "text" => "Activo"),
            array("value" => "INA", "text" => "Inactivo"),
        );

        $this->arrProductoTipo = array(
            array("value" => "MED", "text" => "Medicamentos"),
            array("value" => "LCH", "text" => "Leches"),
            array("value" => "ABR", "text" => "Abarrotería"),
            array("value" => "ELC", "text" => "Electrónica"),
            array("value" => "LNB", "text" => "Linea Blanca"),
            array("value" => "BEB", "text" => "Bebidas"),
            array("value" => "FRT", "text" => "Frutas"),
        );

        $this->arrProductoVendible = array(
            array("value" => "VND", "text" => "Vendible"),
            array("value" => "PLN", "text" => "Evaluando"),
            array("value" => "RTR", "text" => "Retirado"),
            array("value" => "DSC", "text" => "Descontinuado"),
            array("value" => "INA", "text" => "Inactivo"),
        );

        $this->viewData["invPrdTipArr"] = $this->arrProductoTipo;
        $this->viewData["invPrdEstArr"] = $this->arrEstados;
        $this->viewData["invPrdVndArr"] = $this->arrProductoVendible;

    }

    private function procesarGet()
    {
        if (isset($_GET["mode"])) {
            $this->viewData["mode"] = $_GET["mode"];
            if (!isset($this->arrModeDesc[$this->viewData["mode"]])) {
                error_log('Error: (Producto) Mode solicitado no existe.');
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_productos",
                    "No se puede procesar su solicitud!"
                );
            }
        }
        if ($this->viewData["mode"] !== "INS" && isset($_GET["id"])) {
            $this->viewData["invPrdId"] = intval($_GET["id"]);
            $tmpProducto = Productos::getById($this->viewData["invPrdId"]);
            error_log(json_encode($tmpProducto));
            \Utilities\ArrUtils::mergeFullArrayTo($tmpProducto, $this->viewData);
        }
    }
    private function procesarPost()
    {
        // Validar la entrada de Datos
        //  Todos valor puede y sera usando en contra del sistema
        $hasErrors = false;
        \Utilities\ArrUtils::mergeArrayTo($_POST, $this->viewData);
        if (isset($_SESSION[$this->name . "crsf_token"])
            && $_SESSION[$this->name . "crsf_token"] !== $this->viewData["crsf_token"]
        ) {
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_productos",
                "ERROR: Algo inesperado sucedió con la petición Intente de nuevo."
            );
        }

        if (Validators::IsEmpty($this->viewData["invPrdBrCod"])) {
            $this->viewData["error_invPrdBrCod"][]
                = "El código de Barras es requerido";
            $hasErrors = true;
        }
        if (Validators::IsEmpty($this->viewData["invPrdCodInt"])) {
            $this->viewData["error_invPrdCodInt"][]
                = "El código interno es requerido";
            $hasErrors = true;
        }
        if (Validators::IsEmpty($this->viewData["invPrdDsc"])) {
            $this->viewData["error_invPrdDsc"][]
                = "La descripción es requerida";
            $hasErrors = true;
        }
        error_log(json_encode($this->viewData));
        // Ahora procedemos con las modificaciones al registro
        if (!$hasErrors) {
            $result = null;
            switch($this->viewData["mode"]) {
            case 'INS':
                $result = Productos::insert(
                    $this->viewData["invPrdBrCod"],
                    $this->viewData["invPrdCodInt"],
                    $this->viewData["invPrdDsc"],
                    $this->viewData["invPrdTip"],
                    $this->viewData["invPrdEst"],
                    null,
                    1,
                    $this->viewData["invPrdVnd"]
                );
                if ($result) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_productos",
                            "Producto Guardado Satisfactoriamente!"
                        );
                }
                break;
            case 'UPD':
                $result = Productos::update(
                    $this->viewData["invPrdBrCod"],
                    $this->viewData["invPrdCodInt"],
                    $this->viewData["invPrdDsc"],
                    $this->viewData["invPrdTip"],
                    $this->viewData["invPrdEst"],
                    null,
                    1,
                    $this->viewData["invPrdVnd"],
                    intval($this->viewData["invPrdId"])
                );
                if ($result) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_productos",
                        "Producto Actualizado Satisfactoriamente"
                    );
                }
                break;
            case 'DEL':
                $result = Productos::delete(
                    intval($this->viewData["invPrdId"])
                );
                if ($result) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_productos",
                        "Producto Eliminado Satisfactoriamente"
                    );
                }
                break;
            }
        }
    }

    private function processView()
    {
        if ($this->viewData["mode"] === "INS") {
            $this->viewData["mode_desc"]  = $this->arrModeDesc["INS"];
            $this->viewData["btnEnviarText"] = "Guardar Nuevo";
        } else {
            $this->viewData["mode_desc"]  = sprintf(
                $this->arrModeDesc[$this->viewData["mode"]],
                $this->viewData["invPrdCodInt"],
                $this->viewData["invPrdDsc"]
            );
            $this->viewData["invPrdTipArr"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->arrProductoTipo,
                    'value',
                    'text',
                    'value',
                    $this->viewData["invPrdTip"]
                );
            $this->viewData["invPrdEstArr"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->arrEstados,
                    'value',
                    'text',
                    'value',
                    $this->viewData["invPrdEst"]
                );
            $this->viewData["invPrdVndArr"]
                = \Utilities\ArrUtils::objectArrToOptionsArray(
                    $this->arrProductoVendible,
                    'value',
                    'text',
                    'value',
                    $this->viewData["invPrdVnd"]
                );
            if ($this->viewData["mode"] === "DSP") {
                $this->viewData["readonly"] = true;
                $this->viewData["showBtn"] = false;
            }
            if ($this->viewData["mode"] === "DEL") {
                $this->viewData["readonly"] = true;
                $this->viewData["btnEnviarText"] = "Eliminar";
            }
            if ($this->viewData["mode"] === "UPD") {
                $this->viewData["btnEnviarText"] = "Actualizar";
            }
        }
        $this->viewData["crsf_token"] = md5(getdate()[0] . $this->name);
        $_SESSION[$this->name . "crsf_token"] = $this->viewData["crsf_token"];
    }
}
