<?php

require_once __DIR__ . "/../Router.php";

class FormapagoController {

    

    public static function formaPago(Router $router) {
        $router->render('payments/formaPago', [
            "title" => "Forma de Pago"
        ]);
    }

}
?>
