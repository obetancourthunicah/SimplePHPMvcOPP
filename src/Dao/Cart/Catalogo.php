<?php

namespace Dao\Cart;

class Catalogo extends \Dao\Table {
    public static function getProductosDisponibles(){
        $sqlAllProductosActivos = "SELECT * from productos where estprd in ('ACT','DSC');";
        $productosDisponibles = self::obtenerRegistros($sqlAllProductosActivos, array());

        //Sacar el stock de productos con carretilla autorizada
        $deltaAutorizada = \Utilities\Cart\CartFns::getAuthTimeDelta();
        $sqlCarretillaAutorizada = "select codprd, sum(crrctd) as reserved
            from carretilla where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= :delta
            group by codprd;";
        $prodsCarretillaAutorizada = self::obtenerRegistros(
            $sqlCarretillaAutorizada,
            array("delta"=>$deltaAutorizada)
        );
        //Sacar el stock de productos con carretilla no autorizada
        $deltaNAutorizada = \Utilities\Cart\CartFns::getUnAuthTimeDelta();
        $sqlCarretillaNAutorizada = "select codprd, sum(crrctd) as reserved
            from carretillaanom where TIME_TO_SEC(TIMEDIFF(now(), crrfching)) <= :delta
            group by codprd;";
        $prodsCarretillaNAutorizada = self::obtenerRegistros(
            $sqlCarretillaNAutorizada,
            array("delta"=>$deltaNAutorizada)
        );
        $productosCurados = array();
        foreach ($productosDisponibles as $producto) {
            if(!isset($productosCurados[$producto["codprd"]])) {
                $productosCurados[$producto["codprd"]] = $producto;
            }
        }
        foreach($prodsCarretillaAutorizada as $producto){
            if(isset($productosCurados[$producto["codprd"]])){
                $productosCurados[$producto["codprd"]]["stkprd"] -= $producto["reserved"];
            }
        }
        foreach($prodsCarretillaNAutorizada as $producto){
            if(isset($productosCurados[$producto["codprd"]])){
                $productosCurados[$producto["codprd"]]["stkprd"] -= $producto["reserved"];
            }
        }
        $productosDisponibles = null;
        $prodsCarretillaAutorizada = null;
        $prodsCarretillaNAutorizada = null;
        return $productosCurados;

    }
}
