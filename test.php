<?php
require_once "autoloader.php";
session_start();

\Utilities\Site::configure();

class testConn extends \Dao\Table
{
    public static function test()
    {
        $data = self::obtenerRegistros("select * from usuario;", array());
        print_r($data);
        die();
    }
}

testConn::test();
?>
