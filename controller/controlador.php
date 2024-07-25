<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$seccion = "seccion1";



// // Verificar si $_SESSION['correo'] está establecida y no está vacía
// if (!isset($_SESSION['correo']) || $_SESSION['correo'] == "") {
//     // Redirigir a seccion2 si el usuario no está registrado
//     header("Location: controlador.php?seccion=seccion2");
//     exit();
// }

// Obtener el valor de seccion desde $_GET si está seteado
if (isset($_GET['seccion'])) {
    $seccion = $_GET['seccion'];
}

// Verificar si la sección solicitada es válida
$secciones_permitidas = ["seccion00","seccion01","seccion1", "seccion2", "seccion3", "seccion4", "seccion5", "seccion6", "seccion7", "seccion8", "seccion9", "seccion10", "seccion11", "seccion12", "seccion13", "seccion20"]; // Ejemplo de secciones permitidas
if (!in_array($seccion, $secciones_permitidas)) {
    // Redirigir a seccion2 si la sección no está permitida
    header("Location: controlador.php?seccion=seccion2");
    exit();
}

// Incluir el archivo de plantilla
include("../Vista/plantilla.php");
?>