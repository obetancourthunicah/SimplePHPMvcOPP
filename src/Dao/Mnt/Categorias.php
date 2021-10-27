<?php
namespace Dao\Mnt;

use Dao\Table;

class Categorias extends Table
{
    public static function obtenerCategorias()
    {
        $sqlStr = "SELECT * from categorias;";
        return self::obtenerRegistros($sqlStr, array());
    }
    public static function obtenerCategoria($catid)
    {
        $sqlStr = "SELECT * from categorias where catid = :catid;";
        return self::obtenerUnRegistro($sqlStr, array("catid"=>intval($catid)));
    }
}

?>
