<?php
    include('head.php');
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='beachbeer';
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosAdminTienda.css">
</head>

<body>
    <div class="contenedorPrincipal">
        <h1>Tus Productos:</h1>
        <?php
        if ($conexion->connect_errno){
             die('Error en la conexion');
        }
        else {
            if(isset($_SESSION['carrito'])) {
                if(count($_SESSION['carrito'])>0) {
                    $subtotal = 0;
                    echo '<div class="row row-g-4 alert alert-dark" role="alert">';
                    echo '<div class="col-md-1">Producto</div>';
                    echo '<div class="col-md-3">Nombre</div>';
                    echo '<div class="col-md-4">Descripcion</div>';
                    echo '<div class="col-md-1">Unidades</div>';
                    echo '<div class="col-md-1">Precio</div>';
                    echo '<div class="col-md-1">Total</div>';
                    echo '<div class="col-md-1">Eliminar</div>';
                    echo '</div>';
                    echo '<div id="productosCarrito">';
                    foreach($_SESSION['carrito'] as $idProducto => $unidades) {
                        $sql = "SELECT nombre, categoria, descripcion, precio, imagen FROM productos WHERE idProducto = $idProducto";
                        $resultado = $conexion->query($sql);//realizamos la consulta

                        if ($resultado -> num_rows){ //si la consulta genera registros
                            $fila = $resultado -> fetch_assoc();
                            $nombre = $fila['nombre'];
                            $categoria = $fila['categoria'];
                            $descripcion = $fila['descripcion'];
                            $precio = $fila['precio'];
                            $imagen = $fila['imagen'];
                            echo '<div class="alert alert-secondary row row-g-4" role="alert">';
                            echo '<div class="col-md-1"><img src="img/productos/' .$imagen .'" width="75px" height="75px" style="border-radius: 5px;"></div>';
                            echo '<div class="col-md-3">' .$categoria .' ' .$nombre .'</div>';
                            echo '<div class="col-md-4">' .$descripcion .'</div>';
                            echo '<div class="col-md-1">' .$unidades .'</div>';
                            echo '<div class="col-md-1">$' .$precio .'</div>';
                            echo '<div class="col-md-1">$' .$precio * $unidades .'</div>';
                            echo '<div class="col-md-1" id="' .$idProducto .'" onclick="eliminar(this.id)"><button type="button" class="btn btn-dark">Eliminar</button></div>';
                            echo '</div>';
                            $subtotal += $precio * $unidades;
                        }
                    }
                    //Aqui mostrar el total
                    echo '<div class="row row-g-4 alert alert-dark" role="alert">';
                    echo '<div class="col-md-9"></div>';
                    echo '<div class="col-md-1">Subtotal</div>';
                    echo '<div class="col-md-1">$<span id="subtotal">'. $subtotal .'</span></div>';
                    echo '<div class="col-md-1"><form action="datosEnvio.php" method="post"><input type="hidden" value="' .$subtotal .'" name="subtotal"><button type="submit" class="btn btn-success">Finalizar</button></form></div>';
                    echo '</div>';
                    echo '</div>';
                }
                else {
                    echo '<div class="alert alert-secondary" role="alert">No tienes Productos</div>';
                }
            }
            else {
                echo '<div class="alert alert-secondary" role="alert">No tienes Productos</div>';
            }
        }
        ?>
    </div>
    <script src="js/AJAX.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php
    include('footer.php');
    ?>
</body>

</html>