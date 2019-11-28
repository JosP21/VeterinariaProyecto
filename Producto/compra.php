<?php 
include"../config/conexion.php";


if(isset($_POST['proveedor']) && isset($_POST['fechacompra'])) {

	$fechacompra = $_POST['fechacompra'];
	$proveedor = $_POST['proveedor']; //TABLA

	$proveedorN = "SELECT * FROM `proveedores` WHERE `nombre`='$proveedor'";
	$proveedorNConsulta =  $conexion->query($proveedorN);
	$id=0;
	while($filap = $proveedorNConsulta->fetch_object()){
		$id=$filap->id_proveedor;
	}
  /*
    $comprasCBase = "SELECT * FROM `factcompra` WHERE `fecha`='$fechacompra'";
	$resultadoC =  $conexion->query($comprasCBase);
    $d=0;
	while($comprass = $resultadoC->fetch_object()){
		$d++;
		$idcompra= $comprass->id_factura;
	}

	if($d>0){
       date_default_timezone_set('America/El_Salvador');
       $fechacompra = date("Y-m-d H:i:s");
	}
*/
	$querycompras= "INSERT into factcompra(fecha, id_proveedor) VALUES ('$fechacompra', '$id')";
	$resultcompra = $conexion->query($querycompras);
}

?>