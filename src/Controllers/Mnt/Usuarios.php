<?php

namespace Controllers\Mnt;

use Controllers\PrivateController;

class Usuarios extends PrivateController{
    public function run():void
    {
        $viewData = array();
        $viewData["Usuarios"] = \Dao\Security\Security::getUsuarios();
        $viewData["CanInsert"] = self::isFeatureAutorized("Controllers\Mnt\Usuario\New");
        $viewData["CanUpdate"] = self::isFeatureAutorized("Controllers\Mnt\Usuario\Upd");
        $viewData["CanDelete"] = self::isFeatureAutorized("Controllers\Mnt\Usuario\Del");
        $viewData["CanView"] = self::isFeatureAutorized("Controllers\Mnt\Usuario\Dsp");

        \Views\Renderer::render("mnt/usuarios", $viewData);
    }
}

/*
{
    Usuarios: [],
    CanInsert: true,
    CanUpdate: true,
    CanDelete: true,
    CanView: true
}

withContext =
root =
{
    Usuarios: [],
    CanInsert: true,
    CanUpdate: true,
    CanDelete: true,
    CanView: true
}

foreach Usuarios
    withContext = Usuarios
    
    root =
        {
            Usuarios: [],
            CanInsert: true,
            CanUpdate: true,
            CanDelete: true,
            CanView: true
        }
endfor Usuarios
*/

?>
