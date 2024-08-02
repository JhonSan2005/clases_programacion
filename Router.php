<?php

class Router {

    public array $getRoutes = [];
    public array $postRoutes = [];


    public function get( $path, $fn ) {
        $this->getRoutes[$path] = $fn;
    }

    public function post( $path, $fn ) {
        $this->postRoutes[$path] = $fn;
    }

    public function verifyRoutes() {

        $current_url = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if( $method == 'GET' ) {
            $fn = $this->getRoutes[$current_url] ?? null;
        } else {
            $fn = $this->postRoutes[$current_url] ?? null;
        }

        if( $fn ) {
            call_user_func($fn, $this);
        } else {
            header('Location: /404');
        }

    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value; 
        }

        ob_start(); 

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el layout de acuerdo a la URL
        $current_url = $_SERVER['PATH_INFO'] ?? '/';

        if( str_contains( $current_url, '/admin' ) ) {
            include_once __DIR__ . '/views/plantilla_admin.php';
        }else {
            include_once __DIR__ . '/views/plantilla.php';
        }

    }

}


?>