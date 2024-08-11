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
        $token = ''; // Inicializa la variable token aquí
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'] ?? '';
            $nuevaPassword = $_POST['nueva_password'] ?? '';
            $confirmarPassword = $_POST['confirmar_password'] ?? '';
    
            if ($nuevaPassword === $confirmarPassword) {
                $usuario = Usuario::encontrarUsuarioPorToken($token);
                if ($usuario) {
                    if (Usuario::actualizarPassword($usuario['id'], $nuevaPassword)) {
                        Usuario::eliminarToken($usuario['id']); // Eliminar el token una vez actualizado
                        $alertas->crearAlerta(false, 'success', 'Tu contraseña ha sido actualizada.');
                        // Redirigir a la página de inicio o a la página deseada
                        header('Location: /index.php'); // Cambia esto si necesitas otra ruta
                        exit();
                    } else {
                        $alertas->crearAlerta(true, 'danger', 'No se pudo actualizar la contraseña.');
                    }
                } else {
                    $alertas->crearAlerta(true, 'danger', 'Token inválido o expirado.');
                }
            } else {
                $alertas->crearAlerta(true, 'danger', 'Las contraseñas no coinciden.');
            }
        }
    
        $alertas = $alertas::obtenerAlertas();
        $router->render('/recover/recovernew', [
            "title" => "Actualizar Contraseña",
            "alertas" => $alertas,
            "token" => htmlspecialchars($token) // Pasar el token al formulario de manera segura
        ]);
    }
    
}
?>
