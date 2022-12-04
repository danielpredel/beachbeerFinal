<?php 

    include "opcionesPago.php";
    
    $cupon = $_POST['cupon'];

    if($cupon === "FELIZNAVIDAD" || $cupon === "CUPONSUSCRIPTORES" || $cupon === "BEACHBEER2023"){ 
        
        $_SESSION['cupon'] = $cupon;
    ?>
       
       
       <script>
                swal({
                    title: "¡Felicidades!",
                    text: "El Cupón se ha Aplicado en tu Compra",
                    icon: "success",
                }).then(() => {
                    window.location.href = "opcionesPago.php";
                });
        </script> 
    <?php    
    }else{ ?>
        
        <script>
                swal({
                    title: "¡Ups!",
                    text: "El Cupón que Ingresaste No Existe",
                    icon: "error",
                    buttons: {
                        Volver: {
                        text: "Volver a Intentar",
                        value: "1",
                        },
                        inicio: {
                        text: "Volver a la Tienda",
                        value: "2",
                        },
                    },
                }).then((value) => {
                    if (value) {
                        window.location.href = "opcionesPago.php";
                    }
                    else {
                        window.location.href = "index.php";
                    }
                });
        </script> 
    <?php  
    }
?>


