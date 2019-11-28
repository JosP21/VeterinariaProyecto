<?php 
include"../config/conexion.php";
$producto = $_POST['valor'];
if(!empty($producto)) {

	$productos=$conexion->query("SELECT productos.nombre as producto,
		sum(detproductos.cantidCompra) as existencia,
		detproductos.fechaCaduc as fecha,
		detproductos.precCompra as precioC,
		detproductos.precVenta as precioV,
		productos.id_producto as id
		FROM
		productos
		INNER JOIN detproductos ON detproductos.id_producto = productos.id_producto GROUP BY productos.nombre");


	if(!$productos) {
		die('Query Error' . mysqli_error($connection));
	}else{

        $pro="";
		while($fila= $productos->fetch_object()){
             if(strcmp($fila->producto,$producto)==0){
             	$pro=$fila;
             }   
		}

		$json = array();
		$stock=null;


		$json['existencia']=$pro->existencia;
		$json['precio']=$pro->precioV;

		$jsonstring = json_encode($json);
		echo $jsonstring;
		
		/*
		$categorianueva=json_encode($categoria);
		echo $categorianueva; */

		
		
	}
}
?>
