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
        $mail->addAddress($_SESSION['email'], $_SESSION['nombre']);    

        $mail->addCC($_SESSION['email']);   

        $mail->isHTML(true);

        $mail->Subject= 'Detalles de Compra en Beach Beer';

        date_default_timezone_set('America/Mexico_City');
        $date = date("d")." de ".evalua_mes();

        $cadena = '<div id="contenedor">
                        <div class="title">
                            <h2>Detalles de la Compra</h2>
                        </div>
                        <div class="p" style="display:flex;">
                            <div style="width:50%;">
                                <p>'.$date. '|
                                    <br> 
                                </p>
                            </div>
                            <div class="right">
                            <p>'.$_SESSION['email'].'
                            </p>
                            </div>
                        </div>
                        <hr class="hrNota">
                        <div class="p" style="display:flex;">
                            <div style="width:50%;">
                            <p>Productos ('.$_SESSION['noProductos'].')</p>
                            <p>Envío</p>
                            <p>Impuestos: IVA del 5%</p>
                            <p>';
                            if(isset($_SESSION['cupon'])){
                                if($_SESSION['cupon'] = "CUPONSUSCRIPTORES"){
                                    $cadena.= "<b>".$_SESSION['cupon']."</b>";
                                }else{
                                    $cadena.= "Descuento Cupón <b>".$_SESSION['cupon']."</b>";
                                }
                            } 
                            $cadena.='</p>
                            </div>
                            <div class="right">
                            <p>$ '.$_SESSION['subtotal'].'</p>
                            <p>';
                            if($_SESSION['envio']== 0.0){
                                $cadena.= "<p>Gratis</p>";

                            }else{
                                $cadena.= "<p>$ ".$_SESSION['envio']."</p>";    
                            }
                            $cadena.='
                            </p>
                            <p>$ '.$_SESSION['iva'].'</p>
                            <p>';

                            if(isset($_SESSION['cupon'])){
                                if($_SESSION['cupon'] == "FELIZNAVIDAD"){
                                    $cadena.= "15% de descuento = $ ".$_SESSION['descuento'] ;
                                    
                                }else if($_SESSION['cupon'] == "CUPONSUSCRIPTORES"){
                                    $cadena.=  "20% de descuento = $ ".$_SESSION['descuento'] ;
                                    
                                }else if($_SESSION['cupon'] == "BEACHBEER2023"){
                                    $cadena.=  "10% de descuento = $ ".$_SESSION['descuento'] ;
                                }
                            }
                            $cadena.='
                            </p>
                            </div>
                    </div>
                    <hr class="hrNota">
                    <div class="p" style="display:flex;">
                            <div style="width:50%;">
                            <p><b>Total</b></p>
                            </div>
                            <div class="right">
                            <p>$ '.$_SESSION['total'].'</p>';

                            if($pay == "c"){
                                $cadena.= '<p id="small">Crédito en '.$opcion.'</p>';
                            }else if($pay == "d"){
                                $cadena.= '<p id="small">Débito en '.$opcion.'</p>';
                            }else{
                                $cadena.= '<p id="small">Efectivo en '.$opcion.'</p>';
                            }
                            $cadena.='    
                            </div>
                    </div>
                    <div class="title2" style="display:flex;">
                        <h2 class="h2l">Detalles del Pago</h2>
                        <h2 class="h2r" style="margin-left:335px;">Detalles del Envío</h2>
                    </div>
                    
                    <div style="display:flex;">  
                        
                        <div class="p" style="display:flex; width:50%;">
                            <div class="left">';

                                if($pay == "c"){
                                    $cadena.=' <p style="margin-top:20px;">Titular:'.$nombreT.'</p>
                                                <p>Tarjeta: '.$numeroT.'</p>    
                                                <p>Crédito en '.$opcion.'</p>
                                                <p id="pago" style="color:green;">Pago aprobado</p>';
                            
                                }elseif($pay == "d"){
                                    $cadena.= '<p style="margin-top:20px;">Titular: '.$nombreT.'</p>
                                            <p>Tarjeta: '.$numeroT.'</p>    
                                            <p>Débito en '.$opcion.'</p>
                                            <p id="pago" style="color:green;">Pago aprobado</p>';
                            
                                }else{
                                    $cadena.='<p style="margin-top:24px;">Código: 9700 0101 '.$codigoT.'</p>
                                        <p id="pago">Efectivo en '.$opcion.'</p>
                                        <p style="color:green;">Pago aprobado</p>';
                                
                                }       
                            $cadena.='
                            </div>
                        </div>
                        <div class="p" style="width:50%; margin-right:10px;margin-top:20px;">';
                            
                            if(isset($_SESSION['numIn'])){
                                $cadena.="<p>".$_SESSION['calle'].", Nº exterior: ".$_SESSION['numEx'].", Nº interior: ".$_SESSION['numIn']."</p>";
                                $cadena.="<p>".$_SESSION['pais'].", ".$_SESSION['colonia'].", Código Postal: (".$_SESSION['cp'].")";
                                $cadena.= "<p>Recibe ".$_SESSION['nombre'].", ".$_SESSION['telefono'];
                            }else{
                                $cadena.= "<p>".$_SESSION['calle'].", Nº exterior: ".$_SESSION['numEx']."</p>";
                                $cadena.= "<p>".$_SESSION['pais'].", ".$_SESSION['colonia'].", Código Postal: (".$_SESSION['cp'].")";
                                $cadena.= "<p>Recibe ".$_SESSION['nombre'].", ".$_SESSION['telefono'];
                            }
                        
                        $cadena.='
                        </div>
                    </div>
                    
                    
                    <div class="prod">
                            <h2>Productos</h2>
                    </div>';

                        // Conectarse a la base de datos
                        $servidor='localhost';
                        $cuenta='id19989791_administrador';
                        $password='5cT[tJgM1ZGGye&w';
                        $bd='id19989791_beachbeer';
                        $conexion = new mysqli($servidor,$cuenta,$password,$bd);

                        $cadena.='<div id="divTable"><table id="tableCompra">
                                <tr>
                                    <td class="tdTable">Nombre</td>
                                    <td class="tdTable">Unidades</td>
                                    <td class="tdTable">Total</td>
                                </tr>';
                            
                        foreach($_SESSION['carrito'] as $idProducto => $unidades) {
                            $sql = "SELECT nombre, categoria, precio FROM productos WHERE idProducto = $idProducto";
                            $resultado = $conexion->query($sql);//realizamos la consulta
                            
                            if ($resultado -> num_rows){ //si la consulta genera registros
                                
                                $fila = $resultado -> fetch_assoc();
                                $nombre = $fila['nombre'];
                                $categoria = $fila['categoria'];
                                $precio = $fila['precio'];

                                $cadena.= '<tr>
                                        <td>'.$categoria.' '.$nombre.'</td>
                                        <td class="tdProd">'.$unidades.'</td>
                                        <td class="tdProd">$ '.$precio*$unidades.'</td>
                                        </tr>';
                            }
                        }
                            $cadena.= '</table></div>
                    </div>';
                    
                    
        
        $mail->Body=$cadena;

        $mail->send();

    } catch (Exception $e) {
        echo $mail->ErrorInfo;
    }
?>