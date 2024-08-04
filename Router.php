<?php

class Router {
    // Arrays para almacenar las rutas GET y POST
    public array $getRoutes = [];
    public array $postRoutes = [];
    // Método para registrar una ruta GET
    public function get($path, $fn) {
        // Almacena la función asociada a la ruta GET en el array $getRoutes
        $this->getRoutes[$path] = $fn;
    }
    // Método para registrar una ruta POST
    public function post($path, $fn) {
        // Almacena la función asociada a la ruta POST en el array $postRoutes
        $this->postRoutes[$path] = $fn;
    }
    // Método para verificar las rutas y ejecutar la función correspondiente
    public function verifyRoutes() {
        // Obtiene la URL actual
        $current_url = $_SERVER['PATH_INFO'] ?? '/';

        // Obtiene el método de la petición (GET o POST)
        $method = $_SERVER['REQUEST_METHOD'];

        // Determina la función (callback) que se debe ejecutar según el método
        if ($method == 'GET') {
            // Busca la función asociada a la ruta en el array $getRoutes
            $fn = $this->getRoutes[$current_url] ?? null;
        } else {
            // Busca la función asociada a la ruta en el array $postRoutes
            $fn = $this->postRoutes[$current_url] ?? null;
        }
        // Si existe una función para la ruta, la ejecuta
        if ($fn) {
            call_user_func($fn, $this);
        } else {
            // Si no existe la ruta, redirige a una página 404
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
