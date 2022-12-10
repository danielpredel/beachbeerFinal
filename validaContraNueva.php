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
    
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    
</head>
<body id="cuerpo"> 
  
    
  <?php
    
       $serv = 'localhost';
       $cuenta='id19989791_administrador';
       $contra='5cT[tJgM1ZGGye&w';
       $BaseD='id19989791_beachbeer';

      // Conexion con la base de datos 
       $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);

      if($conexion->connect_error){

          die('Ocurrio un error en la conexion con la BD');

      }else{
          
          $count = $_SESSION['usuario'];    
          $pass= $_POST['newpasswd'];
    
          // Encontrar el usuario en la BD
          $existe= "SELECT contra FROM usuarios WHERE cuenta LIKE BINARY '$count'";
          
          $existe = $conexion->query($existe);
          //Si encuentra al usuario
          if($conexion->affected_rows == 1){
              $fila = $existe->fetch_assoc();
          
              // Contraseña Cifrada
              $encriptada = $fila['contra'];

              //Comparar contraseña encriptada de la BD con la que ingresó en el form
              if(password_verify("$pass",$encriptada)){
                   //Desbloquear Usuario 
                   $sql = "UPDATE usuarios SET bloqueado=0,intentos=0 WHERE cuenta LIKE BINARY '$count'";
                   $conexion->query($sql);
        ?>
                      <script>
                            swal({
                                  title: "¡Enhorabuena!",
                                  text: "Su Cuenta Ha Sido Desbloqueada",
                                  type: "success",
                                  showCancelButton: true,
                                  confirmButtonText: 'Iniciar Sesión',
                                  cancelButtonText: "Ir a Inicio",

                                  },  function (isConfirm) {
                                      if (isConfirm) {
                                           window.location.href = "login.php";
                                      }else{
                                          window.location.href = "tienda.php";
                                      }
                             });
                      </script>
        <?php   
              }else{ 
        ?>    
                   <script>
                            swal({
                              title: "¡Error!",
                              text: "La Contraseña Que Ingresaste No Coincide Con la Nueva Generada",
                              type: "error",
                              showCancelButton: true,
                              confirmButtonText: 'Volver a Intentar',
                              cancelButtonText: "Ir a Inicio",

                              },  function (isConfirm) {
                                  if (isConfirm) {
                                       window.location.href = "recuperar.php";
                                  }else{
                                      window.location.href = "tienda.php";
                                  }
                        });
                   </script>  
      <?php  
             }
          
              session_unset();
              session_destroy();
          }
      } 
  ?>  
   
   <div id="formulario2">
       <form action="validaContraNueva.php" method="post">
          <div class="form-group">
                <label for="newpassw">Ingresa la Nueva Contraseña Generada.</label>
                <input required type="text" name="newpasswd" class="form-control" id="newpasswd" placeholder="Contraseña">
          </div>
          <div id="botones"> 
              <a href="login.php"><button type="button" class="btn btn-secondary">Cancelar</button></a>
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