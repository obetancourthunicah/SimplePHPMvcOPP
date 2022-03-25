<?php

namespace Dao\Orm;

use Dao\Table;

class TableDescribe extends Table{

    public static function obtenerEstructuraDeTabla( $tableName)
    {
        $sqlstr = sprintf("desc %s;", $tableName);
        return self::obtenerRegistros($sqlstr, array());
    }
}

?>
