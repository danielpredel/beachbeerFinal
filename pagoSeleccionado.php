<?php

    $seleccionado = $_POST['opcionPago'];
    $pay = "";

    if($seleccionado == "Visa" || $seleccionado == "Master Card" || $seleccionado == "American Express"){
        $pay = "c";
        include "pagoTarjeta.php";
        
    }elseif($seleccionado == "Discover" || $seleccionado == "PayPal"){
        $pay = "d";
        include "pagoTarjeta.php";        
        
    }elseif($seleccionado == "visa2"){
        $seleccionado = "Visa";
        $pay = "d";
        include "pagoTarjeta.php";
        
    }elseif($seleccionado == "Oxxo" || $seleccionado == "7Eleven" ||  $seleccionado == "Circle K"){
        $pay = "e";
        include "pagoTarjeta.php";
    
    }   
?>