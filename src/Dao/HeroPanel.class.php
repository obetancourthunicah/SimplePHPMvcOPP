<?php 
namespace Dao;

class HeroPanel extends Table{
    /*
    `heroItemid` BIGINT(18) NOT NULL AUTO_INCREMENT,
    `heroname` VARCHAR(45) NULL,
    `heroimgurl` VARCHAR(256) NULL,
    `heroaction` VARCHAR(512) NULL,
    `heroorder` INT NULL,
    `heroest` CHAR(3) NULL,
    
    */
    public static function getActiveHeroeos()
    {
        $registros = array();
        $registros = self::obtenerRegistros(
            "SELECT * from heroitems where heroest='ACT';",
            array()
        );
        return $registros;
    }

    public static function getAllHeroes()
    {
        $registros = array();
        $registros = self::obtenerRegistros(
            "SELECT * from heroitems;",
            array()
        );
        return $registros;
    }

    public static function getHeroeById($id)
    {
        $sqlstr = "SELECT * from heroitems where heroItemid=:id;";
        $parameters = array("id" => $id);
        $registro = self::obtenerUnRegistro($sqlstr, $parameters);
        return $registro;

    }
}



?>
