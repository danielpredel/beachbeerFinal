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
    if ($conexion->connect_errno){
        die('Error en la conexion');
    }
    else {
        if(isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];
            //hacemos cadena con la sentencia mysql para obtener los datos de un producto
            $sql = "SELECT * FROM productos WHERE idProducto=$idProducto";

            
            $resultado = $conexion->query($sql);//realizamos la consulta

            if ($resultado -> num_rows){
                $fila = $resultado -> fetch_assoc();
                $idProducto = $fila['idProducto'];
                $nombre = $fila['nombre'];
                $categoria = $fila['categoria'];
                $descripcion = $fila['descripcion'];
                $existencia = $fila['existencia'];
                $precio = $fila['precio'];
                $imagen = $fila['imagen'];
            }
        } 
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosAdminTienda.css">
</head>

<body>
    <div class="contenedorPrincipal">
        <h1>Editar Producto</h1><br>
        <form class="row g-3" action="cambiosProductos.php" method="post" enctype="multipart/form-data" onsubmit="addNewLines();">
            <input type="hidden" name="idProducto" value="<?php echo $idProducto; ?>">
            <input type="hidden" name="nombreAnterior" value="<?php echo $imagen; ?>">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                    <option <?php if($categoria == "Cerveza") { echo "selected";} ?> value="Cerveza">Cerveza</option>
                    <option <?php if($categoria == "Tequila") { echo "selected";} ?> value="Tequila">Tequila</option>
                    <option <?php if($categoria == "Whisky") { echo "selected";} ?> value="Whisky">Whisky</option>
                </select>
            </div>
            <div class="col-md-12 input-group">
                <label for="descripcion" class="input-group-text">Descripcion</label>
                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" required><?php echo $descripcion; ?></textarea>
            </div>
            <div class="col-md-3">
                <label for="existencia" class="form-label">Existencia</label>
                <input type="number" min="0" class="form-control" id="existencia" name="existencia" value="<?php echo $existencia; ?>" required>
            </div>
            <div class="col-md-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" min="0" class="form-control" id="precio" name="precio" step="any" value="<?php echo $precio; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="imagen" class="form-label">Renombrar Imagen</label>
                <input type="text" class="form-control" id="imagen" name="imagen" value="<?php echo $imagen; ?>" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">Editar Producto</button>
            </div>
        </form>
    </div>
    <script src="js/AJAX.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <?php
    include('footer.php');
    ?>
</body>

</html>