<?php 

session_start();
$x=0;
foreach ($_SESSION["carrito"] as $indi) {
	$x = 1;
}
if ($x==0) {
	header("Location: ../from/cirugia.php?status=4");
}elseif (!empty($_POST['nombreexp']) && !empty($_POST['nombreemp']) && !empty($_POST['fecha']) && !empty($_POST['hora']) && !empty($_POST['diagnostico'])) {

	$nombreExp = $_POST['nombreexp'];
	include_once "../from/base_de_datos.php";
	$sentencia = $base_de_datos->prepare("SELECT id_Mascota FROM mascotas WHERE id_Mascota = ? LIMIT 1;");
	$sentencia->execute([$nombreExp]);
	$expediente = $sentencia->fetch(PDO::FETCH_OBJ);
	if (!$expediente) {
		header("Location: ../from/cirugia.php?status=5"); //EXPEDIENTE NO VALIDO
	}

	$nombreE = $_POST['nombreemp'];
	include_once "../from/base_de_datos.php";
	$sentencia = $base_de_datos->prepare("SELECT id_Empleado, CURDATE() as hoy FROM empleados WHERE nombres = ? LIMIT 1;");
	$sentencia->execute([$nombreE]);
	$empleados = $sentencia->fetch(PDO::FETCH_OBJ);
	if (!$empleados) {
		header("Location: ../from/cirugia.php?status=6"); //EMPLEADO NO VALIDO
	}
	
	$sentencia = $base_de_datos->prepare("SELECT id_detCirug FROM detcirugia  ORDER BY id_detCirug DESC LIMIT 1;");
	$sentencia->execute();
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
	
$idDetCirugia = $resultado === false ? 1 : $resultado->id_detCirug;

	$base_de_datos->beginTransaction();
	$sentencia = $base_de_datos->prepare("INSERT INTO detcirugia(id_detCirug, descripcion, fecha, hora,id_cirugia, id_Empleado, id_Mascota) VALUES (?, ?, ?, ?, ?, ?, ?);"); foreach ($_SESSION["carrito"] as $cirugias) {
		$sentencia->execute([null,'',$empleados->hoy,'',$cirugias->id_cirugia,$empleados->id_Empleado,$expediente->id_Mascota]);
	}
	$base_de_datos->commit();

	unset($_SESSION["carrito"]);
	$_SESSION["carrito"] = [];
	header("Location: ../from/cirugia.php?status=1");
}


?>
