<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../helpers/functions.php";
require_once __DIR__ . "/../model/Product.php";

class BuscadorController {

    public static function buscar(Router $router) {

        $parametroABuscar = filter_var($_GET['q'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if( !$parametroABuscar ) header("Location: /");

        $resultados = Product::buscarPorParametro($parametroABuscar);

        $router->render("searchBar/verResultados", [
            "title" => "Buscando...",
            "parametroABuscar" => $parametroABuscar,
            "resultadosBusqueda" => $resultados,
        ]);

    }

}

?>