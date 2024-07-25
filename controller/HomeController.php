<?php

include_once __DIR__ . '/../Router.php';
include_once __DIR__ . '/../model/Producto.php';

class HomeController {
    
    public static function index(Router $router)
    {
        
        $productos = Producto::mostrarproductos();

        $router->render('home', [
            "title" => "Home",
            "productos" => $productos
        ]);
    }

}

?>