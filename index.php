<?php

require_once './Router.php';
require_once './controller/ProductosController.php';
require_once './controller/HomeController.php';
require_once './controller/AuthController.php';

$router = new Router;

// echo "<pre>";
// var_dump($router->verifyRoutes());
// echo "</pre>";

$router->get( '/', [HomeController::class, 'index'] );
$router->get( '/productos', [ProductosController::class, 'index'] );

// Auth
$router->get( '/login', [AuthController::class, 'login'] );
$router->post( '/login', [AuthController::class, 'login'] );
$router->get( '/register', [AuthController::class, 'register'] );
$router->post( '/register', [AuthController::class, 'register'] );
$router->get( '/close-session', [AuthController::class, 'closeSession'] );
$router->get( '/products', [AuthController::class, 'products'] );




$router->verifyRoutes();
?>
