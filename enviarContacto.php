<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);
    $correo = "beachbeer082@gmail.com";
    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                  
        $mail->isSMTP();         

        $mail->Host= 'smtp.gmail.com';                     
        $mail->SMTPAuth=true;             

        $mail->Username= 'garcesdiazkevin@gmail.com';
        $mail->Password= 'okvtwkbdtkxbuxuj'; 

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port= 587;


        $mail->setFrom('garcesdiazkevin@gmail.com', 'Atencion!');
        $mail->addAddress($correo, 'Atencion!');    

        $mail->addCC($correo);   

        $mail->isHTML(true);

        $mail->Subject= 'Correo PHP';
        //Lo que va a decir el correo
        $correoelectronic = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $asunto = $_POST['asunto'];
        $detalle = $_POST['det'];

        $mail->Body= 'De: '.$correoelectronic.'Nombre: '.$nombre.'Apellido: '.$apellido.'Asunto: '.$asunto.'Aclaracion: '.$detalle;
        $mail->send();
        echo "exito";

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
        echo "error";
    }

    $email = new PHPMailer(true);
    try {
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                  
        $email->isSMTP();         

        $email->Host= 'smtp.gmail.com';                     
        $email->SMTPAuth=true;             

        $email->Username= 'garcesdiazkevin@gmail.com';
        $email->Password= 'okvtwkbdtkxbuxuj'; 

        $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $email->Port= 587;


        $email->setFrom('garcesdiazkevin@gmail.com', 'Solicitud en proceso');
        $email->addAddress($_POST['correo'], 'Solicitud en proceso');    

        $email->addCC($_POST['correo']);   

        $email->isHTML(true);

        $email->Subject= 'Correo PHP';
        //Lo que va a decir el correo
        $nom=$_POST['nombre'];
        $email->Body= 'Hola '.$nom.' tu solicitud está siendo procesada';
        $email->send();
        echo "exito";

    } catch (Exception $e) {
        //echo $email->ErrorInfo;
        echo "error";
    }  
    
?>