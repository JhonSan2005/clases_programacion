<?php

require_once __DIR__ . "/../Router.php";

class DashboardController {

    public static function index( Router $router ) {

        $router->render('dashboard/dashboard', [
            "title" => "Dashboard"
        ]);

    }
    public static function tablaUser( Router $router ) {

        $router->render('dashboard/tablaUser', [
            "title" => "Dashboard"
        ]);

    }
    

}

?>