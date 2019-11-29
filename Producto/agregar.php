<?php
include"../config/conexion.php"; 


if(isset($_POST['proveedor']) && isset($_POST['fechacompra']) && isset($_POST['categoria']) && isset($_POST['producto']) && isset($_POST['cantidad']) && isset($_POST['medida']) && isset($_POST['fechacaducidad']) && isset($_POST['pcompra']) && isset($_POST['pventa']) && isset($_POST['stock']) && isset($_POST['distribuidora'])){


	$fechacompra = $_POST['fechacompra'];
	$proveedor = $_POST['proveedor']; //TABLA
	$categoria= $_POST['categoria']; //TABLA--
	$producto= $_POST['producto'];//--
	$cantidad=$_POST['cantidad'];//--
	$medida= $_POST['medida']; //TABLA--
	$fechacaducidad=$_POST['fechacaducidad'];
	$preciocompra= $_POST['pcompra'];//--
	$precioventa= $_POST['pventa'];//--
	$stock=$_POST['stock'];//--
	$distribuidora=$_POST['distribuidora']; //TABLA--


  //VERIFICAR QUE EXISTAN;
 //DATOS 
	$existecategoria=0;
	$idcategoria=0;

	$existemedida=0;
	$idmedida=0;

	$existedistribuidora=0;
	$iddistribuidora=0;

	$existeproveedor=0;
	$idproveedor= 0;

	$existecp=0;
	

	$idmargen=0;



	//CATEGORIAS

		$categoriasBase="SELECT * FROM `categoria` WHERE `nombre`='$categoria'";
		$resultadoCatBase =  $conexion->query($categoriasBase);
		while($cat= $resultadoCatBase->fetch_object()){
			$existecategoria++;
			$idcategoria= $cat->id_categoria;
		                                              }
  //SI NO EXISTE SE CREA
		if($existecategoria==0){
			$InserCatBase="INSERT into categoria(nombre) VALUES ('$categoria')";
			$resultadoInserCat =  $conexion->query($InserCatBase);
		                       }

   //MEDIDA


		$medidasBase="SELECT * FROM `unidmedida` WHERE `descripcion`='$medida'";
		$resultadoMedBase =  $conexion->query($medidasBase);
		while($med= $resultadoMedBase->fetch_object()){
			$existemedida++;
			$idmedida= $med->id_unidMed;
		                                              }
  //SI NO EXISTE SE CREA
		if($existemedida==0){
			$InserMedBase="INSERT into unidmedida(descripcion) VALUES ('$medida')";
			$resultadoInserMed =  $conexion->query($InserMedBase);
		                    }


	//Distribuidora

		$distribuidorasBase="SELECT * FROM `distribuidora` WHERE `nombre`='$distribuidora'";
		$resultadoDisBase =  $conexion->query($distribuidorasBase);
		while($dis= $resultadoDisBase->fetch_object()){
			$existedistribuidora++;
			$iddistribuidora= $dis->id_distrib;
		                                             }
  //SI NO EXISTE SE CREA
		if($existedistribuidora==0){
			$InserDisBase="INSERT into distribuidora(nombre) VALUES ('$dstribuidora')";
			$resultadoInserDis =  $conexion->query($InserDisBase);
		                            }


  // MARGEN


		$margenBase="SELECT * FROM `margen_ganancia`";
		$resultadoMarBase =  $conexion->query($margenBase);

		while($mar= $resultadoMarBase->fetch_object()){

			$idmargen= $mar->id_margen;
		                                            }


   //PRODUCTO
		$existeproducto=0;
		$idproducto=0;
		$productosBase="SELECT * FROM `productos` WHERE `nombre`='$producto'";
		$resultadoProBase =  $conexion->query($productosBase);
		while($pro= $resultadoProBase->fetch_object()){
			$existeproducto++;
			$idproducto= $pro->id_producto;
		                                             }
  //SI NO EXISTE SE CREA
		if($existeproducto==0){

    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			$categoriasNBase="SELECT * FROM `categoria` WHERE `nombre`='$categoria'";
			$resultadoNCatBase =  $conexion->query($categoriasNBase);
			while($cat= $resultadoNCatBase->fetch_object()){
				$idcategoria= $cat->id_categoria;
			}


			$medidasMBase="SELECT * FROM `unidmedida` WHERE `descripcion`='$medida'";
			$resultadoMMedBase =  $conexion->query($medidasMBase);
			while($med= $resultadoMMedBase->fetch_object()){
				$idmedida= $med->id_unidMed;
			}


			$distribuidorasMBase="SELECT * FROM `distribuidora` WHERE `nombre`='$distribuidora'";
			$resultadoDisMBase =  $conexion->query($distribuidorasMBase);
			while($dis= $resultadoDisMBase->fetch_object()){
				$iddistribuidora= $dis->id_distrib;
			}




			$InserProBase="INSERT into productos(nombre, stockMin, id_categoria, id_UnidMed, id_distribuidora) VALUES ('$producto','$stock','$idcategoria','$idmedida','$iddistribuidora')";
			$resultadoInserPro =  $conexion->query($InserProBase);
		}



 //PROVEEDOR
   /*
	$proveedoresBase="SELECT * FROM `proveedores` WHERE `nombre`='$proveedor'";
	$resultadoProveBase =  $conexion->query($proveedoresBase);
	while($prove= $resultadoProveBase->fetch_object()){
		$existeproveedor++;
		$idproveedor= $prove->id_proveedor;
	}
  //SI NO EXISTE SE CREA
	if($existeproveedor==0){
		$InserPorveBase="INSERT into proveedores(nombre) VALUES ('$dstribuidora')";
		$resultadoInserProve =  $conexion->query($InserProveBase);
	}
*/


//Porducot Insertado
	$productosNBase="SELECT * FROM `productos` WHERE `nombre`='$producto'";
	$resultadoProNBase =  $conexion->query($productosNBase);
	while($pro= $resultadoProNBase->fetch_object()){
		
		$idproducto= $pro->id_producto;
	}
	//PROVEEDOR INSERTADO

	$proveedorN = "SELECT * FROM `proveedores` WHERE `nombre`='$proveedor'";
	$proveedorNConsulta =  $conexion->query($proveedorN);
	$id=0;
	while($filap = $proveedorNConsulta->fetch_object()){
		$id=$filap->id_proveedor;
	}



 //VERIFICAR SI EXISTE COMPRA FACTURA

	$comprasCBase = "SELECT * FROM `factcompra` WHERE `fecha`='$fechacompra'";
	$resultadoC =  $conexion->query($comprasCBase);
	
    $d=0;
	while($comprass = $resultadoC->fetch_object()){
		$d++;
		$idcompra= $comprass->id_factura;
	}

   
	    /*
        $querycompras= "INSERT into factcompra(fecha, id_proveedor) VALUES ('$fechacompra', '$id')";
		$resultcompra = $conexion->query($querycompras);*/
	


	//CREAR DETALLEPRODUCTO

	//$comprasBase = "SELECT * FROM `factcompra` WHERE fecha='$fechacompra'";
	$comprasBase = "SELECT * FROM `factcompra` ORDER BY `id_factura` ASC";
	  $resultadoF =  $conexion->query($comprasBase);
     $idcompra=0;
	while($compran= $resultadoF->fetch_object()){
		$idcompra= $compran->id_factura;
	}

	$InsertDetalle="INSERT into detproductos(precCompra, precVenta, fechaCaduc, id_producto, id_margen, cantidCompra, id_facturaComp) VALUES ('$preciocompra', '$precioventa','$fechacaducidad','$idproducto','$idmargen','$cantidad','$idcompra')";
	$resultadoDetalle =  $conexion->query($InsertDetalle);

}

?>