<?php
   include "head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Cuenta</title>
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
    $cuenta = 'root';
    $contra = '';
    $BaseD = 'beachbeer';

    // Conexion con la base de datos 
    $conexion = new mysqli($serv,$cuenta,$contra,$BaseD);

    if($conexion->connect_error){
        die('Ocurrio un error en la conexion con la BD');
    }else{
        
        $cuenta = $_POST['username'];
        $_SESSION['usuario'] = $_POST['username'];
        
        // Encontrar el usuario en la BD
        $existe= "SELECT cuenta,correo FROM usuarios WHERE cuenta LIKE BINARY '$cuenta'";

        $existe = $conexion->query($existe);

        // Si encuentra al usuario
        if($conexion->affected_rows == 1){
            $fila = $existe->fetch_assoc();

            // Correo electrónico
            $correo = $fila['correo']; 
                
            //Genera la contraseña aleatoria con caracteres, digitos y números
            function randomText($length) {
                $contrasena="";
                $caracter="$+=?@*_/#%&!=-1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                for($i=0; $i<$length; $i++){
                    $contrasena .= $caracter[rand(0,74)]; 
                }
                return $contrasena;
            }
            $contraaleatoria = randomText(10);
        
            // Encriptar Contraseña
            $contraAux = $contraaleatoria;
            $contraaleatoria = password_hash("$contraaleatoria",PASSWORD_DEFAULT);
            
            //Actualizar la nueva contraseña en la base de datos
            $ne = "UPDATE usuarios
                SET contra='$contraaleatoria'
                WHERE cuenta LIKE BINARY '$cuenta'";
            $conexion -> query($ne);
            
            include "enviocorreo.php";
            $_SESSION['sendedEmail'] = "Ok";
            
            ?>
            <script>
                    swal({
                          title: "¡Enviado!",
                          text: "¡Correo Electrónico Enviado!",
                          type: "success",
                          timer: 3000,
                          showConfirmButton: false
                        }, function(){
                              window.location.href = "recuperar.php";
                    });
                </script>
        <?php 
        }else{ 
            // No existe Usuario
        ?>
            <script>
                swal("¡Error!","Nombre de Cuenta No Encontrada", "error");
            </script>
            <?php   
        }
    }
?>
    <div id="formulario">
       <form action="correo.php" method="post">
          <div class="form-group">
                <label for="exampleInputEmail1">Ingresa tu cuenta.</label>
                <input required type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cuenta">
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