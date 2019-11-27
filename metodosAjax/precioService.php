<?php 
if (empty($_POST['name']) || !isset($_POST['name'])) {
	echo " ";
}else{
	$nombre=$_POST['name'];
	include"../config/conexion.php";
	$cosulta="SELECT precio as precio FROM `servicios` where nombre = '".$nombre."' ";
	$resultado = $conexion->query($cosulta);
	if($resultado){
		while($fila = $resultado->fetch_object()){
			$preci = $fila->precio;
			echo  "$preci";
		}
	}else{ echo "NO";}
}
?>