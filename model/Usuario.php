<?php

require_once __DIR__ . '/../config/Conexion_db.php';

class Usuario extends Conexion{

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
    }
   
    public static function registrarUsuario($documento,$nombre, $correo, $password) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("INSERT INTO clientes (documento, nombre, correo, password) VALUES (?, ?, ?, ?)");
        $consulta->bind_param('ssss', $documento, $nombre, $correo, $password);
        $resultado = $consulta->execute();

        return $resultado;
    }

    public static function encontrarUsuario( $campo, $datoABuscar ) {
        $conexion = self::conectar();
        $consulta = $conexion->query("SELECT * From `clientes` WHERE `$campo` = '$datoABuscar' LIMIT 1")->fetch_assoc();
        return $consulta;
    }

}



?>