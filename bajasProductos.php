<?php
    if(!isset($_SESSION['ADMIN'])) {
        echo '<script> window.location.href="index.php"</script>';
    }
    $servidor='localhost';
    $cuenta='root';
    $password='';
    $bd='beachbeer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

<?php
    $conexion = new mysqli($servidor,$cuenta,$password,$bd);
    if ($conexion->connect_errno){
         die('Error en la conexion');
    }
    else {
        if(isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];
            //hacemos cadena con la sentencia mysql para eliminar un producto
            $sql = "DELETE FROM productos WHERE idProducto=$idProducto";
            $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
            
            if ($conexion->affected_rows >= 1){ //revisamos que se elimino el registro
                echo '<script> swal("Producto Eliminado Correctamente", "", "success").then((value) => { window.location.href = "eliminarProductos.php"; });</script>';
            }//fin
            else {
                echo '<script> swal("Error al Eliminar el Producto", "", "error").then((value) => { window.location.href = "eliminarProductos.php"; });</script>';
            }
        } 
    }
?>
</body>
</html>