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
            // Verificar la contraseña sin password_hash
            if ($password === $resultado['password']) {
                return true;
            }
        }
        return false;
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
        $consulta = $conexion->prepare("SELECT * FROM `usuario` WHERE `$campo` = ? LIMIT 1");
        $consulta->bind_param('s', $datoABuscar);
        $consulta->execute();
        $resultado = $consulta->get_result()->fetch_assoc();
        return $resultado;
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

    public static function guardarToken($idUsuario, $token) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("UPDATE usuario SET token=? WHERE id=?");
        $consulta->bind_param('si', $token, $idUsuario);
        return $consulta->execute();
    }

    public static function eliminarToken($idUsuario) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("UPDATE usuario SET token=NULL WHERE id=?");
        $consulta->bind_param('i', $idUsuario);
        return $consulta->execute();
    }

    public static function actualizarpassword($password) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("UPDATE usuario SET password=? WHERE id=?");
        $consulta->bind_param('si', $password);
        return $consulta->execute();
    }

    // Método para encontrar usuario por correo
    public static function encontrarUsuarioPorCorreo($correo) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("SELECT id FROM usuario WHERE correo=?");
        $consulta->bind_param('s', $correo);
        $consulta->execute();
        $resultado = $consulta->get_result();

        return $resultado->fetch_assoc(); // Devuelve el usuario o false si no se encontró
    }
    public static function encontrarUsuarioPorToken($token) {
        $query = "SELECT * FROM usuario WHERE token = :token LIMIT 1";
        // Lógica para preparar y ejecutar la consulta, luego devolver el usuario encontrado.
    }
}
?>
