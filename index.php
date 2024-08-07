<?php
// Registro de Rutas y Controladores

// Incluir los archivos necesarios
require_once './Router.php';
require_once './controller/BuscadorController.php';
require_once './controller/ProductController.php';
require_once './controller/HomeController.php';
require_once './controller/AuthController.php';
require_once './controller/ProfileController.php';
require_once './controller/RecoverController.php';
require_once './controller/DashboardController.php';
require_once './controller/CategoryController.php';
require_once './controller/CarritoController.php';
require_once './controller/DevolucionController.php';

// Crear una instancia del Router
$router = new Router();

// Registrar rutas públicas (acceso público)
$router->get('/', [HomeController::class, 'index']); // Página de inicio
$router->get('/products', [ProductController::class, 'index']); // Página de productos
$router->get('/search', [BuscadorController::class, 'buscar']); // Página de búsqueda
$router->get('/category', [ProductController::class, 'category']); 
$router->get('/carrito', [CarritoController::class, 'index']);
$router->get('/devolucion', [DevolucionController::class, 'devolucion']);

// Rutas de autenticación
$router->get('/login', [AuthController::class, 'login']); 
$router->post('/login', [AuthController::class, 'login']); 
$router->get('/register', [AuthController::class, 'register']); 
$router->post('/register', [AuthController::class, 'register']); 
$router->get('/recover', [RecoverController::class, 'recover']); 
$router->post('/recover', [RecoverController::class, 'recover']); 
$router->get('/close-session', [AuthController::class, 'closeSession']); // Cerrar sesión

// Registrar rutas privadas (acceso restringido)
$router->get('/profile', [ProfileController::class, 'index']); 
$router->post('/profile/verPerfil', [ProfileController::class, 'actualizar']); // Manejo de actualización (POST)

// Solo Administrador
$router->get('/admin/dashboard', [DashboardController::class, 'index']);
$router->get('/admin/products', [ProductController::class, 'verProductosAdmin']);
$router->post('/admin/products', [ProductController::class, 'eliminarproductoadmin']);
$router->get('/admin/agregarProductos', [ProductController::class, 'agregar']); 
$router->post('/admin/agregarProductos', [ProductController::class, 'agregar']); 
$router->get('/admin/orders', [DashboardController::class, 'index']);
$router->get('/admin/profile', [ProfileController::class, 'index']);
$router->get('/admin/categories', [CategoryController::class, 'agregarcategoria']);
$router->post('/admin/categories', [CategoryController::class, 'agregarcategoria']); 

// Verificar y ejecutar la ruta actual
$router->verifyRoutes();

?>
