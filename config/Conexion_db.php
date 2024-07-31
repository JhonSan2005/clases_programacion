<?php
class Conexion {
    // Propiedades de  laconexión a la base de datos
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $db_name = "BD_JJ";
    // Método estático para establecer una conexión a la base de datos
    public static function conectar() {
        // Crear una nueva conexión usando mysqli
        $conexion = new mysqli(self::$host, self::$user, self::$password, self::$db_name);
        // Verificar si hubo algún error en la conexión
        if ($conexion->connect_error) {
            // Mostrar un mensaje de error y terminar el script si no se pudo conectar
            die("No se pudo conectar a la base de datos: " . $conexion->connect_error);
        }  
        // Devolver el objeto de conexión si se conectó correctamente
        return $conexion;
    }
}
?>