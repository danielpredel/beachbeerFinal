<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/estilosRegistro.css">
    
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    
</head>
<body>
   
   <?php
      
       $serv = 'localhost';
       $cuenta = 'root';
       $contra = '';
       $BaseD = 'beachbeer';

      // Conexion con la base de datos 
       $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);

      if($conexion->connect_error){

          die('Ocurrio un error en la conexion con la BD');

      }else{
          
          //El id se autoincrementa
          $nombre =$_POST["nombre"];
          $correo =$_POST["email"];
          $cuenta =$_POST["cuenta"];
          $contra = $_POST["contra1"];
          
          // Encriptar Contraseña
          $contra = password_hash("$contra",PASSWORD_DEFAULT);
          
          // Verificar si existe o no el usuario 
          $existe = "SELECT cuenta FROM usuarios WHERE cuenta LIKE BINARY '$cuenta'";
          
          $conexion->query($existe);
          
          if($conexion->affected_rows >= 1){ 
          ?> 
            <script>
              swal({
                  title: "¡Error!",
                  text: "¡Nombre de Cuenta Ya Registrada!",
                  type: "error",
                  showCancelButton: true,
                  confirmButtonText: 'Intentar de Nuevo',
                  cancelButtonText: "Ir a Inicio",

                  },  function (isConfirm) {
                       
                      if (isConfirm) {
                          window.location.href = "registro.php";

                      }else{
                          window.location.href = "tienda.php";
                      }
              });
            </script>
             
          <?php                          
                                            
            }else {
              
              $sql = "INSERT INTO usuarios (nombre, correo, cuenta, contra, bloqueado,intentos) VALUES('$nombre','$correo','$cuenta','$contra',0,0)";

              $conexion->query($sql);

              if ($conexion->affected_rows >= 1){ //revisamos que se inserto un registro
              ?>
                 <script>
                   swal({
                      title: "¡Bien!",
                      text: "¡Registrado Correctamente!",
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
                  
              }else { ?>
                 <script>
                  swal({
                      title: "¡Error!",
                      text: "¡Error al Registrar!",
                      type: "error",
                      showCancelButton: true,
                      confirmButtonText: 'Volver a Intentar',
                      cancelButtonText: "Ir a Inicio",

                      },  function (isConfirm) {
                          if (isConfirm) {
                              window.location.href = "registro.php";
                          }else{
                              window.location.href = "tienda.php";
                          }

                    });
                 </script>   
              <?php 
              }
          }
      }
?>
    
    <div id="contenedor">
        
        <div id="fondo-Texto">
             
            <div id="texto">
                
                <p id="msj">Registrarse</p>
                <p class="txt">Porfavor ingresa tus datos para registrarte y ser parte de nuestra gran comunidad</p>
                
                <br>
                <p class="txt">¿Ya tienes una cuenta?</p>
                
                <p><a href="login.php"><button id="btnImg">Iniciar Sesion</button></a></p>
                
            </div>
            
        </div>
        
        
        <div id="formRegistro">
            
            <form>
                
                <div id="ren1">
                    
                    <p class="pForm">Nombre<br><input type="text" name="nombre" required></p>
                    
                    <p class="pForm" id="apell">Apellido<br><input type="text" name="apellido" required></p>
                </div>
                
                <p class="pForm">Correo Electrónico<br>
                <input type="email" name="email" required></p>
                
                <p class="pForm">Nombre de Cuenta<br><input type="text" name="cuenta" required></p>
                
                <div id="ren2">
                    
                    <p class="pForm">Contraseña<br><input type="password" name="contra1" id="contra1" required></p>
                    
                    <p id="contra" class="pForm">Vuelve a Ingresar la Contraseña<br><input type="password" id="contra2" name="contra2" required></p>
            
                </div>
                
                <p class="pForm" id="error"></p>
                
                <p><button type="submit" id="btnForm">Registrarse</button></p>
                
            </form>
            
        </div>
        
    </div>
    <?php
        include "footer.php";
    ?>
</body>
</html>