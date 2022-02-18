<?php
namespace Controllers\Mnt\Categorias;

use Controllers\PublicController;
use Views\Renderer;

/*
  categorias
  `catid` BIGINT(8) NOT NULL AUTO_INCREMENT,
  `catnom` VARCHAR(45) NULL,
  `catest` CHAR(3) NULL DEFAULT 'ACT',

*/
class Categorias extends PublicController
{
    public function run(): void
    {
        $viewData = array();
        $viewData["categorias"]
            = \Dao\Mnt\Categorias::obtenerTodos();
        Renderer::render('mnt/Categorias', $viewData);
    }
}

?>
