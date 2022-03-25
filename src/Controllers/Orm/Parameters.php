<?php 

    namespace Controllers\Orm;

use Controllers\PublicController;
use Views\Renderer;

class Parameters extends PublicController {

    private $viewData = array();

    public function run():void 
    {
        if ($this->isPostBack()) {
            \Utilities\ArrUtils::mergeFullArrayTo($_POST, $this->viewData);
            $this->viewData["tableData"] = \Dao\Orm\TableDescribe::obtenerEstructuraDeTabla($this->viewData["table"]);
            $this->generateListController();
        }
        Renderer::render("orm/parameters", $this->viewData);
    }

    private function generateListController()
    {
        $buffer = array();
        $buffer[] = '<?php';
        $buffer[] = sprintf('namespace \Controller\%s;', $this->viewData["namespace"]);
        $buffer[] = 'use Controllers\PublicController;';
        $buffer[] = 'use Views\Renderer;';
        $buffer[] = sprintf('class %ss extends PublicController {', $this->viewData["entity"]);
        foreach ($this->viewData['tableData'] as $field) {
            $buffer[] = sprintf('  private $_%s;', $field["Field"]);
        }
        $buffer[] = '}';
        $buffer[] = '?>';

        $this->viewData["listController"] = htmlspecialchars(implode("\n", $buffer));
    }
}

?>
