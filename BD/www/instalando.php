<?php

/**
* Autor: Camilo Figueroa
* Este programa creará una base de datos con todos sus componentes. La prueba sería usar este script y después mirar 
* que efectivamente exportándola y creando el gráfico del modelo entidad relación, todos sus componentes estén ahí.
*
* En este programa se usan tanto la programación estructurada, como las funciones y la POO.
*/

include("Verificador.php"); //Se incluye la clase verificador, la idea es no hacer este código más grande.
$objeto_verificador = new Verificador(); //Se crea la instancia de la clase verificador.

define("NUMERO_DE_TABLAS", 10); //Se define el número de tablas que se va a crear. 

$contador_variables_llegada = 0; 
$cadena_informe_instalacion = ""; 
$interrupcion_proceso = 0;
$imprimir_mensajes_prueba = 0;  //Usar valores 0 o 1, solo para el programador.
$tmp_nombre_objeto_o_tabla = "";

$mensaje1 = "Es posible que la tabla o el objeto ya esté creada(o), por favor reinicie la instalación con una base de datos vacía.";

if( isset($_GET['servidor']) ) $contador_variables_llegada++;
if( isset($_GET['usuario']) ) $contador_variables_llegada++;
if( isset($_GET['contrasena']) ) $contador_variables_llegada++;
if( isset($_GET['bd']) ) $contador_variables_llegada++;

if($imprimir_mensajes_prueba == 1) echo "<br>Llegaron ".$contador_variables_llegada." variables.";

