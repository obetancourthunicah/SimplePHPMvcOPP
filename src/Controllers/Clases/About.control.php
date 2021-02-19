<?php 

namespace Controllers\Clases;

class About extends \Controllers\PublicController
{
    public function run() :void
    {
        $viewData = array(
            "cuenta" => "0801198412349",
            "nombre" => "Orlando J Betancourth",
            "correo" => "obetancourthunicah@gmail.com"
        );

        \Views\Renderer::render("clases/about", $viewData);
        // index.php?page=clases_about
    }

}

?>
