<?php
    session_start();
    $servidor='localhost';
    $cuenta='id19989791_administrador';
    $password='5cT[tJgM1ZGGye&w';
    $bd='id19989791_beachbeer';
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);

    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    else {
        if(isset($_SESSION['carrito'])) {
            $carrito = $_SESSION['carrito'];
            $id = $_POST['idProducto'];
            if(isset($carrito[$id])) {
                unset($carrito[$id]);
                $_SESSION['carrito'] = $carrito;
            }
            if(count($_SESSION['carrito']) > 0) {
                $subtotal = 0;
                foreach($_SESSION['carrito'] as $idProducto => $unidades) {
                    $sql = "SELECT nombre, categoria, descripcion, precio, imagen FROM productos WHERE idProducto = $idProducto";
                    $resultado = $conexion->query($sql);
                    if ($resultado -> num_rows){
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
                echo '<div class="col-md-1"><form action="pago.php" method="post"><input type="hidden" value="' .$subtotal .'" name="subtotal"><button type="submit" class="btn btn-success">Finalizar</button></form></div>';
                echo '</div>';
            }
            else {
                echo '<div class="alert alert-secondary" role="alert">No tienes Productos</div>';
            }
        }
    }
?>