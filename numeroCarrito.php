<?php
    session_start();
    if(isset($_SESSION['carrito'])) {  //Si el carrito no se ha creado
        $total = 0;
        foreach($_SESSION['carrito'] as $idProducto => $unidades) {
            $total += $unidades;
        }
        echo $total;
    }
    else {
        echo "0";
    }
?>