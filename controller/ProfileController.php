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
            "profile" => $user
        ]);
    }
    public static function actualizar(Router $router) {
        $isAuth = isAuth();
    
        if (!$isAuth) {
            return header("Location: /");
        }
    
        $alertas = new Alerta();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardamos en variables los datos del formulario para su posterior uso
            $documento = filter_var($_POST['documento'] ?? '', FILTER_SANITIZE_STRING);
            $nombre = filter_var($_POST['nombre'] ?? '', FILTER_SANITIZE_STRING);
            $correo = filter_var($_POST['correo'] ?? '', FILTER_VALIDATE_EMAIL);
            $password = filter_var($_POST['password'] ?? '', FILTER_SANITIZE_STRING);
            $password_confirmation = filter_var($_POST['password_confirmation'] ?? '', FILTER_SANITIZE_STRING);
            $termsAndConditions = isset($_POST['termsAndConditions']) && $_POST['termsAndConditions'] === 'on';
    
<<<<<<< HEAD
            
=======
            // Creamos las validaciones
>>>>>>> cb6dfcec2ef8591fcee0a7c54297e65fed39ae26
            $alertas->crearAlerta(empty($documento), 'danger', 'El documento no puede estar vacío');
            $alertas->crearAlerta(empty($nombre), 'danger', 'El nombre no puede estar vacío');
            $alertas->crearAlerta(!$correo, 'danger', 'Correo no válido');
            $alertas->crearAlerta(empty($password), 'danger', 'El password no puede estar vacío');
            $alertas->crearAlerta(strlen($password) < 8, 'danger', 'El password debe tener al menos 8 caracteres');
            $alertas->crearAlerta($password !== $password_confirmation, 'danger', 'Los passwords deben ser iguales');
            $alertas->crearAlerta(!$termsAndConditions, 'danger', 'Debes aceptar los Términos y Condiciones para continuar');
    
            // Validamos que no haya alertas
            if (empty($alertas->obtenerAlertas())) {
                // Manejamos la imagen de perfil
                if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
                    $imagenTmp = $_FILES['profileImage']['tmp_name'];
                    $imagenNombre = $_FILES['profileImage']['name'];
                    $imagenPath = __DIR__ . "/../uploads/" . $imagenNombre;
    
                    // Movemos la imagen a la carpeta de uploads
                    if (move_uploaded_file($imagenTmp, $imagenPath)) {
                        $imagen_url = "/uploads/" . $imagenNombre;
                    } else {
                        $alertas->crearAlerta(true, 'danger', 'Error al subir la imagen');
                    }
                } else {
                    $imagen_url = $_SESSION['profileImage'] ?? '/img/no_image.jpg';
                }
    
                // Actualizamos los datos del usuario
                $resultado = Usuario::actualizarUsuario($documento, $nombre, $correo, $password, $imagen_url);
    
                if ($resultado) {
                    // Actualizar la sesión con los nuevos datos
                    $_SESSION['documento'] = $documento;
                    $_SESSION['nombre'] = $nombre;
                    $_SESSION['correo'] = $correo;
                    $_SESSION['profileImage'] = $imagen_url; // Guardamos la URL de la imagen en la sesión
                    
                    // Redirigir a la misma página con los cambios
                    return header("Location: /profile?updated=true");
                } else {
                    // Manejar el caso de error al actualizar los datos del usuario
                    $alertas->crearAlerta(true, 'danger', 'Error al actualizar los datos del usuario');
                }
            }
        }
    
        // Renderizar la página de perfil con las alertas
        $router->render('profile/verPerfil', [
            'title' => 'Perfil Editado',
            'alerts' => $alertas->obtenerAlertas(),
        ]);
    }
    

   
}
?>
