<?php 

namespace Controllers\Mnt;

class Heroes extends \Controllers\PublicController {

    public function run():void
    {
        $viewData = array();
        $tmpHeroes = \Dao\HeroPanel::getAllHeroes();
        $viewData["heroes"] = array();

        foreach ($tmpHeroes as $heroes) {
            $heroes["heroaction"] = str_replace(array("<",">"), array("&lt;", "&gt"), $heroes["heroaction"]);
            $viewData["heroes"][] = $heroes;
        }

        \Views\Renderer::render("mnt/heroes", $viewData);
    }
}

?>
