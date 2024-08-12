<?php

require_once __DIR__ . '/../config/Conexion_db.php';

class Ventas extends Conexion {

    public static function guardar($idFactura, $idProducto, $cantidadProducto) {
        $conexion = Conexion::conectar();
        $query = "INSERT INTO `ventas`(`id_factura`, `id_producto`, `cantidad`) VALUES ('$idFactura','$idProducto','$cantidadProducto')";
        $resultado = $conexion->query($query);

        return $resultado;
    }

}

?>