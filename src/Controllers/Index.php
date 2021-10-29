<?php
/**
 * PHP Version 7.2
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @version  CVS:1.0.0
 * @link     http://
 */
namespace Controllers;

/**
 * Index Controller
 *
 * @category Public
 * @package  Controllers
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Index extends PublicController
{
    /**
     * Index run method
     *
     * @return void
     */
    public function run() :void
    {
        // Addlink para agregar archivos css propios de la pantalla
        // sin afectar todo el layout
        \Utilities\Site::addLink("public/css/test.css");

        //Para agregar scripts de javascript externos
        \Utilities\Site::addEndScript("public/js/sayhello.js");

        $viewData = array();

        $viewData["atomicArray"] = array("Hola","Esto","Es","Un","Arreglo");
        $viewData["datoRaiz"] = "Hola estoy en la raiz";
        $viewData["Fechas"] = array(
            array("id" => "Lns", "desc"=>"Lunes"),
            array("id" => "Mrt", "desc" => "Martes"),
            array("id" => "Mrc", "desc" => "Miercoles"),
            array("id" => "Jvs", "desc" => "Jueves"),
            array("id" => "Vrn", "desc" => "Viernes"),
            array("id" => "Sbd", "desc" => "Sabado"),
            array("id" => "Dmg", "desc" => "Domingo")
        );

        $viewData["estaAutorizadoVer"] = false;

        $viewData["UserData"]= array(
            "codigo" => "1",
            "descripcion" => "Usuario"
        );

        \Views\Renderer::render("index", $viewData);
    }
}
?>
