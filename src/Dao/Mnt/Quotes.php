<?php
namespace Dao\Mnt;

use Dao\Table;

class Quotes extends Table{
    public static function AgregarQuote ($quote, $author, $status) {
        $insertSQL = "INSERT INTO quotes (quote, author,
            status, created, updated)
        values(:quote, :author, :status, now(), now());";
        $params = array(
            "quote"=>$quote,
            "author"=>$author,
            "status"=>$status
        );
        return self::executeNonQuery($insertSQL, $params);
    }
}

?>
