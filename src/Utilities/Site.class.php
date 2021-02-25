<?php

namespace Utilities;

class Site
{
    public static function configure()
    {
        $donenv = new \Utilities\DotEnv("parameters.env");
        \Utilities\Context::setArrayToContext($donenv->load());
        date_default_timezone_set("America/Tegucigalpa");
    }
    public static function getPageRequest()
    {
        $pageRequest = "index";
        if (isset($_GET["page"])) {
            $pageRequest = str_replace(array("_", "-", "."), "\\", $_GET["page"]);
        }
        Context::setArrayToContext($_GET);
        Context::setContext("request_uri", $_SERVER["REQUEST_URI"]);
        return "Controllers\\" . $pageRequest;
    }
    public static function redirectTo($url)
    {
        header("Location:".$url);
        die();
    }
    public static function redirectToWithMsg($url, $msg)
    {
        echo '<script>alert("'.$msg. '");';
        echo ' window.location.assign("'.$url.'");</script>';
        die();
    }
}
?>
