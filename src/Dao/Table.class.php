<?php

namespace Dao;

/**
 * Clase base para todos los modelos de datos
 */
abstract class Table
{
    private static $_conn = null;
    protected static function getConn()
    {
        if (self::$_conn == null) {
            self::$_conn = Dao::getConn();
        }
        return self::$_conn;
    }
    private static $_bindMapping = array(
        "boolean" => \PDO::PARAM_BOOL,
        "integer" => \PDO::PARAM_INT,
        "double"  => \PDO::PARAM_STR,
        "string" => \PDO::PARAM_STR,
        "array" => \PDO::PARAM_STR,
        "object" => \PDO::PARAM_STR,
        "resource" => \PDO::PARAM_STR,
        "NULL" => \PDO::PARAM_NULL,
        "unknown type" => \PDO::PARAM_STR
    );
    protected static function getBindType($value)
    {
        $valueType = gettype($value);

        return self::$_bindMapping[$valueType];
        /*
        "boolean"
        "integer"
        "double" (por razones históricas "double" es devuelto en caso de que un valor sea de tipo float, y no simplemente "float")
        "string"
        "array"
        "object"
        "resource"
        "NULL"
        "unknown type"
        */
        /*
        PDO::PARAM_BOOL (integer)
        Representa un tipo de dato booleano.
        PDO::PARAM_NULL (integer)
        Representa el tipo de dato NULL de SQL.
        PDO::PARAM_INT (integer)
        Representa el tipo de dato INTEGER de SQL .
        PDO::PARAM_STR (integer)
        Representa el tipo de dato CHAR, VARCHAR de SQL, u otro tipo de datos de cadena.
         */

    }

    protected static function obtenerRegistros($sqlstr, $params, &$conn = null)
    {
        $pConn = null;
        if ($conn != null) {
            $pConn = $conn;
        } else {
            $pConn = self::getConn();
        }
        $query = $pConn->prepare($sqlstr);
        foreach ($params as $key=>&$value) {
            $query->bindParam(":".$key, $value, self::getBindType($value));
        }
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetchAll();
    }

    protected static function obtenerUnRegistro($sqlstr, $params, &$conn = null)
    {
        $pConn = null;
        if ($conn != null) {
            $pConn = $conn;
        } else {
            $pConn = self::getConn();
        }
        $query = $pConn->prepare($sqlstr);
        foreach ($params as $key => &$value) {
            $query->bindParam(":" . $key, $value, self::getBindType($value));
        }
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_ASSOC);

        return $query->fetch();
    }

    protected static function executeNonQuery($sqlstr, $params,  &$conn = null)
    {
        $pConn = null;
        if ($conn != null) {
            $pConn = $conn;
        } else {
            $pConn = self::getConn();
        }
        $query = $pConn->prepare($sqlstr);
        foreach ($params as $key => &$value) {
            $query->bindParam(":" . $key, $value, self::getBindType($value));
        }
        return $query->execute();
    }

    protected static function _getStructFrom($structure, $data)
    {
        if (is_array($data) && is_array($structure)) {
            $newData = $structure;
            foreach ($data as $itemKey => $itemVal) {
                if (isset($newData[$itemKey])) {
                    $newData[$itemKey] = $itemVal;
                }
            }
            return $newData;
        } else {
            return array();
        }
    }
}

?>
