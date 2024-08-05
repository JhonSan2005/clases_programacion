<?php

require_once __DIR__ . "/../config/Conexion_db.php";

class Category extends Conexion {

    public static function verCategorias( int $limit = 0 ) {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM `categorias`";
        if( $limit ) $query .= " LIMIT $limit";
        $query .= ";";
        $resulado = $conexion->query($query)->fetch_all(MYSQLI_ASSOC);
        return $resulado;
    }
    public static function buscarporcategoria($id_categoria) {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM `productos` WHERE `id_categoria` = $id_categoria;";
        $resultado = $conexion->query($query)->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
    public static function agregarcategorias($id_categoria, $nombre_categoria) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("INSERT INTO categorias (id_categoria, nombre_categoria) VALUES (?, ?)");
        $consulta->bind_param('ss', $id_categoria, $nombre_categoria);
        $resultado = $consulta->execute();

        return $resultado;
    }

    
}




?>
