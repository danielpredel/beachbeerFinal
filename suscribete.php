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


        $mail->setFrom('garcesdiazkevin@gmail.com', 'Suscripcion');
        $mail->addAddress($_POST['email'], 'Suscripción');    

        $mail->addCC($_POST['email']);   

        $mail->isHTML(true);

        $mail->Subject= 'Cupon de Compra';
        //Lo que va a decir el correo
        $mail->Body='El cupon de compra es: CUPONSUSCRIPTORES con un 20% de descuento en cualquier producto';

        $mail->send();
        echo "exito";

    } catch (Exception $e) {
        //echo $mail->ErrorInfo;
        echo "error";
    }
?>