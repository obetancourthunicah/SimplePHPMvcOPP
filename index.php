<?php
/**
 * PHP Version 7.2
 *
 * @category Router
 * @package  SimplePHPOOPMvc
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */

use Utilities\Context;
use Utilities\Site;

require_once "autoloader.php";
require __DIR__ . '/vendor/autoload.php';
session_start();

\Utilities\Site::configure();


$pageRequest = \Utilities\Site::getPageRequest();

try {
    $instance = new $pageRequest();
    $instance->run();
    die();
} catch(\Controllers\PrivateNoAuthException $ex){
    $instance = new \Controllers\NoAuth();
    $instance->run();
    die();
} catch(\Controllers\PrivateNoLoggedException $ex){
    $redirTo = urlencode(\Utilities\Context::getContextByKey("request_uri"));
    \Utilities\Site::redirectTo("index.php?page=sec.login&redirto=".$redirTo);
    die();
} catch(Error $ex)
{
    error_log($ex);
    $instance = new \Controllers\Error();
    $instance->run();
    die();
}


?>
