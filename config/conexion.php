<?php
	$conexion = new mysqli('localhost','root','','proveterinaria');
	if($conexion->connect_errno){
		echo "Error de conexion a la base de datos";
	}else{
		//echo "Conectado";
	}
?>
