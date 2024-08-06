
<?php
require_once __DIR__ . "/../Router.php";
class devolucionController {
    public static function devolucion(Router $router) {
        $router->render('profile/devolucion', [
            "title" => "Política de Devoluciones"
        ]);
    }

  
}
