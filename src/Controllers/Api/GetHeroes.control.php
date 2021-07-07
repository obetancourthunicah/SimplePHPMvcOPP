<?php

namespace Controllers\Api;

use Controllers\PublicController;

class GetHeroes extends PublicController{

    public function run():void
    {
        $dataToSend = array(
            "msg"=>"Entro a controlador de Api"
        );
        //send as json
        header("Content-Type: application/json");
        echo json_encode($dataToSend);
        die();
    }
}

?>
