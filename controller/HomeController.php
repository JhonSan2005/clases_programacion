<?php

include_once __DIR__ . '/../Router.php';
include_once __DIR__ . '/../model/Product.php';

class HomeController {
    
    public static function index(Router $router)
    {
        
        $productos = Product::mostrarproductos(4);

        $router->render('home', [
            "title" => "Home",
            "productos" => $productos
        ]);
    }

}

?>