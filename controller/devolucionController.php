
<?php

require_once __DIR__ . "/../Router.php";

class DevolucionController {
    public static function devolucion(Router $router) {
        $router->render('profile/devolucion', [
            "title" => "Política de Devoluciones"
        ]);
    }

  
}
