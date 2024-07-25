<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("../Modelo/Usuario.php");

// Verificar si se han enviado los datos del formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y pasarlos a la función registerUser
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Llamar a la función registerUser
    $registro_exitoso = Usuario::registrarusuarios($documento, $nombre, $correo, $password);

    if ($registro_exitoso) {
        // Redirigir a alguna página de éxito
        header("Location: ../Vista/index.php");
        exit(); // Asegura que se detenga la ejecución después de redirigir
    } else {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href=\"#\">Why do I have this issue?</a>'
            });
        </script>";
    }
}
?>