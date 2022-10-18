<?php
namespace Controllers\Tutorias;

use Controllers\PublicController;
use Views\Renderer;

class Tutorias extends PublicController {
    public function run() :void
    {
        $viewData = array();
        $viewData["catnom"] = "Categoría X";
        $viewData["catid"] = "CAT0001";
        $viewData["tableElements"] = array();
        for ($i = 0 ; $i < 5; $i++) {
            $viewData["tableElements"][] = array(
                "col1" =>  "Col 1, Row " . ($i + 1),
                "col2" =>  "Col 2, Row " . ($i + 1),
                "col3" =>  "Col 3, Row " . ($i + 1),
                "col4" =>  "Col 4, Row " . ($i + 1),
                "col5" =>  "Col 5, Row " . ($i + 1),
            );
        }
        Renderer::render("tutorias/landing", $viewData);
    }
}

?>
