<?php
echo "<h1>".$_POST['nombre']."</h1>";
    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['mensaje'])){
        if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['mensaje'])){
            echo "Hola entre";
            $name = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $mensaje = $_POST['mensaje'];
            $header = "From:" . $mail . "\r\n";
            $header .= "X-Mailer: PHP/" . phpversion();
            $header .= "Reply to: ipem158leopoldolugones@hotmail.com.ar" . "\r\n";
            $mail = mail($name . " " . $apellido, "Enviado desde sitio web", $mensaje, $header);
            echo $mail;
            if($mail){
                echo "<h4>Mail enviado exitosamente</h4>";
            }
        }
    }
?>