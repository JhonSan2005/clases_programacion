<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../helpers/functions.php";



// Archivo: controllers/carritoController.php


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
}
