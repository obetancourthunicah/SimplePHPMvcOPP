<?php
namespace Controllers\Admin;

class Admin extends \Controllers\PrivateController
{
    public function run() :void
    {
        \Views\Renderer::render("admin/admin", array());
    }
}
?>
