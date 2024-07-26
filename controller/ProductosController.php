<?php

class ProductosController {

    public static function index()
    {
        echo "Desde index en Productos Controller";
    }
    
    public static function products(Router $router)
    {
        $productos = Producto::mostrarproductos();

        $router->render('productos', [
            "title" => "Productos",
            "productos" => $productos
        ]);
     
    }

} 


?>