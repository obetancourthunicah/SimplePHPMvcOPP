<?php
namespace Dao;

class Dao {
    private static $_conn = null;

    private function __construct()
    {
      
    }

    private function __clone()
    {

    }

    public static function getConn($dds = null, $user = null, $pswd = null)
    {
        if (self::$_conn == null) {
            $_dds = sprintf(
                "%s:host=%s;dbname=%s;port=%s;charset=utf8",
                \Utilities\Context::getContextByKey("DB_PROVIDER"),
                \Utilities\Context::getContextByKey("DB_SERVER"),
                \Utilities\Context::getContextByKey("DB_DATABASE"),
                \Utilities\Context::getContextByKey("DB_PORT")
            );
            $_user = \Utilities\Context::getContextByKey("DB_USER");
            $_pswd = \Utilities\Context::getContextByKey("DB_PSWD");
            $_timezone = \Utilities\Context::getContextByKey("TIMEZONE");
            if ($dds !== null) {
                $_dds = $dds;
            }
            if ($user !== null) {
                $_user = $user;
            }
            if ($pswd !== null) {
                $_pswd = $pswd;
            }
            self::$_conn = new \PDO(
                $_dds,
                $_user,
                $_pswd,
                array(
                  \PDO::ATTR_EMULATE_PREPARES => true,
                  \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                  \PDO::ATTR_PERSISTENT => false //,
                  // \PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '". $_timezone ."'"
                )
            );
        }
        return self::$_conn;
    }
}
?>
