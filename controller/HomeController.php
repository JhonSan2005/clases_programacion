<?php
include_once __DIR__ . '/../Router.php';
include_once __DIR__ . '/../model/Product.php';
include_once __DIR__ . '/../config/Conexion_db.php'; // Incluir tu archivo de conexión

class HomeController {

    public static function index(Router $router)
    {
        // Verifica si la base de datos existe
        if (!self::databaseExists()) {
            // Si no existe, redirige al instalador de la base de datos
            header('Location: ../BD/index.php'); // Cambia esto según la ruta de tu instalador
            exit();
        }

        // Si existe, continúa y muestra los productos
        $productos = Product::mostrarproductos(4);

        $router->render('home', [
            "title" => "Home",
            "productos" => $productos
        ]);
    }
    private static function databaseExists()
    {
        // Configuración de la conexión (puedes cambiar estos valores según tu configuración)
        $host = 'localhost'; // Cambia esto si es necesario
        $username = 'root'; // Cambia esto si es necesario
        $password = ''; // Cambia esto si es necesario

        // Crear conexión a la base de datos
        $conexion = Conexion::conectar($host, $username, $password); // Pasa los parámetros necesarios

        // Verificar si la conexión fue exitosa
        if ($conexion->connect_error) {
            return false;
        }

        // Comprobar si la base de datos específica existe
        $dbName = 'BD_JJ'; // Cambia esto por el nombre de tu base de datos
        $result = $conexion->query("SHOW DATABASES LIKE '$dbName'");

        $exists = $result && $result->num_rows > 0;

        // Cerrar la conexión
        $conexion->close();

        return $exists;
    }
}
?>
