<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer;
//use PHPMailer\SMTP;
//use PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

try {
    // Intentar crear una nueva instancia de la clase PHPMailer
    $mail = new PHPMailer (true);

} catch (Exception $e) {
        echo "Mailer Error: ".$mail->ErrorInfo;
}

try {
    
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contacto@dimemex.com.mx';                     //SMTP username
    $mail->Password   = 'BBslqjH3p0IqZsIcR3ty';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contacto@dimemex.com.mx', 'DiMeMex');
    $mail->addAddress('jealdana@gmail.com', 'Enrique Aldana');     //Add a recipient               //Name is optional
    $mail->addReplyTo('contacto@dimemex.com.mx', 'Contacto');
    $mail->addCC('enriquealdana@icloud.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    $mail->CharSet= 'UTF-8'; 
    $mail->Encoding = 'base64';                                 //Set email format to HTML
    $mail->Subject = 'Estoy contactando a DiMeMex';
    $mail->Body    = 'Este es el cuerpo del correo</b>';
    $mail->AltBody = 'Este es el cuerpo en  non-HTML mail clients';

    $mail->send();
    echo 'Mensaje enviado correctamente';
} catch (Exception $e) {
    echo "Mensaje no puede ser enviado. Error del servidor : {$mail->ErrorInfo}";
}