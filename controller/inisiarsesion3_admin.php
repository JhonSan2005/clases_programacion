<?php
include("../Modelo/funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Llamar a la función de iniciar sesión
    $resultado = inicio_sesion_admin::admin($correo, $password);

    // Mostrar el resultado en caso de error
    if ($resultado) {
        echo $resultado;
    }
}
?>