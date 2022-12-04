<?php 
    include "head.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/estilosIniciarSesion.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="cuerpo">
    <div id="formulario">
        <div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input required type="text" name="username" class="form-control" id="username"
                    aria-describedby="emailHelp"
                    value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" name="password" class="form-control" id="password"
                    value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
            </div>
            <div class="form-group">
                <label for="respuesta">Ingresar texto: <img src="captcha.php"></label>
                <input required type="text" name="respuesta" id="respuesta" size="6" class="form-control">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Recordarme usuario y password</label>
            </div>
            <button class="btn btn-primary" value="login" onclick="validarLogin();">Enviar</button>
        </div>
    </div>
    <?php 
        include "footer.php";
    ?>
    <script src="js/AJAX.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</body>

</html>