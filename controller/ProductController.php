<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Product.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../helpers/functions.php";

class ProductController{

    public static function index(Router $router)
    {
        // Obtener el id de la categoría desde la URL, si no esta se muestran todos
        $id_categoria = $_GET['category'] ?? 'all';

        // Si la categoría es all se muestran todos los productos
        // Y si es otra categoría se buscan los productos de esa categoría
        $productos = $id_categoria === 'all' ?
            Product::mostrarProductos() :
            Category::buscarporcategoria($id_categoria);

        $router->render('/products/verProductos', [
            "title" => "Productos",
            "productos" => $productos
        ]);
    }

    public static function agregar(Router $router)
    {

        $alertas = new Alerta;
        $resultado = [];

        $categorias = Category::verCategorias() ?? [];  

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Guardamos en variables los datos del formulario para su posterior uso
            $nombre_producto = filter_var($_POST['nombre_producto'] ?? '');
            $precio = filter_var($_POST['precio'] ?? '');
            $impuesto = filter_var($_POST['impuesto'] ?? '');
            $stock = filter_var($_POST['stock'] ?? '');
            $id_categoria = filter_var($_POST['id_categoria'] ?? '');
            $descripcion = filter_var($_POST['descripcion'] ?? '');

            // Creamos las validaciones
            $alertas->crearAlerta(!$nombre_producto, 'danger', 'El nombre no puede ir Vacio');
            $alertas->crearAlerta(!$precio, 'danger', 'El Precio no puede ir Vacio');
            $alertas->crearAlerta(!$impuesto, 'danger', 'El impuesto no puede ir Vacio');
            $alertas->crearAlerta(!$stock, 'danger', 'El stock no puede ir Vacio');
            $alertas->crearAlerta(!$id_categoria, 'danger', 'La categoria no puede ir Vacio');
            $alertas->crearAlerta(!$descripcion, 'danger', 'La descripcion no puede ir Vacio');

            
            // La imgagen no se puede obtener de la misma manera que el texto, por ende debemos usar la variable global $_FILES e indicarle que
            // en la posicion "imagen" es de donde vamos a extraer los datos del archivo que deseamos subir, en caso de que no tengamos nada
            // Lo deberiamos dejar como un array vacio por defecto para evitarnos errores de que no existe la posicion
            // a la que deseamos consultar de ese array asociativo
            $imagen = $_FILES['imagen'] ?? [];

            // Ahora accedemos a la posicion del array donde tenemos el tmp_name, el cual es la ubicacion en donde esta nuestra imagen
            // por un corto periodo de tiempo mientras buscamos a donde moverla
            $imagen_temporal = $imagen['tmp_name'];

            // Ahora debemos asegurarnos de que haya una carpeta en el servidor para subir las imagenes, en dado caso de que no exista
            // debemos crearla
            if( !is_dir(__DIR__ . "/../img/uploads") ) {
                mkdir(__DIR__ . "/../img/uploads");
            }

            // Ahora debemos darle un nombre al archivo para subirlo al servidor, este nombre debe ser unico para no confundirse con el resto
            // de imagenes, si no sabemos que extensiones de archivo para imagen existen, visitar
            //  el sitio web:  https://www.ionos.com/es-us/digitalguide/servidores/know-how/resumen-de-las-extensiones-de-archivos/
            $nombre_unico_imagen = md5(rand()) . ".jpg";

            // Despues de haberle dado un nombre random que no se repita, procedemos a subir el archivo con la funcion
            // llamada move_upload_file, su primer parametro es la imagen guardada temporalmente en memoria, su segundo
            // parametro es la carpeta de destino con el nombre incluido de la imagen a subir
            $subir_imagen = move_uploaded_file($imagen_temporal, __DIR__ . "/../img/uploads/" . $nombre_unico_imagen);

            // verificamos que la imagen se haya subido correctamente, en dado caso de que no se suba bien, no dejaremos
            // que el sistema ejecute la consulta de sql, porque seria un error de logica grave
            if( !$subir_imagen ) {
                return $alertas->crearAlerta(!$subir_imagen, 'danger', 'Error al subir la imagen');
            } else {
                // Le decimos la url relativa de donde estara nuestra imagen en el servidor para enviarle esa url
                // a la base de datos
                $imagen_url = "/img/uploads/" . $nombre_unico_imagen;

                // Validamos que no hayan Alertas
                if (!$alertas->obtenerAlertas()) {
                    $resultado = Product::agregarproductos($nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen_url);
                    if( !$resultado ) return $alertas->crearAlerta(!$resultado, 'danger', 'Ha ocurrido un error, vuelve a intentarlo');
                    return header("Location: /admin/products");
                }
            }

        }

        $alertas = $alertas->obtenerAlertas();

        $router->render('products/agregarProductos', [
            "title" => "Agregar Productos",
            "alertas" => $alertas,
            "categorias" => $categorias
        ]);
    }

    public static function verProductosAdmin( Router $router ) {

        $isAuth = isAuth();

        if(!$isAuth) return header("Location: /404");

        $productos = Product::mostrarproductos();

        $router->render("products/verProductosAdmin", [
            "title" => "Administrar Productos",
            "productos" => $productos
        ]);
    }

    public static function eliminarProductoAdmin(Router $router) {
        $productos = [];
        if (!isAuth()) {
            return header("Location: / 404");
        }
    
        $id_producto = $_GET['id'] ?? null;
    
        if ($id_producto === null) {
            return header("Location: /404"); // Redirige si no se proporciona un ID
        }
    
        $productos = Product::eliminarProductosAdmin($id_producto);
    
        $router->render("products/verProductosAdmin", [
            "title" => "Ver Productos",
            "productos" => $productos
        ]);
    }
    
}




?>