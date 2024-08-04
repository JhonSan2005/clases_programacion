<?php

require_once __DIR__ . "/../Router.php";

class DashboardController {

    public static function index( Router $router ) {

        $router->render('dashboard/admin', [
            "title" => "Dashboard"
        ]);

    }

}

?>