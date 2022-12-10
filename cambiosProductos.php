<?php
    if(!isset($_SESSION['ADMIN'])) {
        echo '<script> window.location.href="index.php"</script>';
    }
    $servidor='localhost';
    $cuenta='id19989791_administrador';
    $password='5cT[tJgM1ZGGye&w';
    $bd='id19989791_beachbeer';
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
        if(isset($_POST['submit'])) {
            $idProducto = $_POST['idProducto'];
            $nombre = $_POST['nombre'];
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $existencia = $_POST['existencia'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            $nombreAnterior = $_POST['nombreAnterior'];

            rename('img/productos/' .$nombreAnterior, 'img/productos/' .$imagen);
            
            //hacemos cadena con la sentencia mysql para insertar datos
            $sql = "UPDATE productos SET nombre='$nombre', categoria='$categoria', descripcion='$descripcion', existencia='$existencia', precio='$precio', imagen='$imagen' WHERE idProducto='$idProducto'";
            $conexion->query($sql);  //aplicamos sentencia que inserta datos en la tabla usuarios de la base de datos
            
            if ($conexion->affected_rows >= 1){ //revisamos que se elimino el registro
                echo '<script> swal("Producto Editado Correctamente", "", "success").then((value) => { window.location.href = "editarProductos.php"; });</script>';
            }//fin
            else {
                echo '<script> swal("Error al Editar el Producto", "", "error").then((value) => { window.location.href = "editarProductos.php"; });</script>';
            }
        }
    }
?>
</body>
</html>