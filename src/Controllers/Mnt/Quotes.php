<?php

namespace Controllers\Mnt;

use Controllers\PublicController;
use Dao\Dao;
use Views\Renderer;

class Quotes extends PublicController{

    public function run() : void
    {
        $viewData = array();
        $viewData["quotes"] = \Dao\Mnt\Quotes::getAllQuotes();

        Renderer::render("mnt/quotes", $viewData);
    }
}

?>
