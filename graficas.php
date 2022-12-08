<?php
    include "head.php";
?>
<body>
	<link rel="stylesheet" href="librerias/bootstrap/css/estilos.css">
	<link rel="stylesheet" href="images/images.jfif">
	<link rel="stylesheet" href="css/estilosAcercaDe.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>

	<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="panel panel-primary">
        <div class="heading">
        Graficas de productos vendidos en el mes de octubre 2022
        </div>
        <div class="panel panel-body">
        <div class="row">
        <div class="col-sm-6">
            <h2 class="titulos">Ventas de destilados y cervezas <br> Grafica Pastel </h2>
            <div id="cargaPastel"></div>
        </div>
        <div class="col-sm-6">
            <h2 class="titulos">Ventas de destilados y cervezas <br> Grafica de barras </h2>
            <div id="cargaBarras"></div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </div>
	</div>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaPastel').load('pastel.php');
		$('#cargaBarras').load('barras.php');
	});
</script>

<?php
    include "footer.php";
?>