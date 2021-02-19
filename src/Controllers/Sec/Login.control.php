<?php
namespace Controllers\Sec;
class Login extends \Controllers\PublicController
{
    public function run() :void
    {
        \Views\Renderer::render("security/login", array());
    }
}
?>
