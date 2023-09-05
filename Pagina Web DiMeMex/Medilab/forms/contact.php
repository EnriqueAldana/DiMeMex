<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
try {
        // Crear una instancia de la clase PHPMailer
        $mail = new PHPMailer($debug);
        if ($debug) {
                // Emitir un registro detallado de
                $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER; }
        }
        // Autentificación vía SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        // Login
        $mail->Host = "smtp.ionos.mx";
        $mail->Port = "587";
        $mail->Username = "contacto@dimemex.com.mx";
        $mail->Password = "BBslqjH3p0IqZsIcR3ty";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->addAttachment("/home/user/Desktop/ejemplodeimagen.png", "ejemplodeimagen.png");
     $mail->CharSet = 'UTF-8';
     $mail->Encoding = 'base64';
        $mail->isHTML(true);
        $mail->Subject = 'Asunto del correo electrónico';
     $mail->Body = 'El texto de tu correo en HTML. Los elementos en <b>negrita</b> también están permitidos.';
     $mail->AltBody = 'El texto como elemento de texto simple';
        $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
}