<?php
namespace Controllers;

class NoAuth extends PublicController
{
    public function run() :void
    {
        \Views\Renderer::render("noauth", array());
    }
}
?>
