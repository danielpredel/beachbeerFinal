
<?php
	require_once "conexion.php"; 
	$conexion=conexion();
	$sql="SELECT Producto,PiezasVendidas 
			from ventas order by Producto";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//producto
	$valoresX=array();//Piezas vendidas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);

 ?>
<div id="graficaPastel"></div>

<script type="text/javascript">
	function crearCadenaPastel(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX=crearCadenaPastel('<?php echo $datosX ?>');
	datosY=crearCadenaPastel('<?php echo $datosY ?>');

    
    var data = [{
      values: datosY,
      labels: datosX,
      type: 'pie'
    }];

    var layout = {
      height: 400,
      width: 500
    };

    Plotly.newPlot('graficaPastel', data, layout);

</script>