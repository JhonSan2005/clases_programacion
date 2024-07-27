<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Producto.php";
require_once __DIR__ . "/../helpers/functions.php";

class ProductosController {

    public static function index( Router $router ) {
        
        $productos = Producto::mostrarproductos();

        $router->render('/products/verProductos', [
            "title" => "Productos",
            "productos" => $productos
        ]);

    }


}

?>