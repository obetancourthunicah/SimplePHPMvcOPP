<?php

namespace Controllers\Checkout;

use Controllers\PublicController;
class Error extends PublicController
{
    public function run(): void
    {
        echo "error";
        die();
    }
}

?>
