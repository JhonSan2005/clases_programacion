<?php

require_once  __DIR__ . '/../config/Conexion_db.php';

class ProductCategory extends Conexion {

    public static function mostrarProductosCategorias() {
        $conexion = Conexion::conectar();
        $query = "SELECT productos.id_producto, productos.nombre_producto, productos.precio, productos.impuesto, productos.stock, categorias.nombre_categoria, productos.descripcion, productos.imagen_url FROM `productos` INNER JOIN `categorias` ON productos.id_categoria = categorias.id_categoria";
        $resultado = $conexion->query($query)->fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }

}

?>