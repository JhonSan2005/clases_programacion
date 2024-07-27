<?php

require_once './Router.php';
require_once './controller/BuscadorController.php';
require_once './controller/ProductController.php';
require_once './controller/CategoryController.php';
require_once './controller/HomeController.php';
require_once './controller/AuthController.php';
require_once './controller/ProfileController.php';

$router = new Router;


// Acceso Publico
$router->get( '/', [HomeController::class, 'index'] );
$router->get( '/products', [ProductController::class, 'index'] );
$router->get( '/categories', [CategoryController::class, 'index'] );
$router->get( '/search', [BuscadorController::class, 'buscar'] );

// Auth
$router->get( '/login', [AuthController::class, 'login'] );
$router->post( '/login', [AuthController::class, 'login'] );
$router->get( '/register', [AuthController::class, 'register'] );
$router->post( '/register', [AuthController::class, 'register'] );
$router->get( '/close-session', [AuthController::class, 'closeSession'] );

// Acceso Privado
$router->get('/profile', [ProfileController::class, 'index']);

$router->verifyRoutes();
?>
