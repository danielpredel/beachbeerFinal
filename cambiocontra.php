<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambio de Contraseña</title>
    <link rel="stylesheet" href="css/estilosRecuperarContrasena.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">
    
    <script src="js/jsNuevaContra.js"></script>
    
</head>
<body id="cuerpo">
   <div id="formulario">
      
       <form action="contrasenanueva.php" method="post" onsubmit="return validaContra()">
         
          <div class="form-group">
              <h2>CAMBIO DE CONTRASEÑA</h2>
              <label for="inputEmail4">Ingresa la contraseña</label>
              <input required type="text" name="contravieja" class="form-control" id="inputEmail4" placeholder="Contraseña">
            </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputPassword4">Ingresa la nueva contraseña</label>
              <input required type="text" name="contranueva" class="form-control" id="inputPassword4" placeholder="Nueva Contraseña">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Vuelve a ingresar la contraseña</label>
              <input required type="text" name="contranueva2" class="form-control" id="inputPassword5" placeholder="Nueva Contraseña">
            </div>
          </div>
          <div class="form-group col-md-6">
              <p id="error"></p>
            </div>
          <div id="botones"> 
              <a href="tienda.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
              <button type="submit" class="btn btn-primary" value="login">Enviar</button>
          </div>
        </form>
   </div>
    <?php
        include "footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>