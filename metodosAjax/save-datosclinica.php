<?php 
include"../config/conexion.php";

if(!empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['telefono']) && !empty($_POST['fechaapertura'])){
	$nombreImagen = $_FILES['imagen']['name'];
	$tipoImagen = $_FILES['imagen']['type'];
	$tamanioImagen = $_FILES['imagen']['size'];
	$errorImagen = $_FILES['imagen']['error'];

	$carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/Veterinaria/serverImages/clinica/';
	$mensaje = "";

	if ($nombreImagen == !NULL) {
		if (file_exists($carpetaDestino.$nombreImagen)){
			$nombreImagen = rand() . $_FILES['imagen']['name'];
		}

		if  (($_FILES["imagen"]["type"] == "image/jpeg")
			|| ($_FILES["imagen"]["type"] == "image/jpg")
			|| ($_FILES["imagen"]["type"] == "image/png")){

			move_uploaded_file($_FILES['imagen']['tmp_name'],$carpetaDestino.$nombreImagen);

	}else{
	//mensaje que seleeciones un archivo tipo imagen
	}
}else{
	//mensaje que seleeciones una imagen
}

$consulidclinica = "select id_DatClinica as id from datosclinica";
$result = $conexion->query($consulidclinica);
if($result){
	$object = $result->fetch_object();
	if ($object==null) {
		$nombre=$_POST['nombre'];
		$direccion=$_POST['direccion'];
		$telefono=$_POST['telefono'];
		$fechaapertura=$_POST['fechaapertura'];
		$idclinica= null;
		$consultap="INSERT INTO `datosclinica`(`id_DatClinica`, `nombre`, `foto`, `direccion`, `telefono`, `fecha_apertura`) 
		VALUES ('".$idclinica."','".$nombre."','".$nombreImagen."','".$direccion."','".$telefono."','".$fechaapertura."')";
		$resultadopro = $conexion->query($consultap);
		if ($resultadopro) {
			echo "GuardoClinica";
		}else{
			echo "ERROR";
		}
		header("Location: ../from/datosclinica.php");
		die();
	}
	echo "Ya exite una clínica veterinaria registrada.";
}
}else if (!empty($_POST['nombrem']) && !empty($_POST['telefonom']) && !empty($_POST['direccionm']) && !empty($_POST['fechaaperturam'])){
	$nombrem=$_POST['nombrem'];
	$telefonom=$_POST['telefonom'];
	$direccionm=$_POST['direccionm'];
	$fecham=$_POST['fechaaperturam'];
	$idU=$_POST['idprov'];
	$cosulta="UPDATE datosclinica SET nombre='".$nombrem."', direccion='".$direccionm."', telefono='".$telefonom."', fecha_apertura='".$fecham."' WHERE id_DatClinica ='".$idU."'";
	$resultado = $conexion->query($cosulta);
	if($resultado){
		$result=$conexion->query("SELECT
			d.id_DatClinica as id,
			d.nombre as nombre,
			d.foto as foto,
			d.direccion as direccion,
			SUBSTRING(direccion,1,12) as dir,
			d.telefono as telefono,
			d.fecha_apertura as fecha
			FROM
			datosclinica d");
		if($result){
			echo "<thead>
			<tr>
			<th>Nombre </th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Fecha apertura</th>
			<th>Acción</th>
			</tr>
			</thead>
			<tbody>";
			while($fila = $result->fetch_object()){
				echo "<tr>
				<td>$fila->nombre</td>
				<td title='$fila->direccion'>$fila->dir</td>
				<td>$fila->telefono</td>
				<td>$fila->fecha</td>
				<td><button href='#' data-toggle= 'modal' data-target= '#modificarClinica' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
				<i class='zmdi zmdi-edit' style='color: #31920D;'>
				</i>
				</button></td>
				</tr>";
			}
			echo "</tbody>";
		}
	}
		}else if(!empty($_POST['val'])){ //Editar
			$id=$_POST['val'];
			$result=$conexion->query("SELECT
				c.nombre as nombre,
				c.direccion as direccion,
				c.telefono as telefono,
				c.foto as foto,
				c.fecha_apertura as fecha
				FROM
				datosclinica c
				WHERE id_DatClinica='$id'");
			if($result){
				if($fila = $result->fetch_object()){
					echo "<div class='full-reset' style='padding: 80px 0; color:#fff; margin-top: -115px'>
					<div style='margin: 0px 0;'></div>
					<figure>
					<img id='fotoCargadam' src='../serverImages/clinica/$fila->foto' class='img-responsive center-box' style='width:25%;'>
					</figure>

					</div>

					<form id='frmmodificarC' name='frmmodificarC' method='post' action=''>
					<input type='hidden' name='idprov' id='idprov' value='$id'>
					<div class='col-xs-6 col-sm-7 col-sm-offset-3' style='top: -40px;'>
					<input id='imagenm' name='imagenm' size='30' type='file' accept='image/*'>
					</div>

					<div class='col-xs-4 col-sm-5 col-sm-offset-1'>
					<div class='group-material'>
					<input  value='$fila->nombre' id='nombrem' name='nombrem' type='text' class='material-control tooltips-general' placeholder='Animals Pets' required='' data-toggle='tooltip' data-placement='top' title='' data-original-title='Solo letras'>
					<label>Nombre</label>
					</div>
					</div>

					<div class='col-xs-4 col-sm-5 col-sm-offset-1'>

					<div class='group-material'>
					<input  value='$fila->direccion' id='direccionm' name='direccionm' type='text' class='material-control tooltips-general' placeholder='Dirección de la veterinaria' required='' data-toggle='tooltip' data-placement='top' title=''>
					<label>Dirección</label>
					</div>
					</div>


					<div class='col-xs-4 col-sm-5 col-sm-offset-1'>
					<div class='group-material'>
					<input  value='$fila->telefono' id='telefonom' name='telefonom' type='text' class='material-control tooltips-general' placeholder='####-####' data-toggle='tooltip' data-placement='top' data-original-title='0000-0000' maxlength='9'>
					<label>Teléfono</label>
					</div>
					</div>

					<div class='col-xs-4 col-sm-5 col-sm-offset-1'>

					<div class='group-material'>
					<input  value='$fila->fecha' id='fechaaperturam' name='fechaaperturam' type='date' class='material-control' placeholder='' required='true' data-toggle='tooltip' data-placement='top' title='' data-original-title='Solo letras'>
					<label>Fecha de Apertura</label>
					</div>
					</div>
					</form>";
				}
			}
		}

		?>