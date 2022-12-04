<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BeachBeer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/Logo.jpg">
    <link rel="stylesheet" href="css/estilosHead.css">

    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&display=swap" rel="stylesheet">
</head>

<body class="headcuerpo">
    <div class="headHeader sticky-top">
        <header>
            <!-- Menu de opciones-->
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#03553E;">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <a class="navbar-brand" href="index.php">
                                <img src="img/Beachbeer.png" width="" height="50" alt="50">
                            </a>
                        </li>

                        <li class="nav-item active link">
                            <a class="nav-link" href="index.php" id="headestiloscolor">INICIO</a>
                        </li>
                        <li class="nav-item active link">
                            <a class="nav-link" href="tienda.php" id="headestiloscolor">TIENDA</a>
                        </li>
                        <li class="nav-item active link">
                            <a class="nav-link" href="acercade.php" id="headestiloscolor">ACERCA DE</a>
                        </li>
                        <li class="nav-item active link">
                            <a class="nav-link" href="contactanos.php" id="headestiloscolor">CONTACTANOS</a>
                        </li>
                        <li class="nav-item active link">
                            <a class="nav-link" href="ayuda.php" id="headestiloscolor">AYUDA</a>
                        </li>
                        <?php 
                    if(!isset($_SESSION['user'])){
                ?>
                        <li class="nav-item active link">
                            <a class="link nav-link" href="registro.php" id="headestiloscolor">REGISTRARSE</a>
                        </li>
                        <?php 
                    }
              ?>
                    </ul>
                    <div id="numCarrito"><?php
                    if(isset($_SESSION['carrito'])) {
                        $total = 0;
                        foreach($_SESSION['carrito'] as $idProducto => $unidades) {
                            $total += $unidades;
                        }
                        $_SESSION['noProductos'] = $total;
                        echo $total;
                    }
                    else {
                        echo "0";
                    }?>
                    </div>
                    <div id="carrito" style="margin-right: 20px;">
                        <a href="carrito.php"><img src="img/Carrito.png" width="40px" height="40px"></a>
                    </div>
                    <?php
                    if(!isset($_SESSION['user'])){ 
                        $btn = '<form action="login.php" class="form-inline my-2 my-lg-0">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">INGRESAR</button>
                        </form>';
                        echo $btn;
                    }
                    else{
                        $btn ='<div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Hola, ' .$_SESSION['user'] .'</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="cambiocontra.php">Cambiar<br> Contraseña</a>
                                    <a class="dropdown-item" href="cerrarSesion.php">Cerrar<br> Sesión</a>';
                                if(isset($_SESSION['ADMIN'])) {
                                    $btn .= '<a class="dropdown-item" href="agregarProductos.php">Agregar Productos</a>
                                        <a class="dropdown-item" href="eliminarProductos.php">Eliminar Productos</a>
                                        <a class="dropdown-item" href="editarProductos.php">Editar Productos</a>';
                                }
                        $btn .= '</div>
                            </div>';
                        echo $btn;
                    }
                ?>
                </div>
            </nav>
        </header>
    </div>
    <div class="headHeader">
        <div class="headproye">
            <h4>Este sitio es un proyecto de la Universidad Autonoma de Aguascalientes</h4>
        </div>
        <div class="headfecha">
            <?php
            // Fecha de ultima actualización
            date_default_timezone_set('America/Mexico_City');
            echo "Fecha de ultima actualización: ".date("d F Y H:i:s.", filemtime(__FILE__));
        ?>
            <br>
        </div>
    </div>

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