<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="css/estilosRecuperarContrasena.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">
    
</head>
<body id="cuerpo">   
  
   <div id="formulario">
       <form action="correo.php" method="post">
          <div class="form-group">
                <label for="exampleInputEmail1">Ingresa tu cuenta.</label>
                <input required type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cuenta">
          </div>
          <div id="botones"> 
              <a href="tienda.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
              <button type="submit" class="btn btn-primary" value="login">Enviar</button>
          </div>
          
        </form>
   </div>
   
   <div id="formulario2">
       <form action="validaContraNueva.php" method="post">
          <div class="form-group">
                <label for="newpassw">Ingresa la Nueva Contraseña Generada.</label>
                <input required type="text" name="newpasswd" class="form-control" id="newpasswd" placeholder="Contraseña">
          </div>
          <div id="botones"> 
              <a href="tienda.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
              <button type="submit" class="btn btn-primary" value="login">Enviar</button>
          </div>
        </form>
   </div>
   
   <script>
          document.getElementById("formulario2").style.display = "none"; 
    </script>
    
    <?php 
          if(isset($_SESSION['sendedEmail'])){ 
        ?>
             <script>
                document.getElementById("formulario").style.display = "none";
                document.getElementById("formulario2").style.display = "block"; 
             </script>
        <?php
          }
          include "footer.php";
        ?>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>