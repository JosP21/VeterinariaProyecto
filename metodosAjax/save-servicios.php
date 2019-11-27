<?php
$nombre = $_POST['val'];
$bandera=false;
include_once "../from/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM servicios WHERE nombre = ? LIMIT 1;");
$sentencia->execute([$nombre]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if ($producto) {
	$bandera=true;
}if ($bandera==false) {
	if (!empty($_POST['val']) || !empty($_POST['pre'])) {
		$servi = $_POST['val'];
		$precio = $_POST['pre'];

		include"../config/conexion.php";
		$consulta="INSERT INTO `servicios`
		VALUES ('".null."','".$servi."','".$precio."')";
		$resultado = $conexion->query($consulta);
		if ($resultado) {
			return "GUARDO";
		}else{
			echo "ERROR";
			
		}die();
	}}else {
		if(!empty($_POST['val'])){
			$nombre = $_POST['val'];
			include_once "../from/base_de_datos.php";
			$sentencia = $base_de_datos->prepare("SELECT * FROM servicios WHERE nombre = ? LIMIT 1;");
			$sentencia->execute([$nombre]);
			$producto = $sentencia->fetch(PDO::FETCH_OBJ);
			if (!$producto) {
				header("Location: ../from/servicios.php?status=4");
				exit;
			}
			session_start();
			$indice = false;
			for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
				if ($_SESSION["carrito"][$i]->nombre === $nombre) {
					$indice = $i;
					break;
				}
			}
			if ($indice === false) {
				$producto->precio = $producto->precio;
				array_push($_SESSION["carrito"], $producto);
			} else {
				$_SESSION["carrito"][$indice]->precio = $_SESSION["carrito"][$indice]->precio + $producto->precio;
			}
			$granTotal = 0;
			echo "<thead>
			<tr>
			<th>Servicio efectuado</th>
			<th>Precio</th>
			<th>Eliminar</th>
			</tr>
			</thead>
			<tbody>";
			foreach($_SESSION["carrito"] as $indice => $producto){ 
				$granTotal += $producto->precio;

				echo "<tr>
				<td>$producto->nombre</td>
				<td>$producto->precio</td>
				<td><button type='button' href='#' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='removeService($indice)'>
				<i class='zmdi zmdi-delete' style='color: #F91D0B;'></i>
				</button></td>
				</tr>";
			}
			echo "</tbody>";
		}
	}

	?>


	<script type="text/javascript"> 
		function removeService(indi){
			$.ajax({
				type:"POST",
				url:"../from/quitarServicio.php?",
				data:{indice:indi},
				success:function(resp){
					document.getElementById('miTabla').innerHTML=resp;
				}
			});

		}
	</script>
