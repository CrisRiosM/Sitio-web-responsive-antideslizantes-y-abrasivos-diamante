<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Almacenamos en variables el contenido de nuestro formulario.

// $destino="sierramaestra51@gmail.com";


$n = $_POST["nombre"];
$correo = $_POST["Email"];
$telefono = $_POST["Telefono"];
$mensaje = $_POST["Mensaje"];

$body = "Nombre: " . $n . "<br>Correo " . $correo  . "<br>Telefono: " . $telefono  . "<br>Mensaje: " . $mensaje;


// Todos lo datos almacenados en una variable.

// $contenido = "Nombre: " . $nombre . "\nEmpresa: " . $empresa . "\nTelefono: " . $telefono ."\nCorreo" . $correo . "Mensaje: " . $mensaje;

// // enviar el mail.

// mail($destino, "Contacto", $contenido);
header("Location:gracias.html");

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sierramaestra51@gmail.com';                     // SMTP username
    $mail->Password   = 'elosorandy';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sierramaestra51@gmail.com', $n);
    $mail->addAddress('sierramaestra51@gmail.com');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Pedido. Responder Mensaje para confirmar pedido';
    $mail->Body    = $body;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';
    $mail->send();
        echo '<script>
        alert("El mensaje se envio correctamente");
        wiNdow.history.go(-1);
        </script>';
} catch (Exception $e) {
    echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
}


?>
