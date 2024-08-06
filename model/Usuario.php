<?php
require_once __DIR__ . '/../config/Conexion_db.php';

class Usuario extends Conexion {

    public static function validarlogin($correo, $password) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("SELECT * FROM clientes WHERE correo = ? LIMIT 1");
        $consulta->bind_param('s', $correo);
        $consulta->execute();
        $resultado = $consulta->get_result()->fetch_assoc();

        if ($resultado) {
            if ($password === $resultado['password']) { // Comparación directa de contraseñas
                return true;
            } else {
                return false;
            }
        }
        return false; // Retornar false si no se encuentra el usuario
    }
   
    public static function registrarUsuario($documento, $nombre, $correo, $password) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("INSERT INTO clientes (documento, nombre, correo, password) VALUES (?, ?, ?, ?)");
        $consulta->bind_param('ssss', $documento, $nombre, $correo, $password);
        $resultado = $consulta->execute();

        return $resultado;
    }

    public static function encontrarUsuario($campo, $datoABuscar) {
        $conexion = self::conectar();
        $consulta = $conexion->query("SELECT * FROM `clientes` WHERE `$campo` = '$datoABuscar' LIMIT 1")->fetch_assoc();
        return $consulta;
    }

    public static function actualizarUsuario($documento, $nombre, $correo, $password, $imagen_url) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("UPDATE clientes SET documento=? , nombre=?, correo=?, password=?, imagen_url=? WHERE id=?");
        $consulta->bind_param('sssss' ,$documento ,$nombre, $correo, $password, $imagen_url, );
        $resultado = $consulta->execute();
    
        return $resultado;
    }
    
}
?>