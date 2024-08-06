<?php
require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../helpers/functions.php";

class RecoverController {

    public static function recover(Router $router) {
        $alertas = new Alerta;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = filter_var($_POST['correo'] ?? '', FILTER_VALIDATE_EMAIL);
            $alertas->crearAlerta(!$correo, 'danger', 'Correo no válido');

            if (!$alertas::obtenerAlertas()) {
                $usuario = Usuario::encontrarUsuario('correo', $correo);

                if ($usuario) {
                    // Redirigir a la URL de YouTube
                    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
                    exit;
                } else {
                    $alertas->crearAlerta(true, 'danger', 'No se encontró una cuenta con ese correo');
                }
            }
        }

        $alertas = $alertas::obtenerAlertas();
        $router->render('/recover/recover', [
            "title" => "Solicitar Restablecimiento de Contraseña",
            "alertas" => $alertas
        ]);
    }
}
