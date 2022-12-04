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
        if(isset($_POST['submit'])) {
            $nombre = $_POST['nombre'];
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $existencia = $_POST['existencia'];
            $precio = $_POST['precio'];
            $imagen = $_FILES['imagen']['name'];
            
            $ruta_fichero_origen = $_FILES['imagen']['tmp_name'];
            $ruta_nuevo_destino = 'img/productos/' . $_FILES['imagen']['name'];
            move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino);

            //hacemos cadena con la sentencia mysql para insertar datos
            $sql = "INSERT INTO productos (nombre, categoria, descripcion, existencia, precio, imagen) VALUES ( '$nombre', '$categoria', '$descripcion', '$existencia', '$precio', '$imagen')";
            
            $conexion->query($sql);//aplicamos sentencia que inserta datos en la tabla productos de la base de datos
            
            if ($conexion->affected_rows >= 1){ //revisamos que se elimino el registro
                echo '<script> swal("Producto Registrado Correctamente", "", "success").then((value) => { window.location.href = "tienda.php"; });</script>';
            }//fin
            else {
                echo '<script> swal("Error al Registrar el Producto", "", "error").then((value) => { window.location.href = "tienda.php"; });</script>';
            }
        }
    }
?>
</body>
</html>