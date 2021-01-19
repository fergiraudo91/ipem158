<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["apellido"]) || !isset($_POST["email"]) || !isset($_POST["mensaje"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"] . " " . $_POST['apellido'];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "l2000409.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "admin@ipem158lugones.com.ar";  // Mi cuenta de correo
$smtpClave = "Fer07151405";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "ipem158leopoldolugones@hotmail.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";


// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Sitio web, formulario de contacto"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Formulario de sitio web. By Fernando Giraudo<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By Fernando Giraudo"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "<h1 style='text-align: center'>El correo fue enviado correctamente.</h1>";
    echo "<a href='http://ipem158lugones.com.ar'><h1 style='text-align: center'>Volver a la pagina principal</h1></a>";
} else {
    echo "<h1 style='text-align: center'>Ocurrió un error inesperado.</h1>";
    echo "<a href='http://ipem158lugones.com.ar'><h1 style='text-align: center'>Volver a la pagina principal</h1></a>";
}