<?php 
namespace Controllers\Mnt;

class Categoria extends \Controllers\PublicController
{
    public function run() :void
    {
        \Views\Renderer::render("mnt/categoria", array());
    }
}

?>
