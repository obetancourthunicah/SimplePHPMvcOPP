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

    public static function insert($catnom, $catest)
    {
        $insstr = "insert into categorias (catnom, catest) values (:catnom, :catest);";
        return self::executeNonQuery(
            $insstr,
            array("catnom"=>$catnom, "catest"=>$catest)
        );
    }
    public static function update($catnom, $catest, $catid)
    {
        $updsql = "update categorias set catnom = :catnom , catest=:catest where catid=:catid;";
        return self::executeNonQuery(
            $updsql,
            array("catnom" => $catnom, "catest" => $catest, "catid" => $catid)
        );
    }
    public static function delete( $catid)
    {
        $delsql = "delete from categorias where catid=:catid;";
        return self::executeNonQuery(
            $delsql,
            array( "catid" => $catid)
        );
    }

}

?>
