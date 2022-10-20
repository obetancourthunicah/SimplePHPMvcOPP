<?php

namespace Controllers\Tutorias;

use Controllers\PublicController;
use Views\Renderer;

class Tutores extends PublicController
{
    public function run () :void
    {
        $viewData = array();

        $tutores = array();

        $tutores[] = array(
            "nombre" => "Tutor 1",
            "img" => "urlDeUnSitio"
        );

        $tutores[] = array(
            "nombre" => "Tutor 2",
            "img" => "urlDeUnSitio"
        );

        $tutores[] = array(
            "nombre" => "Tutor 3",
            "img" => "urlDeUnSitio"
        );

        $viewData["totalTutores"] = count($tutores);
        $viewData["misTutores"] = $tutores;

        Renderer::render("tutorias/tutores", $viewData);
    }
}

?>
