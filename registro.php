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
    
    <script src="js/jsRegistrar.js"></script>
    
</head>
<body>
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
            
            <form class="form" action="registrarUsuario.php" method="post" onsubmit="return validaContra()">
                
                <div id="ren1">
                    
                    <p class="pForm">Nombre(s)<br><input type="text" name="nombre" required></p>
                    
                    <p class="pForm" id="apell">Apellido(s)<br><input type="text" name="apellido" required></p>
                </div>
                
                <p class="pForm">Correo Electrónico<br>
                <input type="email" name="email" required></p>
                
                <p class="pForm">Nombre de Cuenta<br><input type="text" name="cuenta" required></p>
                
                <div id="ren2">
                    
                    <p class="pForm">Contraseña<br><input type="password" name="contra1" id="contra1" required></p>
                    
                    <p id="contra" class="pForm">Vuelve a Ingresar la Contraseña<br><input type="password" id="contra2" name="contra2" required></p>
            
                </div>
                
                <div class="alert alert-danger" role="alert" id="error" ></div>
                
                <p><button type="submit" id="btnForm">Registrarse</button></p>
                
            </form>
            
        </div>
        
    </div>
    <?php
        include "footer.php";
    ?>
</body>
</html>