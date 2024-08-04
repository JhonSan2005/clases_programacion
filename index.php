<?php
//Registro de Rutas y Controladores


// Incluir los archivos necesarios
//require_once './Router.php';: Incluye el archivo que contiene la clase Router.
require_once './Router.php';
//require_once './controller/BuscadorController.php'; y demás: Incluyen los archivos 
// de los controladores necesarios.//
require_once './controller/BuscadorController.php';
require_once './controller/ProductController.php';
require_once './controller/HomeController.php';
require_once './controller/AuthController.php';
require_once './controller/ProfileController.php';
require_once './controller/RecoverController.php';
require_once './controller/DashboardController.php';
// require_once './controller/AddproductoController.php';

// Crear una instancia del Router
$router = new Router;

// Registrar rutas públicas (acceso público)
$router->get('/', [HomeController::class, 'index']); // Página de inicio
$router->get('/products', [ProductController::class, 'index']); // Página de productos
$router->get('/search', [BuscadorController::class, 'buscar']); // Página de búsqueda
$router->get('/category', [ProductController::class, 'category']); // Página de registro (GET)


// Rutas de autenticación
$router->get('/login', [AuthController::class, 'login']); // Página de login (GET)
$router->post('/login', [AuthController::class, 'login']); // Manejo de login (POST)
$router->get('/register', [AuthController::class, 'register']); // Página de registro (GET)
$router->post('/register', [AuthController::class, 'register']); // Manejo de registro (POST)
$router->get('/recover', [RecoverController::class, 'recover']); // Página de recuperar contraseña (GET)
$router->post('/recover', [RecoverController::class, 'recover']); // Manejo de recuperar contraseña(POST)
$router->get('/products', [ ProductController::class, 'index']); // Página de recuperar contraseña (GET)
$router->get('/agregarProductos', [ ProductController::class, 'agregar']); // Manejo de recuperar contraseña(POST)
$router->post('/agregarProductos', [ ProductController::class, 'agregar']); 
$router->get('/dashboard', [ DashboardController::class, 'index']); // Manejo de recuperar contraseña(POST)
$router->get('/close-session', [AuthController::class, 'closeSession']); // Cerrar sesión

// Registrar rutas privadas (acceso restringido)
$router->get('/profile', [ProfileController::class, 'index']); // Página de perfil

// Verificar y ejecutar la ruta actual
$router->verifyRoutes();

?>
