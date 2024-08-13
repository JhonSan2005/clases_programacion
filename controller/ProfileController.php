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
            $password = htmlspecialchars($_POST['password_actual'] ?? ''); // Aquí agrego el htmlspecialchars
    
            // Asegúrate de que la sesión tenga el ID del usuario
            $id = $_SESSION['id'] ?? 0;
    
            $resultado = Usuario::actualizarUsuario($documento, $nombre, $correo, $password, $id);
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
    
    
    public static function eliminarcuenta(Router $router) {
        if (!isAuth()) {
            return header("Location: /404");
        }
    
        $id = $_POST['id'] ?? null;
    
        if ($id === null) {
            return header("Location: /404"); // Redirige si no se proporciona un ID
        }
    
        $result = Usuario::eliminarcuentauser($id);
        
        // Verifica si la eliminación fue exitosa
        if ($result) {
            // Redirigir a la página de inicio o mostrar un mensaje de éxito
            return header("Location: /home");
        } else {
            // Manejar el caso donde la eliminación falla
            $error = "Error al eliminar la cuenta.";
        }
    
        // Aunque normalmente no redirigirías aquí si falló la eliminación
        $router->render("home", [
            "title" => "Home",
        ]);
    }
 

 

    public static function actualizarpassword(Router $router) {
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
