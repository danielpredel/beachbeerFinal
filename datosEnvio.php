<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Datos Para Envío</title>
    
    <link rel="stylesheet" href="css/estilosDatosEnvio.css">
</head>
<body id="bdEnvio">
    
    <div id="contenedor">
        
        <div id="title">
              <h2>¿Dónde quieres que se envíe tu pedido?</h2>
       </div>
       
       <div class="p"><p>Todos los campos son obligatorios</p><hr id="hrEnvio"></div>
        
       <div id="campos">
           
           <form id="formEnvio" action="opcionesPago.php" method="post">

               <label for="nombre">Nombre Completo</label><br>
               <input class="inEnvio" required type="text" name="nombre" id="nombre">
               
               <label for="email">Dirección de Email</label><br>
               <input class="inEnvio" required type="email" name="email" id="email">
               
               <label for="colonia">Colonia</label><br>
               <input class="inEnvio" required type="text" name="colonia" id="colonia">
               
               <div style="display:flex;">
                   <div>
                       <label for="pais">País</label><br>
                       <select class="selEnvio" name="pais" id="pais">
                           <option value="México">México</option>
                           <option value="Argentina">Argentina</option>
                           <option value="Arabia Saudita">Arabia Saudita</option>
                           <option value="Australia">Australia</option>
                           <option value="Brasil">Brasil</option>
                           <option value="Canadá">Canadá</option>
                           <option value="China">China</option>
                           <option value="Estados Unidos">Estados Unidos</option>
                           <option value="España">España</option>
                           <option value="Francia">Francia</option>
                           <option value="Italia">Italia</option>
                           <option value="Qatar">Qatar</option>
                       </select>
                   </div>
                   
                   <div style="width:70%;">
                       <label for="co">Código Postal</label><br>
                       <input class="inEnvio" required type="number" maxlength="5" name="cp" id="cp">
                   </div>
                </div>
                
                <label for="calle">Calle</label><br>
               <input class="inEnvio" required type="text" name="calle" id="calle">
                
                <div  style="display:flex;">
                  
                   <div style="width:180px; margin-right:15px;">
                       <label for="numEx">Número Exterior</label><br>
                       <input class="inEnvio" required type="number" name="numEx" id="numEx">
                   </div>
                   
                   <div style="width:180px; margin-right:15px;">
                       <label for="numIn">Número Interior</label><br>
                       <input class="inEnvio" type="number" name="numIn" id="numIn">
                   </div>
                  
                   <div style="width:190px;">
                        <label for="telefono">Teléfono de Contacto</label><br>
                       <input class="inEnvio" required type="number" name="telefono" id="telefono">
                   </div>
                   
               </div>
               
               <div id="btn">
                <a href="tienda.php"><button type="button" id="btnCancel">Cancelar</button></a>        
                <button id="btnAceptar" type="submit">Continuar</button>
               </div>
           </form>
           
       </div>
    </div>
    
    <?php
       include "footer.php";
   ?>
</body>
</html>