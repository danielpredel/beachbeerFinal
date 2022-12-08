<?php
	require_once "conexion.php";
	$conexion=conexion();
	$sql="SELECT Producto,PiezasVendidas 
			from ventas order by Producto";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//ventas
	$valoresX=array();//productos

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

	var data = [
		{
			x: datosX,
			y: datosY,
			type: 'bar',
            marker: {
            color: 'rgb(142,124,195)'
          },
		},
	];

	Plotly.newPlot('graficaBarras', data);
</script>