<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

$mail = new PHPMailer(true);

try {
    if (isset($_POST['correo_destinatario'])) {
        $correoDestinatario = $_POST['correo_destinatario'];
    } else {
        throw new Exception('No se ha proporcionado el correo del destinatario');
    }

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
    $mail->Subject = 'Recuperar Contraseña';

    // Generar un token de recuperación
    $token = bin2hex(random_bytes(16)); // Generar un token aleatorio
    $recoverUrl = "http://localhost:3000/recover/recovernew?token=" . $token; // Reemplaza con tu URL base

    // Guarda el token en la base de datos asociado con el usuario
    // Aquí deberías tener tu lógica para guardar el token asociado con el correo del destinatario.

    $mail->Body    = '
        <p>Hola,</p>
        <p>Hemos recibido una solicitud para recuperar tu contraseña. Haz clic en el siguiente enlace para restablecer tu Password:</p>
        <p><a href="' . $recoverUrl . '">Recuperar Contraseña</a></p>
        <p>Si no solicitaste esto, puedes ignorar este correo.</p>
        <p><img src="cid:logol" alt="Logo" /></p>
    ';

    // Adjuntar imagen
    $mail->addAttachment('../img/logol.png', 'logol.png'); // Adjuntar la imagen
    $mail->addEmbeddedImage('../img/logol.png', 'logol');  // Embebida la imagen

    $mail->send();
    echo "Enviado Correctamente";
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
