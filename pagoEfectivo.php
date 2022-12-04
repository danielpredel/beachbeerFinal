<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pago en Efectivo</title>
    
    <link rel="stylesheet" href="css/estilosPagoEfectivo.css">
    
</head>
<body id="bdEfectivo">
   
   <div id="contenedor">
       
       <div id="divimg">
           <?php 
                $opcion = $_GET['opc'];
                $pay = $_GET['pay'];
           
                if($opcion == "Oxxo"){
                    echo '<img class="imgEfectivo" src="img/oxxo.png" alt="Oxxo">';         
                    
                }else if($opcion == "7Eleven"){
                    echo '<img class="imgEfectivo" src="img/7eleven.png" alt="7Eleven">';         
                    
                }else{
                    echo '<img class="imgEfectivo" src="img/circleK.png" alt="Circle K">';
                }
            ?>
       </div>
       
       <div id="titleEfectivo">
          
           <?php 
                echo "<h2>Paga en tu $opcion favorito para terminar la compra</h2>";
            ?>
       </div>
       
       <div class="p"><p>El pago se acreditará al instante. Una vez que lo hayas realizado tendrás confirmado el stock.<br><br>Indícale al cajero que es un pago de servicios de Beach Beer.</p><hr>
       </div>
       
       <div id="campos">
        
         <form action="notaCompra.php" method="post">
           
           <p class="p">
               <b>Necesitarás estos datos:</b><br>
           </p>
           
           <ul class="ulEfectivo">
               <li class="liEfectivo">Tipo de Pago</li>
               
           </ul>
           <p class="pcampo">
               <i>Servicios de Beach Beer</i>
           </p>
           
           <ul class="ulEfectivo">
               <li class="liEfectivo">Código de Pago</li>
               
           </ul>
           <p class="pcampo">
               <i id="codigo"> 
                  <?php 
                        $rand1 = rand(1000,9999);
                        $rand2 = rand(1000,9999);
                        $randConcat = $rand1." ".$rand2;
                        echo "9700 0101 ". $rand1. " ".$rand2 ?>
               </i>
           </p>
           
           <ul class="ulEfectivo">
               <li class="liEfectivo">Monto a pagar</li>
               
           </ul>
           <p class="pcampo">
               <i>$ </i>
           </p>
           
           <ul class="ulEfectivo">
               <li class="liEfectivo">Compraste</li>
               
           </ul>
           <p class="pcampo">
               <i>Productos</i>
           </p>
           
           <input type="hidden" name="opcionPago" value="<?php echo $opcion ?>">
           <input type="hidden" name="pay" value="<?php echo $pay ?>">
           <input type="hidden" name="codigo" value="<?php echo $randConcat ?>">
           
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