<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../helpers/functions.php";
require_once __DIR__ . "/../helpers/Alerta.php";

class ProfileController {

    public static function index(Router $router) {
        $isAuth = isAuth();

        if (!$isAuth) {
            return header("Location: /");
        }

        $user = Usuario::encontrarUsuario('id', $_SESSION['id']);

        if (!$user) {
            return header('Location: /close-session');
        }

        $router->render('profile/verPerfil', [
            "title" => "Mi Perfil",
            "profile" => $user,
            "documento" => $user['documento'],
            "nombre" => $user['nombre'],
            "correo" => $user['correo']
        ]);
    }

    public static function actualizar(Router $router) {
        if (!isAuth()) {
            header("Location: /");
            exit;
        }
    
        $alertas = new Alerta;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $documento = $_POST['documento'] ?? '';
            $nombre = $_POST['nombre'] ?? '';
            $correo = $_POST['correo'] ?? '';
            $foto_de_perfil = $_POST['foto_de_perfil'] ?? '';
    
            // Asegúrate de que la sesión tenga el ID del usuario
            $id = $_SESSION['id'] ?? 0;
    
            $resultado = Usuario::actualizarUsuario($documento, $nombre, $correo, $foto_de_perfil, $id);
        }
    
        // Obtener la información del usuario nuevamente para mostrar en la vista
        $user = Usuario::encontrarUsuario('id', $_SESSION['id']);
    
        $router->render('profile/verPerfil', [
            'title' => 'Perfil Editado',
            'resultado' => $resultado,
            'profile' => $user,
            'documento' => $user['documento'],
            'nombre' => $user['nombre'],
            'correo' => $user['correo']
        ]);
    }

    public static function restablecerContraseña(Router $router) {
        if (!isAuth()) {
            header("Location: /");
            exit;
        }

        // Aquí iría la lógica para restablecer la contraseña
        // Por ejemplo, enviar un correo electrónico con un enlace seguro, etc.

        // Renderizar la vista para restablecer la contraseña
        $router->render('profile/contraseña', [
            'title' => 'Restablecer Contraseña'
        ]);
    }
}

?>
