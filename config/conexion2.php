<?php
$conexion = new mysqli('localhost','comuesco_animalpets','%,+]H3(ivIl!','comuesco_animalpets');
$acentos = $conexion->query("SET NAMES 'utf8'");
if($conexion->connect_errno){
	echo "Error de conexion a la base de datos";
}else{
		//echo "Conectado";
}
?>
