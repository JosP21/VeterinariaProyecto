<?php
session_start();
$granTotal=0.0;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
		$granTotal += $_SESSION["carrito"][$i]->precio;
}
echo $granTotal;
exit();
?>