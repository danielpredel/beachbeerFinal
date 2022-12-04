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
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosAdminTienda.css">
</head>

<body>
    <div class="contenedorPrincipal">
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Filtro
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" id="todo" onclick="filtro(this.id)">Todo</a></li>
                <li><a class="dropdown-item" id="cerveza" onclick="filtro(this.id)">Cerveza</a></li>
                <li><a class="dropdown-item" id="tequila" onclick="filtro(this.id)">Tequila</a></li>
                <li><a class="dropdown-item" id="whisky" onclick="filtro(this.id)">Whisky</a></li>
            </ul>
        </div>
        <div id="productos">
            <br>
            <?php
            if ($conexion->connect_errno){
                die('Error en la conexion');
            }
            else {
                //hacemos cadena con la sentencia mysql para consultar datos
                $sql = "SELECT * FROM productos";
                $resultado = $conexion->query($sql);//realizamos la consulta

                if ($resultado -> num_rows){ //si la consulta genera registros
                    $oferta = rand(0, $resultado -> num_rows - 1);
                    $desc = rand(75, 95);
                    $cont = 0;
                    echo '<div class="row g-3" id="listaProductos">';
                    while($fila = $resultado -> fetch_assoc()){ //recorremos los registros obtenidos de la tabla
                        echo '<div class="col col-md-3">';
                        if($cont == $oferta) {
                            echo '<div class="card text-bg-success h-100">';
                        }
                        else {
                            echo '<div class="card h-100">';
                        }
                        echo '<div class="inner">';
                        echo '<img src="img/productos/' .$fila['imagen'] .'" class="card-img-top">';
                        echo '</div>';
                        echo '<div class="card-body">'; 
                        if($cont == $oferta) {
                            echo '<h5 class="card-title"><b>Oferta: </b>' .$fila['categoria'] .' ' .$fila['nombre'] .'</h5>';
                        }
                        else {
                            echo '<h5 class="card-title">' .$fila['categoria'] .' ' .$fila['nombre'] .'</h5>';
                        }
                        echo '<p class="card-text">' .$fila['descripcion'] .'</p>';
                        if($cont == $oferta) {
                            echo '<p class="card-text">De <del>$' .$fila['precio'] .'</del> a $' .$fila['precio'] * $desc / 100 .'</p>';
                        }
                        else {
                            echo '<p class="card-text">$' .$fila['precio'] .'</p>';
                        }

                        //Modifique de aqui
                        echo '<p class="card-text"><span id="disponibles' .$fila['idProducto'] .'">' .$fila['existencia'] .'</span> disponibles</p>';
                        echo '<div class="row g-3">';
                        echo '<div class="col col-md-8">';
                        if(isset($_SESSION['user'])) {
                            if($cont == $oferta) {
                                echo '<button type="button" class="btn btn-light" id="' .$fila['idProducto'] .'" onclick="agregar(this.id)">Agregar al Carrito</button>';
                            }
                            else {
                                echo '<button type="button" class="btn btn-success" id="' .$fila['idProducto'] .'" onclick="agregar(this.id)">Agregar al Carrito</button>';
                            }
                        }
                        else {
                            if($cont == $oferta) {
                                echo '<button type="button" class="btn btn-light" id="' .$fila['idProducto'] .'" onclick="llamarLogin()">Agregar al Carrito</button>';
                            }
                            else {
                                echo '<button type="button" class="btn btn-success" id="' .$fila['idProducto'] .'" onclick="llamarLogin()">Agregar al Carrito</button>';
                            }
                        }
                        echo '</div>';
                        echo '<div class="col col-md-4">';
                        echo '<input type="number" class="form-control" id="unidades' .$fila['idProducto'] .'" min="1" max="' .$fila['existencia'] .'" value="1" onkeyup="validarUnidades(this.id)">';
                        echo '</div>';
                        echo '</div>';
                        // Hasta aca

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        $cont++;
                    }
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <script src="js/AJAX.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php
    include('footer.php');
    ?>
</body>

</html>