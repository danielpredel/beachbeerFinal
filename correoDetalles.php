<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();                                        
        $mail->Host= 'smtp.gmail.com ';                     
        $mail->SMTPAuth=true;             

        $mail->Username= 'garcesdiazkevin@gmail.com';
        $mail->Password= 'okvtwkbdtkxbuxuj'; 

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           
        $mail->Port= 587;


        $mail->setFrom('garcesdiazkevin@gmail.com', 'Equipo de Beach Beer');
        $mail->addAddress($_POST['email'], $nombre);    

        $mail->addCC($email);   

        $mail->isHTML(true);

        $mail->Subject= 'Detalles de Compra en Beach Beer';

        $cadena = '';
        
        $mail->Body=$cadena;
        $mail->send();

    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }
?>