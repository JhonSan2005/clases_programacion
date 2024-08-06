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
}




?>
