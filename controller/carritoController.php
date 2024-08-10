<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../model/Product.php";
require_once __DIR__ . "/../helpers/functions.php";

class CarritoController {

    public static function index(Router $router) {
        // Lógica para obtener los productos del carrito
        $products = [
            [
                'id' => 1,
                'nombre' => 'Llanta Xcelink 400-8 TL Sellomatic Motocarro J-9117',
                'precio' => 134235,
                'imagen' => 'https://via.placeholder.com/150',
                'cantidad' => 1
            ],
            
            
         
            // Agrega más productos si es necesario.
        ];

        $router->render('products/carrito', [
            "title" => "Carrito de Compras",
            "products" => $products
        ]);
    }

    public static function obtenerInfoProducto() {

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            $idProduct = filter_var(intval($_POST['id_product'] ?? 0));

            if( !$idProduct ) {
                echo json_encode([ "msg" => "Error en la Consulta, Vuelve a intentarlo", "type" => "danger" ]);
                return;
            }

            $product = Product::buscarProducto('id_producto', $idProduct);

            if( !$product ) {
                echo json_encode([ "msg" => "Producto no Encontrado", "type" => "danger" ]);
                return;
            }

            echo json_encode([
                "producto" => $product[0]
            ]);

        }

    }

}
