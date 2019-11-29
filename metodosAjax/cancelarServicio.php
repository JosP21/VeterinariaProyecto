<?php  
session_start();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];     
header("Location: ../from/servicios.php?status=2");  
?>
