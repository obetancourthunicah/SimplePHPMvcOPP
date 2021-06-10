<?php
namespace Controllers\Admin;

class Admin extends \Controllers\PrivateController
{
    public function __construct()
    {
        // $userInRole = \Utilities\Security::isInRol(
        //     \Utilities\Security::getUserId(),
        //     "ADMIN"
        // );
        parent::__construct();
    }
    public function run() :void
    {
        \Views\Renderer::render("admin/admin", array());
    }
}
?>