//Tienen que llegar cuatro variables para poder dar continuación al proceso de instalación.
if($contador_variables_llegada >= 3 && $contador_variables_llegada <= 4) // Super if - inicio
{
    if($imprimir_mensajes_prueba == 1) echo "<br>Entrando al bloque de instalación.";

    //Se realiza una sola conexión para la ejecución de todas las consultas SQL.-------------------------------
    //$conexion = @mysqli_connect($_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd']); //Linea anterior, salía error de conexión.
    $conexion = @mysqli_connect($_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd']); //Ojo, con el arroba no sale el mensaje de error.

    if(!$conexion) //Verificamos que la conexion esté establecida preguntando si hay error o conexión no existe.
    {
        $interrupcion_proceso = 1; //Si pasa a este bloque, la conexión no se ha establecido, quiere decir que activaremos la variable de interrupción.
        $cadena_informe_instalacion .= "<br>Error: no se ha podido establecer una conexión con la base de datos. ";

    } else {

        //echo "1 fds<br>".$objeto_verificador->mostrar_tablas($conexion, 2);

        if($objeto_verificador->mostrar_tablas($conexion, 2) != 0) //Aquí se verifica que no hayan tablas existentes.
        {
            //echo "2 fds<br>";

            echo "Ya hay tablas creadas, por favor cree una base de datos nueva.<br>"; 
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "clientes";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `clientes` (
                    `id` INT AUTO_INCREMENT PRIMARY KEY,
                    `documento` INT NOT NULL UNIQUE, -- Haciendo el campo `documento` único
                    `nombre` VARCHAR(100) NOT NULL,
                    `correo` VARCHAR(100) NOT NULL,
                    `password` VARCHAR(255) NOT NULL,
                    KEY `idx_id` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "categorias";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `categorias` (
                    `id_categoria` int NOT NULL AUTO_INCREMENT,
                    `nombre_categoria` varchar(100) NOT NULL,
                    PRIMARY KEY (`id_categoria`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "productos";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `productos` (
                    `id_producto` int NOT NULL AUTO_INCREMENT,
                    `nombre_producto` varchar(100) NOT NULL,
                    `precio` decimal(10,2) NOT NULL,
                    `impuesto` decimal(10,2) DEFAULT NULL,
                    `stock` int DEFAULT NULL,
                    `id_categoria` int NOT NULL,
                    `descripcion` Varchar(1000)not null,
                    `imagen_url` varchar(255) DEFAULT NULL,
                    PRIMARY KEY (`id_producto`),
                    FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "compras";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `compras` (
                    `id_compras` int NOT NULL AUTO_INCREMENT,
                    `documento` int NOT NULL,
                    `id_producto` int NOT NULL,
                    `precio` decimal(10,2) NOT NULL,
                    `cantidad` int DEFAULT NULL,
                    `impuesto` int DEFAULT NULL,
                    PRIMARY KEY (`id_compras`),
                    KEY `fk_clientes_compras` (`documento`),
                    KEY `fk_productos_compras` (`id_producto`),
                    CONSTRAINT `fk_clientes_compras` FOREIGN KEY (`documento`) REFERENCES `clientes` (`documento`),
                    CONSTRAINT `fk_productos_compras` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "carrito_de_compras";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `carrito_de_compras` (
                    `id_producto` int NOT NULL AUTO_INCREMENT,
                    `documento` int NOT NULL,
                    `fecha` date DEFAULT NULL,
                    PRIMARY KEY (`id_producto`),
                    CONSTRAINT `fk_productos_carrito_de_compras` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "historial_de_compras";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `historial_de_compras` (
                    `id_historial_de_compras` int NOT NULL AUTO_INCREMENT,
                    `id_compras` int NOT NULL,
                    `fecha` date DEFAULT NULL,
                    `cantidad` int DEFAULT NULL,
                    PRIMARY KEY (`id_historial_de_compras`),
                    KEY `fk_compras_historial_de_compras` (`id_compras`),
                    CONSTRAINT `fk_compras_historial_de_compras` FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id_compras`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "facturas";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `facturas` (
                    `id_factura` int NOT NULL AUTO_INCREMENT,
                    `documento` int NOT NULL,
                    `id_compras` int NOT NULL,
                    `id_producto` int NOT NULL,
                    `id_categoria` int NOT NULL,
                    `id_pago` int NOT NULL,
                    `fecha` date DEFAULT NULL,
                    `descripcion` varchar(200) NOT NULL,
                    `estado_de_factura` varchar(100) NOT NULL,
                    `total` decimal(10,2) NOT NULL,
                    PRIMARY KEY (`id_factura`),
                    KEY `fk_compras_facturas` (`id_compras`),
                    KEY `fk_clientes_facturas` (`documento`),
                    KEY `fk_productos_facturas` (`id_producto`),
                    KEY `fk_categorias_facturas` (`id_categoria`),
                    CONSTRAINT `fk_categorias_facturas` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
                    CONSTRAINT `fk_clientes_facturas` FOREIGN KEY (`documento`) REFERENCES `clientes` (`documento`),
                    CONSTRAINT `fk_compras_facturas` FOREIGN KEY (`id_compras`) REFERENCES `compras` (`id_compras`),
                    CONSTRAINT `fk_productos_facturas` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "metodo_de_pago";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `metodo_de_pago` (
                    `id_pago` int NOT NULL AUTO_INCREMENT,
                    `id_factura` int NOT NULL,
                    `tipo_de_pago` varchar(100) NOT NULL,
                    `numero_de_tarjeta` varchar(100) NOT NULL,
                    `fecha_de_expiracion` datetime DEFAULT NULL,
                    `codigo_de_seguiridad` int NOT NULL,
                    PRIMARY KEY (`id_pago`),
                    KEY `fk_facturas_metodo_de_pago` (`id_factura`),
                    CONSTRAINT `fk_facturas_metodo_de_pago` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id_factura`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    if($interrupcion_proceso == 0) //Si esta variable cambia, la instalación será interrumpida para cada bloque sql.
    {
        $tmp_nombre_objeto_o_tabla = "admin";

        //El sistema procederá a crear la tabla si no existe.
        $sql = "CREATE TABLE `admin` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `correo` varchar(100) NOT NULL,
                    `id_producto` int NOT NULL,
                    `password` varchar(1000) NOT NULL,
                    PRIMARY KEY (`id`),
                    FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";
        
        $resultado = $conexion->query($sql);

        //Si se creó la tabla, el sistema cargará los datos pertienentes del informe.
        if(verificar_existencia_tabla($tmp_nombre_objeto_o_tabla, $_GET['servidor'], $_GET['usuario'], $_GET['contrasena'], $_GET['bd'], $imprimir_mensajes_prueba) == 1)
        {
            $cadena_informe_instalacion .= "<br>La tabla $tmp_nombre_objeto_o_tabla se ha creado con éxito.";	

        } else {
            $cadena_informe_instalacion .= "<br>Error: La tabla $tmp_nombre_objeto_o_tabla no se ha creado. ".$mensaje1;	
            $interrupcion_proceso = 1;
        }
    }

    //Imprime el informe final.
    echo $cadena_informe_instalacion;

} //Super if - fin
else
{
    echo "No han llegado todas las variables, por favor revise.";
}

//función para verificar la existencia de una tabla.
function verificar_existencia_tabla($nombre_tabla, $servidor, $usuario, $contrasena, $bd, $imprimir_mensajes_prueba)
{
    $salida = 0;

    if($imprimir_mensajes_prueba == 1) echo "<br>Verificando la tabla: ".$nombre_tabla;

    //Se realiza la conexión solo para verificar.
    $conexion2 = mysqli_connect($servidor, $usuario, $contrasena, $bd);

    //Se prepara la consulta SQL.
    $sql = "SELECT * FROM ".$nombre_tabla." LIMIT 1"; //Ojo con esta consulta, porque si la tabla no existe, retornará error.
    $resultado = $conexion2->query($sql);

    if($resultado == TRUE) //Si el resultado es true, quiere decir que la tabla existe.
    {
        $salida = 1;
    }

    return $salida;
}

?>
