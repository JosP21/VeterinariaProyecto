<?php
include"../config/conexion.php"; 


if(isset($_POST['factura']) && isset($_POST['cantidad']) && isset($_POST['producto'])){


	$facturaval = $_POST['factura'];
	$cantidad = $_POST['cantidad']; //TABLA
	$producto= $_POST['producto']; //TABLA--
	$copia=$cantidad;


  //VERIFICAR QUE EXISTAN;
 //DATOS 
	$numventa=0;
	$idproducto=0;
	$iddetalle=0;

	//VENTA

	$facturas="SELECT * FROM `ventas` WHERE `num_factura`='$facturaval'";
	//$facturas="SELECT * FROM `ventas` ORDER BY `id_venta` ASC";
	//$facturas="SELECT * FROM `ventas`";
	$resultadoVenta =  $conexion->query($facturas);
    
    while($ven=$resultadoVenta->fetch_object()){
         $numventa=$ven->id_venta;
    }
	

   //MEDIDA

	$productosCon="SELECT * FROM `productos`  WHERE `nombre`='$producto'";
	$resultadoPro =  $conexion->query($productosCon);
	while($pro= $resultadoPro->fetch_object()){
		$idproducto= $pro->id_producto;
	}

	$detalleCon="SELECT * FROM `detproductos`  WHERE `id_producto`='$idproducto' ORDER BY `fechaCaduc`";
	$resultadoDet =  $conexion->query($detalleCon);
	while($deta= $resultadoDet->fetch_object()){
		$iddetalle=$deta->id_detProd;

		if($copia > $deta->cantidCompra){
			$copia=$copia-$deta->cantidCompra;
			$valor=0;
			$modDet="UPDATE `detproductos` SET `cantidCompra`='$valor' WHERE `id_detProd`= '$deta->id_detProd' ";
			$modificar =  $conexion->query($modDet);
		}else if($copia== $deta->cantidCompra){
			$copia=0;
			$valor=0;
			$modDet="UPDATE `detproductos` SET `cantidCompra`='$valor' WHERE `id_detProd`= '$deta->id_detProd' ";
			$modificar =  $conexion->query($modDet);
		}else {
			$cantid=$deta->cantidCompra;
			$cantid=$cantid-$copia;
			$copia=0;
			$modDet="UPDATE `detproductos` SET `cantidCompra`='$cantid' WHERE `id_detProd`= '$deta->id_detProd' ";
			$modificar =  $conexion->query($modDet);
		}
	}

    $ventasG="SELECT * FROM `ventas` WHERE `num_factura`='$facturaval'";
	//$facturas="SELECT * FROM `ventas` ORDER BY `id_venta` ASC";
	//$facturas="SELECT * FROM `ventas`";
	$resultadoBase =  $conexion->query($ventasG);
    
    while($ventafa=$resultadoBase->fetch_object()){
         $numventa=$ventafa->id_venta;
    }


	$InsertDetalle="INSERT into detalleventa(id_venta, cantVenta, id_detProducto) VALUES ('$numventa', '$cantidad','$iddetalle')";
	$resultadoDetalle =  $conexion->query($InsertDetalle);

}

?>
