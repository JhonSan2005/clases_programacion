<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Product.php";
require_once __DIR__ . "/../model/Category.php";
require_once __DIR__ . "/../helpers/functions.php";

class ProductController {

    public static function index(Router $router) {
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

    public static function agregar(Router $router){

        $alertas = new Alerta;
        $resultado = [];

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            
            // Guardamos en variables los datos del formulario para su posterior uso
            $id_producto = filter_var($_POST['id_producto'] ?? '');
            $nombre_producto = filter_var($_POST['nombre_producto'] ?? '');
            $precio = filter_var($_POST['precio'] ?? '');
            $impuesto = filter_var($_POST['impuesto'] ?? '');
            $stock = filter_var($_POST['stock'] ?? '');
            $id_categoria = filter_var($_POST['id_categoria'] ?? '');
            $descripcion = filter_var($_POST['descripcion'] ?? '');
            $imagen_url = filter_var($_POST['imagen_url'] ?? '');

        

             // Creamos las validaciones
            $alertas->crearAlerta( !$id_producto, 'danger', 'El id_producto no puede ir Vacio' );
            $alertas->crearAlerta( !$nombre_producto, 'danger', 'El nombre no puede ir Vacio' );
            $alertas->crearAlerta( !$precio , 'danger', 'CEl Precio no puede ir Vacio' );
            $alertas->crearAlerta( !$impuesto, 'danger', 'El impuesto no puede ir Vacio' );
            $alertas->crearAlerta( !$stock, 'danger', 'El stock no puede ir Vacio' );
            $alertas->crearAlerta( !$id_categoria, 'danger', 'La categoria no puede ir Vacio' );
            $alertas->crearAlerta( !$descripcion, 'danger', 'La descripcion no puede ir Vacio' );
            $alertas->crearAlerta( !$imagen_url, 'danger', 'La imagen no puede ir Vacia' );
            
            // Validamos que no hayan Alertas
            if( !$alertas->obtenerAlertas() ) {

                $resultado = Product::agregarproductos($id_producto, $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen_url);
            
            }
        }
     $router->render('products/agregarProductos',[
        "title"=> "Agregar Productos",
        "resultado" => $resultado
         ]);
    }
    


    


}


?>
