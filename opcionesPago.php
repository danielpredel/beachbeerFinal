<?php
    include "head.php"
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Método de Pago</title>
    
    <link rel="stylesheet" href="css/estilosOpcionesPago.css">
    
    <script src="https://kit.fontawesome.com/e81438ae9c.js" crossorigin="anonymous"></script>
    
    <script src="js/jsOpcionPago.js"></script>
</head>
<body id="bdEnvio">
  
   <?php
    
        // Funcion que evalua el gasto de envio acorde al país
        function gasto_envio($pais){
            $gasto=0.0;
            
            if($pais == "México"){$gasto=0.0;}
            elseif($pais == "Argentina"){$gasto=350.75;}
            elseif($pais == "Arabia Saudita"){$gasto=589.59;}
            elseif($pais == "Australia"){$gasto=375.99;}
            elseif($pais == "Brasil"){$gasto=150.0;}
            elseif($pais == "Canadá"){$gasto=325.0;}
            elseif($pais == "China"){$gasto=720.99;}
            elseif($pais == "Estados Unidos"){$gasto=249.50;}
            elseif($pais == "España"){$gasto=300.0;}
            elseif($pais == "Francia"){$gasto=425.29;}
            elseif($pais == "Italia"){$gasto=419.18;}
            else $gasto=650.0;
                
        
            return $gasto;
        }

        //Funcion que calcula el total de la compra
        function calcula_total($sub,$envio,$iva){
            $total = $sub+$envio+$iva;
            return $total;
        }

        //Funcion que aplicara el descuento en total a pagar
        function aplica_descuento($total,$descuento){
            $descuento/=100;
            $resta = $descuento*$total;
            $total-=$resta;
            $_SESSION['descuento'] = $resta;
            return $total;
        }

        function calcula_iva($total){
            $iva = $total*0.05;
            return $iva;
        }
       
    
        // Recuperar todos los datos de envio
        if(!isset($_SESSION['backup'])){
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['email']= $_POST['email'];
            $_SESSION['colonia'] = $_POST['colonia'];
            $_SESSION['pais']= $_POST['pais'];
            $_SESSION['cp']= $_POST['cp'];
            $_SESSION['calle'] = $_POST['calle'];
            $_SESSION['numEx']= $_POST['numEx'];
            if(!empty($_POST['numIn'])){$_SESSION['numIn'] = $_POST['numIn'];}
            $_SESSION['telefono'] = $_POST['telefono'];
            $_SESSION['backup'] = "ready";
        }

        $subtotal = $_SESSION['subtotal'];
    
   ?>
   
   <div id="contenedor">
       
       <div id="titleDatos">
           <h2>Tus Datos</h2>
       </div>
       
       <div style="display:flex;">
            
            <div id="datos" style="width:50%;">
                <?php
                    // Correo Electronico
                    echo "<i style='margin-bottom:30px;' class='i fas fa-user-tie'></i>".$_SESSION['email'];
                ?>
                <p>Productos (<?php echo $_SESSION['noProductos'] ?>)</p>
                <p>Envío</p>
                <p>Impuestos: IVA del 5%</p>
                <p>Total</p>
                
                   <?php
                    if(isset($_SESSION['cupon'])){
                        
                        if($_SESSION['cupon'] == "FELIZNAVIDAD"){
                            echo "<p>Cupón <b>FELIZNAVIDAD</b></p>";
                        
                        }elseif($_SESSION['cupon'] == "CUPONSUSCRIPTORES"){
                            echo "<p><b>CUPONSUSCRIPTORES</b></p>";
                            
                        }elseif($_SESSION['cupon'] == "BEACHBEER2023"){
                            echo "<p>Cupón <b>BEACHBEER2023</b></p>";
                        }
                        
                        echo "<p><b>Total a pagar</b></p>";
                    }
                        
                   ?>
                
            </div>
            
            <div class="right">
               <?php
                
                    if(isset($_SESSION['cupon'])){
                        if($_SESSION['cupon'] == "CUPONSUSCRIPTORES"){
                            echo "<div id='cup'>Cupón: CUPONSUSCRIPTORES</div>";
                        }else if($_SESSION['cupon'] == "FELIZNAVIDAD" || $_SESSION['cupon'] == "BEACHBEER2023"){
                            echo "<div id='cup'>Cupón aplicado: ".$_SESSION['cupon']."</div>";
                        }
                        
                        
                    }else{ ?>
                       <form action="validaCupon.php" method="post">
                            <input id="cupon" type="text" name="cupon" placeholder="Ingresar Cupón">
                        <button class="buttonPago" type="submit" id="btnCanjear">Canjear</button>
                       </form>
                    <?php
                    }
                
                        echo "<p>$ ".$subtotal."</p>";
                
                        $gasto = gasto_envio($_SESSION['pais']);

                        $_SESSION['envio'] = $gasto;

                        if($gasto == 0.0){
                           echo "<p>Gratis</p>";

                        }else{
                           echo "<p>$ ".$gasto."</p>";    
                        }

                        $total = calcula_total($subtotal,$gasto,0);
                        $iva = calcula_iva($total);
                        $total = calcula_total($subtotal,$gasto,$iva);

                        echo "<p>$ ".$iva."</p>";
                
                        echo "<p>$ ".$total."</p>";
                
                        if(isset($_SESSION['cupon'])){

                            if($_SESSION['cupon'] == "FELIZNAVIDAD"){
                                $total = aplica_descuento($total,15);
                                echo  "<p><b>15% de descuento = $ ".$_SESSION['descuento']."</b></p>";
                                echo "<p><b>$ ".$total."<b></p>";
                                
                            }else if($_SESSION['cupon'] == "CUPONSUSCRIPTORES"){
                                $total = aplica_descuento($total,20);
                                echo  "<p><b>20% de descuento = $ ".$_SESSION['descuento']."</b></p>";
                                echo "<p><b>$ ".$total."<b></p>";
                                
                            }else if($_SESSION['cupon'] == "BEACHBEER2023"){
                                $total = aplica_descuento($total,10);
                                echo  "<p><b>10% de descuento = $ ".$_SESSION['descuento']."</b></p>";
                                echo "<p><b>$ ".$total."<b></p>";
                            }
                        }

                        $_SESSION['total'] = $total;
                        $_SESSION['iva'] = $iva;
                        
                    ?>
            </div>
       </div>
       
       <div id="metPago">
           <h2>Selecciona el Medio de Pago</h2>
       </div>
       
       <div id="opcionesPago">
         
          <form method="post">
                
             <table id="tablePago"> 
               <tr class="trPago">
                   <td><b class="b">Tarjeta de Crédito</b>
                   </td>
                   
                   <td>
                      <p><input class="inputPago" required type="radio" name="opcionPago" id="visa" value="Visa"><label for="visa"><img class="imgOptions" title="Visa" src="img/visa.jpeg" alt="Visa"></label>
                      
                      <input class="inputPago" required type="radio" name="opcionPago" id="masterCard" value="Master Card"><label for="masterCard"><img class="imgOptions" title="Master Card" src="img/masterCard.png" alt="Master Card"></label>
                       
                      <input class="inputPago" required type="radio" name="opcionPago" id="american" value="American Express"><label for="american"><img class="imgOptions" title="American Express" src="img/americanExpress.png" alt="American Express"></label>
                     </p>
                   </td>
               </tr>
               
               <tr class="trPago">
                   <td><b class="b">Tarjeta de Débito</b>
                   </td>

                   <td>
                     <p>
                       <input class="inputPago" required type="radio" name="opcionPago" id="discover" value="Discover"><label for="discover"><img class="imgOptions" title="Discover Card"src="img/discover.png" alt="Discover"></label>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="paypal" value="PayPal"><label for="paypal"><img class="imgOptions" title="Pay Pal" src="img/paypal.jpg" alt="Pay Pal"></label>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="visa2" value="visa2"><label for="visa2"><img class="imgOptions" title="Visa" src="img/visa.jpeg" alt="Visa"></label>
                     </p>
                   </td>
               </tr>
               
               <tr class="trPago">
                   <td><b class="b">Pago en Efectivo</b>
                   </td>
                   
                   <td>
                     <p>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="oxxo" value="Oxxo"><label for="oxxo"><img class="imgOptions" title="Oxxo" src="img/oxxo.png" alt="Oxxo"></label>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="7eleven" value="7Eleven"><label for="7eleven"><img class="imgOptions" title="7 Eleven" src="img/7eleven.png" alt="7Eleven"></label>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="circle" value="Circle K"><label for="circle"><img class="imgOptions" title="Circle K" src="img/circleK.png" alt="Circle K"></label>
                     </p>
                   </td>
               </tr>
               
               <tr class="trPago">
                   <td><b class="b">Pago en Banco</b></td>
                   
                   <td>
                     <p>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="santander" value="Santander"><label for="santander"><img class="imgOptions" title="Santander" src="img/santander.png" alt="Santander"></label>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="bbva" value="BBVA"><label for="bbva"><img class="imgOptions" title="BBVA Bancomer" src="img/bbva.png" alt="BBVA Bancomer"></label>
                       
                       <input class="inputPago" required type="radio" name="opcionPago" id="citibanamex" value="Citibanamex"><label for="citibanamex"><img class="imgOptions" title="Citibanamex" src="img/citibanamex.png" alt="Citibanamex"></label>
                     </p>
                   </td>
               </tr>
           </table>
               
               <div id="btn">
                    <a href="tienda.php"><button type="button" id="btnCancel">Cancelar</button></a>

                   <button id="btnAceptar" type="submit" onclick="pagoSeleccionado();">Continuar</button>
               </div>
         </form>
       </div>
   </div>
   
   
   
   <?php
       include "footer.php";
   ?>
</body>
</html>

