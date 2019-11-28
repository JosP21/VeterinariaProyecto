<?php 

session_start();
$x=0;
foreach ($_SESSION["carrito"] as $indi) {
$x = 1;
}
if ($x==0) {
	header("Location: ../from/servicios.php?status=4");
}elseif (!empty($_POST['nombreexp']) && !empty($_POST['nombreemp'])) {

	$nombreExp = $_POST['nombreexp'];
	include_once "../from/base_de_datos.php";
	$sentencia = $base_de_datos->prepare("SELECT id_mascota FROM mascotas WHERE id_mascota = ? LIMIT 1;");
	$sentencia->execute([$nombreExp]);
	$expediente = $sentencia->fetch(PDO::FETCH_OBJ);
	if (!$expediente) {
		header("Location: ../from/servicios.php?status=5");
	}

	$nombreE = $_POST['nombreemp'];
	include_once "../from/base_de_datos.php";
	$sentencia = $base_de_datos->prepare("SELECT id_Empleado, CURDATE() as hoy FROM empleados WHERE nombres = ? LIMIT 1;");
	$sentencia->execute([$nombreE]);
	$empleados = $sentencia->fetch(PDO::FETCH_OBJ);
	if (!$empleados) {
		header("Location: ../from/servicios.php?status=6");
	}

	$base_de_datos->beginTransaction();
	$sentencia = $base_de_datos->prepare("INSERT INTO citas(id_cita, fecha, hora, prioridad, id_empleado, id_mascota, id_servicio) VALUES (?, ?, ?, ?, ?, ?, ?);"); foreach ($_SESSION["carrito"] as $servicio) {
		$sentencia->execute([null,$empleados->hoy,'',1,$empleados->id_Empleado,$expediente->id_mascota,$servicio->id_servicio]);
	}
	$base_de_datos->commit();

	unset($_SESSION["carrito"]);
	$_SESSION["carrito"] = [];
	header("Location: ../from/servicios.php?status=1");
}


?>