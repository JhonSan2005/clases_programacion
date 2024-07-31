<?php
//Registro de Rutas y Controladores


// Incluir los archivos necesarios
//require_once './Router.php';: Incluye el archivo que contiene la clase Router.
require_once './Router.php';
//require_once './controller/BuscadorController.php'; y demás: Incluyen los archivos 
// de los controladores necesarios.//
require_once './controller/BuscadorController.php';
require_once './controller/ProductController.php';
require_once './controller/CategoryController.php';
require_once './controller/HomeController.php';
require_once './controller/AuthController.php';
require_once './controller/ProfileController.php';

// Crear una instancia del Router
$router = new Router;

// Registrar rutas públicas (acceso público)
$router->get('/', [HomeController::class, 'index']); // Página de inicio
$router->get('/products', [ProductController::class, 'index']); // Página de productos
$router->get('/categories', [CategoryController::class, 'index']); // Página de categorías
$router->get('/search', [BuscadorController::class, 'buscar']); // Página de búsqueda

// Rutas de autenticación
$router->get('/login', [AuthController::class, 'login']); // Página de login (GET)
$router->post('/login', [AuthController::class, 'login']); // Manejo de login (POST)
$router->get('/register', [AuthController::class, 'register']); // Página de registro (GET)
$router->post('/register', [AuthController::class, 'register']); // Manejo de registro (POST)
$router->get('/close-session', [AuthController::class, 'closeSession']); // Cerrar sesión

// Registrar rutas privadas (acceso restringido)
$router->get('/profile', [ProfileController::class, 'index']); // Página de perfil

// Verificar y ejecutar la ruta actual
$router->verifyRoutes();

?>
/recover