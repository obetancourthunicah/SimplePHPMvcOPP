<?php 
namespace Controllers\Mnt;

class Categorias extends \Controllers\PublicController
{
    public function run() :void
    {
        $dataview = array();
        $dataview["items"] = \Dao\Mnt\Categorias::getAll();
        \Views\Renderer::render("mnt/categorias", $dataview);
    }
}
