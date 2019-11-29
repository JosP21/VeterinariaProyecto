<?php 
include"../config/conexion.php";


if(isset($_POST['factura']) && isset($_POST['empleadoN']) && isset($_POST['clienteN'])) {

	$factura = $_POST['factura'];
	$empleado = $_POST['empleadoN']; //TABLA
	$cliente = $_POST['clienteN']; //TABLA

	$empleadoC = "SELECT * FROM `empleados`";
	$resultado =  $conexion->query($empleadoC);
	$idempleado=0;

	while($filaem = $resultado->fetch_object()){
		if(strcmp($empleado,$filaem->nombres." ".$filaem->apellidos)==0){
			$idempleado=$filaem->id_Empleado;
		}

	}


	$empleadoCliente = "SELECT * FROM `propietario` WHERE `nombres`='$cliente'";
	$resul =  $conexion->query($empleadoCliente);
	$idcliente=0;

	while($filacl = $resul->fetch_object()){
		$idcliente=$filacl->id_propietario;
	}


  
	$fechaventa = date("Y-m-d H:i:s");
	$queryventas= "INSERT into ventas(num_factura, fecha, id_empleado, id_propietario) VALUES ('$factura', '$fechaventa' , '$idempleado', '$idcliente')";
	$resultventa = $conexion->query($queryventas);
}

?>