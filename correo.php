<?php
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['mensaje'])){
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['mensaje'])){
            $name = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $mensaje = $_POST['mensaje'];
            $header = "From: no-reply@ipem158lugones.com.ar" . "\r\n";
            $header .= "Reply to: no-reply@ipem158lugones.com.ar" . "\r\n";
            $header .= "X-Mailer: PHP/" . phpversion();
            $mail = mail($name . " " . $apellido, "Enviado desde sitio web", $mensaje, $header);
            if($mail){
                echo "<h4>Mail enviado exitosamente</h4>";
            }
        }
    }
?>