<?php
require_once __DIR__ . '/../config/Conexion_db.php';

class Usuario extends Conexion {

    public static function validarlogin($correo, $password) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("SELECT * FROM usuario WHERE correo = ? LIMIT 1");
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
    $id_rol = 2; 

    $token = md5(uniqid(rand(), true));

    $consulta = $conexion->prepare("INSERT INTO usuario (documento, nombre, correo, password, id_rol, token) VALUES (?, ?, ?, ?, ?, ?)");
    $consulta->bind_param('ssssis', $documento, $nombre, $correo, $password, $id_rol, $token);
    $resultado = $consulta->execute();

    return $resultado;
}

    public static function encontrarUsuario($campo, $datoABuscar) {
        $conexion = self::conectar();
        $consulta = $conexion->query("SELECT * FROM `usuario` WHERE `$campo` = '$datoABuscar' LIMIT 1")->fetch_assoc();
        return $consulta;
    }
    public static function actualizarUsuario($documento, $nombre, $correo, $foto_perfil, $id) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("UPDATE usuario SET documento=?, nombre=?, correo=?, foto_perfil=? WHERE id=?");
        $consulta->bind_param('ssssi', $documento, $nombre, $correo, $foto_perfil, $id);
        $resultado = $consulta->execute();
        
        return $resultado;
    }
    public static function eliminarcuentauser($id) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("DELETE FROM usuario WHERE id = ?");
        $consulta->bind_param('i', $id);
        $resultado = $consulta->execute();
    
        return $resultado;
    }



    
}
?>