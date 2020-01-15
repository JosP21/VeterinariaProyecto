<?php
if(!isset($_POST["indice"])) return;
$indice = $_POST["indice"];

session_start();
array_splice($_SESSION["carrito"], $indice, 1);
$granTotal = 0;
echo "<thead>
<tr>
<th>Cirugia efectuada</th>
<th>Precio</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>";
foreach($_SESSION["carrito"] as $indice => $producto){ 
	$granTotal += $producto->precio;

	echo "<tr>
	<td>$producto->nombre</td>
	<td>$producto->precio</td>
	<td><button type='button' href='#' class='material-control tooltips-general' required='' maxlength='50' data-toggle='tooltip' data-placement='top' title='Eliminar' onclick='removeCirugia($indice)'>
			<i class='zmdi zmdi-delete' style='color: #F91D0B;'></i>
		</button></td>

	</tr>";
}
echo "</tbody>";
?>

<script type="text/javascript"> 
	function removeCirugia(indi){
		$.ajax({
			type:"POST",
			url:"../from/quitarCirugia.php",
			data:{indice:indi},
			success:function(resp){
				document.getElementById('miTabla').innerHTML=resp;
			}
		});

	}
</script>