<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../helpers/functions.php";

class CategoryController {

    public static function index( Router $router ) {

        $isAuth = isAuth();

        if( !$isAuth ) {
            return header("Location: /");
        }

        $categories = Category::verCategorias();

        $router->render('categories/verCategorias', [
            "title" => "Categorias",
            "categories" => $categories
        ]);

    }
    
    public static function agregarcategoria(Router $router) {
        if (!isAuth()) {
            header("Location: /");
            exit;
        }
    
        $alertas = new Alerta;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_VALIDATE_FLOAT);
            $nombre_categoria = filter_input(INPUT_POST, 'nombre_categoria', FILTER_VALIDATE_FLOAT);
    
            $alertas->crearAlerta(!$id_categoria, 'danger', 'El id no puede ir vacío');
            $alertas->crearAlerta(!$nombre_categoria, 'danger', 'El nombre no puede ir vacío');
    
            if (!$alertas->obtenerAlertas()) {
                $resultado = Category::agregarcategorias($id_categoria, $nombre_categoria);
    
                if (!$resultado) {
                    $alertas->crearAlerta(true, 'danger', 'Error al agregar la categoría');
                }
            }
        }
    
        $router->render('categories/agregarCategoria', [
            "title" => "Agregar Categoría",
            "alertas" => $alertas->obtenerAlertas()
        ]);
    }
    
}

    
?>