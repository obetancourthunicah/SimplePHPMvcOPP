<?php

namespace Controllers\Clientes;

use Controllers\PublicController;
use Views\Renderer;

class Clientes extends PublicController
{
    public function run(): void
    {
        $viewData = array();
        $viewData["titulo"] = "Manejo de Clientes";
        $viewData["clientes"] = array(
            "Orlando",
            "Josue",
            "Adriana",
            "Carlos Gabriel",
            "Argelio"
        );
        Renderer::render('Clientes/Clientes', $viewData);
    }
}


?>
