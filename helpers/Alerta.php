<?php


class Alerta {

    private static array $alertas = [];

    public static function obtenerAlertas() {
        return self::$alertas;
    }

    public function crearAlerta( $condicion, string $type, string $msg ) {
        if( $condicion ) {
            self::$alertas[] = [ "type" => $type, "msg" => $msg ];
        }
    }

}


?>