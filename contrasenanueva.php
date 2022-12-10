<?php
    include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambio de Contraseña</title>
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
            $user = $_SESSION['user'];  
            $contravieja = $_POST['contravieja'];
            $contranueva = $_POST['contranueva'];

            // Encontrar el usuario en la BD
            $existe= "SELECT cuenta,contra FROM usuarios WHERE cuenta LIKE BINARY '$user'";

            $existe = $conexion->query($existe);
            // Si encuentra al usuario
            if($conexion->affected_rows == 1){
                
                $fila = $existe->fetch_assoc();

                // Contraseña
                $contravi = $fila['contra']; 

                if(password_verify("$contravieja",$contravi)){
                    //Encriptar Contraseña
                    $contranueva = password_hash("$contranueva",PASSWORD_DEFAULT);

                    //Actualizar la contraseña en la base de datos
                    $ne = "UPDATE usuarios
                        SET contra='$contranueva'
                        WHERE cuenta LIKE BINARY '$user'";
                    $conexion -> query($ne); 
            ?>
                <script>
                    swal({
                        title: "¡Enhorabuena!",
                        text: "¡Has Cambiado La Contraseña",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonText: 'Aceptar',

                    },  function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = "cerrarSesion.php";
                            }
                    });
                </script>
            <?php
                    
                }else{
                    ?>
                        <script>
                            swal({
                              title: "¡Ups!",
                              text: "La Contraseña Que Ingresaste No Coincide Con la Actual",
                              type: "error",
                              showCancelButton: true,
                              confirmButtonText: 'Volver a Intentar',
                              cancelButtonText: "Ir a Inicio",

                              },  function (isConfirm) {
                                  if (isConfirm) {
                                       window.location.href = "cambiocontra.php";
                                  }else{
                                      window.location.href = "tienda.php";
                                  }
                            });
                        </script> 
                <?php
                 }

            }else{ 
                // No existe Usuario
                ?>
                <script>
                    swal({
                        title: "¡Error!",
                        text: "Nombre de Cuenta No Encontrada",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonText: 'Volver',

                    },  function (isConfirm) {
                            if (isConfirm) {
                                window.location.href = "tienda.php";
                            }
                    });
                </script>
                <?php   
            }

        }
?>  
    <div id="formulario">
        <form action="contrasenanueva.php" method="post">
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