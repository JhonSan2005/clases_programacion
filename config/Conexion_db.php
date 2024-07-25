<?php
class Conexion {
    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $db_name = "BD_JJ";

    public static function conectar() {
        $conexion = new mysqli(self::$host, self::$user, self::$password, self::$db_name);

        if ($conexion->connect_error) {
            die("No se pudo conectar a la base de datos: " . $conexion->connect_error);
        }
        
        return $conexion;
    }
}
?>
