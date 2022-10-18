<?php
namespace Controllers\About;

use Controllers\PublicController;
use Views\Renderer;
class About extends PublicController{
    public function run() :void
    {
        //die("Run executed on About");
        $viewData = array(
            "variable" => "1.0.0"
        );
        Renderer::render("about/about", $viewData);
    }
}

?>
