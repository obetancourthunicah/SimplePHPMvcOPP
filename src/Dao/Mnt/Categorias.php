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
    public static function crearCategoria($catnom, $catest)
    {
        $sqlstr = "INSERT INTO categorias (catnom, catest) values (:catnom, :catest);";
        $parametros = array(
            "catnom" => $catnom,
            "catest" => $catest
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }

    public static function editarCategoria($catnom, $catest, $catid)
    {
        $sqlstr = "UPDATE categorias set catnom=:catnom, catest=:catest where catid = :catid;";
        $parametros = array(
            "catnom" =>  $catnom,
            "catest" =>  $catest,
            "catid" => intval($catid)
        );
        return self::executeNonQuery($sqlstr, $parametros);
        // sqlstr = "UPDATE X SET Y = '".$Y."' where Z='".$Z."';";
        // $Y = "'; DROP DATABASE mysql; SELECT * FROM (SELECT DATE)
    }

    public static function eliminarCategoria($catid)
    {
        $sqlstr = "DELETE FROM categorias where catid=:catid;";
        $parametros = array(
            "catid" => intval($catid)
        );
        return self::executeNonQuery($sqlstr, $parametros);
    }
}

?>
