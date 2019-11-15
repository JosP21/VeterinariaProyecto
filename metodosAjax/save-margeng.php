<?php 
include"../config/conexion.php";

if (!empty($_POST['nombreexp'])) {
	$exp=$_POST['nombreexp'];
	$id=null;
	$fecha = date("d/m/Y");
	$consulta="INSERT INTO `margen_ganancia`
	VALUES ('".id."','".$exp."','".$fecha."')";
	$resultado = $conexion->query($consulta);
	if ($resultado) {
		echo "Guardó";
	}else{
		echo "ERROR";
	}
}
?>