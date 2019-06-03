<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$email = $_POST['email'];
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.hostinger.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sitioclave@key-site.online';                     // SMTP username
    $mail->Password   = 'Admingenius$$09';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('sitioclave@key-site.online', 'Key-site');
    $mail->addAddress($email);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Generación de contraseña';
    $mail->Body    = '<h1>Tu contraseña ha sido generada</h1>'
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo '<h2>Mensaje enviado con éxito</h2>';
} catch (Exception $e) {
    echo "El mensaje NO ha sido enviado con éxito. Mailer Error: {$mail->ErrorInfo}";
}
}
?>