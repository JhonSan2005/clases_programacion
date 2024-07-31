<?php

require_once __DIR__ . "/../Router.php";
require_once __DIR__ . "/../model/Usuario.php";
require_once __DIR__ . "/../helpers/functions.php";

class ProfileController {

    public static function index( Router $router ) {

        $isAuth = isAuth();

        if( !$isAuth ) {
            return header("Location: /");
        }

        $user = Usuario::encontrarUsuario('id', $_SESSION['id']);

        if( !$user ) {
            return header('Location: /close-session');
        }


        $router->render('profile/verPerfil', [
            "title" => "Mi Perfil",
            "profile" => $user
        ]);

    }

}

?>