<?php

function debugguear( $varToDebug ) {
    echo "<pre>";
    var_dump($varToDebug);
    echo "</pre>";
    die();
}

function isAuth(): bool {
    if( session_status() === PHP_SESSION_NONE ) {
        session_start();
    }

    return isset($_SESSION['id']) && !empty($_SESSION);
}

function isAdmin(): bool {
    if( session_status() === PHP_SESSION_NONE ) {
        session_start();
    }

    return isset($_SESSION['id']) && isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 1;
}



?>