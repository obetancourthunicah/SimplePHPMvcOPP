<?php
/**
 * PHP Version 7
 * Modelo de Datos para modelo
 *
 * @category Data_Model
 * @package  Models${1:modelo}
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @version 1.0.0
 *
 * @link http://url.com
 */

namespace Dao\Mnt;

use Dao\Table;

/**
 * Modelo de Datos para la tabla de Productos
 *
 * @category Data_Model
 * @package  Dao.Table
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 *
 * @link http://url.com
 */
class Productos extends Table
{
    /*
        `invPrdId` bigint(13) NOT NULL AUTO_INCREMENT,
        `invPrdBrCod` varchar(128) DEFAULT NULL,
        `invPrdCodInt` varchar(128) DEFAULT NULL,
        `invPrdDsc` varchar(128) DEFAULT NULL,
        `invPrdTip` char(3) DEFAULT NULL,
        `invPrdEst` char(3) DEFAULT NULL,
        `invPrdPadre` bigint(13) DEFAULT NULL,
        `invPrdFactor` int(11) DEFAULT NULL,
        `invPrdVnd` char(3) DEFAULT NULL,
    */
    /**
     * Obtiene todos los registros de Productos
     *
     * @return array
     */
    public static function getAll ()
    {
        $sqlstr = "Select * from productos;";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function insert(
        $invPrdBrCod,
        $invPrdCodInt,
        $invPrdDsc,
        $invPrdTip,
        $invPrdEst,
        $invPrdPadre,
        $invPrdFactor,
        $invPrdVnd
    ) {
        $sqlstr = "INSERT INTO `productos`
(`invPrdBrCod`, `invPrdCodInt`,
`invPrdDsc`, `invPrdTip`, `invPrdEst`,
`invPrdPadre`, `invPrdFactor`, `invPrdVnd`)
VALUES
(:invPrdBrCod, :invPrdCodInt,
:invPrdDsc, :invPrdTip, :invPrdEst,
:invPrdPadre, :invPrdFactor, :invPrdVnd);
";
        $sqlParams = [
            "invPrdBrCod" => $invPrdBrCod ,
            "invPrdCodInt" => $invPrdCodInt ,
            "invPrdDsc" => $invPrdDsc ,
            "invPrdTip" => $invPrdTip ,
            "invPrdEst" => $invPrdEst ,
            "invPrdPadre" => $invPrdPadre ,
            "invPrdFactor" =>  $invPrdFactor ,
            "invPrdVnd" => $invPrdVnd
        ];
        return self::executeNonQuery($sqlstr, $sqlParams);
    }
}
