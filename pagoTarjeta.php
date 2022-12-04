<?php
    include "head.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pago con Tarjeta</title>
    
    <link rel="stylesheet" href="css/estilosPagoTarjeta.css">
</head>
<body id="bdTarjeta">
    
    <div id="contenedor">
       
       <div id="img">
           <?php 
                $opcion = $_GET['opc'];
                if($opcion == "Visa"){
                    echo '<img class="imgTarjeta" src="img/visa.jpeg" alt="Visa">';         
                    
                }else if($opcion == "Master Card"){
                    echo '<img class="imgTarjeta" src="img/masterCard.png" alt="Master Card">';         
                    
                }else if($opcion == "American Express"){
                    echo '<img class="imgTarjeta" src="img/americanExpress.png" alt="American Express">';
                    
                }else if($opcion == "Discover"){
                    echo '<img class="imgTarjeta" src="img/discover.png" alt="Discover">';
                
                }else if($opcion == "PayPal"){
                    echo '<img class="imgTarjeta" src="img/paypal.jpg" alt="PayPal">';
                }
            ?>
       </div>
       
       
       <div id="titleTarjetas">
          
           <?php 
                
                $pay = $_GET['pay'];
                $opcion = $_GET['opc'];
                // Tarjeta de Credito
                if($pay == "c"){
                    echo "<h2>Agregar una Tarjeta $opcion de Crédito</h2>";
                }else{
                // Tarjeta de Débito
                    echo "<h2>Agregar una Tarjeta $opcion de Débito</h2>";
                }
            ?>
           
       </div>
       
       <div class="p"><p>Todos los campos son obligatorios</p><hr id="hrTarjeta"></div>
       
       <div id="campos">
           
           <form id="formTarj" action="notaCompra.php" method="post">
               
               <input type="hidden" name="opcionPago" value="<?php echo $opcion ?>">
               <input type="hidden" name="pay" value="<?php echo $pay ?>">
               
               <label for="numero">Número de tarjeta</label><br>
               <input class="inputTarj" required type="number" name="numeroTarjeta" id="numero">
               
               <label for="nombre">Nombre del titular de la tarjeta</label><br>
               <input class="inputTarj" required type="text" name="nombreTitular" id="nombre">
               
            <div id="flex">
                  <div id="divSelect">
                       <label for="expira">Expira</label><br>
                       <select class="selectTarj" name="mes" id="expira">
                           <option value="1">01</option>
                           <option value="2">02</option>
                           <option value="3">03</option>
                           <option value="4">04</option>
                           <option value="5">05</option>
                           <option value="6">06</option>
                           <option value="7">07</option>
                           <option value="8">08</option>
                           <option value="9">09</option>
                           <option value="10">10</option>
                           <option value="11">11</option>
                           <option value="12">12</option>
                       </select>
                       <select class="selectTarj" name="anio" id="expiraanio">
                           <option value="2022">2022</option>
                           <option value="2023">2023</option>
                           <option value="2024">2024</option>
                           <option value="2025">2025</option>
                           <option value="2026">2026</option>
                           <option value="2027">2027</option>
                           <option value="2028">2028</option>
                           <option value="2029">2029</option>
                           <option value="2030">2030</option>
                       </select>
                </div>  
                 
                <div id="divCvv">
                       <label for="cvv">CVV</label><br>
                       <input required type="number" maxlength="3" name="cvv" id="cvv">
                </div>
                
            </div>
                   
               
             <div style="display:flex;">
               <div style="width:53%; margin-right:40px;">
                   <label for="direccion">Dirección</label><br>
                   <input class="inputTarj" required type="text" name="direccion" id="direccion">
               </div>
               <div style="width:40%">
                   <label for="ciudad">Ciudad</label><br>
                   <input class="inputTarj" required type="text" name="ciudad" id="ciudad">
              </div> 
            </div>  
              
            <div id="divp">
               <p class="pform">Puedes usar esta opción de pago para comprar productos y servicios de Beach Beer dondequiera que inicies sesión con <b> <?php echo $_SESSION['email'] ?> </b> </p>
            </div>
            
            <div id="btn">
               <a href="tienda.php"><button type="button" id="btnCancel">Cancelar</button></a>
               <button type="submit" id="btnAceptar">Pagar</button>
            </div>  
           </form>
           
       </div>
       
    </div>

    <?php
       include "footer.php";
    
   ?>
</body>
</html>