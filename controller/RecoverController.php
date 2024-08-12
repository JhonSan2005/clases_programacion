<?php
require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . '/../PHPMailer/index.php';
require_once __DIR__ . "/../helpers/functions.php";

class RecoverController {
    public static function recover(Router $router) {
        $alertas = new Alerta;
        $gestorCorreo = new GestorCorreo;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = filter_var($_POST['correo'] ?? '', FILTER_VALIDATE_EMAIL);
            $alertas->crearAlerta(!$correo, 'danger', 'Correo no válido');

            if (!$alertas::obtenerAlertas()) {
                $usuario = Usuario::encontrarUsuarioPorCorreo($correo);

                if ($usuario) {
                    $token = bin2hex(random_bytes(16)); // Generar un token
                    $guardarToken = Usuario::guardarToken($usuario['id'], $token); // Guardar el token en la base de datos
                    if($guardarToken) {
                        $gestorCorreo->enviarEmailRecuperacion($correo, $token);
                        $alertas->crearAlerta($usuario, 'success', 'Se ha enviado un enlace de recuperación a tu correo.');
                    }
                } else {
                    $alertas->crearAlerta(!$usuario, 'danger', 'No se encontró una cuenta con ese correo.');
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

        $token = filter_var($_GET['token'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $alertas->crearAlerta( !$token, 'danger', 'Token no Valido' );

        $existeUser = Usuario::encontrarUsuarioPorToken($token);

        $alertas->crearAlerta(!$existeUser, 'danger', 'Token no Valido');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $password = filter_var($_POST['nueva_password'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password_confirm = filter_var($_POST['confirmar_password'] ?? '', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $alertas->crearAlerta(empty($password), 'danger','El password no puede ir vacio');
            $alertas->crearAlerta(strlen($password) < 8, 'danger','El password no puede ser menos a 8 caracteres');
            $alertas->crearAlerta(empty($password_confirm), 'danger','La confirmacion del password no puede ir vacio');
            $alertas->crearAlerta( $password !== $password_confirm, 'danger', 'Las password no coinciden' );

          if(!$alertas::obtenerAlertas()){
            $actualizarPassword = Usuario::actualizarpassword($existeUser[0]['id'], $password);
            if( $actualizarPassword ) {
                return header('Location: /');
            }
          }  
        }

        $alertas = Alerta::obtenerAlertas();
        $router->render('/recover/recovernew', [
            "title" => "Actualizar Contraseña",
            "alertas" => $alertas,
            "existeToken" => $existeUser
        ]);
    }
    
}
?>
