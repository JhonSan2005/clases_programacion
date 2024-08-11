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
                $usuario = Usuario::encontrarUsuarioPorCorreo($correo);

                if ($usuario) {
                    $token = bin2hex(random_bytes(16)); // Generar un token
                    Usuario::guardarToken($usuario['id'], $token); // Guardar el token en la base de datos
                    $alertas->crearAlerta(false, 'success', 'Se ha enviado un enlace de recuperación a tu correo.');
                } else {
                    $alertas->crearAlerta(true, 'danger', 'No se encontró una cuenta con ese correo.');
                }
            }
        }

        $alertas = $alertas::obtenerAlertas();
        $router->render('/recover/recover', [
            "title" => "Solicitar Restablecimiento de Contraseña",
            "alertas" => $alertas
        ]);
    }

    public static function actualizarPassword(Router $router) {

        $alertas = new Alerta;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $password = $_POST['password'] ?? ''; 

            $alertas->crearAlerta(empty($password), 'danger','El campo no puede ir vacion');

          if(!$alertas::obtenerAlertas()){

            Usuario::actualizarpassword($password);

          }  
        }

        $alertas = Alerta::obtenerAlertas();
        $router->render('/recover/recovernew', [
            "title" => "Actualizar Contraseña",
            "alertas" => $alertas,
        ]);
    }
    
}
?>
