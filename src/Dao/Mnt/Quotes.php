<?php
namespace Dao\Mnt;

use Dao\Table;

class Quotes extends Table{
    public static function AgregarQuote ($quote, $author, $status) {
        $insertSQL = "INSERT INTO quotes (quote, author,
            status, created, updated)
        values(:quote, :author, :status, now(), now());"; //?, ?, ?
        $params = array(
            "quote"=>$quote,
            "author"=>$author,
            "status"=>$status
        );
        return self::executeNonQuery($insertSQL, $params);
    }
    public static function getAllQuotes () {
        $selectSql = "SELECT * from quotes;";
        return self::obtenerRegistros($selectSql, array());
    }
    public static function getById($quoteId){
        $selectStr = "SELECT * FROM quotes where quoteId=:quoteId;";
        return self::obtenerUnRegistro(
            $selectStr,
            array("quoteId"=>$quoteId)
        );
    }

    public static function updateQuote($quote, $author, $status, $quoteId) {
        $updateSql = "UPDATE quotes SET quote=:quote, author=:author,
            status=:status, updated=now() where quoteId=:quoteId;"; //?, ?, ?
        $params = array(
            "quote"=>$quote,
            "author"=>$author,
            "status"=>$status,
            "quoteId"=>$quoteId
        );
        return self::executeNonQuery($updateSql, $params);
    }

    public static function deleteQuote($quoteId) {
        $deleteStr = "DELETE FROM quotes WHERE quoteId=:quoteId;";
        return self::executeNonQuery($deleteStr, array("quoteId" => $quoteId));
    }
}

?>
