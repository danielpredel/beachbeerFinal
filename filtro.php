<?php
    session_start();
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='beachbeer';
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    else {
        if(isset($_POST['filtro'])) {
            switch($_POST['filtro']) {
                case "todo":
                    $sql = "SELECT * FROM productos";
                    $resultado = $conexion->query($sql);
                    if ($resultado -> num_rows){
                        $oferta = rand(0, $resultado -> num_rows - 1);
                        $desc = rand(75, 95);
                        $cont = 0;
                        echo '<h1>Todos los Productos</h1>';
                        echo '<div class="row g-3" id="listaProductos">';
                        while($fila = $resultado -> fetch_assoc()){
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

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $cont++;
                        }
                        echo '</div>';
                    }
                    break;
                case "cerveza":
                    $sql = "SELECT * FROM productos WHERE categoria='Cerveza'";
                    $resultado = $conexion->query($sql);
                    if ($resultado -> num_rows){
                        $oferta = rand(0, $resultado -> num_rows - 1);
                        $desc = rand(75, 95);
                        $cont = 0;
                        echo '<h1>Cerveza</h1>';
                        echo '<div class="row g-3" id="listaProductos">';
                        while($fila = $resultado -> fetch_assoc()){
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

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $cont++;
                        }
                        echo '</div>';
                    }
                    break;
                case "tequila":
                    $sql = "SELECT * FROM productos WHERE categoria='Tequila'";
                    $resultado = $conexion->query($sql);
                    if ($resultado -> num_rows){
                        $oferta = rand(0, $resultado -> num_rows - 1);
                        $desc = rand(75, 95);
                        $cont = 0;
                        echo '<h1>Tequila</h1>';
                        echo '<div class="row g-3" id="listaProductos">';
                        while($fila = $resultado -> fetch_assoc()){
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

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $cont++;
                        }
                        echo '</div>';
                    }
                    break;
                case "whisky":
                    $sql = "SELECT * FROM productos WHERE categoria='Whisky'";
                    $resultado = $conexion->query($sql);
                    if ($resultado -> num_rows){
                        $oferta = rand(0, $resultado -> num_rows - 1);
                        $desc = rand(75, 95);
                        $cont = 0;
                        echo '<h1>Whisky</h1>';
                        echo '<div class="row g-3" id="listaProductos">';
                        while($fila = $resultado -> fetch_assoc()){
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

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $cont++;
                        }
                        echo '</div>';
                    }
                    break;
            }
        }
    }
?>