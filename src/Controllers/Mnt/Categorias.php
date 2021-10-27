<?php

namespace Controllers\Mnt;

use Controllers\PublicController;
use Views\Renderer;


class Categorias extends PublicController
{
    public function run() :void 
    {
        $viewData = array();
        $viewData["items"] = \Dao\Mnt\Categorias::obtenerCategorias();
        $viewData["new_enabled"] = true;
        $viewData["edit_enabled"] = true;
        $viewData["delete_enabled"] = true;
        Renderer::render("mnt/categorias", $viewData);
    }
}
