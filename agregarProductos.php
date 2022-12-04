<?php
    include('head.php');
    //Validar que sea el administrador
    if(!isset($_SESSION['ADMIN'])) {
        echo '<script> window.location.href="index.php"</script>';
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosAdminTienda.css">
</head>

<body>
    <div class="contenedorPrincipal">
        <h1>Agrega un Nuevo Producto</h1><br>
        <form class="row g-3" action="altasProductos.php" method="post" enctype="multipart/form-data" onsubmit="addNewLines();">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoria">
                    <option selected value="Cerveza">Cerveza</option>
                    <option value="Tequila">Tequila</option>
                    <option value="Whisky">Whisky</option>
                </select>
            </div>
            <div class="col-md-12 input-group">
                <label for="descripcion" class="input-group-text">Descripcion</label>
                <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" required></textarea>
            </div>
            <div class="col-md-3">
                <label for="existencia" class="form-label">Existencia</label>
                <input type="number" min="0" class="form-control" id="existencia" name="existencia" required>
            </div>
            <div class="col-md-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" min="0" class="form-control" id="precio" name="precio" step="any" required>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="imagen" name="imagen" required>
                <label class="input-group-text" for="imagen">Imagen</label>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="submit">Agregar Producto</button>
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