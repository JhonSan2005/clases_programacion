<?php

require_once __DIR__ . "/../Router.php";

class HistoryController {

    

    public static function history(Router $router) {
        $router->render('products/history', [
            "title" => "Sobre Nosotros"
        ]);
    }

}
?>
