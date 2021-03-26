<?php 
namespace Controllers\Mnt;

class Categorias extends \Controllers\PrivateController
{
    public function run() :void
    {
        $dataview = array();
        $userId = \Utilities\Security::getUserId();
        $dataview["delete_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Categorias\Del"
        );
        $dataview["edit_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Categorias\Upd"
        );
        $dataview["new_enabled"] = \Utilities\Security::isAuthorized(
            $userId,
            "Controllers\Mnt\Categorias\New"
        );
        $dataview["items"] = \Dao\Mnt\Categorias::getAll();
        \Views\Renderer::render("mnt/categorias", $dataview);
    }
}

// index.php?page=mnt_categorias
