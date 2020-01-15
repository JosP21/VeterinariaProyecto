<?php  
session_start();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];     
header("Location: ../from/cirugia.php?status=2");  
?>

