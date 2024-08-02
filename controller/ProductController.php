


<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Product.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../helpers/functions.php";

    class ProductController {

    public static function index(Router $router) {
        
        // Obtener el id de la categoría desde la URL, si no esta se muestran todos
        $id_categoria = $_GET['category'] ?? 'all';
        // Si la categoría es all se muestran todos los productos
        // Y Si es otra categoría se buscan los productos de  esa categoría
        $productos = $id_categoria === 'all' ?
            Product::mostrarproductos() :
            Category::buscarPorCategoria($id_categoria);

        
        $router->render('/products/verProductos', [
            "title" => "Productos",
            "productos" => $productos
        ]);
    }
}


?>