<?php
namespace Controllers\Mnt\Almacenes;

use Controllers\PublicController;
use Views\Renderer;


class Almacenes extends PublicController
{
    private $_viewData = array();
    public function run():void
    {
        $this->_viewData["almacenes"] = \Dao\Mnt\Almacenes\Almacenes::obtenerTodos();
        Renderer::render('mnt/almacenes/almacenes', $this->_viewData);
    }
}

?>
