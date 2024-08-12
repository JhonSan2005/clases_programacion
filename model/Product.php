<?php

require_once __DIR__ . '/../config/Conexion_db.php';

class Product extends Conexion{
   
    

    public static function agregarproductos($nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen_url) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("INSERT INTO productos (nombre_producto, precio, impuesto, stock, id_categoria, descripcion, imagen_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $consulta->bind_param('ssddiss', $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen_url);
        $resultado = $consulta->execute();

        return $resultado;
    }



    public static function mostrarproductos( int $limit = 0 ) {
        $conexion = self::conectar();
        $consulta = "SELECT * from productos";
        if( $limit && $limit > 0 ) {
            $consulta .= " Limit $limit";
        }
        $consulta .= ";";

        $resultado = $conexion->query($consulta)->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) return false;

        return $resultado;
    }

    public static function buscarProducto( $campo, $datoABuscar ) {
        $conexion = Conexion::conectar();
        $consulta = "SELECT * FROM `productos` WHERE `$campo` = '$datoABuscar'";
        $resultado = $conexion->query($consulta)->fetch_all(MYSQLI_ASSOC);

        if (!$resultado) return false;

        return $resultado;
    }

    public static function buscarPorParametro( string $parametroABuscar ) {
        $conexion = Conexion::conectar();
        $consulta = "SELECT * FROM `productos` WHERE `nombre_producto` LIKE '%$parametroABuscar%'";
        $resultado = $conexion->query($consulta)->fetch_all(MYSQLI_ASSOC);

        if( !$resultado ) return false;

        return $resultado;

    }
    public static function eliminarProductosAdmin($id_producto) {
        $conexion = self::conectar();
        
        // Eliminar las ventas relacionadas con el producto
        $consultaVentas = $conexion->prepare("DELETE FROM ventas WHERE id_producto = ?");
        $consultaVentas->bind_param('i', $id_producto);
        $consultaVentas->execute();
        
        // Ahora eliminar el producto
        $consultaProducto = $conexion->prepare("DELETE FROM productos WHERE id_producto = ?");
        $consultaProducto->bind_param('i', $id_producto);
        $resultado = $consultaProducto->execute();
    
        return $resultado;
    }
    

    public static function actualizarProductoPorColumna($columnaDB, $datoAActualizar, $id_producto) {
        $conexion = self::conectar();
        $consulta = $conexion->query("UPDATE `productos` SET `$columnaDB` = '$datoAActualizar' WHERE id_producto = $id_producto");
        return $consulta;
    }
    

}


?>
