<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
include"../config/conexion.php";

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $correo=$_REQUEST["val"];
   $codigo=rand(1000,9999);

    // vamos a generar un codigo que se actualizara en la base de datos para el usuario del correo
   $hash = password_hash($codigo, PASSWORD_DEFAULT);
            $cosultaP="UPDATE usuarios set contrasena='$hash' WHERE correoElectronico='$correo'";
            $resultadoP = $conexion->query($cosultaP);
            $cosulta2="UPDATE empleados set contrasena='$hash' WHERE correoElectronico='$correo'";
            $resultado2 = $conexion->query($cosulta2);
            

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF ;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

    $mail->Username   = 'animalpets646@gmail.com';                     // SMTP username
    $mail->Password   = 'AnimalPest12345';                               // SMTP password
    //Set the encryption mechanism to use - STARTTLS or SMTPS
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('animalpets646@gmail.com', 'Animal Pets');
    $mail->addAddress($correo, 'Monica Alvarado');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'AnimalPets-Recuperacion de contrasena';
    $mail->Body    = 'Use este codigo para Iniciar Sesion en AnimalPets.com <b>'.$codigo.'</b>';
    $mail->AltBody = 'ESTE TEXTO NO SE USA';

    $mail->send();
    echo 'enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}