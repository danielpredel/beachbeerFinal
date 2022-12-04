<?php 
    include('head.php');
    if(!isset($_SESSION['ADMIN'])) {
        echo '<script> window.location.href="index.php"</script>';
    }
    //Validar que sea el administrador
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
    <title>Eliminar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosAdminTienda.css">
</head>

<body>
    <div class="contenedorPrincipal">
        <h1>Eliminar Productos</h1>
        <?php
        if ($conexion->connect_errno){
             die('Error en la conexion');
        }
        else {
            //hacemos cadena con la sentencia mysql para consultar datos
            $sql = "SELECT * FROM productos";
            $resultado = $conexion->query($sql);//realizamos la consulta

            if ($resultado -> num_rows){ //si la consulta genera registros
                echo '<div class="row g-3" id="listaProductos">';
                while( $fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                    echo '<div class="col col-md-3">';
                    echo '<div class="card h-100">';
                    echo '<div class="inner">';
                    echo '<img src="img/productos/' .$fila['imagen'] .'" class="card-img-top">';
                    echo '</div>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' .$fila['categoria'] .' ' .$fila['nombre'] .'</h5>';
                    echo '<p class="card-text">' .$fila['descripcion'] .'</p>';
                    echo '<p class="card-text"> $' .$fila['precio'] .'</p>';
                    echo '<p class="card-text">' .$fila['existencia'] .' disponibles</p>';
                    //Modal
                    echo '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal' .$fila['idProducto'] .'">Eliminar</button>';
                    echo '<div class="modal fade" id="exampleModal' .$fila['idProducto'] .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                    echo '<div class="modal-dialog modal-dialog-centered">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Producto</h1>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">¿Deseas eliminar este producto? Esta accion no se puede deshacer</div>';
                    echo '<div class="modal-footer">';
                    echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>';
                    
                    //La forma de dirigirnos a otra pagina al eliminar o editar un producto sera con un formulario oculto
                    echo '<form action="bajasProductos.php" method="post">';
                    echo '<input type="hidden" name="idProducto" value="' .$fila['idProducto'] .'">';
                    echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                    echo '</form>';
                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    //Fin modal
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php
    include('footer.php');
    ?>
</body>

</html>