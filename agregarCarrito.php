<?php
    session_start();
    if(!isset($_SESSION['carrito'])) {
        $carrito = array();
        $id = $_POST['idProducto'];
        $unidades = $_POST['unidades'];
        $carrito[$id] = $unidades;
        $_SESSION['carrito'] = $carrito;
    }
    else {
        $carrito = $_SESSION['carrito'];
        $id = $_POST['idProducto'];
        $unidades = $_POST['unidades'];
        if(isset($carrito[$id])) {
            $carrito[$id] += $unidades;
        }
        else {
            $carrito[$id] = $unidades;
        }
        $_SESSION['carrito'] = $carrito;
    }
    $total = 0;
    foreach($_SESSION['carrito'] as $idProducto => $unidades) {
        $total += $unidades;
    }
?>