<?php 
if(!empty($_POST['val'])){ //Editar
	$id=$_POST['val'];
	include '../config/conexion.php';
	$result=$conexion->query("SELECT
empleados.nombres,
empleados.apellidos,
detcirugia.fecha,
cirugia.nombre,
cirugia.precio
FROM
detcirugia
INNER JOIN cirugia ON detcirugia.id_cirugia = cirugia.id_cirugia
INNER JOIN empleados ON detcirugia.id_Empleado = empleados.id_Empleado
INNER JOIN mascotas ON detcirugia.id_mascota = mascotas.id_mascota
		where mascotas.id_mascota = '$id'
		ORDER BY detcirugia.fecha
");
	if($result){
		while($fila = $result->fetch_object()){
			echo "<div class='div-table'>
			<table id='miTabla2' class='display responsive nowrap' style='width:100%; table-layout: fixed;
			word-wrap: break-word;'>
			<thead>
			<tr>
			<th>Fecha</th>
			<th>Cirugia</th>
			<th>Precio Unitario</th>
			<th>Realizador de la Cirugia</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td>$fila->fecha</td>
			<td>$fila->nombre</td>
			<td>$fila->precio</td>
			<td>$fila->nombres $fila->apellidos</td>
			</tr>
			</tbody>
			</table>  </div><div style='margin: 6.5% 0;'></div>";
		}
	}
}
?>