<?php

namespace Dao\Mnt;

class Categorias extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from categorias;", array());
    }

    public static function getOne($catid)
    {
        $sqlstr = "Select * from categorias where catid=:catid;";
        return self::obtenerUnRegistro($sqlstr, array("catid"=>$catid));
    }
}

?>
