<?php

require_once __DIR__ . '/../config/Conexion_db.php';

class Factura extends Conexion {

    public static function guardar($descripcion, $idUsuario, $fecha_facturacion, $direccion, $impuesto) {
        $conexion = Conexion::conectar();
        $query = "INSERT INTO `factura`(`descripcion`, `id_estado`, `id_usuario`, `fecha_facturacion`, `direccion_facturacion`, `impuesto`) VALUES ('$descripcion','1','$idUsuario','$fecha_facturacion','$direccion','$impuesto')";
        $ejecutarConsulta = $conexion->query($query);

        if( !$ejecutarConsulta ) return false;

        $resultado = $conexion->insert_id;

        return $resultado;
    }

    public static function cosultaPorColumna( $columnaDB, $datoABuscar ) {
        $conexion = Conexion::conectar();
        $query = "SELECT * FROM `factura` WHERE $columnaDB = '$datoABuscar'";
        $resultado = $conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

    public static function eliminar($id) {
        $conexion = Conexion::conectar();
        $query = "DELETE * FROM `factura` WHERE id = '$id'";
        $resultado = $conexion->query($query);

        return $resultado;
    }

}

?>