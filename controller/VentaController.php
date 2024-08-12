<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../model/Factura.php";
require_once __DIR__ . "/../model/Ventas.php";
require_once __DIR__ . "/../model/VentasFactura.php";

class VentaController {

    

    public static function index(Router $router) {
        $router->render('payments/formaPago', [
            "title" => "Forma de Pago"
        ]);
    }

    public static function vender() {

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            // Variables por si se necesitan en un futuro
            $nombre = filter_var($_POST['nombre'] ?? '');
            $apellido = filter_var($_POST['apellido'] ?? '');
            $correo = filter_var($_POST['correo'] ?? '', FILTER_SANITIZE_EMAIL);
            $direccion = filter_var($_POST['direccion'] ?? '');
            $pais = filter_var($_POST['pais'] ?? '');
            $departamento = filter_var($_POST['departamento'] ?? '');
            $municipio = filter_var($_POST['municipio'] ?? '');
            $listaProductos = filter_var($_POST['lista_productos'] ?? []);

            // Validaciones
            if( !$correo ) {
                http_response_code(400);
                echo json_encode([ "msg" => "El correo no puede ir vacio", "type" =>  "danger" ]);
                return;
            }

            if( !$listaProductos || !$direccion || !$pais || !$departamento || !$municipio ) {
                http_response_code(400);
                echo json_encode([ "msg" => "No se pudo generar la compra, vuelve a intentarlo", "type" =>  "danger" ]);
                return;
            }

            // Si pasamos las validaciones procedemos a hacer las respectivas consultas para ejecutar la compra
            $existeUsuario = Usuario::encontrarUsuario('correo', $correo);

            if( !$existeUsuario ) {
                http_response_code(400);
                echo json_encode(["msg" => "Error con el usuario, por favor ingrese el correo de su cuenta", "type" => "danger"]);
                return;
            }

            // En caso de que exista el usuario, hacer el proceso para facturarle al usuario
            // Para poder facturar debemos pasar la fecha actual
            $hoy = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
            $direccionCompleta = "$direccion - $municipio, $departamento, $pais"; // Organizamos la direccion de tal manera que se lea mejor
            $generarFactura = Factura::guardar('Factura de Venta', $existeUsuario['id'], $hoy, $direccionCompleta, 19);

            // Si se genera bien la factura, procedemos a hacer un bucle para registrar cada uno de los productos en la BD
            // PD: en la variable $generarFactura viene el id de la factura, porque eso devuelve la funcion
            if( $generarFactura ) {

                // Como la lista de productos viene codificada en string toca decodificarla con el json_decode para que deje usarla en PHP
                $listaProductos = json_decode($listaProductos);

                $productosEnCarrito = [];

                foreach( $listaProductos as $producto ) {
                    // Validamos que el id de cada producto exista, en caso de no existir alguno se procedera a dar error
                    $existeProducto = Product::buscarProducto('id_producto', $producto->id)[0];

                    // Si no existe el producto damos error
                    if( !$existeProducto ) {
                        http_response_code(400);
                        echo json_encode([ "msg" => "Ha ocurrido un error, vuelve a intentarlo mas tarde", "type" => "danger" ]);
                        return;
                    }
                    
                    // Si existe el producto, procedemos a meterlo a un array donde posteriormente se guardara en la base de datos
                    // Tambien en el mismo array debemos guardar la cantidad a seleccionar y revisar que no sea mayor a la cantidad en stock
                    if( intval($existeProducto["stock"]) < intval($producto->cantidad) ) {
                        http_response_code(400);
                        echo json_encode([ "msg" => "Ha ocurrido un error, parece que las cantidades seleccionadas no estan disponibles", "type" => "danger" ]);
                        return;
                    }

                    // Procedemos a crear una nueva posicion del array asociativo llamada cantidad escodiga y guardamos alli las cantidades
                    //  que el usuario desea comprar
                    $existeProducto["cantidad_escogida"] = $producto->cantidad;
                    $productosEnCarrito[] = $existeProducto;
                    
                }

                // Con todo lo anterior presente ya podemos hacer la respectiva insercion de los productos en la tabla de ventas
                // Para ello debemos hacer otro ciclo para ahora si insertar los datos
                foreach( $productosEnCarrito as $productoAFacturar ) {
                    $generarVenta = Ventas::guardar($generarFactura, $productoAFacturar['id_producto'], $productoAFacturar['cantidad_escogida']);
                    if( !$generarVenta ) {
                        Factura::eliminar($generarFactura);
                        http_response_code(400);
                        echo json_encode(["msg" => "Ha ocurrido un error al emitir la factura", "type" => "danger"]);
                        return;
                    }

                    // Hacemos las restas pertinentes y procedemos a restar las cantidades
                    $cantidad_restante = intval($productoAFacturar['stock']) - intval($productoAFacturar['cantidad_escogida']);
                    Product::actualizarProductoPorColumna('stock', $cantidad_restante, $productoAFacturar['id_producto']);
                }
                
                // Si todo sale bien podemos mostrar los datos
                $facturaGenerada = VentasFactura::verDetallesFactura($generarFactura);
                if( $facturaGenerada ) {
                    http_response_code(200);
                    echo json_encode([ "msg" => "Factura de Venta Generada Correctamente", "type" => "success", "data" => $facturaGenerada ]);
                    return;
                } else {
                    http_response_code(400);
                    echo json_encode([ "msg" => "Error al mostrar la factura generada, por favor pongase en contacto con el administrador", "type" => "danger" ]);
                    return;
                }

            }




        }

    }

}
?>
