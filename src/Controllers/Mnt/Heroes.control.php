<?php

namespace Controllers\Mnt;

class Heroes extends \Controllers\PrivateController {

    public function run():void
    {
        $viewData = array();
        $tmpHeroes = \Dao\HeroPanel::getAllHeroes();
        $viewData["heroes"] = array();
        $counter = 0;
        foreach ($tmpHeroes as $heroes) {
            $counter ++;
            $heroes["rownum"] = $counter;
            $heroes["heroaction"] = str_replace(array("<",">"), array("&lt;", "&gt"), $heroes["heroaction"]);
            $viewData["heroes"][] = $heroes;
        }
        $time = time();
        $token = md5("heroes". $time);
        $_SESSION["heroes_xss_token"] = $token;
        $_SESSION["heroes_xss_token_tts"] = $time;
        \Views\Renderer::render("mnt/heroes", $viewData);
    }
}

?>
