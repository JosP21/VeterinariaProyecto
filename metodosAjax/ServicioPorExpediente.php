<?php 
if(!empty($_POST['val'])){ //Editar
	$id=$_POST['val'];
	include '../config/conexion.php';
	$result=$conexion->query("SELECT
		citas.fecha,
		servicios.nombre,
		empleados.nombres,
		empleados.apellidos,
		servicios.precio
		FROM
		detservicio
		INNER JOIN citas ON detservicio.id_cita = citas.id_cita
		INNER JOIN servicios ON detservicio.id_servicio = servicios.id_servicio
		INNER JOIN empleados ON citas.id_empleado = empleados.id_Empleado
		INNER JOIN mascotas ON citas.id_mascota = mascotas.id_mascota
		where mascotas.id_mascota = '$id'
		ORDER BY citas.fecha");
	if($result){
		while($fila = $result->fetch_object()){
			echo "<div class='div-table'>
			<table id='miTabla2' class='display responsive nowrap' style='width:100%; table-layout: fixed;
			word-wrap: break-word;'>
			<thead>
			<tr>
			<th>Fecha</th>
			<th>Servicio</th>
			<th>Precio Unitario</th>
			<th>Realizador del servicio</th>
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