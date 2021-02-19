<?php
/**
 * PHP Version 7.2
 *
 * @category Private
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */
namespace Controllers;

/**
 * Private Access Controller Base Class
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
abstract class PrivateController extends PublicController
{
    private function _isAuthorized()
    {
        throw new PrivateNoAuthException();
    }
    private function _isAuthenticated()
    {
        throw new PrivateNoLoggedException();
    }
    private function _isFeatureAutorized($feature) :boolean
    {
        return false;
    }
    public function __construct()
    {
        $this->name = get_class($this);
        $this->_isAuthenticated();
        $this->_isAuthorized();
    }
}

?>
