<?php 
include"../config/conexion.php";
$producto = $_POST['valor'];
if(!empty($producto)) {
	$productoBase = "SELECT * FROM `productos` WHERE `nombre`='$producto'";
	$resultado =  $conexion->query($productoBase);

	if(!$resultado) {
		die('Query Error' . mysqli_error($connection));
	}else{

		$idcategoria=0;
		$iddistribuidora=0;
		$idmedida=0;

		$categoria="";
		$medida="";
		$distribuidora="";

		while($fila = $resultado->fetch_object()){
			$idcategoria= $fila->id_categoria;
			$iddistribuidora= $fila->id_distribuidora;
			$idmedida= $fila->id_UnidMed;
		}
        //CATEGORIA
		$categoriasBase="SELECT * FROM `categoria` WHERE `id_categoria`='$idcategoria'";
		$resultadoCatBase =  $conexion->query($categoriasBase);
		while($cat= $resultadoCatBase->fetch_object()){
			$categoria= $cat->nombre;
		}
        //DISTRIBUIDORA
		$distribuidorasMBase="SELECT * FROM `distribuidora` WHERE `id_distrib`='$iddistribuidora'";
		$resultadoDisMBase =  $conexion->query($distribuidorasMBase);
		while($dis= $resultadoDisMBase->fetch_object()){
			$distribuidora= $dis->nombre;
		}

		//MEDIDA
		$medidasMBase="SELECT * FROM `unidmedida` WHERE `id_unidMed`='$idmedida'";
		$resultadoMMedBase =  $conexion->query($medidasMBase);
		while($med= $resultadoMMedBase->fetch_object()){
			$medida= $med->descripcion;
		}

		$json = array();
        $stock=null;


        $Base = "SELECT * FROM `productos` WHERE `nombre`='$producto'";
	    $resultadoBase =  $conexion->query($Base);

		while($row = $resultadoBase->fetch_object()) {
			/*$json[] = array(
				'categoria' => $categoria,
				'distribuidora' => $distribuidora,
				'medida' => $medida,
				'stock' => $row->stockMin,
				'fechaC' => $row->fechaCaduc
			); 
             
			$json['categoria']=$categoria;
			$json['medida']=$medida;
			$json['distribuidora']=$distribuidora;
			$json['stock']=$row->stockMin;
			$json['fechaC']=$row->fechaCaduc; 
			*/
             $stock= $row->stockMin;
		}
        
            $json['categoria']=$categoria;
			$json['medida']=$medida;
			$json['stock']=$stock;
			
		    $jsonstring = json_encode($json);
		echo $jsonstring;
		
		/*
		$categorianueva=json_encode($categoria);
		echo $categorianueva; */

		
		
	}
}
?>
