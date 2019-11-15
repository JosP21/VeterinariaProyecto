<?php 
include"../config/conexion.php";

if(!empty($_POST['dui']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['fechanacimiento']) 
	&& !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['user']) 
	&& !empty($_POST['contrasena']) && !empty($_POST['rol']) && !empty($_POST['email'])){

	$nombreImagen = $_FILES['imagen']['name'];
$tipoImagen = $_FILES['imagen']['type'];
$tamanioImagen = $_FILES['imagen']['size'];
$errorImagen = $_FILES['imagen']['error'];
echo($errorImagen);
$carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/Veterinaria/serverImages/users/';

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

$dui=$_POST['dui'];
$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$apellido=$_POST['apellido'];
$fechanacimiento=$_POST['fechanacimiento'];
$sexo=$_POST['sexo'];
$telefono=$_POST['telefono'];
$user=$_POST['user'];
$contrasena= password_hash($_POST['contrasena'],PASSWORD_DEFAULT);
$rol=$_POST['rol'];
$email=$_POST['email'];
$idempleado= null;

$consulta="INSERT INTO `empleados`
VALUES ('".$idempleado."','".$dui."','".$nombre."','".$apellido."','".$sexo."','".$direccion."','".$telefono."','".$fechanacimiento."','".$user."','".$contrasena."','".$rol."','".$nombreImagen."','".$email."')";
$resultado = $conexion->query($consulta);
if ($resultado) {
	echo "GuardoUsuario";
}else{
	echo "ERROR";
}
header("Location: ../from/usuario.php");
die();
}else if (!empty($_POST['nombrem']) && !empty($_POST['apellidom']) && !empty($_POST['telefonoUm']) && !empty($_POST['direccionm']) 
	&& !empty($_POST['emailm']) && !empty($_POST['rolm'])){
	$nombre=$_POST['nombrem'];
	$apellido=$_POST['apellidom'];
	$sexo='null';
	$telefono=$_POST['telefonoUm'];
	$direccion=$_POST['direccionm'];
	$email=$_POST['emailm'];
	$contrasena=$_POST['contrasenam'];
	$rol=$_POST['rolm'];
	$idU=$_POST['idprov'];

	if (!empty($contrasena)) {
		$cosulta="UPDATE `empleados` SET `nombres`='".$nombre."',`apellidos`='".$apellido."',`telefono`='".$telefono."',`direccion`='".$direccion."',`correoElectronico`='".$email."',`rol`='".$rol."' where id_Empleado='".$idU."'";
	}else{
		$cosulta="UPDATE `empleados` SET `nombres`='".$nombre."',`apellidos`='".$apellido."',`telefono`='".$telefono."',`direccion`='".$direccion."',`correoElectronico`='".$email."',`contrasena`='".$contrasena."',`rol`='".$rol."' where id_Empleado='".$idU."'";
	}
	$resultado = $conexion->query($cosulta);
	if($resultado){
		$result=$conexion->query("SELECT
			e.id_Empleado as id,
			e.DUI as dui,
			e.nombres as nombre,
			e.apellidos as apellido,
			e.direccion as direccion,
			SUBSTRING(e.direccion,1,12) as dir,
			e.telefono as telefono,
			e.contrasena as contra,
			e.rol as rol,
			e.nombre_usuario as user,
			e.correoElectronico as correo
			FROM
			empleados e");
		if($result){
			echo "<thead>
			<tr>
			<th>DUI</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Nombre de usuario</th>
			<th>Rol</th>
			<th>Acciones</th>
			</tr>
			</thead>
			<tbody>";
			while($fila = $result->fetch_object()){
				echo "<tr>
				<td>$fila->dui</td>
				<td>$fila->nombre</td>
				<td>$fila->apellido</td>
				<td title='$fila->direccion'>$fila->dir</td>
				<td>$fila->telefono</td>
				<td>$fila->correo</td>
				<td>$fila->user</td>
				<td>$fila->rol</td>
				<td>
				<button type='button' href='#' data-toggle= 'modal' data-target= '#modificarUsuario' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
				<i class='zmdi zmdi-edit' style='color: #31920D;'>
				</i>
				</button>
				&nbsp;&nbsp;
				<button type='button' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='eliminar($fila->id);'>
				<i class='zmdi zmdi-delete' style='color: #F91D0B;'>
				</i>
				</button>
				&nbsp;&nbsp;

				</td>
				</tr>";
			}
			echo "</tbody>";
		}
	}
}else if(!empty($_POST['valor'])){
	$id= $_POST['valor'];
	$result=$conexion->query("DELETE FROM `empleados` WHERE id_Empleado='".$id."'");
	if($result){
		$resulta=$conexion->query("SELECT
			e.id_Empleado as id,
			e.DUI as dui,
			e.nombres as nombre,
			e.apellidos as apellido,
			e.direccion as direccion,
			SUBSTRING(e.direccion,1,12) as dir,
			e.telefono as telefono,
			e.contrasena as contra,
			e.rol as rol,
			e.nombre_usuario as user,
			e.correoElectronico as correo
			FROM
			empleados e");
		if($resulta){
			echo "<thead>
			<tr>
			<th>DUI</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Nombre de usuario</th>
			<th>Rol</th>
			<th>Acciones</th>
			</tr>
			</thead>
			<tbody>";
			while($fila = $resulta->fetch_object()){
				echo "<tr>
				<td>$fila->dui</td>
				<td>$fila->nombre</td>
				<td>$fila->apellido</td>
				<td title='$fila->direccion'>$fila->dir</td>
				<td>$fila->telefono</td>
				<td>$fila->correo</td>
				<td>$fila->user</td>
				<td>$fila->rol</td>
				<td>
				<button data-toggle= 'modal' data-target= '#modificarUsuario' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editar($fila->id)'>
				<i class='zmdi zmdi-edit' style='color: #31920D;'>
				</i>
				</button>
				&nbsp;&nbsp;
				<button class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='eliminar($fila->id)'>
				<i class='zmdi zmdi-delete' style='color: #F91D0B;'>
				</i>
				</button>
				&nbsp;&nbsp;

				</td>
				</tr>";
			}
			echo "</tbody>";
		}
	}
}else if(!empty($_POST['val'])){ //Editar
	$id=$_POST['val'];
	$result=$conexion->query("SELECT
		e.nombres as nombres,
		e.apellidos as apellidos,
		e.sexo as sexo,
		e.direccion as direccion,
		e.telefono as telefono,
		e.contrasena as contrasena,
		e.rol as rol,
		e.correoElectronico as correo
		FROM
		empleados e
		WHERE id_Empleado='$id'");
	if($result){
		if($fila = $result->fetch_object()){
			echo "<div class='container-fluid' style='margin: 20px 0;'></div>
			<form id='frmumodificar' name='frmumodificar' method='post' action=''>
			<input type='hidden' name='idprov' id='idprov' value='$id'>
			<div class='col-xs-4 col-sm-5 col-sm-offset-1'>
			<div class='group-material'>
			<input value='$fila->nombres' id='nombrem' name='nombrem' type='text' class='material-control tooltips-general' placeholder='Josue' required='' data-toggle='tooltip' data-placement='top' title='' data-original-title='Contraseña'>
			<label style='margin-left: 0%;'>Nombre</label>       

			</div>
			</div>
			<div class='col-xs-4 col-sm-5 col-sm-offset-1'>
			<div class='group-material'>
			<input value='$fila->apellidos' id='apellidom' name='apellidom' type='text' class='material-control tooltips-general' placeholder='Vendedor...' required='' data-toggle='tooltip' data-placement='top' title='' data-original-title='Solo letras'>
			<label>Apellido</label>      
			</div>
			</div>

			<div class='col-xs-4 col-sm-5 col-sm-offset-1' style='margin-top: -3%;'>
			<fieldset>
			<legend>Sexo</legend>
			<div>
			<center>
			<div class='contenedorad'>
			<div class='radio' readonly='readonly'>
			<input type='radio' name='sexom' id='hombre' value='Hombre' disabled>
			<label for='hombre'>Hombre</label>
			<input type='radio' name='sexom' id='femenino' value='Femenino' disabled>
			<label for='sexo'>Femenino</label>
			</div>
			</div>
			</center>
			</div>
			</fieldset>
			</div>

			<div class='col-xs-4 col-sm-5 col-sm-offset-1'>

			<div class='group-material'>
			<input value='$fila->telefono' id='telefonoUm' name='telefonoUm' type='text' class='material-control tooltips-general' placeholder='####-####' required='' data-toggle='tooltip'  maxlength='9' data-placement='top' title='Número celular valido'>
			<label>Teléfono</label>
			</div>
			</div>

			<div class='row'>
			<div class='col-xs-8 col-sm-8 col-sm-offset-0' style='right: -45px;'>
			<div style='margin-left: 6%;margin-top: -2%;'><label style='color: #53a5b4;font-weight: bold;'>Dirección</label></div>

			<div style='margin-left: 6%;'>
			<div class='group-material' style='margin-bottom: 2%;margin-right: 5%;'>
			<textarea id='direccionm' name='direccionm' type='text' class='material-control tooltips-general' required='' data-toggle='tooltip' data-placement='top' title='' style='width: 100%; height: 1%;'>$fila->direccion</textarea>
			</div>
			</div>
			</div>
			<div class='col-xs-4 col-sm-3 col-sm-offset-8' style='top: -60px'>
			<div class='group-material'>
			<input value='$fila->correo' id='emailm' name='emailm' type='Email' class='material-control tooltips-general' placeholder='ejemplo@correo.com' required='true' data-toggle='tooltip' data-placement='top' title=''>
			<label>Email</label>
			</div> 
			</div>
			</div>

			<div class='container-fluid'>
			</div>
			<hr style='color: #0056b2;'>
			<div class='col-xs-4 col-sm-5 col-sm-offset-1'>
			<div class='group-material'>
			<input id='contrasenam' name='contrasenam' type='password' class='material-control tooltips-general' placeholder='Ingrese Contraseña' required='' data-toggle='tooltip' data-placement='top' title='' data-original-title='Contraseña'  autocomplete='current-password'>
			<label style='margin-left: 0%;'>Contraseña</label>       

			</div>
			</div>
			<div class='col-xs-4 col-sm-5 col-sm-offset-1'>
			<div class='group-material'>
			<SELECT id='rolm' NAME='rolm' class='material-control tooltips-general'> 
			<OPTION VALUE='' disabled >Seleccione...</OPTION>
			<OPTION VALUE='Administrador'>Administrador</OPTION>
			<OPTION VALUE='Secretaria'>Secretaria</OPTION>
			<OPTION VALUE='Vendedor'>Vendedor</OPTION> 
			</SELECT>
			<label>Rol</label>      
			</div>
			</div>
			</form>";
		}
	}
}	
?>