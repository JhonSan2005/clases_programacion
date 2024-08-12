<?php

require_once __DIR__ . "/../config/Conexion_db.php";

class VentasFactura extends Conexion {
    
    public static function verDetallesFactura($idFactura) {
        $conexion = Conexion::conectar();
        $query = "SELECT ventas.id, descripcion, fecha_facturacion, direccion_facturacion, ventas.id AS id_venta, ventas.id_producto AS id_producto, ventas.cantidad AS cantidad FROM `factura` INNER JOIN `ventas` ON factura.id = ventas.id_factura";
        $resultado = $conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

}

?>