<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("../Modelo/Producto.php");

// Verificar si se han enviado los datos del formulario de agregar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'agregar') {
    // Aquí debes obtener los datos del formulario y pasarlos a la función agregarProducto
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio = $_POST['product_price'];
    $impuesto = $_POST['product_tax'];
    $stock = $_POST['product_stock'];
    $id_categoria = $_POST['id_categoria'];
    $descripcion = $_POST['product_description'];
    
    // Manejo de la imagen
    $imagen = $_FILES['product_image']['name'];
    $target_dir = "../img/";
    $target_file = $target_dir . basename($imagen);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Verificar el formato de la imagen
    if($imageFileType != "jpg" && $imageFileType != "png") {
        echo "Solo se permiten archivos JPG y PNG.";
        exit;
    }
    
    // Mover la imagen a la carpeta de destino
    if (!move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
        echo "Error al subir la imagen.";
        exit;
    }
    
    $registro_exitoso = Producto::agregarproductos($id_producto, $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen);

    if ($registro_exitoso) {
        // Redirigir a alguna página de éxito
        header("location: ../Vista/index.php");
    } else {
        // Manejar el caso de registro fallido
        echo "Error al agregar el producto.";
    }
} else {
    // Cargar la vista de agregar producto si no se han enviado datos
    header("location: ../Controladores/controlador.php?seccion=seccion3");
}
?>
