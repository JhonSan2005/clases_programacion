<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../helpers/functions.php";

class CategoryController {

    public static function buscar( Router $router ) {
        
    $categoriABuscar = filter_var($_GET[$id_categoria]) ;

    }

}

?>