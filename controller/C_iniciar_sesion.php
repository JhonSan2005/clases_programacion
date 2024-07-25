<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once("../Modelo/Usuario.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $correo = filter_input(INPUT_POST, 'correo', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if ($correo && $password) {
        // Intentar iniciar sesión
        $login_exitoso = Usuario::validarlogin($correo, $password);

        if ($login_exitoso) {
            // Redirigir a la página de éxito
            header("location:../Vista/seccion9.php");
            exit(); // Asegurarse de que el script se detenga después de redirigir
        } else {
            // Depuración: Mensaje de error
            echo "Error: Login fallido. Usuario o contraseña incorrectos.";
            // Redirigir a la página de error o mostrar un mensaje de error
            // header("location:../Vista/login_error.php");
            exit();
        }
    } else {
        // Depuración: Datos inválidos
        echo "Error: Datos del formulario inválidos.";
        // Redirigir a la página de error si los datos son inválidos
        // header("location:../Vista/login_error.php");
        exit();
    }
}
?>
