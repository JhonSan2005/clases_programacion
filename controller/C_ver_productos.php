<?php
include_once("../Modelo/Producto.php");

// Llamar a la función para mostrar los productos
$productos = Producto::mostrarproductos();

echo "<pre>";
var_dump($productos);
echo "</pre>";


// Incluir la vista para mostrar los productos
// include_once("../Vista/seccion1.php");
?>