<?php
    if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["mensaje"]) ){
        $to = "fergiraudo91@gmail.com";
        $subject = "Mensaje Enviado desde sitio web";
        $contenido .= "Nombre: ".$_POST["nombre"]. " " . $_POST['apellido'] . "\n";
        $contenido .= "Email: ".$_POST["email"]."\n\n";
        $contenido .= "Comentario: ".$_POST["mensaje"]."\n\n";
        $header = "From: admin@ipem158lugones.com.ar\nReply-To:".$_POST["email"]."\n";
        $header .= "Mime-Version: 1.0\n";
        $header .= "Content-Type: text/plain";
        if(mail($to, $subject, $contenido ,$header)){
            echo "Mail Enviado.";
        }
    }
?>