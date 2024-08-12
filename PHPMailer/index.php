<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer.php';
require_once 'Exception.php';
require_once 'SMTP.php';

class GestorCorreo {

    public function enviarEmailRecuperacion( $correoDestinatario, $token )
    {

        $mail = new PHPMailer(true);

        // Configuración del servidor
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Cambiado a 0 para evitar la salida detallada de la depuración
        $mail->Host       = 'smtp.mailersend.net';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'MS_BY6tJ4@trial-vywj2lpyd3ml7oqz.mlsender.net';
        $mail->Password   = 'noFhY4D8Dl2OpDnM';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Utilizando constante para mejor legibilidad
        $mail->Port       = 587;

        // Destinatarios
        $mail->setFrom('MS_BY6tJ4@trial-vywj2lpyd3ml7oqz.mlsender.net', 'Repuestos JJ');
        $mail->addAddress($correoDestinatario);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = 'Recuperar Cuenta';

        $recoverUrl = "http://localhost:3000/recover/recovernew?token=" . $token; // Reemplaza con tu URL base

        // Guarda el token en la base de datos asociado con el usuario
        // Aquí deberías tener tu lógica para guardar el token asociado con el correo del destinatario.

        $mail->Body    = '
        <p>Hola,</p>
        <p>Hemos recibido una solicitud para recuperar tu cuenta. Haz clic en el siguiente enlace para restablecer tu Password:</p>
        <p><a href="' . $recoverUrl . '">Recuperar Cuenta</a></p>
        <p>Si no solicitaste esto, puedes ignorar este correo.</p>
    ';

        $mail->send();
    }
}
