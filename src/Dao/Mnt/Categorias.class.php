<?php

namespace Dao\Mnt;

class Categorias extends \Dao\Table
{
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * from categorias;", array());
    }
}

?>
