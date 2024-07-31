<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Product.php";
require_once __DIR__ . "/../helpers/functions.php";

class ProductController {

    public static function index( Router $router ) {
        
        $productos = Product::mostrarproductos();

        $router->render('/products/verProductos', [
            "title" => "Productos",
            "productos" => $productos
        ]);

    }


}

?>