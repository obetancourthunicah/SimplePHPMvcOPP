<?php

namespace Dao\Mnt\Almacenes;

use Dao\Table;

class Almacenes extends Table
{
    public static function obtenerTodos()
    {
        $sqlstr = "select * from almacenes;";
        return self::obtenerRegistros(
            $sqlstr,
            array()
        );
    }
    public static function obtenerPorAlmId($almcod)
    {
        $sqlstr = "select * from almacenes where almcod=:almcod;";
        return self::obtenerUnRegistro(
            $sqlstr,
            array("almcod"=>$almcod)
        );
    }

    public static function nuevoAlmacen($almdsc, $almest, $almtip)
    {
        $sqlstr= "INSERT INTO almacenes (almdsc, almest, almtip) values (:almdsc, :almest, :almtip);";
        return self::executeNonQuery(
            $sqlstr,
            array(
                "almdsc"=>$almdsc,
                "almest"=>$almest,
                "almtip"=>$almtip
            )
        );
    }

    public static function actualizarAlmacen($almdsc, $almest, $almtip, $almcod)
    {
        $sqlstr = "UPDATE almacenes set almdsc=:almdsc, almest=:almest, almtip=:almtip where almcod=:almcod";
        return self::executeNonQuery(
            $sqlstr,
            array(
                "almdsc"=> $almdsc,
                "almest"=> $almest,
                "almtip"=> $almtip,
                "almcod"=>$almcod
            )
        );
    }
    public static function eliminarAlmacen($almcod)
    {
        $sqlstr = "DELETE FROM almacenes where almcod=:almcod;";
        return self::executeNonQuery(
            $sqlstr,
            array(
                "almcod"=>$almcod
            )
        );
    }
}


?>
