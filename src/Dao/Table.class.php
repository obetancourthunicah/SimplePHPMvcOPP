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
            $query->bindParam(":".$key, $value);
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
            $query->bindParam(":" . $key, $value);
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
            $query->bindParam(":" . $key, $value);
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
