<?php

namespace Dao\Mnt;

use Dao\Table;

class Categorias extends Table
{
    public static function obtenerTodos()
    {
        $sqlstr = "select * from categorias;";
        return self::obtenerRegistros(
            $sqlstr,
            array()
        );
    }
    public static function obtenerPorCatId($catid)
    {
        $sqlstr = "select * from categorias where catid=:catid;";
        return self::obtenerUnRegistro(
            $sqlstr,
            array("catid"=>$catid)
        );
    }
}


?>
