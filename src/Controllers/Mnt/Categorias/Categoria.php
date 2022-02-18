<?php
namespace Controllers\Mnt\Categorias;

use Controllers\PublicController;
use Views\Renderer;

class Categoria extends PublicController
{
    private $_modeStrings = array(
        "INS" => "Nueva Categoría",
        "UPD" => "Editar %s (%s)",
        "DSP" => "Detalle de %s (%s)",
        "DEL" => "Eliminando %s (%s)"
    );
    private $_catestOptions = array(
        "ACT" => "Activo",
        "INA" => "Inactivo"
    );
    private $_viewData = array(
        "mode"=>"INS",
        "catid"=>0,
        "catnom"=>"",
        "catest"=>"ACT",
        "modeDsc"=>"",
        "readonly"=>false,
        "isInsert"=>false,
        "catestOptions"=>[]
    );
    private function init(){
        if (isset($_GET["mode"])) {
            $this->_viewData["mode"] = $_GET["mode"];
        }
        if (isset($_GET["catid"])) {
            $this->_viewData["catid"] = $_GET["catid"];
        }
        if (!isset($this->_modeStrings[$this->_viewData["mode"]])) {
            error_log(
                $this->toString() . " Mode not valid " . $this->_viewData["mode"],
                0
            );
            \Utilities\Site::redirectToWithMsg(
                'index.php?page=mnt.categorias.categorias',
                'Sucedio un error al procesar la página.'
            );
        }
        if ($this->_viewData["mode"] !== "INS" && intval($this->_viewData["catid"], 10) !== 0) {
            $this->_viewData["mode"] !== "DSP";
        }
    }
    private function handlePost()
    {

    }
    private function prepareViewData()
    {
        if ($this->_viewData["mode"] == "INS") {

        } else {
            $tmpCategoria = \Dao\Mnt\Categorias::obtenerPorCatId(
                intval($this->_viewData["catid"], 10)
            );
            \Utilities\ArrUtils::mergeFullArrayTo($tmpCategoria, $this->_viewData);
            $this->_viewData["modeDsc"] = sprintf(
                $this->_modeStrings[$this->_viewData["mode"]],
                $this->_viewData["catnom"],
                $this->_viewData["catid"]
            );
        }
        $this->_viewData["catestOptions"]
            = \Utilities\ArrUtils::toOptionsArray(
                $this->_catestOptions,
                'value',
                'text',
                'selected',
                $this->_viewData['catest']
            );
    }
    public function run(): void
    {
        $this->init();
        if ($this->isPostBack()) {
            $this->handlePost();
        }
        $this->prepareViewData();
        Renderer::render('mnt/Categoria', $this->_viewData);
    }
}

?>
