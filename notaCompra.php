<?php
    include "head.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resumen Compra</title>
    
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    
    <link rel="stylesheet" href="css/estilosNotaCompra.css">
</head>
<body id="bdNota">
    
    <?php 
    
        // Colocará el nombre del respectivo numero de mes
        function evalua_mes(){
            
            date_default_timezone_set('America/Mexico_City'); 
            $mesAux = date('m');
            $mes = "";
            
            if($mesAux == 1) $mes = "Enero";
            elseif($mesAux == 2) $mes = "Febrero";
            elseif($mesAux == 3) $mes = "Marzo";
            elseif($mesAux == 4) $mes = "Abril";
            elseif($mesAux == 5) $mes = "Mayo";
            elseif($mesAux == 6) $mes = "Junio";
            elseif($mesAux == 7) $mes = "Julio";
            elseif($mesAux == 8) $mes = "Agosto";
            elseif($mesAux == 9) $mes = "Septiembre";
            elseif($mesAux == 10) $mes = "Octubre";
            elseif($mesAux == 11) $mes = "Noviembre";
            else $mes = "Diciembre";
            
            return $mes;
        }
        
        // Recuperar el pago por tarjeta o efectivo
        $opcion = $_POST['opcionPago']; // nombrel medio de pago (visa,paypal,oxxo,etc...)
        $pay = $_POST['pay']; // efectivo, debito o credito
        
        // Si se pago con tarjeta
        if($pay == "c" || $pay == "d"){
            $numeroT = $_POST['numeroTarjeta'];
            $nombreT = $_POST['nombreTitular'];
        
          // Si pago en efectivo
        }else{
            $codigoT = $_POST['codigo'];
        }
    ?>
    
    <div id="contenedor">
        
        <div class="title">
            <h2>Detalles de la Compra</h2>
        </div>
        
        <div class="p" style="display:flex;">
            
            <div style="width:50%;">
                <p> <?php 
                       date_default_timezone_set('America/Mexico_City'); 
                       echo date('d'). " de ". evalua_mes(). " |";
                    ?> 
                    <br> 
                </p>
            </div>
            <div class="right">
               <p>
                   <?php
                        echo $_SESSION['email'];
                   ?>
               </p>
            </div>
       </div>
       <hr class="hrNota">
       
       <div class="p" style="display:flex;">
           
            <div style="width:50%;">
               <p>Productos (<?php echo $_SESSION['noProductos'] ?>)</p>
               <p>Envío</p>
               <p>Impuestos: IVA del 5%</p>
               <p>
                   <?php 
                        if(isset($_SESSION['cupon'])){
                            if($_SESSION['cupon'] = "CUPONSUSCRIPTORES"){
                                echo "<b>".$_SESSION['cupon']."</b>";
                            }else{
                                echo "Descuento Cupón <b>".$_SESSION['cupon']."</b>";
                            }
                        }
                   ?>    
               </p>
               
            </div>
            <div class="right">
               <!-- Precio total de los productos -->
               <p>$ <?php echo $_SESSION['subtotal'] ?></p>

               <p> <?php 
                       if($_SESSION['envio']== 0.0){
                           echo "<p>Gratis</p>";

                       }else{
                           echo "<p>$ ".$_SESSION['envio']."</p>";    
                       }
                   ?> 
               </p>
               <!--Impuestos -->
               <p>$ <?php echo $_SESSION['iva'] ?> </p>
               <p>
                  <?php 
                        if(isset($_SESSION['cupon'])){
                            if($_SESSION['cupon'] == "FELIZNAVIDAD"){
                                echo  "15% de descuento = $ ".$_SESSION['descuento'];
                                
                            }else if($_SESSION['cupon'] == "CUPONSUSCRIPTORES"){
                                echo  "20% de descuento = $ ".$_SESSION['descuento'] ;
                                
                            }else if($_SESSION['cupon'] == "BEACHBEER2023"){
                                echo  "10% de descuento = $ ".$_SESSION['descuento'] ;
                            }
                        }
                   ?> 
               </p>
               
            </div>
           
       </div>
       
       <hr class="hrNota">
       
       <div class="p" style="display:flex;">
           
            <div style="width:50%;">
               <p><b>Total</b></p>
            </div>
            <div class="right">
               <p>$ <?php echo $_SESSION['total'] ?></p>
               <?php
                    if($pay == "c"){
                        echo '<p id="small">Crédito en '.$opcion.'</p>';
                    }else if($pay == "d"){
                        echo '<p id="small">Débito en '.$opcion.'</p>';
                    }else{
                        echo '<p id="small">Efectivo en '.$opcion.'</p>';
                    }
               ?>
            </div>
       </div>
       
       
       <div class="title2" style="display:flex;">
        <h2 class="h2l">Detalles del Pago</h2>
        <h2 class="h2r">Detalles del Envío</h2>
       </div>
       
       <div style="display:flex;">  
          
          <div class="p" style="display:flex; width:50%;">
           
            <div id="img">
               <?php
                  if($pay == "d" || $pay == "c"){
                      
                        if($opcion == "Visa"){
                            echo '<img class="imgNota" src="img/visa.jpeg" alt="Visa">';         

                        }else if($opcion == "Master Card"){
                            echo '<img class="imgNota" src="img/masterCard.png" alt="Master Card">';         

                        }else if($opcion == "American Express"){
                            echo '<img class="imgNota" src="img/americanExpress.png" alt="American Express">';

                        }else if($opcion == "Discover"){
                            echo '<img class="imgNota" src="img/discover.png" alt="Discover">';

                        }else
                            echo '<img class="imgNota" src="img/paypal.jpg" alt="PayPal">';
                      
                 }else{
                      if($opcion == "Oxxo"){
                            echo '<img class="imgNota" src="img/oxxo.png" alt="Oxxo">';         

                        }else if($opcion == "7Eleven"){
                            echo '<img class="imgNota" src="img/7eleven.png" alt="7Eleven">';         

                        }else
                            echo '<img class="imgNota" src="img/circleK.png" alt="Circle K">';
                  }
            ?>
            </div>
            <div class="left">
               
               <?php 
                 if($pay == "c"){ ?>
                       <p style="margin-top:20px;">Titular: <?php echo $nombreT ?></p>
                       <?php echo '<p>Tarjeta: '.$numeroT.'</p>';    
                             echo '<p>Crédito en '.$opcion.'</p>';
                       ?>
                       <p id="pago" style="color:green;">Pago aprobado</p>
               <?php 
                  }elseif($pay == "d"){ ?>
                       <p style="margin-top:20px;">Titular: <?php echo $nombreT ?></p>
                       <?php echo '<p>Tarjeta: '.$numeroT.'</p>';    
                             echo '<p>Débito en '.$opcion.'</p>';
                       ?>
                       <p id="pago" style="color:green;">Pago aprobado</p>
               <?php
                 }else{
                      echo '<p style="margin-top:24px;">Código: 9700 0101 '.$codigoT.'</p>';
                      echo '<p id="pago">Efectivo en '.$opcion.'</p>'; ?>
                      <p style="color:green;">Pago aprobado</p>
                <?php
                 }       
              ?>
                      
            </div>
          </div>
        
          <div class="p" style="width:50%; margin-right:10px;margin-top:20px;">
              
              <?php
                    if(isset($_SESSION['numIn'])){
                        echo "<p>".$_SESSION['calle'].", Nº exterior: ".$_SESSION['numEx'].", Nº interior: ".$_SESSION['numIn']."</p>";
                        echo "<p>".$_SESSION['pais'].", ".$_SESSION['colonia'].", Código Postal: (".$_SESSION['cp'].")";
                        echo "<p>Recibe ".$_SESSION['nombre'].", ".$_SESSION['telefono'];
                    }else{
                        echo "<p>".$_SESSION['calle'].", Nº exterior: ".$_SESSION['numEx']."</p>";
                        echo "<p>".$_SESSION['pais'].", ".$_SESSION['colonia'].", Código Postal: (".$_SESSION['cp'].")";
                        echo "<p>Recibe ".$_SESSION['nombre'].", ".$_SESSION['telefono'];
                    }
              ?>
          </div>
      </div>
       
       
       <div class="prod">
            <h2>Productos</h2>
       </div>

       <?php 
            // Conectarse a la base de datos
            $servidor='localhost';
            $cuenta='id19989791_administrador';
            $password='5cT[tJgM1ZGGye&w';
            $bd='id19989791_beachbeer';
            $conexion = new mysqli($servidor,$cuenta,$password,$bd);

            echo '<div id="divTable"><table id="tableCompra">
                    <tr>
                        <td class="tdTable">Producto</td>
                        <td class="tdTable">Nombre</td>
                        <td class="tdTable">Unidades</td>
                        <td class="tdTable">Total</td>
                    </tr>';
            
            foreach($_SESSION['carrito'] as $idProducto => $unidades) {
                $sql = "SELECT idProducto, nombre, categoria, existencia, precio, imagen FROM productos WHERE idProducto = $idProducto";
                $resultado = $conexion->query($sql);//realizamos la consulta

                if ($resultado -> num_rows){ //si la consulta genera registros
                    
                    $fila = $resultado -> fetch_assoc();
                    $id = $fila['idProducto'];
                    $nombre = $fila['nombre'];
                    $categoria = $fila['categoria'];
                    $precio = $fila['precio'];
                    $imagen = $fila['imagen'];
                    $existencia = $fila['existencia'];

                    echo '<tr>
                            <td><img src="img/productos/'.$imagen .'" class="imgCompra""></td>
                            <td>'.$categoria.' '.$nombre.'</td>
                            <td class="tdProd">'.$unidades.'</td>
                            <td class="tdProd">$ '.$precio*$unidades.'</td>
                            </tr>';
                      
                    // Actualizar la tabla de Productos
                    $actualiza = "UPDATE productos SET existencia=".($existencia-$unidades)." WHERE idProducto=".$id;        
                    $conexion->query($actualiza);


                    // Actualizar la tabla de ventas
                    $existe = "SELECT * FROM ventas WHERE Producto LIKE BINARY '$nombre'"; // Validar si ya existen ventas del producto 
                    $res = $conexion->query($existe);
                    if($res->num_rows){ // Si ya hay ventas de este producto
                        $row =$res->fetch_assoc();
                        $piezas = $row['PiezasVendidas'];
                        $actualiza = "UPDATE ventas SET PiezasVendidas=".($piezas+$unidades)." WHERE Producto='$nombre'";
                        $conexion->query($actualiza);

                    }else{ // Si es la primer venta
                        $actualiza = "INSERT INTO ventas VALUES ('$nombre',$unidades)";
                        $conexion->query($actualiza);
                    }
                }
            }
                    echo '</table></div>';
        ?>
       
       <div id="btn"><a href="tienda.php"><button type="button" id="btnAceptar">Volver a la Tienda</button></a></div>
    </div>
    
    <!--
    <script>
            swal({
                title: "¡Correo Enviado!",
                text: "Hemos Enviado los Detalles de la Compra a su Correo",
                icon: "success",
                }).then(() => {});
    </script>
    -->
    
    <?php
      
      include "correoDetalles.php";
      include "footer.php";

      $_SESSION['cupon'] = null;
      $_SESSION['carrito'] = null;
      $_SESSION['descuento'] = null;
   ?>
</body>
</html>