<?php 
namespace Controllers\Mnt;

class Categoria extends \Controllers\PrivateController
{
    private $catid = 0;
    private $catnom = "";
    private $catest = "";
    private $catest_ACT = "";
    private $catest_INA = "";
    private $catest_PLN = "";

    private $mode_dsc = "";
    private $mode_adsc = array(
        "INS" => "Nueva Categoría",
        "UPD" => "Editar %s %s",
        "DEL" => "Eliminar %s %s",
        "DSP" => "%s %s"
    );

    private $readonly = "";
    private $showaction= true;

    private $hasErrors = false;
    private $aErrors = array();

    public function run() :void
    {
        /*
        1) Verificamos si es un postback o un get
        2) si es un get simplemente obtenemos datos y mostramos datos
        3) si es un post
          3.1) validamos datos del post
          3.2) realizamos la acción segun el modo del post
          3.3) verificamos el resultado de la acción
            3.3.1) si hay errores mostramos los errores en pantalla
            3.3.2) si no hay errores, mostramos mensaje de exito
                    y redirigimos a la lista
         */
        $this->mode = isset($_GET["mode"])?$_GET["mode"]:"";
        $this->catid = isset($_GET["catid"])?$_GET["catid"]:0;
        if (!$this->isPostBack()) {
            if ($this->mode !== "INS") {
                $this->_load();
            } else {
                $this->mode_dsc = $this->mode_adsc[$this->mode];
            }
        } else {
            $this->_loadPostData();
            if (!$this->hasErrors) {
                switch ($this->mode){
                case "INS":
                    if (\Dao\Mnt\Categorias::insert($this->catnom, $this->catest)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_categorias",
                            "¡Categoría Agregada Satisfactoriamente!"
                        );
                    }
                    break;
                case "UPD":
                    if (\Dao\Mnt\Categorias::update($this->catnom, $this->catest, $this->catid)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_categorias",
                            "¡Categoría Actualizada Satisfactoriamente!"
                        );
                    }
                    break;
                case "DEL":
                    if (\Dao\Mnt\Categorias::delete($this->catid)) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_categorias",
                            "¡Categoría Eliminada Satisfactoriamente!"
                        );
                    }
                    break;
                }
            }
        }

        $dataview = get_object_vars($this);
        \Views\Renderer::render("mnt/categoria", $dataview);
    }

    private function _load()
    {
        $_data = \Dao\Mnt\Categorias::getOne($this->catid);
        if ($_data) {
            $this->catid = $_data["catid"];
            $this->catnom = $_data["catnom"];
            $this->catest = $_data["catest"];
            $this->_setViewData();
        }
    }

    private function _loadPostData()
    {
        $this->catid = isset($_POST["catid"]) ? $_POST["catid"] : 0 ;
        $this->catnom = isset($_POST["catnom"]) ? $_POST["catnom"] : "" ;
        $this->catest = isset($_POST["catest"]) ? $_POST["catest"] : "ACT" ;

        //validaciones
        //aplicar todas la reglas de negocio
        if (\Utilities\Validators::IsEmpty($this->catnom)) {
            $this->aErrors[] = "¡La categoría no puede ir vacia!";
        }
        //
        $this->hasErrors = (count($this->aErrors) > 0);
        $this->_setViewData();
    }

    private function _setViewData()
    {
        $this->catest_ACT = ($this->catest === "ACT") ? "selected" : "";
        $this->catest_INA = ($this->catest === "INA") ? "selected" : "";
        $this->catest_PLN = ($this->catest === "PLN") ? "selected" : "";
        $this->mode_dsc = sprintf(
            $this->mode_adsc[$this->mode],
            $this->catid,
            $this->catnom
        );
        $this->readonly = ($this->mode =="DEL" || $this->mode=="DSP") ? "readonly":"";
        $this->showaction = !($this->mode == "DSP");
    }
}

?>
