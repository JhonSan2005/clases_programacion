<?php
class Conexion {
    private static $host = 'localhost';
    private static $user = 'root';
    private static $password = '';
    private static $db_name = 'BD_JJ';
    public static function configurar($host, $user, $password, $db_name) {
        self::$host = $host;
        self::$user = $user;
        self::$password = $password;
        self::$db_name = $db_name;
    }
    public static function conectar() {
        $conexion = new mysqli(self::$host, self::$user, self::$password);
        if ($conexion->connect_error) {
            die("No se pudo conectar al servidor MySQL: " . $conexion->connect_error);
        }
        $result = $conexion->query("SHOW DATABASES LIKE '" . self::$db_name . "'");
        if ($result && $result->num_rows == 0) {
            if ($conexion->query("CREATE DATABASE " . self::$db_name) === TRUE) {
                echo "Base de datos creada exitosamente. ";
            } else {
                die("Error al crear la base de datos: " . $conexion->error);
            }
        }
        $conexion->select_db(self::$db_name);
        return $conexion;
    }
}
?>