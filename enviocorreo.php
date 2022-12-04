<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                  
        $mail->isSMTP();         

        $mail->Host= 'smtp.gmail.com';                     
        $mail->SMTPAuth=true;             

        $mail->Username= 'garcesdiazkevin@gmail.com';
        $mail->Password= 'okvtwkbdtkxbuxuj'; 

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port= 587;


        $mail->setFrom('garcesdiazkevin@gmail.com', 'Recuperacion de Contrasenia');
        $mail->addAddress($correo, 'Recuperación de Contraseña');    

        $mail->addCC($correo);   

        $mail->isHTML(true);

        $mail->Subject= 'Correo PHP';
        //Lo que va a decir el correo
        $mail->Body='La contrasenia de recuperacion es: '.$contraAux;

        $mail->send();

    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }
    
?>