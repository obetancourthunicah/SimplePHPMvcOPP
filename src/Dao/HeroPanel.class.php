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

    public static function addHero($heroname, $heroimgurl, $heroaction, $heroorder, $heroest)
    {
        $insSQL = "INSERT INTO `heroitems` (`heroname`, `heroimgurl`, `heroaction`, `heroorder`, `heroest`) VALUES ( :heroname, :heroimgurl, :heroaction, :heroorder, :heroest);";
        $parameters = array(
            "heroname" => $heroname,
            "heroimgurl" => $heroimgurl,
            "heroaction" => $heroaction,
            "heroorder" => $heroorder,
            "heroest" => $heroest
        );

        return self::executeNonQuery($insSQL, $parameters);
    }

    public static function updateHero($heroname, $heroimgurl, $heroaction, $heroorder, $heroest, $heroItemid)
    {
        $updSQL = "UPDATE `heroitems` set `heroname`=:heroname, `heroimgurl`=:heroimgurl, `heroaction`=:heroaction, `heroorder`=:heroorder, `heroest`=:heroest where `heroItemid` =:heroItemid;";
        $parameters = array(
            "heroname" => $heroname,
            "heroimgurl" => $heroimgurl,
            "heroaction" => $heroaction,
            "heroorder" => $heroorder,
            "heroest" => $heroest,
            "heroItemid" => $heroItemid
        );

        return self::executeNonQuery($updSQL, $parameters);
    }

    public static function deleteHero($heroItemid)
    {
        $delSQL = "DELETE FROM `heroitems`  where `heroItemid`=:heroItemid;";
        $parameters = array(
            "heroItemid" => $heroItemid
        );

        return self::executeNonQuery($delSQL, $parameters);
    }

}



?>
